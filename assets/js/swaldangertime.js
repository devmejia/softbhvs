'use strict';


$('#type-alertdanger-time').ready(function () {

  const desc = $("#descalertdanger-time").val();

  swal({
    title: desc,
    text: '',
    type: 'error',
    showConfirmButton: false,
    timer: 3000
  });
  
});