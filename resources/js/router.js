import { createRouter, createWebHashHistory } from 'vue-router'

import Home from './pages/Home.vue'
import Nivel from './pages/Nivel.vue'
import Estilo from './pages/Estilo.vue'
import Lesao from './pages/Lesao.vue'
import Orcamento from './pages/Orcamento.vue'
import Resultado from './pages/Resultado.vue'

const routes = [
  { path: '/', component: Home },
  { path: '/nivel', component: Nivel },
  { path: '/estilo', component: Estilo },
  { path: '/lesao', component: Lesao },
  { path: '/orcamento', component: Orcamento },
  { path: '/resultado', component: Resultado },
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router