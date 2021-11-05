// Development Edinson Mejia - 14/09/2021 01:32 a.m
'use strict';

  const Mainjq = {
    alert_success: function() {
        const descsuccess = $("#descalertsuccess").val();
        swal({
          title: 'Éxito',
          text: descsuccess,
          type: 'success'
        });
    },
    alert_danger: function() {
        const descsuccess = $("#descalertdanger").val();
        swal({
          title: 'Error',
          text: descsuccess,
          type: 'error'
        });
    },
  };

  const alertaOk = Mainjq.alert_success;
  const alertaFailed = Mainjq.alert_danger;