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

  $(".mask_decimal").inputmask({
    alias: 'numeric',
    prefix: 'R$ ',
    groupSeparator: '.',
    radixPoint: ',',
    autoGroup: true,
    digits: 2,
    digitsOptional: false,
    rightAlign: false,
    unmaskAsNumber: true,
    clearIncomplete: true,
    showMaskOnHover: true,
    showMaskOnFocus: true,
    placeholder: '0'
  });

  $(".mask_email").inputmask({
    alias: "email",
    clearIncomplete: false,
    showMaskOnHover: true,
    showMaskOnFocus: true
  });

  var $visitorsChart = $('#visitors-chart')
  // eslint-disable-next-line no-unused-vars
  var visitorsChart = new Chart($visitorsChart, {
    data: {
      labels: ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
      datasets: [{
        type: 'line',
        data: [100, 120, 170, 167, 180, 177, 160],
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        pointBorderColor: '#007bff',
        pointBackgroundColor: '#007bff',
        fill: false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
      },
      {
        type: 'line',
        data: [60, 80, 70, 67, 80, 77, 100],
        backgroundColor: 'tansparent',
        borderColor: '#ced4da',
        pointBorderColor: '#ced4da',
        pointBackgroundColor: '#ced4da',
        fill: false
        // pointHoverBackgroundColor: '#ced4da',
        // pointHoverBorderColor    : '#ced4da'
      }]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,
            suggestedMax: 200
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  });

    // $('.select2').select2();
});
