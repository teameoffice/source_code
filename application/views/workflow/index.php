<!DOCTYPE html>
<html lang="en">
    <?php  $this->load->view("common/common_head"); ?>
    <body>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/plugins/materialize/css/materialize.min.css"); ?>"> 
        <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/plugins/material-preloader/css/materialPreloader.min.css"); ?>"> 
        <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/plugins/datatables/css/jquery.dataTables.min.css"); ?>"> 

        <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/css/alpha.min.css"); ?>"> 
        <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/css/custom.css"); ?>"> 


        <div class="mn-content fixed-sidebar">
            <?php  $this->load->view("admin/common/common_header"); ?>

            <?php  $this->load->view("admin/common/common_sidebar"); ?>
            <main class="mn-inner inner-active-sidebar">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Alur</div> 

                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                              <a href="<?php echo site_url("workflow/add_workflow/"); ?> "
                                 class="btn-floating btn-medium waves-effect waves-light right">
                                 <i class="material-icons">add</i></a>
                                <span class="card-title">Data Alur</span> 
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                       <tr>
                                            <th>No</th>
                                            <th>Nama Alur</th>
                                            <th>Deskripsi</th>
                                            <th>Date Created</th>
                                            <th>Date Updated</th>
                                            <th width= "200">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Workflow</th>
                                            <th>Deskripsi</th>
                                            <th>Date Created</th>
                                            <th>Date Updated</th>
                                            <th width= "200">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody><?php $no=1; ?>
                                        <?php foreach($workflow as $workflow){?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $workflow->nama_workflow; ?></td>
                                            <td><?php echo $workflow->deskripsi; ?></td>
                                            <td><?php echo date('m F Y / H:i',strtotime($workflow->date_created))?></td>
                                            <td><?php echo date('m F Y / H:i',strtotime($workflow->date_updated))?></td>
                                            <td>
                                                <a href="<?php echo site_url("workflow/edit_workflow/".$workflow->id); ?>">
                                                <i class="material-icons">mode_edit</i></a>
                                                &nbsp;&nbsp;&nbsp;&emsp;
                                               <a href="<?php echo site_url("workflow/delete_workflow/".$workflow->id); ?>" onclick="return confirm('are you sure to delete?')" class=""> 

                                               <!--  <a class="waves-effect waves-light m-b-xs sweetalert-warning"> -->
                                                <i class="material-icons">delete_forever</i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
           <?php  $this->load->view("admin/common/common_footer"); ?>
        </div>
        <div class="left-sidebar-hover"></div>      


        <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/jquery/jquery-2.2.0.min.js"); ?>"></script>
        <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/materialize/js/materialize.min.js"); ?>"></script>
        <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/material-preloader/js/materialPreloader.min.js"); ?>"></script>
        <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/jquery-blockui/jquery.blockui.js"); ?>"></script>
        <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/datatables/js/jquery.dataTables.min.js"); ?>"></script>
        <script src="<?php echo base_url($this->config->item("theme_admin")."/js/alpha.min.js"); ?>"></script>
        <script src="<?php echo base_url($this->config->item("theme_admin")."/js/pages/table-data.js"); ?>"></script>
        
    </body>
</html>