<template>
  <div id="centerRight1">
    <div class="bg-color-black">
      <div class="d-flex jc-center body-box">
        <dv-scroll-board :config="config" style="width:23rem;height:9.5rem" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    list: Array,
  },
  computed: {
    config() {
      let data = [];
      this.list.forEach((element) => {
        data.push([
          element.流程单号,
          element.客户,
          element.客户产品号,
          element.产品编号,
          element.规格,
          element.数量,
          element.流程日期.substr(0, 10),
          element.计划交期.substr(0, 10),
        ]);
      });
      return {
        header: [
          "流程单号",
          "客户",
          "客户产品号",
          "产品编号",
          "规格",
          "数量",
          "流程日期",
          "计划交期",
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
  .ceil {
    font-size: 0.25rem;
  }
}
</style>