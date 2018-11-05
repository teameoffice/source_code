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
                        <div class="page-title">Edit Pengguna</div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <form class="col s12" action="" method="post">
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input placeholder="Username" id="username" type="text" class="validate" name="user_name" value="<?php echo $user->user_name; ?>">
                                                <label for="user_name">Username</label>
                                            </div>
                                            <div class="input-field col s6">
                                               <input placeholder="Password" id="password" type="password" class="validate" name="user_password" value="<?php echo $user->user_password; ?>">
                                                <label for="password">Password</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s3">
                                                <select name="user_type">
                                                    
                                                    <?php foreach($user_types as $user_type){?>
                                                        <option value="<?php echo $user_type->user_type_id; ?>" <?php if($user->user_type_id == $user_type->user_type_id){ echo "selected"; } ?> ><?php echo $user_type->user_type_title; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <p class="p-v-xs">
                                                    <input type="checkbox" class="filled-in" id="filled-in-box-example" checked="checked" name="status" />
                                                    <label for="filled-in-box-example">Status</label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button type="submit" name="submit" class="btn-floating btn-large waves-effect waves-light right"><i class="material-icons">save</i></button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
        </main>
     
		
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

        <? if(isset($error) && $error!=""){echo $error; } ?>
    </body>
</html>
            