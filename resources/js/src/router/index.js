import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [{
  path: '/',
  name: 'Index',
  component: () => import('../views/index.vue')
},
{
  path: '/flow',
  name: 'Flow',
  component: () => import('../views/flow.vue')
}]
const router = new VueRouter({
  mode: "history",
  routes
})

export default router