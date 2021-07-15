<template>
  <div id="centerRight1">
    <div class="bg-color-black">
      <div class="d-flex jc-center body-box">
        <dv-scroll-board :config="config" style="width:23rem;height:9rem" />
        <div class="notice">
          <div>{{notice}}</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    list: Array,
    notice: String,
  },
  computed: {
    config() {
      let data = [];
      this.list.forEach((element) => {
        data.push([
          element.CompSimple,
          element.客户单号,
          element.客户产品号,
          element.产品编号,
          element.规格,
          element.数量,
          element.已出库量,
          element.数量 - element.已出库量,
          element.订单日期.substr(0, 10),
          element.订单交期.substr(0, 10),
        ]);
      });
      return {
        header: [
          "客户",
          "客户单号",
          "客户产品号",
          "产品编号",
          "规格",
          "订单数量",
          "已出货量",
          "剩余数量",
          "订单日期",
          "订单交期",
        ],
        data: data,
        rowNum: 10, //表格行数
        waitTime: 5000,
        headerHeight: 50,
        headerBGC: "#00BAFF", //表头
        oddRowBGC: "#0f1325", //奇数行
        evenRowBGC: "#171c33", //偶数行
        index: true,
        columnWidth: [100],
        align: ["center"],
        carousel: "page",
      };
    },
  },
  components: {},
  mounted() {},
  methods: {},
};
</script>

<style lang="scss">
#centerRight1 {
  padding: 0.2rem;
  height: 10rem;
  min-width: 3.75rem;
  border-radius: 0.0625rem;
  .bg-color-black {
    height: 10rem;
    border-radius: 0.125rem;
  }
  .text {
    color: #c3cbde;
  }
  .body-box {
    border-radius: 0.125rem;
    overflow: hidden;
  }
  .header-item,
  .ceil,
  .notice {
    font-size: 0.25rem;
  }
  .notice {
    line-height: 0.3rem;
    div {
      display: block;
      -moz-animation: move 30s linear infinite normal;
      -webkit-animation: move 30s linear infinite normal;
      animation: move 30s linear infinite normal;
      white-space: nowrap;
    }
    @-moz-keyframes move {
      0% {
        transform: translateX(100%);
        -webkit-transform: translateX(100%);
      }
      100% {
        transform: translateX(-100%);
        -webkit-transform: translateX(-100%);
      }
    }
    @-webkit-keyframes move {
      0% {
        transform: translateX(100%);
        -webkit-transform: translateX(100%);
      }
      100% {
        transform: translateX(-100%);
        -webkit-transform: translateX(-100%);
      }
    }
    @keyframes move {
      0% {
        transform: translateX(100%);
        -webkit-transform: translateX(100%);
      }
      100% {
        transform: translateX(-100%);
        -webkit-transform: translateX(-100%);
      }
    }
  }
}
</style>