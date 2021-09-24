<template>
    <div>
        <div v-for="massage in messages">
            <p v-if="senderId === message.sender" style="color:red">
                {{ massage.message }}
            </p>
            <p v-else>
                {{ massage.message }}
            </p>
        </div>
        <textarea v-model="message"></textarea>
        <button type="button" @click="sendMessages()">送信</button>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        props:['senderId', 'receiverId', 'endpoint'],
        data() {
            return {
                messages: [],
                message: ''
            };
        },
        methods: {
            getMessages(){
                 const url = this.endpoint + '/fetch';
                axios.get(url)
                .then((response) =>{
                    this.messages = response.data; 
                });
            },
            sendMessages() {
                const url = this.endpoint + '/send';
                const data = { 
                    message: this.message,
                    sender: this.senderId,
                    receiver: this.receiverId
                };
                axios.post(url, data)
                .then(response => this.messages.push(response.data));
                this.message = ''
            }
        },
        mounted(){
            this.getMessages();
            window.Echo.channel('chat' + this.receiverId + this.senderId)
            .listen('MessageCreated', response => {
                this.messages.push(response.data);
            });
        }
    }
</script>
