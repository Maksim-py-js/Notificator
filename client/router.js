import Vue from 'vue'
import Router from 'vue-router'
import { scrollBehavior } from '~/utils'

Vue.use(Router)

const page = path => () => import(`~/pages/${path}`).then(m => m.default || m)

const routes = [
  {
    path: '/',
    component: page('index.vue'),
    name: 'main',
    children: [
      { 
        path: '/assignments', 
        name: 'assignments', 
        component: page('mainPage/assignments.vue') 
      },
      { 
        path: '/contacts', 
        name: 'contacts', 
        component: page('mainPage/contacts.vue') 
      },
      { 
        path: '/notifications', 
        name: 'notifications', 
        component: page('mainPage/notifications.vue') ,
        children: [
            { 
              path: '/notifications/:id', 
              name: 'notifications', 
              component: page('mainPage/notificationTable/_id.vue') 
            }
          ]
      },
      { 
        path: '/report', 
        name: 'report', 
        component: page('mainPage/report.vue') 
      }
    ]
  },
  { path: '/main_admin', name: 'main_admin', component: page('main_admin.vue') },

  { path: '/login', name: 'login', component: page('auth/login.vue') },
  { path: '/register', name: 'register', component: page('auth/register.vue') },
  { path: '/password/reset', name: 'password.request', component: page('auth/password/email.vue') },
  { path: '/password/reset/:token', name: 'password.reset', component: page('auth/password/reset.vue') },
  { path: '/email/verify/:id', name: 'verification.verify', component: page('auth/verification/verify.vue') },
  { path: '/email/resend', name: 'verification.resend', component: page('auth/verification/resend.vue') },

  { path: '/home', name: 'home', component: page('home.vue') },
  {
    path: '/settings',
    component: page('settings/index.vue'),
    children: [
      { path: '', redirect: { name: 'settings.profile' } },
      { path: 'profile', name: 'settings.profile', component: page('settings/profile.vue') },
      { path: 'password', name: 'settings.password', component: page('settings/password.vue') }
    ]
  }
]

export function createRouter () {
  return new Router({
    routes,
    scrollBehavior,
    mode: 'history'
  })
}
