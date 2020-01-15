<template> 
<div class="container">
<h3 class=" text-center">Messaging</h3>
<a :href='homeRoute' class="btn btn-primary"><span class="fa fa-arrow-left"></span> Return Home</a>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent</h4>
            </div>
            <!-- <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div> -->
          </div>
          <div class="inbox_chat">
            <div class="chat_list"
            :key="index"
            v-on:click="clicked(user.user_id,user.thread_id)" 
            v-for="(user,index) in usersData"
            :class="{'active_chat':user.user_id == activeOwner}"
            >
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>{{user.name}}<!-- <span class="chat_date"> Dec 25</span> -->
                    <span class="fa fa-envelope" v-if="(user.messages>0 && status==0)"> {{user.messages}}</span>
                        <span class="fa fa-envelope" v-if="(checkNotification==user.user_id && countmessages>0)"> {{countmessages}}</span> 
                  </h5>
                  <p>{{user.last_message}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mesgs">
          <div class="msg_history" id="privateMessageBox">
            <div v-for="(message, index) in messages"
              :key="index">
              <div class="incoming_msg" v-if="user.id!==message.user_id">
                <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="received_msg" v-if="message.message">
                  <div class="received_withd_msg">
                    <p>{{message.message}}</p>
                    <span class="time_date"> {{message.created_at}}</span></div>
                </div>
                <div class="received_msg" v-if="message.image">
                  <div class="received_withd_msg">
                    <!-- <iframe :src="'../storage/'+message.image" alt="" width="300" height="200"></iframe> -->
                    <!-- <object :src="'../storage/'+message.image"><embed :src="'../storage/'+message.image"></embed></object> -->
                    <p><b>{{message.user.name}}</b> sent an attachment, click to open it</p>
                    <a :href="'../storage/'+message.image" target="_blank">{{message.image}}</a>
                    <span class="time_date"> {{message.created_at}}</span></div>
                </div>
                
              </div>


              <div class="outgoing_msg" v-else>
                <div class="sent_msg" v-if="message.message">
                  <p>{{message.message}}</p>
                  <span class="time_date"> {{message.created_at}}</span> 
                </div>
                <div class="sent_msg" v-if="message.image">
                  <p><b>{{message.user.name}}</b> sent an attachment, click to open it</p>
                    <a :href="'../storage/'+message.image" target="_blank">{{message.image}}</a>
                  <span class="time_date"> {{message.created_at}}</span> 
                  
                </div>
              </div>
              <hr>
            </div>
          </div>
          <div class="type_msg">
            <div class="input_msg_write">
              <file-upload
                :post-action = "'/messages/'+activeOwner+'/'+thread"
                ref='upload'
                v-model="files"
                @input-file="$refs.upload.active = true"
                :headers="{'X-CSRF-TOKEN': token}"
                > 
                <span class="fa fa-paperclip" title="My tip"></span>
              </file-upload>
              <textarea 
              class="write_msg"
               placeholder="Type a message"
               title="Attach file or image" 
               v-model="newMessage"
               v-on:click="messageRead()"
               style="width:530px;height:50px;"
               ></textarea>
              <button class="msg_send_btn" type="button"
              @click="sendMessage">
                <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
    export default {
         props:['user','homeRoute'],
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
                files:[],
                token:document.head.querySelector('meta[name="csrf-token"]').content
                
            }
        },
        watch: {
          files:{
        deep:true,
        handler(){
          let success=this.files[0].success;
          if(success){
            this.fetchPrivateMessages();
          }
        }
      },
            activeOwner(val){
                this.fetchPrivateMessages();
            },
            '$refs.upload'(val){
        console.log(val);
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
                this.countmessages = 0;
                // this.fetchPrivateMessages();
              }

        },

       }
</script>
<style type="text/css">
  .container{max-width:1170px; margin:auto;}
img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%; padding:
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
  cursor: pointer;
}
.inbox_chat { height: 600px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 60%;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 516px;
  overflow-y: auto;
}
</style>
