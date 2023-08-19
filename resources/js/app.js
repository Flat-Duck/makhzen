
import '@tabler/core/src/js/tabler.js';

import './bootstrap';

// import Alpine from 'alpinejs'

// window.Alpine = Alpine

// import './../../vendor/power-components/livewire-powergrid/dist/powergrid'
// import './../../vendor/power-components/livewire-powergrid/dist/powergrid.css'

// Alpine.start()

import $ from 'jquery'

window.jQuery = window.$ = $

import jQuery from 'jquery';
window.$ = jQuery;
import DataTable from "datatables";
DataTable(window, window.$);

//import '@tabler/core/dist/libs/list.js';
// /import List from '@tabler/core/dist/libs/list';
// window.List = List;
