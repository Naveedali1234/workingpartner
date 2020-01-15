<template>
    <div class="container-fluid">
         <v-layout row style="height: 100px;">    
    <v-flex id="privateMessageBox" class="messages mb-5" xs7>
        <messages :user="user" :allmessages="messages"></messages>
        <div class="send">
        <v-footer v-if="messages!=''"
                height="auto"
                style="border-radius: 50px;"
                color="#989898"
        >
            <v-layout row >
                <v-flex xs9>
                    <v-textarea
                            rows=1
                            v-model="newMessage"
                            label="Enter Message"
                            single-line
                            
                            v-on:click="messageRead()"
                    ></v-textarea>
                </v-flex>
                <v-flex xs3>
                    <v-btn
                         @click="sendMessage"
                        dark class="mt-3 ml-2 white--text" small color="#00B2FF">send</v-btn>
                </v-flex>
            </v-layout>
        </v-footer>
    </div>
        <p v-if="messages==''" style="margin-top: 50px; color: red;" class="text-center">Please select a conversation</p>
    </v-flex>
    <v-flex class="online-users" style=" background-color: #393836;" xs5>
        <p class="text-center" style="color: white; margin-top: 10px;">Conversation List</p>
      <v-list style="background-color: #393836; margin-top: 10px;">
          <v-list-item
            v-for="(user,index) in usersData"
            :style="(user.id==activeOwner)?'background-color:#ebebeb':''"
            :key="index"
            v-on:click="clicked(user.id,user.thread_id)"
          >
            <v-list-item-action>
              <v-icon :class="{'green':user.id == activeOwner}"></v-icon>
            </v-list-item-action>

            <v-list-item-content>
              <v-list-item-title 
              :style="(user.id==activeOwner)?'color:black':'color:white'">
                {{user.name}}  &nbsp;<span class="fa fa-envelope" v-if="(user.messages>0 && status==0)"> {{user.messages}}</span>
                        <span class="fa fa-envelope" v-if="(checkNotification==user.user_id && countmessages>0)"> {{countmessages}}</span></v-list-item-title>
            </v-list-item-content>

            <!-- <v-list-item-avatar>
              <img :src="item.avatar">
            </v-list-item-avatar> -->
          </v-list-item>


        </v-list>

    </v-flex>
   
  </v-layout>
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
                countmessages:0,
                
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
                  this.countmessages = this.countmessages+1;
                  setTimeout(this.scrollToEnd,100);
              })
        },
        methods: {
            messageRead(){
                this.fetchPrivateMessages();
                this.countmessages = 0;
                // axios.get('messages').then(response => {
                //     this.messages = response.data;
                // });
            },
            sendMessage(){
                if(this.newMessage==''){
                  return alert('Please enter message');
                }
                if(!this.activeOwner){
                  return alert('Please select friend');
                }
                this.messages.push({
                    user: this.user,
                    message: this.newMessage,
                    user_id: this.user.id
                });
                axios.post('messages/'+this.activeOwner+'/'+this.thread, {message: this.newMessage});
                this.newMessage = '';
                setTimeout(this.scrollToEnd,100);
            },
            fetchOwnersList() {
                axios.get('fetchConversationList').then(response => {
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
                axios.get('privateMessages/'+this.activeOwner+'/'+this.thread).then(response => {
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
                this.countmessages = 0;
                // this.fetchPrivateMessages();
              }

        },

       }
</script>
<style type="text/css">
   .online-users,.messages{
  overflow-y:scroll;
  height:100vh;
}
.online-user{
    background-color: lightblue;
}
.chat-card{
  margin-bottom:140px;
}
.send{
    position: fixed; width: 45%; bottom: 5px;
}
 @media only screen and (max-width: 800px) {
.send{
     width: 51%;
}
/*.layout .xs10{
max-width: 
}*/
}
</style>
