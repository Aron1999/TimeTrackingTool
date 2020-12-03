<template>
<div>ola</div>
</template>

<script>

export default {

  props: ['formaction', 'tasks', 'projects', 'users'],
  data() {
    return {
     
    allTasks : this.tasks
    }
  },
  mounted(){
    // console.log(this.tasks)
  },
 
}
</script>