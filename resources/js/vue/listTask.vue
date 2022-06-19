<template>
    <div class="task">
        <input
            type="checkbox"
            @change="updateCheck()"
            v-model="task.realizado"/>
            <span :class="[task.Realizado ? 'completed' : '', 'taskText']">
                {{ task.Título}}
            </span>
            <button @click="removeTask()" class="cross">
                <font-awesome-icon icon="faCross" />
            </button>
    </div>
</template>

<script>
import axios from 'axios'

export default{
        props: ['task'],
        methods:{
            updateCheck(){
                axios.put('api/task/' + this.task.id, {
                    task: this.task
                })
                .then(response =>{
                    if( response.status == 200){
                        this.$emit('taskchanged');
                    }
                })
                .catch( error =>{
                    console.log(error);
                })
            },
            removeTask(){
                axios.delete('api/task/'+ this.task.id)
                .then(response => {
                    if(response.status == 200){
                        this.$emit('taskchanged')
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
.completed{
    text-decoration: line-through;
    color: gray;
}
.taskText{
    width: 100px;
    margin-left: 15px;
}
.task{
    display: flex;
    justify-content: center;
    align-items: center;
}
.cross{
    background: #e6e6e6;
    border: none;
    color: red;
    outline: none;
}
</style>