<?php

namespace App\Http\Controllers\Api;

class FlowController extends Controller
{
    public function getFlowList()
    {
        $sql = @"
            SELECT 流程单.流程单号,   
                流程单.流程日期,   
                流程单.单据类别,   
                流程单.订单序号,   
                流程单.产品系统编号,   
                流程单.产品明细编号,   
                流程单.数量,   
                流程单.计划交期,   
                流程单.明细备注,   
                流程单.排序,   
                流程单.创建人,   
                流程单.创建时间,   
                流程单.修改人,   
                流程单.修改时间,   
                流程单.删除,   
                流程单.删除人,   
                流程单.删除时间,   
                流程单.审核,   
                流程单.审核人,   
                流程单.审核时间,   
                流程单.完成,   
                流程单.完成人,   
                流程单.完成时间,   
                流程单.强制完成,   
                流程单.取消,   
                流程单.取消人,   
                流程单.取消时间,     
                流程单.序号,    
                产品主表.产品编号,   
                产品主表.名称,   
                产品主表.规格,   
                产品主表.客户产品号,   
                产品主表.产品属性1,   
                产品主表.产品属性2,   
                产品主表.产品属性3,   
                产品主表.产品属性4,   
                产品主表.产品属性5,   
                产品子表.明细规格,   
                产品子表.产品明细属性1,   
                产品子表.产品明细属性2,   
                产品子表.产品明细属性3,   
                产品主表.类别编号,   
                产品主表.助记码,   
                (select compsimple from company a,客户订单子表 b,客户订单主表 c where  b.订单序号=流程单.订单序号 and b.订单编号=c.订单编号 and c.客户系统编号=a.compid )as '客户',   
                (select helpid from company a,客户订单子表 b,客户订单主表 c where  b.订单序号=流程单.订单序号 and b.订单编号=c.订单编号 and c.客户系统编号=a.compid )as '助记码'  
            FROM 流程单 LEFT OUTER JOIN 产品子表 ON 流程单.产品明细编号 = 产品子表.产品明细编号,   
                产品主表  
            WHERE ( 流程单.产品系统编号 = 产品主表.产品系统编号 ) and    
                    ( 流程单.删除 = 0 ) AND  
                    ( 流程单.审核 = 1 )  and
                    流程单.完成=0 and
                    流程单.取消=0   
        ";

        $list = \DB::connection('sqlsrv')->select($sql);
        return $this->success(
            [
                'list' => $list,
            ]
        );

    }
}
