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
            <?php  $this->load->view("front/common/common_header"); ?>

            <?php  $this->load->view("front/common/common_sidebar"); ?>           
		   
		      <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">PROFILE</div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <form class="col s12" action="" method="post">
                                        <div class="row">
                                            <div class="input-field col s4">                                               
                                                <input placeholder="Nama" id="nama" type="text" class="validate" name="nama" value="<?php echo $personel->nama?>" disabled>
                                                <label for="nama">Nama</label>
                                            </div>

                                            <div class="input-field col s4">
                                                <input placeholder="Pangkat" id="pangkat" type="text" class="validate" name="pangkat" value="<?php echo $personel->pangkat?>" disabled>
                                                 <label for="nama">Pangkat</label>
                                            </div>
                                             <div class="input-field col s4">
                                                <input placeholder="Korps" id="korps" type="text" class="validate" name="korps" value="<?php echo $personel->korps?>" disabled>
                                                <label for="korps">Korps</label>
                                            </div>
                            
                                            <div class="input-field col s4">
                                                <label for="korps">Jenis Kelamin</label><br>
                                                <input placeholder="jenis_kelamin" id="jenis_kelamin" type="text" class="validate" name="jenis_kelamin" value="<?php echo $personel->jenis_kelamin?>" disabled>
                                                
                                            </div>
                                                <div class="input-field col s4">
                                                    <label for="tanggal_lahir">Tanggal Lahir</label><br>
                                                    <input type="text" value="<?php echo $personel->tanggal_lahir?>" disabled>
                                              </div>

                                            <div class="input-field col s4">
                                                 <label for="korps">Matra</label><br>
                                                <input placeholder="matra" id="jenis_kelamin" type="text" class="validate" name="matra" value="<?php echo $personel->matra?>" disabled>
                                               
                                            </div>

                                        <div class="row">
                                             <div class="input-field col s4">      
                                              <label for="jabatan">Jabatan</label><br>                     
                                                <input placeholder="Jabatan" id="jabatan" type="text" class="validate" name="jabatan" value="<?php echo $personel->jabatan?>" disabled>
                                           
                                            </div>
                                            <div class="input-field col s4">     
                                             <label for="kesatuan">Kesatuan</label><br>                     
                                             <input placeholder="Kesatuan" id="kesatuan" type="text" class="validate" name="kesatuan"value="<?php echo $personel->kesatuan?>" disabled>
                                              
                                            </div>
                                            <div class="input-field col s4">
                                                <label for="nrp">NRP</label> <br>
                                                <input placeholder="Kesatuan" id="nrp" type="text" class="validate" name="nrp"value="<?php echo $personel->nrp?>" disabled>
                                                
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
            