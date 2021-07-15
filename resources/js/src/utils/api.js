/* eslint-disable camelcase */
import http from './http'

export default {
  getOrdList: () => {
    return http.get('ordlist', {})
  },
  getFlowList: () => {
    return http.get('flowlist', {})
  }
  ,
  getNotice: () => {
    return http.get('notice', {})
  }
}
