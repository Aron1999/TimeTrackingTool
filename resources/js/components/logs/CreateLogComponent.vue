<template>
     <form class="relative flex w-full mt-5" @submit.prevent="submit">
         <input class="appearance-none float-left w-full inline-block bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="name" v-model="fields.name" type="text" placeholder="Titel">
            <!-- <div v-if="errors && errors.name" class="text-red-500">@{{ errors.name[0] }}</div> -->
        <button type="submit" class="relative w-48 bg-blue-500 float-right rounded text-white trans px-6 h-12 ml-5 rounded-2">
            Start timer
        </button>
    </form>
</template>

<script>
    export default {
        props: ['task'],
        data() {
            return {
                fields: {},
            }
        },
        mounted() {

    },
        methods: {
  
      submit() {
            // console.log(this.$parent);
          axios.post(`/api/tasks/${this.task.id}/logs/create`, this.fields).then(response => {
            //   console.log(response.data)
            //   this.$parent.$parent.task.logs = response.data;
              this.$parent.$parent.item.logs = response.data;
              this.fields = {};
          }).catch(error => {
            console.log(error);
            if (error.response.status === 422) {
              this.errors = error.response.data.errors || {};
            }
          });
      },
    },
    }
</script>

