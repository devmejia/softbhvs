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
            <div class="cover-profile">
                <div class="profile-bg-img">
                    <img class="profile-bg-img img-fluid" src="<?php echo base_url(); ?>assets/images/bg-profile.png" alt="bg-img">
                    <div class="card-block user-info">
                        <div class="col-md-12">
                            <div class="media-left">
                                <a href="#" class="profile-image">
                                    <?php if ($profile->abrevia_genero == "M") { ?>
                                        <img class="user-img img-circle" src="<?php echo base_url(); ?>assets/images/avatar-man.png" alt="user-img">
                                    <?php } ?>
                                    <?php if ($profile->abrevia_genero == "F") { ?>
                                        <img class="user-img img-circle" src="<?php echo base_url(); ?>assets/images/avatar-women.png" alt="user-img">
                                    <?php } ?>
                                </a>
                            </div>
                            <div class="media-body row">
                                <div class="col-lg-12">
                                    <div class="user-title">
                                        <h3><?php echo $profile->usuario_nombre . " " . $profile->usuario_apellido; ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-text">Información personal</h5>
                    <button id="edit-btn" type="button" class="btn btn-sm btn-primary waves-effect waves-light f-right">
                        <i class="icofont icofont-ui-edit"></i>
                    </button>
                </div>
                <div class="card-block">

                    <!-- ver información -->
                    <div class="view-info">
                        <div class="row">
                            <div class="col-lg-12 col-xl-6">
                                <table class="table m-0">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Nombres</th>
                                            <td><?php echo ucwords(strtolower($profile->usuario_nombre)); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Apellidos</th>
                                            <td><?php echo ucwords(strtolower($profile->usuario_apellido)); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tipo de documento</th>
                                            <td><?php echo $profile->tipodocumento_name; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Número de documento</th>
                                            <td><?php echo $profile->usuario_numdoc; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Género</th>
                                            <td><?php echo $profile->abrevia_genero; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Correo electrónico </th>
                                            <td><?php echo $profile->usuario_email; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Número de celular</th>
                                            <td><?php echo $profile->usuario_celular; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Fecha de nacimiento</th>
                                            <td>
                                                <?php
                                                if($profile->usuario_fechanacido !== "0000-00-00")
                                                {
                                                    echo $profile->usuario_fechanacido; 
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Edad</th>
                                            <td><?php
                                                if ($profile->usuario_fechanacido !== "0000-00-00") {
                                                    $format = date("Y-m-d", strtotime($profile->usuario_fechanacido));
                                                    $nacimiento = new DateTime($format);
                                                    $ahora = new DateTime(date("Y-m-d"));
                                                    $edad = $ahora->diff($nacimiento);
                                                    echo $edad->format("%y") . " Años";
                                                }
                                                ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Profesión</th>
                                            <td>
                                                <?php
                                                if ($profile->profesion_nombre) {
                                                    $items = explode(',', $profile->profesion_nombre);
                                                    foreach ($items as $key => $value) {
                                                        echo "<label class='label label-info'>" . $value . "</label>";
                                                    }
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Hoja de vida</th>
                                            <td>
                                                <?php
                                                if (
                                                    is_file('./archivos/hoja_de_vida/' . $profile->archivo_pdf)
                                                    && file_exists('./archivos/hoja_de_vida/' . $profile->archivo_pdf)
                                                ) {
                                                    echo "<a href='" . base_url('archivos/hoja_de_vida/' . $profile->archivo_pdf) . "' target='_blank'><i class='fa fa-file-pdf-o text-danger'></i></a>";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Lider</th>
                                            <td><a href="#!"><?php echo $profile->full_namelider; ?></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- ./ver información -->

                    <!-- editar información -->
                    <div class="edit-info" style="display: none;">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="general-info">
                                    <?php
                                    $attributes = array('role' => 'form', 'autocomplete' => 'off', 'id' => 'formulario', 'enctype' => 'multipart/form-data', 'method' => 'POST');
                                    echo form_open('candidatos/update', $attributes)
                                    ?>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <table class="table">
                                                <tbody>
                                                    <input type="hidden" name="usuario_id" value="<?php echo $profile->usuario_id; ?>">
                                                    <tr>
                                                        <td>
                                                            <div class="form-group <?php if (form_error('usuario_nombre')) { ?> has-danger <?php } ?> row">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icofont icofont-user"></i></span>
                                                                    <input type="text" name="usuario_nombre" value="<?php echo set_value('usuario_nombre', $profile->usuario_nombre); ?>" placeholder="Escriba el nombre" id="usuario_nombre" class="form-control <?php if (form_error('usuario_nombre')) { ?> form-control-danger <?php } ?>">
                                                                </div>
                                                                <?php echo form_error("usuario_nombre"); ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group <?php if (form_error('usuario_apellido')) { ?> has-danger <?php } ?> row">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icofont icofont-user"></i></span>
                                                                    <input type="text" name="usuario_apellido" value="<?php echo set_value('usuario_apellido', $profile->usuario_apellido); ?>" placeholder="Escriba el apellido" id="usuario_apellido" class="form-control <?php if (form_error('usuario_apellido')) { ?> form-control-danger <?php } ?>">
                                                                </div>
                                                                <?php echo form_error("usuario_apellido"); ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group <?php if (form_error('usuario_tipodoc')) { ?> has-danger <?php } ?> row">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icofont icofont-id-card"></i></span>
                                                                    <select name="usuario_tipodoc" id="usuario_tipodoc" class="form-control select2 <?php if (form_error('usuario_tipodoc')) { ?> form-control-danger <?php } ?>">
                                                                        <?php if (!empty($all_tiposdocumentos)) { ?>
                                                                            <option value="" <?= set_select('usuario_tipodoc', '', TRUE); ?>>Seleccione el tipo de documento</option>
                                                                            <?php foreach ($all_tiposdocumentos as $tiposdoc) { ?>
                                                                                <option value="<?php echo $tiposdoc->tipodocumento_id; ?>" <?= set_select('usuario_tipodoc', $tiposdoc->tipodocumento_id, $tiposdoc->tipodocumento_id == $profile->tipodocumento_id ? TRUE : FALSE); ?>><?php echo $tiposdoc->tipodocumento_name; ?></option>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <?php echo form_error("usuario_tipodoc"); ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group <?php if (form_error('usuario_numdoc')) { ?> has-danger <?php } ?> row">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icofont icofont-id-card"></i></span>
                                                                    <input type="number" name="usuario_numdoc" value="<?php echo set_value('usuario_numdoc', $profile->usuario_numdoc); ?>" id="usuario_numdoc" placeholder="Escriba el número de documento" class="form-control <?php if (form_error('usuario_numdoc')) { ?> form-control-danger <?php } ?>">
                                                                </div>
                                                                <?php echo form_error("usuario_numdoc"); ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group <?php if (form_error('usuario_genero')) { ?> has-danger <?php } ?> row">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icofont icofont-group-students"></i></span>
                                                                    <select name="usuario_genero" id="usuario_genero" class="form-control select2 <?php if (form_error('usuario_genero')) { ?> form-control-danger <?php } ?>">
                                                                        <?php if (!empty($all_generos)) { ?>
                                                                            <option value="" <?= set_select('usuario_genero',  '', TRUE); ?>>Seleccione un genero</option>
                                                                            <?php foreach ($all_generos as $gene) { ?>
                                                                                <option value="<?php echo $gene->idgenero; ?>" <?= set_select('usuario_genero', $gene->idgenero, $gene->idgenero == $profile->idgenero ? TRUE : FALSE); ?>><?php echo $gene->abrevia_genero; ?></option>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <?php echo form_error("usuario_genero"); ?>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group <?php if (form_error('usuario_email')) { ?> has-danger <?php } ?> row">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">@</span>
                                                                    <input type="email" name="usuario_email" value="<?php echo set_value('usuario_email', $profile->usuario_email); ?>" placeholder="Escriba el correo electrónico" id="usuario_email" class="form-control <?php if (form_error('usuario_email')) { ?> form-control-danger <?php } ?>">
                                                                </div>
                                                                <?php echo form_error("usuario_email"); ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group <?php if (form_error('usuario_celular')) { ?> has-danger <?php } ?> row">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icofont icofont-mobile-phone"></i></span>
                                                                    <input type="number" name="usuario_celular" value="<?php echo set_value('usuario_celular', $profile->usuario_celular); ?>" placeholder="Escriba el número de celular" id="usuario_celular" class="form-control <?php if (form_error('usuario_celular')) { ?> form-control-danger <?php } ?>">
                                                                </div>
                                                                <?php echo form_error("usuario_celular"); ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col-lg-6">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group <?php if (form_error('usuario_fechanacido')) { ?> has-danger <?php } ?> row">
                                                                <input type="date" name="usuario_fechanacido" value="<?php echo set_value('usuario_fechanacido', $profile->usuario_fechanacido !== "0000-00-00" ? $profile->usuario_fechanacido : ""); ?>" placeholder="Escriba el número de celular" id="usuario_fechanacido" class="form-control <?php if (form_error('usuario_fechanacido')) { ?> form-control-danger <?php } ?>">
                                                                <div class="input-group"></div>
                                                                <?php echo form_error("usuario_fechanacido"); ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            $profesion = explode(',', $profile->profesion_id);
                                                            ?>
                                                            <div class="form-group <?php if (form_error('userprofe_profesion[]')) { ?> has-danger <?php } ?> row">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icofont icofont-hat-alt"></i></span>
                                                                    <select name="userprofe_profesion[]" id="userprofe_profesion" class="js-example-basic-multiple-limit form-control <?php if (form_error('userprofe_profesion[]')) { ?> form-control-danger <?php } ?>" multiple="multiple">
                                                                        <?php if (!empty($all_profesiones)) { ?>
                                                                            <option value="">Seleccione una(s) profesiones</option>
                                                                            <?php
                                                                            foreach ($all_profesiones as $prof) {
                                                                            ?>
                                                                                <option value="<?php echo $prof->profesion_id; ?>" <?= set_select('userprofe_profesion[]', $prof->profesion_id, in_array($prof->profesion_id, $profesion) ? TRUE : FALSE); ?>><?php echo ucfirst(strtolower($prof->profesion_nombre)); ?></option>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <?php echo form_error("userprofe_profesion[]"); ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group <?php if (form_error('archivo_pdf')) { ?> has-danger <?php } ?> row">
                                                                <input type="file" name="archivo_pdf" class="dropify form-control <?php if (form_error('archivo_pdf')) { ?> form-control-danger <?php } ?>" data-default-file="<?= base_url('archivos/hoja_de_vida/') . $profile->archivo_pdf ?>" accept=".pdf" data-allowed-file-extensions="pdf" data-max-file-size="4M" />
                                                                <div class="input-group"></div>
                                                                <?php if(isset($error_file))  echo $error_file; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group <?php if (form_error('lider_id')) { ?> has-danger <?php } ?> row">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icofont icofont-teacher"></i></span>
                                                                    <select name="lider_id" id="lider_id" class="form-control select2 <?php if (form_error('lider_id')) { ?> form-control-danger <?php } ?>">
                                                                        <?php if (!empty($all_lideres)) { ?>
                                                                            <option value="" <?= set_select('lider_id', '', TRUE); ?>>Seleccione un lider</option>
                                                                            <?php foreach ($all_lideres as $lid) { ?>
                                                                                <option value="<?php echo $lid->lider_id; ?>" <?= set_select('lider_id', $lid->lider_id, $lid->lider_id == $profile->lider_id ? TRUE : FALSE); ?>><?php echo ucwords(strtolower($lid->lider_nombre . " " . $lid->lider_apellido)); ?></option>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <?php echo form_error("lider_id"); ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" href="#!" id="edit-submit" class="btn btn-primary waves-effect waves-light m-r-20">Guardar</button>
                                        <button id="edit-cancel" class="btn btn-danger waves-effect">Cancelar</button>
                                    </div>
                                    <?php form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./editar información -->

                </div>
            </div>
        </div>
    </div>
</div>