<template>
    <span class="float-right">
      <button v-if="!followed" type="button" class="btn-sm shadow-none border border-primary p-2" @click="follow(userId)"><i class="mr-1 fas fa-user-plus"></i>フォロー</button>
      <button  v-else type="button" class="btn-sm shadow-none border border-primary p-2 bg-primary text-white" @click="unfollow(userId)"><i class="mr-1 fas fa-user-check"></i>フォロー中</button>
    </span>
</template>

<script>
    import axios from 'axios'
    export default {
        props:['userId', 'defaultFollowed', 'defaultCount'],
        data() { 
            return{
                followed: this.defaultFollowed,
                followCount: this.defaultCount,
            };
        },
        // create() {
        //   this.followed = 'defaultFollowed'
        //   this.followCount = 'defaultCount'
        // },
        
        methods: {
            //フォロー
            follow(userId) {
                let url = `/stylists/${userId}/follow`
                
                axios.post(url)
                .then(response => {
                    this.followed = true;
                    this.followCount = response.data.followCount;
                })
                .catch(error => {
                    alert(error)
                });
            },
            
            //アンフォロー
            unfollow(userId) {
                let url = `/stylists/${userId}/unfollow`
                
                axios.post(url)
                .then(response => {
                    this.followed = false;
                    this.followCount = response.data.followCount;
                })
                .catch(error => {
                    alert(error)
                });
            }
        }
    }
</script>
