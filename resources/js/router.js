import VueRouter from 'vue-router'

const routes = [
    { 
        path:'/', 
        component: () => import("./components/Landing"),
        name: "landing",
        children:[
            
        ]
    },
    {
        path:'/admin', 
        component: () => import("./components/Admin/Admin"),
        children:[
            {
                path:'/', 
                component: () => import("./components/Admin/Dashboard/Dashboard"),
                name: "contact_posts",
            }
        ],
        beforeEnter: (to, from, next) => {
            let user_role = localStorage.getItem('user_role');
            if (user_role == 1) {
              next();
            } 
            else {
              next("/");
            }
        },
    }
]

const router = new VueRouter({
    routes,
    mode: 'history',
});

export default router;