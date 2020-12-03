<template>
    <div>
        <div class="w-full relative inline-block float-left border-b border-1 border-gray-200 p-4">
            <p class="text-blue-500 inline-block relative float-left">{{item.name}}</p>
            <div v-if="item.is_running == true" class="relative inline-block float-right">
                <p class="float-left text-gray-800 inline-block relative">{{runtime}}</p>
                <button @click="stop"  type="submit" class="relative bg-blue-500 float-right text-white trans px-4 ml-5 rounded">
                   Stop 
                </button>   
            </div>
            <p v-else class="float-right text-gray-800 inline-block relative">{{duration}}</p>
        </div>  
    </div>
</template>

<script>
    import moment from 'moment'

    export default {
        props: ['log'],
        data() {
            return {
                item: this.log,
                errors: {},
                fields: {},
                runtime: '',
            }
        },
        mounted() {
            console.log('test');  
            window.setInterval(() => {
                this.runningtime();
            }, 1000)
            // console.log(this.item.ended_at);
            // this.logs = this.task.logs.slice().reverse();
            // console.log(this.task.logs); 
        },
        watch: {
            log: function(){
                this.item = this.log
            }
        },
        methods: {
            runningtime() {
                var start       = moment(this.item.started_at).format('DD/MM/YYYY HH:mm:ss');
                var currentdate = moment().format('DD/MM/YYYY HH:mm:ss');

                var ms = moment(currentdate,"DD/MM/YYYY HH:mm:ss").diff(moment(start,"DD/MM/YYYY HH:mm:ss"));
                var d = moment.duration(ms);

                if(d._data.hours > 0){
                    this.runtime = d._data.hours+' u '+d._data.minutes+' min '+d._data.seconds+' sec';
                } else if(d._data.minutes > 0){
                    this.runtime = d._data.minutes+' min '+d._data.seconds+' sec';
                } else {
                    this.runtime = d._data.seconds+' sec';
                }
            },
        stop() {
          axios.post(`/api/log/${this.log.id}/stop`,).then(response => {
            //   console.log(response.data);
              this.$emit('updatetime', response.data);
              this.item = response.data;
          }).catch(error => {
            console.log(error);
            this.loaded = true;
            if (error.response.status === 422) {
              this.errors = error.response.data.errors || {};
              this.processing = false;
            }
          });
        },
        },
        computed: {
            duration: function(){
                var then  = moment(this.item.started_at).format('DD/MM/YYYY HH:mm:ss');
                var now = moment(this.item.ended_at).format('DD/MM/YYYY HH:mm:ss');

                var ms = moment(now,"DD/MM/YYYY HH:mm:ss").diff(moment(then,"DD/MM/YYYY HH:mm:ss"));
                var d = moment.duration(ms);

                if(d._data.hours > 0){
                    var result = d._data.hours+' u '+d._data.minutes+' min';
                } else{
                   var result = d._data.minutes+' min';
                }
                return result;
            }
            },
    }
</script>

