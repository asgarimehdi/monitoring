/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./js/adminlte.min.js');
require('./js/popper.min.js');
///////////////
window.Vue = require('vue');
//////////////
import Gate from "./Gate";
Vue.prototype.$gate = new Gate(window.user);
///////////////
Vue.component('pagination', require('laravel-vue-pagination'));
////////////////////
Vue.component('not-found',require('./components/NotFound.vue').default);
///////////////


///////////
import VueProgressBar from 'vue-progressbar';

Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '2px'
});
////////////////////
import swal from 'sweetalert2';
window.swal = swal;
const toast = swal.mixin({
    toast: true,
    position: 'bottom-start',
    showConfirmButton: false,
    timer: 8000,
    background:'#efe'
});
window.toast=toast;
///////////////
window.Fire = new Vue();
//////////////
import {Form,HasError,AlertError} from 'vform';
window.Form=Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
//////////////////////
//Vue.component('map-component', require('./components/mapComponent.vue').default);
Vue.component('cold-chain', require('./components/ColdChain.vue').default);
Vue.component('users-component', require('./components/Users.vue').default);
//Vue.component('test-component', require('./components/test.vue').default);
Vue.component('regions-component', require('./components/Regions.vue').default);

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
/////////////
const app = new Vue({
    el: '#app',
    data:{
        search: ''
    },
    methods:{
        searchit: _.debounce(() => {
            Fire.$emit('searching');
        },1000)


    }
});
/***/


import { Icon }  from 'leaflet'
import 'leaflet/dist/leaflet.css'


// this part resolve an issue where the markers would not appear
delete Icon.Default.prototype._getIconUrl;

Icon.Default.mergeOptions({
    iconRetinaUrl: require('leaflet/dist/images/marker-icon-2x.png'),
    iconUrl: require('leaflet/dist/images/marker-icon.png'),
    shadowUrl: require('leaflet/dist/images/marker-shadow.png')
});

let moment = require('moment-jalaali');
moment.loadPersian({dialect: 'persian-modern',usePersianDigits: true});

Vue.filter('myDate',function(created){
    //return moment(created).format(' jMMMM  jD  HH:mm:ss');
     return moment(created).add(3.5, 'hours').fromNow();

});
