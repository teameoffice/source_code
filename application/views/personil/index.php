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
                        <div class="page-title">PERSONEL</div> 

                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                              <a href="<?php echo site_url("personil/add_personel/"); ?> "
                                 class="btn-floating btn-medium waves-effect waves-light right">
                                 <i class="material-icons">add</i></a>
                                <span class="card-title">Data Personel</span> 
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                       <tr>
                                            <th>No</th>
                                             <th>Nrp</th>
                                            <th>Nama</th>
                                            <th>Pangkat / Korps</th>
                                            <th>Jabatan & Kesatuan</th>
                                             <th>Matra</th>
                                            <th width= "200">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nrp</th>
                                            <th>Nama</th>
                                            <th>Pangkat / Korps</th>
                                            <th>Jabatan & Kesatuan</th>
                                             <th>Matra</th>
                                            <th width= "200">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody><?php $no=1; ?>
                                        <?php foreach($personel as $personel){?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $personel->nrp; ?></td>
                                            <td><?php echo $personel->nama; ?></td>
                                            <td><?php echo $personel->pangkat; ?> / <?php echo $personel->korps ?></td>
                                             <td><?php echo $personel->jabatan; ?> , <?php echo $personel->kesatuan ?></td>
                                              <td><?php echo $personel->matra ?></td>
                                           
                                            <td>
                                                <a href="<?php echo site_url("personil/edit_personel/".$personel->id); ?>">
                                                <i class="material-icons">mode_edit</i></a>
                                                &nbsp;&nbsp;&nbsp;&emsp;
                                               <a href="<?php echo site_url("personil/delete_personel/".$personel->id); ?>" onclick="return confirm('are you sure to delete?')" class=""> 

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