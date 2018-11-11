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
            <?php  $this->load->view("front/common/common_header"); ?>

            <?php  $this->load->view("front/common/common_sidebar"); ?>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title"></div> 

                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">SURAT MASUK</span> 
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nomor Dokumen</th>
                                            <th>Nama Dokumen</th>
                                            <th>Nama Alur</th>
                                            <th>Nama File</th>
                                            <th>Disetujui</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php foreach($dokumen as $doc){?>
                                        <tr>
                                            <td><?php echo $doc->id; ?></td>
                                            <td>

                                                <?php echo anchor('suratkeluar/detailsurat/'.$doc->id, $doc->no_dokumen, 'title="Lebih Rinci"'); ?>

                                            </td>
                                            <td><?php echo $doc->nama_dokumen; ?></td>
                                            <td><?php echo $doc->id_workflow; ?></td>
                                            <td><?php echo $doc->file_name; ?></td>
                                            <td><?php echo $doc->modifikasi; ?></td>
                                            <td>
                                                <a href="<?php echo site_url("suratmasuk/disposisi/".$doc->uniqid_doc); ?>" onclick="return confirm('Surat masuk memerlukan diposisi, klik OK untuk lanjut')" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Kirim" >
                                                <i class="material-icons">send</i></a>
                                                &nbsp;&nbsp;&nbsp;&emsp;
                                                <?php 
                                                if($doc->file_name!=""){
                                                $file = $this->config->item('base_url')."images/".$doc->file_name;?><?php } ?>
                                               <a href="<?php echo $file; ?>" download class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Unduh"><i class="material-icons">cloud_download</i></a>
                                               &nbsp;&nbsp;&nbsp;&emsp;

                                               <a href="<?php echo site_url("suratmasuk/delete/".$doc->id); ?>" onclick="return confirm('Yakin akan menghapus?')" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Hapus"> 

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
        <?php



        if(isset($error) && $error!=""){echo $error; } ?>


        
    </body>
</html>