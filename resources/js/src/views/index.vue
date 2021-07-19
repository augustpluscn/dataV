<template>
  <div id="index">
    <dv-full-screen-container class="bg">
      <dv-loading v-if="loading">Loading...</dv-loading>
      <div v-else class="host-body">
        <div class="d-flex jc-center">
          <dv-decoration-10 style="width:33.3%;height:.0625rem;" />
          <div class="d-flex jc-center">
            <dv-decoration-8 :color="['#568aea', '#000000']" style="width:2.5rem;height:.625rem;" />
            <div class="title">
              <span class="title-text">订单跟踪</span>
              
            </div>
            <dv-decoration-8
              :reverse="true"
              :color="['#568aea', '#000000']"
              style="width:2.5rem;height:.625rem;" />
          </div>
          <dv-decoration-10 style="width:33.3%;height:.0625rem; transform: rotateY(180deg);" />
        </div>

        <div class="body-box">
          <!-- 第三行数据 -->
          <div class="content-box">
            <div>
              <dv-border-box-13>
                <centerRight1 :list="list" :notice="notice" />
              </dv-border-box-13>
            </div>
          </div>
        </div>
      </div>
    </dv-full-screen-container>
  </div>
</template>

<script>
import { formatTime } from "../utils/index.js";
import centerRight1 from "./centerRight1";
import Api from "../utils/api.js";
export default {
  data() {
    return {
      loading: true,
      dateDay: null,
      dateYear: null,
      dateWeek: null,
      weekday: ["周日", "周一", "周二", "周三", "周四", "周五", "周六"],
      list: [],
      notice: "",
    };
  },
  components: {
    centerRight1,
  },
  mounted() {
    this.cancelLoading();
    this.getDate();
  },
  methods: {
    timeFn() {
      setInterval(() => {
        this.dateDay = formatTime(new Date(), "HH: mm: ss");
        this.dateYear = formatTime(new Date(), "yyyy-MM-dd");
        this.dateWeek = this.weekday[new Date().getDay()];
      }, 1000);
    },
    cancelLoading() {
      setTimeout(() => {
        this.loading = false;
      }, 2000);
    },
    getDate() {
      Api.getOrdList().then((res) => {
        this.list = res.data.list;
      });
      Api.getNotice().then((res) => {
        this.notice = res.data.notice;
      });
    }
  },
};
</script>

<style lang="scss">
@import "../assets/scss/index.scss";
</style>