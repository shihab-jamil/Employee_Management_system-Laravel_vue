import { createRouter, createWebHashHistory } from "vue-router";
import Dashboard from "../views/Dashboard.vue";
import Employees from "../views/Employees.vue";
import Login from "../views/Login.vue";
import NotFound from "../Components/NotFound.vue";
import Profile from "../views/Profile.vue";
import ChangePassword from "../views/ChangePassword.vue";

const routes = [
  {
    path: "/",
    name: "Home",
    component: Dashboard,
  },
  {
    path: "/dashboard",
    name: "Dashboard",
    component: Dashboard,
  },
  {
    path: "/employees",
    name: "Employees",
    component: Employees,
  },
  {
    path: "/login",
    name: "Login",
    component: Login,
  },
  {
    path: "/profile",
    name: "Profile",
    component: Profile,
  },
  {
    path: "/change-password",
    name: "Change Password",
    component: ChangePassword,
  },


  //catchall 404
  {
    path : '/:catchall(.*)',
    name : 'Not Found',
    component : NotFound
  }
];

const router = createRouter({
  history: createWebHashHistory('/'),
  routes,
});

export default router;
