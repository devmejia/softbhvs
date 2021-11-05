<script>
    var baseurl = $("#baseurl").val();
    var tableCandidato = null;
    var csrfName = "<?php echo $this->security->get_csrf_token_name();?>"; // Value specified in $config['csrf_token_name']
    var csrfHash = "<?php echo $this->security->get_csrf_hash();?>"; // CSRF hash

    $(document).ready(function() {
        tableCandidato = $('#dt-candidatos-processing').DataTable({
            "processing": true,
            "responsive": true,
            "serverSide": true,
            "ordering": true,
            "order": [],
            "ajax": {
                "url": baseurl + "candidatos/ajax_getcandidatos",
                "type": "POST",
                "data": {
                    [csrfName]: csrfHash
                },
                dataFilter:function(response) {
                    console.log(response);
                    csrfHash = response.csrf_token;
                    return response;
                },
                error: function(err){
                    console.log(err);
                }
            },
            "deferRender": true,
            "aLengthMenu": [
                [5, 10, 25, 50],
                [5, 10, 25, 50]
            ],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            "dom": 'Bfrtip',
            "buttons": [{
                    extend: 'copyHtml5',
                    text: '<i class="fa fa-copy"></i> Copiar',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                {
                    extend: "csvHtml5",
                    text: '<i class="fa fa-file-excel-o"></i> CSV',
                    exportOptions: {
                        columns: ":visible",
                    },
                },
                {
                    extend: "excelHtml5",
                    text: '<i class="fa fa-file-excel-o"></i> Excel',
                    exportOptions: {
                        columns: ":visible",
                    },
                },
                {
                    text: '<i class="fa fa-file-code-o"></i> JSON',
                    action: function(e, dt, button, config) {
                        var data = dt.buttons.exportData();

                        $.fn.dataTable.fileSave(
                            new Blob([JSON.stringify(data)]),
                            'Export.json'
                        );
                    }
                },
                {
                    extend: "pdfHtml5",
                    text: '<i class="fa fa-file-pdf-o"></i> PDF',
                    exportOptions: {
                        columns: ":visible",
                    },
                },
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i> Imprimir',
                    exportOptions: {
                        columns: ':visible'
                    }
                }
            ],
        });

        // tableCandidato.on('xhr.dt', function(e, settings, json, xhr) {
        //     csrfHash = json.csrf_token;
        //     csrfName = json.csrf_name;
        //     console.log("del reload "+csrfHash);
        // });
        
    });

    $(document).on("click", ".btnBorrar", function(e) {

        var fila, code_user;

        fila = $(this).parents('tr');

        code_user = $(this).attr('data-id');

        swal({
            title: 'Estas seguro?',
            text: "Se borrará de forma permanente!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e74c3c',
            confirmButtonText: 'Sí, borrarlo',
            cancelButtonColor: '#d33',
            cancelButtonText: "Cancelar",
            closeOnConfirm: false
        },function() {
                $.ajax({
                    url: baseurl + "candidatos/delete",
                    type: "POST",
                    data: {
                        code_user: code_user,
                        [csrfName]: csrfHash
                        
                    },
                    datatype: "json",
                    success: function(result) {

                        var parsejson = JSON.parse(result);

                        //reescribimos las variable
                        // csrfName = parsejson.new_csrf_has; 
                        // csrfHash = parsejson.csrf_hash;

                        // $('#inputcsrfname').val(parsejson.csrf_hash);
                        

                        if (parsejson.code == 200) {
                            fila.fadeOut('slow', function() {
                                fila.remove();
                                swal("Borrado!", "EL registro ha sido borrado.", "success");
                            });

                            csrfName = parsejson.csrf_name;
                            csrfHash = parsejson.csrf_token;
                            // tableCandidato.ajax.reload(null,false); //reload datatable ajax 
                        }

                        if (parsejson.code == 403) {
                            swal("Error!", "No se pudo borrar el registro.", "error");
                        }

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        swal('Oops...', 'Algo salió mal!', 'error');
                    }
                });
        });
        e.preventDefault();
    });
</script>