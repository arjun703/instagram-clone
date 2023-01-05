<template>
    <div class="container">
        <button class="btn btn-primary" @click="followUser">{{status?'UnFollow':'Follow'}}</button>
    </div>
</template>

<script>
    export default {
            
        props:['user-id', 'follows'],

        mounted() {
            console.log('Component mounted.')
        }, 

        data: function(){
            return{
                status: this.follows
            }
        },

        methods:{
            followUser(){
                axios.post('/follow/'+this.userId)
                     .then(response => {
                        //console.log(response.data);
                        this.status=!this.status;
                     })
                     .catch(errors => {
                        if(errors.response.status==401){
                            alert('You need to login to accomplish this action.');
                        }
                     })
            }
        }
    }
</script>
