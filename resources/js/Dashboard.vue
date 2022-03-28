<template>
	<div class="main">
		<div class="container">
			<div class="todo-container">
				<div class="todo">Todo<span class="do">List</span></div>
			</div>
			<add-task @taskAdded="getTasks()"/>
			<task v-for="(task, key) in tasks" :key="key" :task="task" :errMsg="errMsg" @taskDeleted="getTasks()"/>
			<error v-if="errMsg" :errMsg="errMsg"/>
			<p v-if="noTasks" class="no-tasks">No Tasks Available</p>
		</div>

	</div>
</template>

<script>
import addTask from './components/addtask';
import task from './components/task';
import error from './components/error';

export default{
	components: {
		addTask,
		task,
		error
	},
	data(){
		return{
			tasks: null,
  			errMsg: null,
  			noTasks: false
		}
  	},
	methods: {
		getTasks(){
			axios.get('api/tasks')
			.then( response => {
				if(response.data.status == 'true'){
					if(response.data.data.length > 0){
                     console.log(response.data.data);
						this.tasks = response.data.data;

						this.noTasks = false;
						this.errMsg = null;
					}else{
						this.noTasks = true;
						this.tasks = null;
					}
				}else{
					this.errMsg = 'Error getting tasks';
				}
			})
			.catch( error => {
				this.errMsg = 'Error getting tasks';
			})
		}
	},
	created: function(){
		this.getTasks();
	}
}
</script>

<style>
*{
	padding: 0;
	margin: 0;
}

html,
body{
	position: relative;
	overflow-x: hidden;
	height: 100%;
	background:#24dbb0;
}

.container{
	position: relative;
	width: 50%;
	margin: 200px auto 90px auto;
	padding: 50px 20px 50px 20px;
	padding-top: 50px;
	border-radius: 10px;
	border: 1px solid #fff;
}

.todo-container{
	position: absolute;
	top: -25px;
	background: #2C3E50;
	padding: 10px;
	border-radius: 10px;
	border: 1px solid #fff;
	color: #fff;
	left: 50%;
    transform: translate(-50%, 0);
    font-weight: bold;
    font-size: 30px;
}

.todo{
	padding: 0 20px;
}

.do{
	color: #17b202;
}

.no-tasks{
	background: #4f667d;;
	padding: 10px;
	color: #fff;
	text-align: center;
}
</style>
