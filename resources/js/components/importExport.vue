<template>
	<div class="container">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <strong class="title-activity">Total Bets of the Month</strong>
                    <div class="card-tools">
                        <form @submit.prevent="importExcel()">
                            <input type="file" name="import" />
                            <button type="submit" class="btn btn-primary import">Import</button>
                        </form>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <div v-show="!divNull" class="activity-table">
                        <table>
                            <tr>
                                <th class="headcol">WEBSITE</th>
                                <td class="header"> APRIL 1</td>
                                <td class="header">APRIL 2</td>
                                <td class="header">APRIL 3</td>
                                <td class="header">APRIL 4</td>
                                <td class="header">APRIL 5</td>
                                <td class="header">APRIL 6</td>
                                <td class="header">APRIL 7</td>
                                <td class="header">APRIL 8</td>
                                <td class="header">APRIL 9</td>
                                <td class="header">APRIL 10</td>
                                <td class="header">APRIL 11</td>
                                <td class="header">APRIL 12</td>
                                <td class="header">APRIL 13</td>
                                <td class="header">APRIL 14</td>
                                <td class="header">APRIL 15</td>
                                <td class="header">APRIL 16</td>
                                <td class="header">APRIL 17</td>
                                <td class="header">APRIL 18</td>
                                <td class="header">APRIL 19</td>
                                <td class="header">APRIL 20</td>
                                <td class="header">APRIL 21</td>
                                <td class="header">APRIL 22</td>
                                <td class="header">APRIL 23</td>
                                <td class="header">APRIL 24</td>
                                <td class="header">APRIL 25</td>
                                <td class="header">APRIL 26</td>
                                <td class="header">APRIL 27</td>
                                <td class="header">APRIL 28</td>
                                <td class="header">APRIL 29</td>
                                <td class="header">APRIL 30</td>
                                <td class="header">APRIL 31</td>
                                <th class="headcol2"> MONTHLY TOTAL BETS PER SITE</th>
                            </tr>
                            <tr>
                                <th class="headcol">WPC2021.LIVE</th>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <th class="headcol2">0.00</th>
                            </tr>
                            <tr>
                                <th class="headcol">WPC2022</th>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <th class="headcol2">0.00</th>
                            </tr>
                            <tr>
                                <th class="headcol">WPC2023</th>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <th class="headcol2">0.00</th>
                            </tr>
                            <tr>
                                <th class="headcol">WPC16</th>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <th class="headcol2">0.00</th>
                            </tr>
                            <tr>
                                <th class="headcol">WPC2025</th>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <th class="headcol2">0.00</th>
                            </tr>
                        </table>
                    </div>
                    <div v-show="divNull" class="activity-table">
                        <table>
                            <tr>
                                <th class="headcol">haha</th>
                                <td class="header"> APRIL 1</td>
                                <td class="header">APRIL 2</td>
                                <td class="header">APRIL 3</td>
                                <td class="header">APRIL 4</td>
                                <td class="header">APRIL 5</td>
                                <td class="header">APRIL 6</td>
                                <td class="header">APRIL 7</td>
                                <td class="header">APRIL 8</td>
                                <td class="header">APRIL 9</td>
                                <td class="header">APRIL 10</td>
                                <td class="header">APRIL 11</td>
                                <td class="header">APRIL 12</td>
                                <td class="header">APRIL 13</td>
                                <td class="header">APRIL 14</td>
                                <td class="header">APRIL 15</td>
                                <td class="header">APRIL 16</td>
                                <td class="header">APRIL 17</td>
                                <td class="header">APRIL 18</td>
                                <td class="header">APRIL 19</td>
                                <td class="header">APRIL 20</td>
                                <td class="header">APRIL 21</td>
                                <td class="header">APRIL 22</td>
                                <td class="header">APRIL 23</td>
                                <td class="header">APRIL 24</td>
                                <td class="header">APRIL 25</td>
                                <td class="header">APRIL 26</td>
                                <td class="header">APRIL 27</td>
                                <td class="header">APRIL 28</td>
                                <td class="header">APRIL 29</td>
                                <td class="header">APRIL 30</td>
                                <td class="header">APRIL 31</td>
                                <th class="headcol2"> MONTHLY TOTAL BETS PER SITE</th>
                            </tr>
                            <tr>
                                <th class="headcol">WPC2021.LIVE</th>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <th class="headcol2">0.00</th>
                            </tr>
                            <tr>
                                <th class="headcol">WPC2022</th>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <th class="headcol2">0.00</th>
                            </tr>
                            <tr>
                                <th class="headcol">WPC2023</th>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <th class="headcol2">0.00</th>
                            </tr>
                            <tr>
                                <th class="headcol">WPC16</th>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <th class="headcol2">0.00</th>
                            </tr>
                            <tr>
                                <th class="headcol">WPC2025</th>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <td class="long">0.00</td>
                                <th class="headcol2">0.00</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default ({
    data()  {
        return{
            divNull: false,
            form: new Form({
                import: '',
            })
        }
    },
    methods: {
        importExcel(){
            this.form.post('api/import')
                .then(()=>{
                    swal.fire(
                        'Imported!',
                        'Excel data was saved to the database.',
                        'success'
                    )
                    Fire.$emit('AfterCreate');
                })
                .catch(()=>{
                })
        }
    }
})
</script>
<style scoped>
    .import{
        color:white;
        background-color:orange;
        border: 0.1px solid #D18700;
        border-left:none;
        margin-left:-10px;
        height:30px;
        margin-top:-4px;
    }

    .import:hover{
        color:white;
        background-color:#D18700;
        border: 0.1px solid #D18700;
    }

    input[type="file"]{
        border:1px solid #D18700;
        height:30px;
        margin-right: -50px;
        margin-top: 10px;
        font-weight: bold;
        border-radius:5px;
    }
</style>

