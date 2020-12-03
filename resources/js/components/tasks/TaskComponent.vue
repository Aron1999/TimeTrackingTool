
<template>
    <div class="w-full relative inline-block float-left border-b border-1 border-gray-200 p-4 last:border-b-0">
        <div class="relative inline-block float-left">
            <img @click="ckeck()" src="https://cdn.internetbureaubeterbekend.nl/crm/checklist.svg" class="mt-1 opacity-25 mt-px relative float-left h-5 ml-4 hover:opacity-75 cursor-pointer"/>
            <p @click="drawer = true" class="text-blue-500 w-64 ml-16 cursor-pointer">{{task.name}}</p>
        </div>
        <div class="relative float-right inline-block pr-8">
            <div class="relative inline-block float-left">
                <p class="text-blue-500 w-32">{{task.project.name}}</p>
            </div>
            <div class="relative float-left mx-8">
                <img :src="usericon" class="mt-1 float-left h-4"/> 
            </div>
            <div class="relative float-left mx-8 w-24">            
                <p v-if="this.datePassed" class="inline-block float-left text-red-500 ml-4">{{task.deadline | formatDate}}</p>
                <p v-else class="inline-block float-left text-blue-500 ml-4">{{task.deadline | formatDate}}</p>
            </div>
            <button @click="drawer = true" type="submit" class="relative float-left outline-none focus:outline-none">
                <img :src="arrowright" class="mt-2 float-left w-5 cursor-pointer"/>
            </button>

            <el-drawer
            :visible.sync="drawer"
            :with-header="false">
                <div class="py-12 px-8 relative">
                    <div class="relative flex">
                        <div class="w-1/2 float-left relative inline-block">
                            <img :src="building" class="mt-1 float-left h-4 mr-3"/>
                            <p class="text-blue-500 float-left">{{task.project.name}}</p>
                        </div>
                        <div class="w-1/2 float-right relative inline-block">
                            <!-- <p class="text-blue-500 float-right">{{task.deadline | formatDate}}</p> -->
                            <p v-if="this.datePassed" class="text-red-500 float-right">{{task.deadline | formatDate}}</p>
                            <p v-else class="text-blue-500 float-right">{{task.deadline | formatDate}}</p>
                            <img :src="calendar" class="mt-1 float-right h-4 mr-4"/>
                        </div>
                    </div>
                    <div class="mt-12 w-full relative inline-block">
                        <form @submit.prevent="submit">
                            <input type="text" v-model="fields.name" class="w-full text-gray-800 text-xl outline-none focus:outline-none focus:border-gray-200">
                            <textarea style="resize: none;" class="w-full h-32 text-gray-800 relative inline-block mt-5 outline-none focus:outline-none rounded p-3 border-2 border-white focus:border-gray-200" placeholder="Description" id="description" v-model="fields.description"  type="text"></textarea>
                            <button type="submit" @click="save()" class="bg-blue-500 float-right rounded text-white trans px-6 py-3 ml-5 rounded-2">
                               opslaan
                            </button>
                        </form>
                    </div>
                    <div class="mt-16 w-full relative inline-block">
                        <p class="text-gray-800 text-xl">Logs</p>
                        <create-log :task="task" ></create-log>
                        <div v-if="item.logs" class="w-full rounded border-2 border-gray-200 relative inline-block mt-8">
                            <div class="w-full relative inline-block float-left border-b border-1 border-gray-200 p-4">
                                <p class="text-gray-800 font-bold inline-block relative float-left">Totaal</p>
                                <p class="float-right font-bold text-gray-800 inline-block relative"><template v-if="hours > 0">{{hours}}u </template>{{minutes}}min</p>
                            </div>   
                           <log-component @updatetime="updatetotaltime" v-for="(log, l) in item.logs" :key="l"  :log="log"></log-component>
                       </div>
                    </div>
                    
                </div>
            </el-drawer>
        </div>
    </div>
</template>

<script>
import FormatDateMixin from '../../mixins/FormatDateMixin';
import moment from 'moment';
import FormMixin from '../../mixins/FormMixin';

export default {
  mixins: [ FormMixin ],
  props: ['task', 'usericon', 'building', 'calendar', 'arrowright', 'formaction'],
  data() {
    return {
        'action': this.formaction,
        drawer: false,
        newlog: [],
        fields: {},
        errors: {},
        item: this.task,
        hours: 0,
        minutes: 0,
        datePassed: false,
    }
  },
  mounted() {
      var dateNow = new Date();
      var todayWrapper = moment(dateNow); 
      var today = todayWrapper.format("YYYY MMM D");

      var dateSelected = new Date(this.task.deadline);
      var selectedDayWrapper = moment(dateSelected); 
      var selectedDate = selectedDayWrapper.format("YYYY MMM D");
      console.log(today);
      console.log(selectedDate);


      if (selectedDate < today) {
       this.datePassed = true;
      }

      this.fields = this.task;
      var min = 0;
      var hour = 0;

      $.each(this.item.logs, function(key, value) {
            var then  = moment(value.started_at).format('DD/MM/YYYY HH:mm:ss');
            var now = moment(value.ended_at).format('DD/MM/YYYY HH:mm:ss');

            var ms = moment(now,"DD/MM/YYYY HH:mm:ss").diff(moment(then,"DD/MM/YYYY HH:mm:ss"));
            var d = moment.duration(ms);

            min += d._data.minutes;
            hour += d._data.hours;
            
            if(min > 59){
                min -= 60;
                hour ++;
            }
      });
      this.minutes = min;
      this.hours = hour;
  },
    methods: {
    ckeck() {
        console.log('test');
    },
    updatetotaltime (value) {
        var then  = moment(value.started_at).format('DD/MM/YYYY HH:mm:ss');
        var now = moment(value.ended_at).format('DD/MM/YYYY HH:mm:ss');

        var ms = moment(now,"DD/MM/YYYY HH:mm:ss").diff(moment(then,"DD/MM/YYYY HH:mm:ss"));
        var d = moment.duration(ms);

        this.minutes += d._data.minutes;
        this.hours += d._data.hours;
    },
        save() {
            // console.log('save');
        axios.post(`/api/tasks/update`, this.fields).then(response => {
            this.$parent.allTasks = response.data;
            this.fields = {
                user_id: null,
                project_id: null,
            };
        }).catch(error => {
            // console.log(error);
            // if (error.response.status === 422) {
            // this.errors = error.response.data.errors || {};
            // this.processing = false;
            // }
        });
    },
  }
}
</script>