import { createApp } from 'vue'
import App from './App.vue'
import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import { createRouter, createWebHistory } from 'vue-router'
import GetPostsComponent from './components/GetPosts.vue'
import CreatePostComponent from './components/CreatePost.vue'
import PostDetailsComponent from './components/PostDetails.vue'
import EditPostComponent from './components/EditPost.vue'

const routes = [
    {
        path: '/posts',
        component: GetPostsComponent,
        children: [
            {
                path: '/posts/:id',
                component: PostDetailsComponent,
                props: true
            }
        ]
    },
    {
        path: '/posts/:id/edit',
        component: EditPostComponent
    },
    {
        path: '/createpost',
        component: CreatePostComponent
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

createApp(App).use(router).mount('#app')

