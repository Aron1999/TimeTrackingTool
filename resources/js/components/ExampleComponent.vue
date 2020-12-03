<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')


    // axios.get('/api/projects/1/tasks').then((res) => {
    //   const Moment = require('moment');
    //   const tasks = res.data;
    //   const sortedArray  = tasks.sort((a,b) => new Moment(a.deadline).format('YYYYMMDD') - new Moment(b.deadline).format('YYYYMMDD'))
    //   console.log(sortedArray)
    //   // console.log(res.data)
    //   // this.tasks = YYYY-MM-DD HH:mm:ss
    // })
        }
    }
</script>

