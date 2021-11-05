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

                    <!-- Formulario -->
                    <?php
                    $attributes = array('role' => 'form', 'autocomplete' => 'off', 'id' => 'formulario', 'enctype' => 'multipart/form-data', 'method' => 'POST');
                    echo form_open('candidatos/update', $attributes)
                    ?>
                    
                    <input type="hidden" name="usuario_id" value="<?php echo $profile->usuario_id; ?>">
                    <input type="hidden" name="view_edit" value="1">

                    <div class="form-group <?php if (form_error('usuario_nombre')) { ?> has-danger <?php } ?> row">
                        <div class="col-sm-2">
                            <label class="col-form-label text-dark" for="usuario_nombre">Nombres <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icofont icofont-user"></i></span>
                                <input type="text" name="usuario_nombre" value="<?php echo set_value('usuario_nombre', $profile->usuario_nombre); ?>" placeholder="Escriba el nombre" id="usuario_nombre" class="form-control <?php if (form_error('usuario_nombre')) { ?> form-control-danger <?php } ?>">
                            </div>
                            <?php echo form_error("usuario_nombre"); ?>
                        </div>
                    </div>

                    <div class="form-group <?php if (form_error('usuario_apellido')) { ?> has-danger <?php } ?> row">
                        <div class="col-sm-2">
                            <label class="col-form-label text-dark" for="usuario_apellido">Apellidos <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icofont icofont-user"></i></span>
                                <input type="text" name="usuario_apellido" value="<?php echo set_value('usuario_apellido', $profile->usuario_apellido); ?>" placeholder="Escriba el apellido" id="usuario_apellido" class="form-control <?php if (form_error('usuario_apellido')) { ?> form-control-danger <?php } ?>">
                            </div>
                            <?php echo form_error("usuario_apellido"); ?>
                        </div>
                    </div>

                    <div class="form-group <?php if (form_error('usuario_tipodoc')) { ?> has-danger <?php } ?> row">
                        <div class="col-sm-2">
                            <label class="col-form-label text-dark" for="usuario_tipodoc">Tipo de documento <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-sm-10">
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
                    </div>

                    <div class="form-group <?php if (form_error('usuario_numdoc')) { ?> has-danger <?php } ?> row">
                        <div class="col-sm-2">
                            <label class="col-form-label text-dark" for="usuario_numdoc">Número de documento <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icofont icofont-id-card"></i></span>
                                <input type="number" name="usuario_numdoc" value="<?php echo set_value('usuario_numdoc', $profile->usuario_numdoc); ?>" placeholder="Escriba el número de documento" id="usuario_numdoc" class="form-control <?php if (form_error('usuario_numdoc')) { ?> form-control-danger <?php } ?>">
                            </div>
                            <?php echo form_error("usuario_numdoc"); ?>
                        </div>
                    </div>

                    <div class="form-group <?php if (form_error('usuario_genero')) { ?> has-danger <?php } ?> row">
                        <div class="col-sm-2">
                            <label class="col-form-label text-dark" for="usuario_genero">Género <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-sm-10">
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
                    </div>

                    <div class="form-group <?php if (form_error('usuario_email')) { ?> has-danger <?php } ?> row">
                        <div class="col-sm-2">
                            <label class="col-form-label text-dark" for="usuario_email">Correo electrónico <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input type="email" name="usuario_email" value="<?php echo set_value('usuario_email', $profile->usuario_email); ?>" id="usuario_email" class="form-control <?php if (form_error('usuario_email')) { ?> form-control-danger <?php } ?>">
                            </div>
                            <?php echo form_error("usuario_email"); ?>
                        </div>
                    </div>

                    <div class="form-group <?php if (form_error('usuario_celular')) { ?> has-danger <?php } ?> row">
                        <div class="col-sm-2">
                            <label class="col-form-label text-dark" for="usuario_celular">Número de celular <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icofont icofont-mobile-phone"></i></span>
                                <input type="number" name="usuario_celular" value="<?php echo set_value('usuario_celular', $profile->usuario_celular); ?>" placeholder="Escriba el número de celular" id="usuario_celular" class="form-control <?php if (form_error('usuario_celular')) { ?> form-control-danger <?php } ?>">
                            </div>
                            <?php echo form_error("usuario_celular"); ?>
                        </div>
                    </div>

                    <div class="form-group <?php if (form_error('usuario_fechanacido')) { ?> has-danger <?php } ?> row">
                        <div class="col-sm-2">
                            <label class="col-form-label text-dark" for="usuario_fechanacido">Fecha de nacimiento</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="date" name="usuario_fechanacido" value="<?php echo set_value('usuario_fechanacido', $profile->usuario_fechanacido !== "0000-00-00" ? $profile->usuario_fechanacido : ""); ?>" placeholder="Escriba el número de celular" id="usuario_fechanacido" class="form-control <?php if (form_error('usuario_fechanacido')) { ?> form-control-danger <?php } ?>">
                            <div class="input-group"></div>
                            <?php echo form_error("usuario_fechanacido"); ?>
                        </div>
                    </div>

                    <?php
                    $profesion = explode(',', $profile->profesion_id);
                    ?>
                    <div class="form-group <?php if (form_error('userprofe_profesion[]')) { ?> has-danger <?php } ?> row">
                        <div class="col-sm-2">
                            <label class="col-form-label text-dark" for="userprofe_profesion">Profesión <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icofont icofont-hat-alt"></i></span>
                                <select name="userprofe_profesion[]" id="userprofe_profesion" class="js-example-basic-multiple-limit form-control <?php if (form_error('userprofe_profesion[]')) { ?> form-control-danger <?php } ?>" multiple="multiple">
                                    <?php if (!empty($all_profesiones)) { ?>
                                        <option value="">Seleccione una(s) profesiones</option>
                                        <?php foreach ($all_profesiones as $prof) { ?>
                                            <option value="<?php echo $prof->profesion_id; ?>" <?= set_select('userprofe_profesion[]', $prof->profesion_id, in_array($prof->profesion_id, $profesion) ? TRUE : FALSE); ?>><?php echo ucfirst(strtolower($prof->profesion_nombre)); ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <?php echo form_error("userprofe_profesion[]"); ?>
                        </div>
                    </div>

                    <div class="form-group <?php if (form_error('archivo_pdf')) { ?> has-danger <?php } ?> row">
                        <div class="col-sm-2">
                            <label class="col-form-label text-dark" for="archivo_pdf">Hoja de vida <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-sm-10">
                            <input type="file" name="archivo_pdf" class="dropify form-control <?php if (form_error('archivo_pdf')) { ?> form-control-danger <?php } ?>" data-default-file="<?= base_url('archivos/hoja_de_vida/') . $profile->archivo_pdf ?>" accept=".pdf" data-allowed-file-extensions="pdf" data-max-file-size="4M" />
                            <div class="input-group"></div>
                            <?php if(isset($error_file))  echo $error_file; ?>
                        </div>
                    </div>

                    <div class="form-group <?php if (form_error('lider_id')) { ?> has-danger <?php } ?> row">
                        <div class="col-sm-2">
                            <label class="col-form-label text-dark" for="lider_id">Lider <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-sm-10">
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
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2"></label>
                        <div class="col-sm-10">
                            <div class="col-form-label text-dark mb-3">Los campos marcados con (<span class="text-danger">*</span>) son obligatorios.</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary m-b-0">Guardar</button>
                        </div>
                    </div>
                    <?php
                    form_close();
                    ?>
                    <!-- ./ Formulario -->

                </div>
            </div>
        </div>
    </div>
</div>