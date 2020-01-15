<template>
  <div style="padding-bottom: 200px; margin-top: 10px;">
      <v-list style=" border-style: groove; border-radius: 55px; margin-top: 5px;"
              class="p-3"
              v-for="(message, index) in allmessages"
              :key="index"
              :color="(user.id===message.user_id)?'#989898':'#ebebeb'"
              :style="(user.id===message.user_id)?'margin-left:180px;':'margin-right:180px'"
      >
          <div class="message-wrapper">
              <v-flex>
                  <span class="small font-italic"><strong>{{message.user.name}}</strong></span> 
                  <span class="small font-italic float-right">{{message.created_at}}</span>
              </v-flex>

              <div v-if="message.message" class="text-message-container">
                  
                      {{message.message}}

              </div>
          </div>


      </v-list>

  </div>
</template>

<script>
  export default {
    props:['user','allmessages'],
  }
</script>

<style scoped>
.chat-card{
  margin-bottom:140px;
}
.floating-div{
    position: fixed;
}
.chat-card img {
    max-width: 300px;
    max-height: 200px;
}
</style>