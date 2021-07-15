<?php

namespace App\Http\Controllers\Api;

class NoticeControlle extends Controller
{
    public function getNotice()
    {
        $sql = @"
            select TOP 1 通告
            from [系统设置]
        ";

        $list = \DB::connection('sqlsrv')->select($sql);

        if (count($list)) {
            $msg = $list[0]->通告;
        } else {
            $msg = "";
        }
        return $this->success(
            [
                'notice' => $msg,
            ]
        );

    }
}
