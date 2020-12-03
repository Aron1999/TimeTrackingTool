<template>
<form @submit.prevent="submit">
        <div class="flex w-full max-w-screen-lg mt-5">
            <div class="w-full rounded border-2 border-gray-200 py-3 px-4">
                <input type="text" v-model="fields.name" placeholder="Taak toevoegen" v-bind:class="{ 'placeholder-red-500': errors.name }" class="w-64 ml-16 inline-block float-left border-none text-gray-800 placeholder-gray-500 select-none outline-none">
                <!-- <div v-if="errors && errors.name" class="text-red-500">@{{ errors.name[0] }}</div> -->
                <div class="relative float-right inline-block pr-8">
                    <div class="relative inline-block float-left">
                        <!-- <img src="{{asset('building.png')}}" class="mt-1 float-left h-4"/> -->
                        <div class="relative float-left">
                            <select id="project_id" v-model="fields.project_id" v-bind:class="{ 'text-red-500': errors.project_id }"
                            class="block appearance-none w-full text-gray-500 mt-1 px-4 pr-8 rounded leading-tight bg-white focus:outline-none focus:text-gray-800" >
                                <option :value="null" disabled selected>Project</option>

                                    <option v-for="(project, p) in projects" :key="p"  selected :value="project.id">{{project.name}}</option>

                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">                        
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="relative float-left mx-8">
                        <!-- <img src="{{ asset('storage/user.png')}}" class="mt-1 float-left h-4"/>  -->
                        <div class="relative float-left">
                            <select id="user_id"  v-model="fields.user_id" v-bind:class="{ 'text-red-500': errors.user_id }"
                            class="block appearance-none w-full text-gray-500 mt-1 px-4 pr-8 rounded leading-tight bg-white focus:outline-none focus:text-gray-800">
                                <option :value="null" disabled selected>Gebruiker</option>
                                    <option v-for="(user, u) in users" :key="u" :value="user.id">{{user.name}}</option>

                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">                        
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="relative float-left mx-8">
                        <!-- <img src="{{asset('calendar.png')}}" class="mt-1 float-left h-4 mr-4"/> -->
                        <input v-bind:class="{ 'text-red-500': errors.deadline }" class="appearance-none text-gray-500 focus:text-gray-800 inline-block w-24 float-left text-gray-700 leading-tight focus:outline-none" id="deadline" v-model="fields.deadline"  type="date" placeholder="Deadline">
                    </div>
                    <button type="submit" class="relative float-left outline-none focus:outline-none text-gray-500">
                        <!-- submit -->
                        --->
                        <!-- <img :src="'../../../../storage/img/arrow-right.png'" class="mt-2 float-left w-5 cursor-pointer"/> -->
                    </button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
export default {
  props: ['projects', 'users'],
  data() {
    return {
        fields: {
        user_id: null,
        project_id: null,
      },
      errors: {},
    }
  },
  mounted(){
  },
    methods: {
      submit() {
            axios.post(`/api/tasks/store`, this.fields).then(response => {
              this.$parent.allTasks = response.data;
                this.fields = {
                    user_id: null,
                    project_id: null,
                };
            }).catch(error => {
              console.log(error);
              if (error.response.status === 422) {
                this.errors = error.response.data.errors || {};
                this.processing = false;
              }
            });
        },
    },
    
  

}
</script>