import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import '/public/adminlte-3.2.0/plugins/jquery/jquery.min.js';
import '/public/adminlte-3.2.0/plugins/jquery-ui/jquery-ui.min.js';
import '/public/adminlte-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js';
import '/public/adminlte-3.2.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js';
import '/public/adminlte-3.2.0/plugins/inputmask/jquery.inputmask.min';
import '/public/adminlte-3.2.0/dist/js/adminlte.js';

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

$(document).ready(function() {
    $(".mask_cpf").inputmask({
      mask: "999.999.999-99",
      clearIncomplete: true,
      showMaskOnHover: false,
      showMaskOnFocus: false
    });

    $(".mask_date").inputmask({
      mask: "99/99/9999",
      placeholder: "dd/mm/yyyy",
      clearIncomplete: true,
      showMaskOnHover: true,
      showMaskOnFocus: true
    });

    $(".mask_time").inputmask({
      mask: "99:99:99",
      placeholder: "hh:mm:ss",
      clearIncomplete: true,
      showMaskOnHover: false,
      showMaskOnFocus: false
    });

    $(".mask_phone_with_ddd").inputmask({
      mask: "(99) 9999[9]-9999"
    });

    // $('.select2').select2();
});
