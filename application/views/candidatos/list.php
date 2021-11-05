<div class="page-header">
    <div class="page-header-title">
        <h4><?php echo $view; ?></h4>
    </div>
    <div class="page-header-breadcrumb">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('dashboard'); ?>">
                    <i class="icofont icofont-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('candidatos'); ?>">Candidatos</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#!"><?php echo $view; ?></a>
            </li>
        </ul>
    </div>
</div>
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-block">
                    <div class="card-body">
                        <table id="dt-candidatos-processing" class="table table-striped table-bordered nowrap" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Profesión</th>
                                    <th>H.V</th>
                                    <th>Lider</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>