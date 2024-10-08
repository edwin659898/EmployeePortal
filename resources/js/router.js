import Vue from "vue";
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import Index from "./pages/Index";
import MyDetails from "./pages/MyDetails";
import UserTable from "./pages/UserTable";
import CreateEmployee from "./components/Admin/Create-user";
import PDF from "./components/User/MyDetails";

const routes = [
    { path: '/', component: MyDetails },
    { path: '/Employees', component: UserTable },
    { path: '/Create-Employee', component: CreateEmployee },
    { path: '/Employee-Details', component: Index },
    { path: '/UserDetails/:id', component: Index, name: 'user.details' },
    { path: '/UserPdf/:id', component: PDF, name: 'view.pdf' }
  ]

const router = new VueRouter({
    routes,
    hashbang: false,
    mode: "history"
});

router.beforeEach((to, from, next) => {
  let middleware = to.matched[0].components.default.middleware;
  
  if (middleware == "auth") {
      if (!window.loggedIn) {
         (window.location = "/login")
          return;
      }
  }

  next();
});

export default router;
