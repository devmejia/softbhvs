'use strict';


$('#type-alertsuccess-time').ready(function () {
  
  const desc = $("#descalertsuccess-time").val();

  swal({
    title: desc,
    text: '',
    type: 'success',
    showConfirmButton: false,
    timer: 3000
  });
  
});