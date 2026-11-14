import $ from 'jquery';

window.$ = window.jQuery = $;

import * as bootstrap from 'bootstrap';

window.bootstrap = bootstrap;

import '@majidh1/jalalidatepicker/dist/jalalidatepicker.min.js';

window.jalaliDatepicker.startWatch({
    persianDigits: true
});
