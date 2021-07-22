<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Todoリスト</h1>
                <ul>
                <li v-for="chat in chat">{{ chat['message'] }}</li>
                </ul>
            </div>
            <input type="text" v-model="newChat" @blur="addChat">
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            chat : [],
            newChat : ''
        }
    },
    mounted(){
        axios.get('/api/chat').then(response => (this.chat = response.data));

        window.Echo.channel('add-chat-channel').listen('AddChat',response => {
            this.chat.push(response.message);
        });

    },
    methods:{
        addChat(){
            axios.post('/api/chat',{
                message : this.newChat
            })
            .then(response => this.chat.push(response.data));

        this.newChat = '';

        }
    }
}
</script>
