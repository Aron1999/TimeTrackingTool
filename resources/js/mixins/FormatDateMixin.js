
import moment from 'moment'

Vue.filter('formatDate', function(value) {
  moment.locale('nl'); 
  if (value) {
    var now = moment();
    var input = moment(value);

    var isThisWeek = (now.isoWeek() == input.isoWeek())

    var dateNow = new Date();
    var todayWrapper = moment(dateNow); 
    var today = todayWrapper.format("YYYY MMM D");

    // var dateSelected = new Date(this.task.deadline);
    // var selectedDayWrapper = moment(dateSelected); 
    var selectedDate = input.format("YYYY MMM D");

    if (selectedDate == today) {
        return 'Vandaag';
    }else if(isThisWeek){
        return moment(String(value)).format('dddd')
    }else{
        return moment(String(value)).format('DD MMM')
    }
    
   
  }
})

