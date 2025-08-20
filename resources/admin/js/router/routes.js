export default [
    {
        path: '/admin',
        // name: 'home',
        // component: () => import('../views/Home.vue'),
        children: [
            {
                path: '',
                name: 'home',
                component: () => import('../views/Home.vue'),
            },
            {
                path: 'login',
                name: 'login',
                component: () => import('../views/Login.vue'),
            },
            {
                path: 'categories',
                component: () => import('../views/Category/Index.vue'),
                children: [
                    {
                        path: '',
                        name: 'categories',
                        component: () => import('../views/Category/Categories.vue'),
                    },
                    {
                        path: 'create',
                        name: 'create-category',
                        component: () => import('../views/Category/CreateCategory.vue'),
                    },
                    {
                        path: 'edit/:id',
                        name: 'edit-category',
                        component: () => import('../views/Category/EditCategory.vue'),
                    },
                ]
            },
            {
                path: 'services',
                component: () => import('../views/Services/Index.vue'),
                children: [
                    {
                        path: '',
                        name: 'services',
                        component: () => import('../views/Services/Services.vue'),
                    },
                    {
                        path: 'create',
                        name: 'create-service',
                        component: () => import('../views/Services/CreateService.vue'),
                    },
                    {
                        path: 'edit/:id',
                        name: 'edit-service',
                        component: () => import('../views/Services/EditService.vue'),
                    },
                ]
            },
        ]
    },

]
