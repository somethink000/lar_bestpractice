import { createRouter, createWebHistory } from "vue-router"


const routes = [
  { path: "/", name: "Home", component: () => import('@/pages/Chat.vue') },
  {
    path: "/login",
    name: "Login",
    component: () => import("@/pages/Auth/Login.vue"),
  },
  {
    path: "/register",
    name: "Register",
    component: () => import("@/pages/Auth/Register.vue"),
  },
  {
    path: "/forgot-password",
    name: "ForgotPassword",
    component: () => import("@/pages/Auth/ForgotPassword.vue"),
  },
  {
    path: "/password-reset/:token",
    name: "ResetPassword",
    component: () => import("@/pages/Auth/ResetPassword.vue"),
  },
  {
    path: '/:pathMatch(.*)*',
    name: '404',
    component: () => import('@/pages/NotFound.vue'),
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});
export default router;