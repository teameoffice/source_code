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
                        <div class="page-title">Alur Surat</div> 

                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                              <a href="<?php echo site_url("workflow/add_workflow/"); ?> "
                                 class="btn-floating btn-medium waves-effect waves-light right">
                                 <i class="material-icons">add</i></a>
                                <span class="card-title">Data Workflow</span> 
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                       <tr>
                                            <th>ID</th>
                                            <th>Nama Alur</th>
                                            <th>Jumlah Urutan Surat</th>
                                            <th>Date Created</th>
                                            <th>Date Upload</th>
                                            <th width= "200">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Alur</th>
                                            <th>Jumlah Urutan Surat</th>
                                            <th>Date Created</th>
                                            <th>Date Upload</th>
                                            <th width= "200">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
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