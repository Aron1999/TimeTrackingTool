
<template>
<div>
</div>
</template>

<script>
// import FormMixin from '../../mixins/FormMixin';
import FormatDateMixin from '../../mixins/FormatDateMixin';

import moment from 'moment'


export default {
  // mixins: [ OrderByMixin ],
  // props: ['tasks'],
  data() {
    return {
    //   'action': this.formaction,
        tasks: [],
    }
  },
  mounted(){
    this.getTasks();
  },
  methods: {
    getTasks:  function() {
         axios.get('/api/projects/1/tasks').then((res) => {
            const Moment = require('moment');
            const tasks = res.data;
            const sortedArray  = tasks.sort((a,b) => new Moment(a.deadline).format('YYYYMMDD') - new Moment(b.deadline).format('YYYYMMDD'));
            // console.log(sortedArray)
            // console.log(res.data)
            this.tasks = tasks
          })
    },
  }
}
</script>