<template>
    <div class="add">
        <input type = "text" v-model="task.name" />
        <font-awesome-icon
            icon="plus-circle"
            @click="addTask()"
            :class="[ task.name ? 'active' : 'inactive', 'plus']"/>
    </div>
</template>

<script>
import axios from 'axios';

    export default{
        data: function(){
            return{
                task:{
                    name: ""
                }
            }
        },
        methods: {
            addTask(){
                if(this.task.name == ''){
                    return;
                }

                axios.post('api/task/store', {
                    task : this.task
                })
                .then( response =>{
                    if(response.status == 201){
                        this.task.name = "";
                        this.$emit('reloadlist');
                    }
                })
                .catch(error =>{
                    console.log(error);
                })
            }
        }
    }    
</script>

<style scoped>
.add{
    display: flex;
    justify-content: center;
    align-items: center;
}
input{
    background: thistle;
    border: 3px;
    outline: none;
    padding: 5px;
    margin-right: 15px;
    width: 100%;
}
.plus{
    font-size: 20px;
}
.active{
    color: limegreen;
}
.inactive{
    color: grey;
}
</style>