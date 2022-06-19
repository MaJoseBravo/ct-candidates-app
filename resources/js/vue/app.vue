<template>
    <div class="todoListContainer">
        <div class="heading">
            <h2 id ="title">Todo List</h2>
            <add-form 
            v-on:reloadlist="getList()"/>
        </div>
        <list-view :tasks ="tasks"
            v-on:reloadlist="getList()"/>
    </div>
</template>

<script>
import axios from "axios"
import addForm from "./addForm"
import listView from "./listView"
import ListView from "./listView.vue"

export default{
        components:{
            addForm,
            listView,
            ListView
        },
        data: function(){
            return{
                tasks: []
            }
        },
        methods: {
            getList(){
                axios.get('api/tasks')
                .then( response =>{
                    this.tasks = response.data
                })
                .catch( error =>{
                    console.log(error);
                })
            }
        },
        created(){
            this.getList();
        }
        
    }    
</script>

<style scoped>
.todoListContainer {
    width: 350px;
    margin: auto;
}

.heading{
    background: #e6e6e6;
    padding: 20px;
}

#title{
    text-align: center;
}
</style>