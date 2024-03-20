import { createRouter, createWebHistory } from "vue-router";

import HelloWorld from '../src/components/HelloWorld.vue';
import Test from "../src/components/Test.vue";
import NotFound from "../src/components/NotFound.vue";
import Impressum from "../src/components/Impressum.vue";
import Kontakt from "../src/components/Kontakt.vue";

const routes = [
  {
    path: '/',
    name: 'Home',
    component: HelloWorld,
  },
  {
    path: '/impressum',
    name: 'Impressum',
    component: Impressum,
  },
  {
    path: '/contact',
    name: 'Kontakt',
    component: Kontakt,
  },
  {
    path: '/:catchAll(.*)',
    name: 'NotFound',
    component: NotFound,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;