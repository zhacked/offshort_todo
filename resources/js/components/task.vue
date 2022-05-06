<template>
    <v-app>
        <div class="task">
            <input type="checkbox" class="task-check" @change="markAsDone()" v-model="task.isCompleted"/>
            <span v-show="!editmode" :class="[task.isCompleted ? 'completed' : '', 'task-text']">
                {{ task.title }} <b :class="[task.isCompleted ? 'show1' : 'hide1']">DONE</b>
            </span>
            <span v-show="editmode">
                <input type="text" class="task-edit" name="title" id="title" v-model="task.title"/>
            </span>
            <span v-show="!editmode">
                <i class="fa fa-edit" id="edit" :class="[task.isCompleted ? 'hide' : 'show']" style="color:orange; cursor: pointer" @click="editTask()"></i>
                <i class="fa fa-trash" @click="deleteTask()"></i>
            </span>
            <span v-show="editmode">
                <i class="fa fa-check" style="color:green; cursor: pointer" @click="update()"><font color="white">&nbsp; UPDATE</font></i>
            </span>
            <error v-if="errMsg" :errMsg="errMsg"/>
        </div>
    </v-app>
</template>

<script>
import error from './error';

export default{
	props: ['task'],
	components: {
		error
	},
	data(){
		return {
            editmode: false,
			errMsg: null,
		}
	},
	methods: {
        editTask(){
            this.editmode = true;
        },
        update(){
            axios.put('api/tasks/' + this.task.id, {
				title: this.task.title
			}).then()
            this.editmode = false;
        },
		markAsDone(){
			axios.put('api/MarkAsDone/' + this.task.id, {
				isCompleted: this.task.isCompleted
			})
			.then( response => {
				if(response.data.status == 'true'){
					this.errMsg = null;
				}else{
					this.errMsg = response.data.errors.isCompleted[0];
				}
			})
			.catch( error => {
				this.errMsg = "Error updating task";
			});
		},
		deleteTask(){

			axios.delete('api/tasks/' + this.task.id)
			.then( response => {
				if(response.data.status == 'true'){
					this.$emit('taskDeleted');
					this.errMsg = null;
				}else{
					this.errMsg = "Task not found";
				}
			})
			.catch( error => {
				this.errMsg = "Error deleting task";
			});
		}
	}
}
</script>

<style scoped>
.task{
	background: #4f667d;
	padding: 15px;
}

.task:nth-of-type(2n+1){
	background: #34495E;
}

.task-check{
	cursor: pointer;
}

.completed{
	text-decoration: line-through;
}

.task-text{
	display: inline-block;
	width: 90%;
	text-align: center;
	color: #fff;
}

.task-edit{
    display: inline-block;
    width: 50%;
    text-align: center;
    margin-right:170px;
    margin-left:20%;
}

.fa-trash{
	color: #ff0000;
	cursor: pointer;
}

.hide{
    display:none;
}

.show{
    display:inline-block;

}

.show1{
    background-color:greenyellow;
    color: white;
    font-weight: bolder;
    border: 1px solid black;
    border-radius: 30px;
    display: inline-block;
    margin-right:-110px;
    margin-left:10px;
    margin-top:-50px;
    font-family: Arial ;
    width:10%;
}

.hide1{
    display: none;
}
</style>
