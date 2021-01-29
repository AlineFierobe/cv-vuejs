import param from "@/param/param";

export default {
  getList(type) {
    return axios.get(param[type]).then(response => {
      return response.data;
    });
  },

  get(type, params) {
    return axios.post(param[type], params).then(response => {
      return response.data;
    });
  },

  maj(type, params) {
    return axios.post(param[type], params).then(response => {
      return response.data;
    });
  }
};
