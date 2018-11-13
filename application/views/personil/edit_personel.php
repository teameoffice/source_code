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
                        <div class="page-title">Edit Personel</div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <form class="col s12" action="" method="post">
                                        <div class="row">
                                            <div class="input-field col s4">                                               
                                                <input placeholder="Nama" id="nama" type="text" class="validate" name="nama" value="<?php echo $user->nama; ?>">
                                                <label for="nama">Nama</label>
                                            </div>

                                            <div class="input-field col s4">
                                                <div class="col s12">
                                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                                    <input id="tanggal_lahir" value="<?php echo $user->tanggal_lahir; ?>" type="text" class="datepicker">
                                                </div>
                                            </div>

                                            <div class="input-field col s4">                                               
                                                <input placeholder="NRP" id="nrp" type="text" class="validate" name="nrp" value="<?php echo $user->nrp; ?>">
                                                <label for="nrp">NRP</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s4"> 
                                             <label for="jenis_kelamin">Jenis Kelamin</label><br>                                              
                                                  <select name="jenis_kelamin">                                                   
                                                    <option <?php if($user->jenis_kelamin=="Pria"){echo "selected";} ?> value="Pria">Pria</option>
                                                    <option <?php if($user->jenis_kelamin=="Wanita"){echo "selected";} ?> value="Wanita">Wanita</option>
                                                </select>
                                            </div>

                                            <div class="input-field col s4">
                                                <label for="pangkat">Pangkat</label>    
                                               <br/>
                                               <select name="pangkat">
                                                    <option <?php if($user->pangkat=="Prada"){echo "selected";} ?> value="Prada">Prada</option>
                                                    <option <?php if($user->pangkat=="Pratu"){echo "selected";} ?> value="Pratu">Pratu</option>
                                                    <option <?php if($user->pangkat=="Praka"){echo "selected";} ?> value="Praka">Praka</option>
                                                    <option <?php if($user->pangkat=="Kopda"){echo "selected";} ?> value="Kopda">Kopda</option>
                                                    <option <?php if($user->pangkat=="Koptu"){echo "selected";} ?> value="Koptu">Koptu</option>
                                                    <option <?php if($user->pangkat=="Kopka"){echo "selected";} ?> value="Kopka">Kopka</option>
                                                    <option <?php if($user->pangkat=="Serda"){echo "selected";} ?> value="Serda">Serda</option>
                                                    <option <?php if($user->pangkat=="Sertu"){echo "selected";} ?> value="Sertu">Sertu</option>
                                                    <option <?php if($user->pangkat=="Serka"){echo "selected";} ?> value="Serka">Serka</option>
                                                    <option <?php if($user->pangkat=="Serma"){echo "selected";} ?> value="Serma">Serma</option>
                                                    <option <?php if($user->pangkat=="Pelda"){echo "selected";} ?> value="Pelda">Pelda</option>
                                                    <option <?php if($user->pangkat=="Peltu"){echo "selected";} ?> value="Peltu">Peltu</option>
                                                    <option <?php if($user->pangkat=="Letda"){echo "selected";} ?> value="Letda">Letda</option>
                                                    <option <?php if($user->pangkat=="Lettu"){echo "selected";} ?> value="Lettu">Lettu</option>
                                                    <option <?php if($user->pangkat=="Kapten"){echo "selected";} ?> value="Kapten">Kapten</option>
                                                    <option <?php if($user->pangkat=="Mayor"){echo "selected";} ?> value="Mayor">Mayor</option>
                                                    <option <?php if($user->pangkat=="Letkol"){echo "selected";} ?> value="Letkol">Letkol</option>
                                                    <option <?php if($user->pangkat=="Kolonel"){echo "selected";} ?> value="Kolonel">Kolonel</option>
                                                    <option <?php if($user->pangkat=="Brigjen"){echo "selected";} ?> value="Brigjen">Brigjend</option>
                                                    <option <?php if($user->pangkat=="Mayjend"){echo "selected";} ?> value="Mayjend">Mayjend</option>
                                                    <option <?php if($user->pangkat=="Letjend"){echo "selected";} ?> value="Letjend">Letjend</option>
                                                    <option <?php if($user->pangkat=="Jendral"){echo "selected";} ?> value="Jendral">Jendral</option>
                                                </select>
                                            </div>
                                            </br>
                                            <div class="input-field col s4">
                                                <input placeholder="Korps" id="korps" type="text" class="validate" name="korps" value="<?php echo $user->korps; ?>">
                                                <label for="korps">Korps</label>
                                            </div>

                                        </div>
                                             
                                        <div class="row">
                                            <div class="input-field col s4">
                                               <label for="matra">Matra</label></br>
                                               <select name="matra">
                                                    <option <?php if($user->matra=="TNI AD"){echo "selected";} ?> value="TNI AD">TNI AD</option>
                                                    <option <?php if($user->matra=="TNI AL"){echo "selected";} ?> value="TNI AL">TNI AL</option>
                                                    <option <?php if($user->matra=="TNI AU"){echo "selected";} ?> value="TNI AU">TNI AU</option>
                                                </select>
                                           </div>
                    
                                            <br>
                                             <div class="input-field col s4">                                            
                                                <input value="<?php echo $user->jabatan; ?>" placeholder="Jabatan" id="jabatan" type="text" class="validate" name="jabatan">
                                                <label for="jabatan">Jabatan</label>
                                            </div>
                                            <div class="input-field col s4">                                               
                                                <input value="<?php echo $user->kesatuan; ?>" placeholder="Kesatuan" id="kesatuan" type="text" class="validate" name="kesatuan">
                                                <label for="kesatuan">Kesatuan</label>
                                            </div>

                                        </div>

                                            <div class="input-field col s4">
                                                <select name="id_user">
                                                    <?php foreach($username as $username){ ?>
                                                        <option value="<?php echo $username->user_id; ?>" <?php if($user->id_user == $username->user_id){ echo "selected"; } ?>><?php echo $username->user_name; ?></option>
                                                    <?php } ?>
                                                </select>
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
         <script src="<?php echo base_url($this->config->item("theme_admin")."/js/pages/form_elements.js");?>"></script>
          <script>
            $(document).ready(function(){
                $('#tanggal_lahir').pickadate({
                    selectMonths: true, // Creates a dropdown to control month
                    changeYear:true,
                    yearRange: "1960:2020"
                });

                $('input.autocomplete').autocomplete({
                    data: {
                        "Apple": null,
                        "Microsoft": null,
                        "Google": 'assets/images/google.png'
                    }
                });
            });
        </script>

        <? if(isset($error) && $error!=""){echo $error; } ?>
       
    </body>
</html>
            