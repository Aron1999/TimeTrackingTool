<template>
   <div>
      <div class="w-full overflow-y-scroll" style="height: 300px;">
          <div>
              <template v-if="allLogs.length < 1">
                  <div class="w-full relative inline-block float-left border-b border-1 border-gray-200 p-4">
                      <p class="text-gray-500 inline-block relative float-left">Er zijn nog geen uren vandaag.</p>
                  </div>  
              </template>
              <template v-else>
                  <log-component v-for="(log, l) in allLogs" :key="l"  :log="log"></log-component>
              </template>
          </div>
      </div>
      <div class="w-full bg-white absolute bottom-0 border-b border-t border-1 border-gray-200 p-4">
          <p class="text-gray-800 font-bold inline-block relative float-left">Totaal</p>
          <p class="float-right text-gray-800 inline-block relative"><template v-if="hours > 0">{{hours}} uur</template>{{minutes}} min</p>
      </div>  
  </div>
</template>

<script>
import moment from 'moment'

export default {

  props: ['logs'],
  data() {
    return {
        allLogs : this.logs,
        arontest : this.logs,
        hours: 0,
        minutes: 0,
    }
  },
  mounted(){
    var min = 0;
    var hour = 0;

    $.each(this.allLogs, function(key, value) {
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

    console.log(this.minutes);

  },
 
}
</script>