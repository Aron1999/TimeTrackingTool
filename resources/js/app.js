/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


// Vue.component('form-component', require('./components/FormComponent.vue').default);

// organisations
Vue.component('create-organisation', require('./components/organisation/CreateOrganisation.vue').default);
Vue.component('organisation', require('./components/organisation/Organisation.vue').default);

// Usermenu
Vue.component('user-menu', require('./components/usermenu/UserMenu.vue').default);


// Settings
Vue.component('settings-user', require('./components/settings/User.vue').default);


// Contact
Vue.component('create-contact', require('./components/contact/CreateContact.vue').default);
Vue.component('contact', require('./components/contact/Contact.vue').default);

// Tasks

Vue.component('all-tasks', require('./components/tasks/AllTasksComponent.vue').default);
Vue.component('tasks', require('./components/tasks/TasksComponent.vue').default);
Vue.component('task', require('./components/tasks/TaskComponent.vue').default);

Vue.component('task-create', require('./components/tasks/CreateTask.vue').default);


// project
Vue.component('create-project', require('./components/project/CreateProject.vue').default);
Vue.component('project', require('./components/project/Project.vue').default);

// log
Vue.component('all-logs', require('./components/logs/AllLogsComponent.vue').default);
Vue.component('create-log', require('./components/logs/CreatelogComponent.vue').default);
Vue.component('log-component', require('./components/logs/LogComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Vue from 'vue';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import locale from 'element-ui/lib/locale/lang/en';
// import App from './App.vue';

Vue.use(ElementUI, { locale })

const app = new Vue({
    el: '#app',
    // render: h => h(App),
    data: function() {
        return { visible: false }
      }
});
