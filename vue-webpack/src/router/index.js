import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import BrandComponent from '@/components/BrandComponent'

Vue.use(Router)

export default new Router({
  history: true,
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'HelloWorld',
      component: HelloWorld
    },
    {
      path: '/brand',
      name: 'Brand',
      // eslint-disable-next-line no-undef
      component: BrandComponent
    }
  ]
})
