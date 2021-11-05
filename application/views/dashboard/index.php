<div class="page-header">
    <div class="page-header-title">
        <h4>Inicio</h4>
    </div>
    <div class="page-header-breadcrumb">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('dashboard');?>">
                    <i class="icofont icofont-home"></i> Inicio
                </a>
            </li>
            <!-- <li class="breadcrumb-item"><a href="#!">Inicio</a>
                                                </li> -->
            <!-- <li class="breadcrumb-item"><a href="#!">Project</a>
                                                </li> -->
        </ul>
    </div>
</div>
<div class="page-body">
    <div class="row">

        <div class="col-md-6 col-xl-3">
            <div class="card client-blocks dark-primary-border">
                <div class="card-block">
                    <h5>Candidatos</h5>
                    <ul>
                        <li>
                            <!-- <i class="icofont icofont-document-folder"></i> -->
                            <i class="icofont icofont-ui-user-group"></i>
                        </li>
                        <li class="text-right">
                            133
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="col-md-6 col-xl-3">
            <div class="card client-blocks warning-border">
                <div class="card-block">
                    <h5>Hojas de vida</h5>
                    <ul>
                        <li>
                            <i class="icofont icofont-document-folder text-warning"></i>
                            <!-- <i class="icofont icofont-ui-user-group text-warning"></i> -->
                        </li>
                        <li class="text-right text-warning">
                            23
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="col-md-6 col-xl-3">
            <div class="card client-blocks success-border">
                <div class="card-block">
                    <h5>Lideres</h5>
                    <ul>
                        <li>
                            <i class="icofont icofont-king-crown text-success"></i>
                        </li>
                        <li class="text-right text-success">
                            240
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="col-md-6 col-xl-3">
            <div class="card client-blocks">
                <div class="card-block">
                    <h5>Profesiones</h5>
                    <ul>
                        <li>
                            <i class="icofont icofont-graduate-alt text-primary"></i>
                        </li>
                        <li class="text-right text-primary">
                            169
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="col-md-12 col-xl-8">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-primary btn-sm">Week</button>
                    <button class="btn btn-primary btn-sm">Month</button>
                    <button class="btn btn-primary btn-sm">Year</button>
                </div>
                <div class="card-block">
                    <div id="morris-extra-area" style="height:470px;"></div>
                </div>
            </div>
        </div>


        <div class="col-md-12 col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h5>Create Your Daily Task</h5>
                    <label class="label label-success">Today</label>
                </div>
                <div class="card-block">
                    <div class="input-group input-group-button">
                        <input type="text" class="form-control add_task_todo" placeholder="Create your task list" name="task-insert">
                        <span class="input-group-addon" id="basic-addon1">
                            <button id="add-btn" class="btn btn-primary">Add Task</button>
                        </span>
                    </div>
                    <div class="new-task">
                        <div class="to-do-list">
                            <div class="checkbox-fade fade-in-primary">
                                <label class="check-task">
                                    <input type="checkbox" value="">
                                    <span class="cr">
                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                    </span>
                                    <span>Hey.. Attach your new file</span>
                                </label>
                            </div>
                            <div class="f-right">
                                <a href="#!" class="delete_todolist"><i class="icofont icofont-ui-delete"></i></a>
                            </div>
                        </div>
                        <div class="to-do-list">
                            <div class="checkbox-fade fade-in-primary">
                                <label class="check-task">
                                    <input type="checkbox" value="">
                                    <span class="cr">
                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                    </span>
                                    <span>New Attachment has error</span>
                                </label>
                            </div>
                            <div class="f-right">
                                <a href="#!" class="delete_todolist"><i class="icofont icofont-ui-delete"></i></a>
                            </div>
                        </div>
                        <div class="to-do-list">
                            <div class="checkbox-fade fade-in-primary">
                                <label class="check-task">
                                    <input type="checkbox" value="">
                                    <span class="cr">
                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                    </span>
                                    <span>Have to submit early</span>
                                </label>
                            </div>
                            <div class="f-right">
                                <a href="#!" class="delete_todolist"><i class="icofont icofont-ui-delete"></i></a>
                            </div>
                        </div>
                        <div class="to-do-list">
                            <div class="checkbox-fade fade-in-primary">
                                <label class="check-task">
                                    <input type="checkbox" value="">
                                    <span class="cr">
                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                    </span>
                                    <span>10 pages has to be completed</span>
                                </label>
                            </div>
                            <div class="f-right">
                                <a href="#!" class="delete_todolist"><i class="icofont icofont-ui-delete"></i></a>
                            </div>
                        </div>
                        <div class="to-do-list">
                            <div class="checkbox-fade fade-in-primary">
                                <label class="check-task">
                                    <input type="checkbox" value="">
                                    <span class="cr">
                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                    </span>
                                    <span>Navigation working</span>
                                </label>
                            </div>
                            <div class="f-right">
                                <a href="#!" class="delete_todolist"><i class="icofont icofont-ui-delete"></i></a>
                            </div>
                        </div>
                        <div class="to-do-list">
                            <div class="checkbox-fade fade-in-primary">
                                <label class="check-task">
                                    <input type="checkbox" value="">
                                    <span class="cr">
                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                    </span>
                                    <span>Files submited successfully</span>
                                </label>
                            </div>
                            <div class="f-right">
                                <a href="#!" class="delete_todolist"><i class="icofont icofont-ui-delete"></i></a>
                            </div>
                        </div>
                        <div class="to-do-list">
                            <div class="checkbox-fade fade-in-primary">
                                <label class="check-task">
                                    <input type="checkbox" value="">
                                    <span class="cr">
                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                    </span>
                                    <span>Work Complete Before Time</span>
                                </label>
                            </div>
                            <div class="f-right">
                                <a href="#!" class="delete_todolist"><i class="icofont icofont-ui-delete"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>