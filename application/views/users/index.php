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
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Pengguna</div> 

                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                              <a href="<?php echo site_url("users/add_user/"); ?> "
                                 class="btn-floating btn-medium waves-effect waves-light right">
                                 <i class="material-icons">add</i></a>
                                <span class="card-title">Data Pengguna</span> 
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Tipe User</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Tipe User</th>
                                            <th>Status</th>
                                            <th width= "200">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($users as $user){?>
                                        <tr>
                                            <td><?php echo $user->user_id; ?></td>
                                            <td><?php echo $user->user_name; ?></td>
                                            <td><?php if($user->user_type_id=="1"){ echo "Front User"; } else echo "Admin" ?></td>
                                            <td>
                                                <div class="switch m-b-md ">
                                                    <label for='cb_<?php echo $user->user_id; ?>'>
                                                      <input type="checkbox" class="tgl_checkbox"
                                                       data-table="users" 
                                                       data-status="user_status" 
                                                       data-idfield="user_id"
                                                       data-id="<?php echo $user->user_id; ?>" 
                                                       id='cb_<?php echo $user->user_id; ?>'
                                                       <?php echo ($user->user_status==1)? "checked" : ""; ?>
                                                        >
                                                      <span class="lever"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="<?php echo site_url("users/edit_user/".$user->user_id); ?>">
                                                <i class="material-icons">mode_edit</i></a>
                                                &nbsp;&nbsp;&nbsp;&emsp;
                                               <a href="<?php echo site_url("users/delete_user/".$user->user_id); ?>" onclick="return confirm('are you sure to delete?')" class=""> 

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