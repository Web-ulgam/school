require('./bootstrap')

import 'jquery-ui/ui/widgets/datepicker.js'
import VModal from 'vue-js-modal'
import ToggleButton from 'vue-js-toggle-button'
import Inputmask from "inputmask"
import Swal from 'sweetalert2'
import Echo from "laravel-echo"

window.Vue = require('vue')

Vue.use(VModal)
Vue.use(ToggleButton)
Vue.component('vue-multiselect', window.VueMultiselect.default)
Vue.component('timetable-day', require('./components/TimetableDay.vue').default)
Vue.component('journal', require('./components/Journal.vue').default)

const app = new Vue({
    el: '#app',
    methods: {
        initializeNavbar() {
            let toggleBtn = document.getElementById('header-toggle');
            let nav = document.getElementById('navbar');

            toggleBtn.addEventListener('click', function(e) {
                nav.classList.toggle('show-menu');
                toggleBtn.classList.toggle('bx-x');
            });
        },
        swal(...data) {
            Swal.fire(...data);
        }
    },
    mounted() {
        let phone_fields = document.querySelectorAll('input[name=phone]');
        for (var i = 0; i < phone_fields.length; i++) {
            Inputmask({"mask": "+(\\9\\93)-99-99-99-99"}).mask(phone_fields[i]);
        }

        this.initializeNavbar();
    }
});
