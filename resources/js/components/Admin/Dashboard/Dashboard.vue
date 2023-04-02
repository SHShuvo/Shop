<template>
    <div>
        <div v-for="(msg, index) in messages" class="card message-card" :key="'msg'+index">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title name">{{msg.name}}</h5>
                    <div>
                        <div class="text-end date">{{dateFormatG(msg.created_at)}}</div>
                        <p class="card-text email">{{msg.email}}</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p v-if="!readMore[msg.id]" class="card-text message-content">{{msg.message.substring(0, 350) + "..."}}
                    <span @click="showMore(msg.id)" class="show-button"><i class="fas fa-arrow-down"></i> Show more</span>
                </p>
                <p v-else class="card-text message-content">{{msg.message}}
                    <span @click="showLess(msg.id)" class="show-button"><i class="fas fa-arrow-up"></i> Show less</span>
                </p>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            messages:[],
            readMore: {},
        }
    },
    methods:{
        async loadMessages(){
            try {
                const {data} = await axios.get('/all-messages');
                this.messages = data;
            } 
            catch (error) {
                
            }
        },
        dateFormatG(value) {
            if(value && value.length > 0){
                const dateValue = new Date(value);
                return `${String(dateValue.getDate()).padStart(2,0)}-${dateValue.toLocaleString('en-us', {month:'short'})}-${dateValue.getFullYear()}`;
            }    
            return '';
        },
        showMore(id) {
            this.$set(this.readMore, id, true);
        },
        showLess(id) {
            this.$set(this.readMore, id, false);
        },
    },
    created(){
        this.loadMessages();
    }
}
</script>
<style scoped>
.message-card {
  margin: 10px 0px;
}

.name {
  margin: 0;
}
.email, .date{
    color: #666;
    font-size: 1em;
}
.email {
  margin: 0;
}

.show-button{
    color: #0d6efd;
    cursor: pointer;
    font-weight: bold;
    margin-left: 5px;
}
</style>