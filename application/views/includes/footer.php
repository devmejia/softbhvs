                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./ Contenedor -->

<!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->

<?php if ($this->session->flashdata('alert-success')) { ?>
    <input type="hidden" id="descalertsuccess" value="<?php echo $this->session->flashdata('alert-success'); ?>" />
<?php } ?>

<?php if ( $this->session->flashdata('alert-danger') ) { ?>
    <input type="hidden" id="descalertdanger" value="<?php echo $this->session->flashdata('alert-danger'); ?>" />
<?php } ?>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/tether/dist/js/tether.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/modernizr/modernizr.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/modernizr/feature-detects/css-scrollbars.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/classie/classie.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/sweetalert/dist/sweetalert.min.js"></script>
    
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/swalAlert.js"></script>

    <?php if ( $this->session->flashdata('alert-success') ) { ?>
        <script>
            alertaOk();
        </script>
    <?php } ?>

    <?php if ( $this->session->flashdata('alert-danger') ) { ?>
        <script>
            alertaFailed();
        </script>
    <?php } ?>

<?php if($itemview == "dashboard"){ ?>
    <script src="<?php echo base_url(); ?>assets/bower_components/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.js"></script>
<?php } ?>

<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/pages/todo/todo.js"></script> -->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/pages/dashboard/horizontal-timeline/js/main.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/bootstrap-multiselect/dist/js/bootstrap-multiselect.js">
    </script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/multiselect/js/jquery.multi-select.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/dropify/dist/js/dropify.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/dropify/dist/js/dropify.js"></script>

<!-- datatables -->
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/pages/data-table/js/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/pages/data-table/js/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/pages/data-table/js/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<!-- ./datatables -->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/i18next/i18next.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/jquery-i18next/jquery-i18next.min.js"></script>

<?php if($itemview == "dashboard"){ ?>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/pages/dashboard/project-dashboard.js"></script>
<?php } ?>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/script.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/pages/advance-elements/select2-custom.js"></script>

<script src="<?php echo base_url(); ?>assets/js/pcoded.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/demo-12.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.mousewheel.min.js"></script>

<!-- Datatable Server Side -->
<?php if($itemview == "listcandidatos")
{
    $this->load->view('candidatos/Datatable_candidatos');
} 
?>

<?php if($itemview == "profilecandidatos")
{
    if(isset($edition))
    { ?>
        <script>
            $(document).ready(function () {                
                $("#edit-btn").trigger("click");
            });
        </script>
    <?php }
} 
?>

<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

</body>
</html>