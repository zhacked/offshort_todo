<template >
	<div class="container">
		<div class="row mt-5" v-if="$gate.isAdmin()">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <strong> Tech Employee Management</strong>
                        <div class="card-tools">
                            <button class="btn btn-success" @click="newModal">Add New Employee <i class="fas fa-user-plus fa-fw"></i></button>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
						<table class="table table-hover">
							<thead>
								<tr>
								    <th>ID</th>
                                    <th>Name</th>
                                    <th>Shift</th>
                                    <th class="mid">ACTION</th>
								</tr>
							</thead>
							<tbody>
                                <tr v-if="techinfos.data.length == 0">
                                    <td colspan="7" class="text-center"> <h3>No Data Available</h3> </td>
                                </tr>
								<tr v-else v-for="techinfo in techinfos.data" :key="techinfo.id">
									<td>{{techinfo.id}}</td>
									<td>{{techinfo.techFname}} {{techinfo.techLname}}</td>
									<td>{{techinfo.techShift | upText}}</td>
									<td class="mid">
										<button class="btn btn-primary"  @click="editModal(techinfo)">
											<i class="fa fa-edit"></i> Update
										</button>
                                        <button class="btn btn-primary" @click="viewUserRecord(techinfo.id)">
											<i class="fa fa-eye"></i> View Time Record
										</button>
										<button class="btn btn-danger"  @click="deleteUser(techinfo.id)">
											<i class="fa fa-trash"></i> Delete
										</button>
									</td>
								</tr>
							</tbody>
						</table>
                    </div>

                    <div class="card-footer">
                        <pagination class="float-right" :data="techinfos" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>
            </div>
		</div>

        <!-- View Time Record -->
        <v-expand-transition>
            <div v-show="show">
                <v-card-text>
                    <div class="modal-body">

                    </div>
                </v-card-text>
            </div>
        </v-expand-transition>

		<!-- Modal -->
		<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add New Emloyee</h5>
					<h5 class="modal-title" v-show="editmode" id="addNewLabel">Update Employee's Info</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form @submit.prevent="editmode ? updateUser() : createUser()">
					<div class="modal-body">
						<div class="form-group">
                            <label for="fName">First Name</label>
							<input v-model="form.techFname" type="text" name="fName"
								placeholder="First Name"
								class="form-control" :class="{ 'is-invalid': form.errors.has('fName') }">
							<has-error :form="form" field="fName"></has-error>
						</div>

						<div class="form-group">
                            <label for="fName">Last Name</label>
							<input v-model="form.techLname" type="text" name="lName"
								placeholder="Last Name"
								class="form-control" :class="{ 'is-invalid': form.errors.has('lName') }">
							<has-error :form="form" field="lName"></has-error>
						</div>

						<div class="form-group">
                            <label for="fName">Shift</label>
							<input v-model="form.techShift" type="text" name="tShift"
								placeholder="Shift"
								class="form-control" :class="{ 'is-invalid': form.errors.has('tShift') }">
							<has-error :form="form" field="tShift"></has-error>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<button v-show="editmode" type="submit" class="btn btn-success">Update</button>
						<button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
					</div>

				</form>

				</div>
			</div>
		</div>
	</div>
</template>

<script>
import Dashboard from '../Dashboard.vue';
    export default {
  components: { Dashboard },
        data() {
            return {
                show: false,
                editmode: false,
                techinfos : {},
                length: '',
                form: new Form({
                    id:'',
                    techFname: '',
                    techLname: '',
                    techShift: ''
                })
            }
        },
        methods: {
            getResults(page) {
                    axios.get('api/techemployee?page=' + page)
                        .then(response => {
                            this.techinfos = response.data;
                        });
                },
            updateUser(){
                this.form.put('api/techemployee/'+this.form.id)
                .then(() => {
                    $('#addNew').modal('hide');
                     swal.fire(
                        'Updated!',
                        'Information has been updated.',
                        'success'
                        )
                        Fire.$emit('AfterCreate');
                })
                .catch(() => {
                    this.$Progress.fail();
                });
            },
            editModal(techinfo){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(techinfo);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            deleteUser(id){
                swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                         if (result.value) {
                                this.form.delete('api/techemployee/'+id).then(()=>{
                                        swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                        )
                                    Fire.$emit('AfterCreate');
                                }).catch(()=> {
                                    swal.fire("Failed!", "There was something wrong.", "warning");
                                });
                         }
                    })
            },
            loadUsers(){
                if(this.$gate.isAdmin()){
                    axios.get("api/techemployee").then(({ data }) => (this.techinfos = data));
                }
            },
            createUser(){
                this.form.post('api/techemployee')
                .then(()=>{
                    swal.fire(
                        'Created!',
                        'Tech Employee Added.',
                        'success'
                    )
                    Fire.$emit('AfterCreate');
                    $('#addNew').modal('hide')
                })
                .catch(()=>{
                })
            },
            viewUserRecord(){

            }
        },
        created() {
           this.loadUsers();
           Fire.$on('AfterCreate',() => {
               this.loadUsers();
           });
        }
    }
</script>
<style scoped>
    .mid{
        text-align: center;
        vertical-align: middle;
    }
</style>
