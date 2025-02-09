import { createRouter, createWebHistory } from 'vue-router'

const routes = [
    {
        path: '/',
        component: () => import('./components/template.vue'),
        children: [
            {
                path: '',
                name: 'promo',
                component: () => import('./components/main/index.vue'),
            },
            {
                path: 'task',
                name: 'task',
                component: () => import('./components/task/template.vue'),
                children: [
                    {
                        path: '',
                        name: 'task.index',
                        component: () => import('./components/task/index.vue'),
                    },
                ],
            },
            {
                path: 'settings',
                name: 'settings',
                component: () => import('./components/settings/template.vue'),
                children: [
                    {
                        path: '',
                        name: 'settings.index',
                        component: () => import('./components/settings/index.vue'),
                    },
                ],
            },
            {
                path: ':catchAll(.*)',
                name: 'page404',
                component: () => import('./components/404.vue'),
            },
        ],
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to, from, savedPosition) {
        if (to.hash) {
            return {
                selector: to.hash,
                behavior: 'smooth'
            };
        } else if (savedPosition) {
            return savedPosition
        } else {
            return {x: 0, y: 0}
        }
    },
})

export default router
