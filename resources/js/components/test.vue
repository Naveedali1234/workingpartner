<template>
    <div class='row'>
    <div class="col-8">
        <div class="card card-default">
            <div class="card-header">Messages</div>
            <div class="card-body p-0">
                <ul class="list-unstyled" id="privateMessageBox" style="height:300px; overflow-y: scroll;">
                    <li class="p-2" v-for="(message, index) in messages" :key="index" >
                           <strong>{{ message.user.name }}</strong>
                           {{ message.message }}
                    </li>
                </ul>
            </div>
            <input
                    @keyup.enter="sendMessage"
                    v-model="newMessage"
                    type="text"
                    name="message" 
                    placeholder="Enter your message" 
                    class="form-control">
            <!-- <span class="text-muted">User is typing...</span> -->
        </div>
    </div>
    <div class="col-4">
        <div class="card card-default">
            <div class="card-header">Active Users</div>
            <div class="card-body p-0">
                <ul>
                    <li class="py-2" 
                    v-for="(user,index) in usersData" :key="index"
                    v-on:click="clicked(user.id,user.thread_id)" >
                    <label>
                        <a href="#" :class="{'green':user.id == activeOwner}">{{user.name}}</a> <span class="fa fa-bell" v-if="(user.messages>0 && status==0)"> new message</span>
                        <span class="fa fa-bell" v-if="checkNotification==user.user_id"> new message 1</span>
                    </label>
                    </li>
                </ul>
                <!-- <ul v-if="user.role=='seller'" >
                    <li class="py-2" 
                    v-for="(user,index) in users" :key="index"
                    v-on:click="clicked(user.user_id)" >
                    <label>
                        <a href="#" :class="{'green':user.user_id == activeOwner}">{{user.user.name}}</a> <span class="fa fa-bell" v-if="checkNotification!=null && user.user_id==activeOwner || user.status==status">new message</span>
                    </label>
                    </li>
                </ul> -->
            </div>
        </div>
    </div>
   </div>
</template>

<script>
    export default {
        props:['user'],
        data(){
            return {
                activeOwner:null,
                messages: [],
                newMessage: '',
                usersData:[],
                status:0,
                notification:null,
                checkNotification:null,
                thread: null,
                
            }
        },
        watch: {
            activeOwner(val){
                this.fetchPrivateMessages();
            }
        },
        computed:{
          friends(){
            return this.usersData.filter((user)=>{
              return user.id !==this.user.id;
            })
          }
        },
        created(){
            //this.fetchMessages();
            this.fetchOwnersList();
             Echo.private('privatechat.'+this.user.id)
                .listen('PrivateMessageSent',(e)=>{
                  console.log('pmessage sent');
                  this.activeOwner=e.message.user_id;
                  this.messages.push(e.message);
                  this.checkNotification = e.message.user_id;
                  setTimeout(this.scrollToEnd,100);
              })
        },
        methods: {
            fetchMessages(){
                // axios.get('messages').then(response => {
                //     this.messages = response.data;
                // });
            },
            sendMessage(){
                if(!this.newMessage){
                  return alert('Please enter message');
                }
                if(!this.activeOwner){
                  return alert('Please select friend');
                }
                this.messages.push({
                    user: this.user,
                    message: this.newMessage
                });
                axios.post('/messages/'+this.activeOwner+'/'+this.thread, {message: this.newMessage});
                this.newMessage = '';
                setTimeout(this.scrollToEnd,100);
            },
            fetchOwnersList() {
                axios.get('/fetchConversationList').then(response => {
                this.usersData = JSON.parse(JSON.stringify(response.data));
                // if(this.friends.length>0){
                //   this.activeOwner=this.friends[0].id;
                // }
                });

            },
            fetchPrivateMessages(){
                if(!this.activeOwner){
                    return alert('Please select friend');
                }
                console.log(this.activeOwner);
                axios.get('/privateMessages/'+this.activeOwner+'/'+this.thread).then(response => {
                    this.messages = response.data;
                    setTimeout(this.scrollToEnd,100);
                });
            },
            scrollToEnd(){
                document.getElementById('privateMessageBox').scrollTo(0,99999);
              },
              clicked(id,thread){
                this.activeOwner=id;
                this.status = 1;
                this.thread = thread;
                this.checkNotification = null;
                // this.fetchPrivateMessages();
              }

        },

    }
</script>
<style type="text/css">
    .green {
  color: red;
}
.yellow{
    color: white;
}
</style>
