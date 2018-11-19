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
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title"></div> 

                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">SURAT KELUAR ADMIN</span> 
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Dokumen</th>
                                            <th>Nama Dokumen</th>
                                            <th>Nama Alur</th>
                                            <th>Nama File</th>
                                            <th>Disetujui</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                   <tbody>
                                        <?php $no=1; ?>
                                        <?php foreach ($distinct as $disuniq){ ?>
                                            
                                            <?php $data = array(); ?>
                                            <?php $data = $this->dokumen_model->get_dokumen_by_flag_and_jenissurat_keluar_and_uniqid($disuniq->uniqid_doc); ?>
                                            <?php $workflow = array(); ?>
                                            <?php $workflow = $this->workflow_model->get_workflow_by_id($data->id_workflow); ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td>
                                                <?php echo anchor('suratmasukadmin/detailsurat/'.$data->id, $data->no_dokumen, 'title="Lebih Rinci"'); ?>
                                            </td>
                                            <td><?php echo $data->nama_dokumen?></td>
                                            <td><?php echo $workflow->nama_workflow?></td>
                                            <td><?php echo $data->file_name?></td>
                                            <td><?php echo $data->modifikasi?></td>
                                            <td>
                                                <a href="">
                                                <i class="material-icons">mode_edit</i></a>
                                                &nbsp;&nbsp;&nbsp;&emsp;
                                               <a href="" onClick="return confirm('are you sure to delete?')" class=""> 

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
           <?php  $this->load->view("front/common/common_footer"); ?>
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