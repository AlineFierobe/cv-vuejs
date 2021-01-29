import Vue from "vue";
import Router from "vue-router";
// root to components
import CV from "@/components/CV";

Vue.use(Router);

export default new Router({
  routes: [
    {
      path: "/",
      name: "CV",
      component: CV
    }
  ]
});
