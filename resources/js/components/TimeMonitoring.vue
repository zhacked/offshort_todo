<template>
    <v-app>
        <div class="container">
            <div class="col-md-12" style="margin-top:-50px;">
                <div class="card radius">
                    <div>
                        <span class="custom-span">
                            <img src="image/tech.png" style="width:160px; height:160px;">
                            <font class="custom-text">TECHNICAL BREAKTIME MONITORING</font>
                        </span>
                        <hr>
                    </div>
                    <div class="card-body table-responsive p-0 centered mt-4">
                        <div class="clock">
                            <p class="custom-dtext" v-text="currentdate"></p><br>
                            <p class="custom-ttext" v-text="currenttime"></p>
                        </div>
                        <hr>
                        <div class="searchBox">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </v-app>
</template>
<script>
// var moment = require('moment');
var moment = require('moment-timezone');

export default {
    mounted(){
        console.log('welcome')
    },
    data(){
        return{
            message:'Current date and time',
            currentdate:null,
            currenttime:null,
        }
    },
    methods:{
        updatecurrent(){
            this.currentdate=moment().tz('Asia/Manila').format('dddd, MMM DD,YYYY');
            this.currenttime=moment().tz('Asia/Manila').format('LTS');
        }
    },
    created(){
        this.currentdate=moment().tz('Asia/Manila').format('dddd, MMM DD,YYYY');
        this.currenttime=moment().tz('Asia/Manila').format('LTS');
        setInterval(()=>this.updatecurrent(),1*1000);
    }
}
</script>
