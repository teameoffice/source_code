<!DOCTYPE html>
<html lang="en">
    <?php  $this->load->view("common/common_head"); ?>
    <body>
        
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/plugins/materialize/css/materialize.min.css"); ?>"> 
        <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/plugins/material-preloader/css/materialPreloader.min.css"); ?>"> 
        <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/plugins/datatables/css/jquery.dataTables.min.css"); ?>"> 

        <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/plugins/sweetalert/sweetalert.css"); ?>">

        <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/css/alpha.min.css"); ?>"> 
        <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/css/custom.css"); ?>"> 



        <div class="mn-content fixed-sidebar">
            <?php  $this->load->view("admin/common/common_header"); ?>
            <?php  $this->load->view("admin/common/common_sidebar"); ?>
            <main class="mn-inner">
                    <div class="col s12">
                        <div class="page-title"></div> 

                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                              <a href="<?php echo site_url("kategori/add_kategori/"); ?>"
                                 class="btn-floating btn-medium waves-effect waves-light right">
                                 <i class="material-icons">add</i></a>
                                <span class="card-title"></span> 
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kategori</th>
                                            <th>Deskripsi</th>
                                            <th>Date Created</th>
                                            <th>Date Updated</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                     <tfoot>
                                         <tr>
                                            <th>No</th>
                                            <th>Nama Kategori</th>
                                            <th>Deskripsi</th>
                                            <th>Date Created</th>
                                            <th>Date Updated</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody><?php $no=1; ?>
                                       <?php foreach($kategori as $kategori){?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $kategori->nama_kategori; ?></td>
                                            <td><?php echo $kategori->deskripsi; ?></td>
                                            <td><?php echo date('m F Y / H:i',strtotime($kategori->date_created))?></td>
                                            <td><?php echo date('m F Y / H:i',strtotime($kategori->date_updated))?></td>
                                            <td>
                                                <a href="<?php echo site_url("kategori/edit_kategori/".$kategori->id); ?>">
                                                <i class="material-icons">mode_edit</i></a>
                                                &nbsp;&nbsp;&nbsp;&emsp;
                                               <a href="<?php echo site_url("kategori/delete_kategori/".$kategori->id); ?>" onclick="return confirm('are you sure to delete?')" class=""> 

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

        <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/sweetalert/sweetalert.min.js"); ?>"></script>


        <script>
        $(function () {
          
          $("body").on("change",".tgl_checkbox",function(){
              var table = $(this).data("table");
              var status = $(this).data("status");
              var id = $(this).data("id");
              var id_field = $(this).data("idfield");
              var bin=0;
              if($(this).is(':checked')){
                  bin = 1;
              }
              $.ajax({
                method: "POST",
                url: "<?php echo site_url("admin/change_status"); ?>",
                data: { table: table, status: status, id : id, id_field : id_field, on_off : bin }
              })
                .done(function( msg ) {
                  //alert(msg);
                }); 
          });
        });
       </script>


      <script> 
        // this code for next development using ajax. i hope so
        $(document).ready(function() {  
          document.querySelector('.sweetalert-warning').onclick = function(){
                swal({   
                    title: "Anda yakin?",
                    text: "Anda tidak bisa mengembalikan data yang terhapus!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Tidak !",
                    closeOnConfirm: false,
                    closeOnCancel: false 
                }, function(isConfirm){
                    if (isConfirm) {
                        swal("Terhapus!", "Data anda terhapus.", "success");
                        <?php //echo site_url("users/delete_user/".$user->user_id); ?>
                    } else {
                        swal("Dibatalkan", "Data anda aman :)", "error");
                    }
                });
            };
          
        });

      </script>
        
    </body>
</html>