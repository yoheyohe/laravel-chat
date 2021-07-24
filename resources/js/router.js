import Vue from "vue";
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import ChatList from './components/chat/ChatListComponent.vue'
import NotFound from './components/NotFound.vue'

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/chat-list',
            name: 'chat-list',
            component: ChatList
        },
        {
            path: '*',
            component: NotFound
        }
    ]
});
