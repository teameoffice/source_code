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
                        <div class="page-title">Tambah Personel</div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <form class="col s12" action="" method="post">
                                        <div class="row">
                                            <div class="input-field col s4">    
                                                <label for="nama">Nama</label><br>                                         
                                                <input placeholder="Nama" id="nama" type="text" class="validate" name="nama">
                                                
                                            </div>
                                            <div class="input-field col s4">
                                                <div class="col s12">
                                                    <label for="tanggal_lahir">Tanggal Lahir</label><br>
                                                    <input id="tanggal_lahir" type="text" class="datepicker">
                                                </div>
                                            </div>
                                            <div class="input-field col s4">    
                                                <label for="nrp">NRP</label> <br/>                                           
                                                <input placeholder="NRP" id="nrp" type="text" class="validate" name="nrp">
                                                
                                            </div>

                                             
  
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s4"> 
                                                 <label for="jenis_kelamin">Jenis Kelamin</label><br>                                              
                                                  <select name="jenis_kelamin">
                                                    <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                                                    <option value="Pria">Pria</option>
                                                    <option value="Wanita">Wanita</option>
                                                </select>
                                            </div>
                                            <div class="input-field col s4">
                                                <label for="pangkat">Pangkat</label>    
                                               <br/>
                                               <select name="pangkat">
                                                    <option value="" disabled selected>-- Pilih Pangkat --</option>
                                                    <option value="Prada">Prada</option>
                                                    <option value="Pratu">Pratu</option>
                                                    <option value="Praka">Praka</option>
                                                    <option value="Kopda">Kopda</option>
                                                    <option value="Koptu">Koptu</option>
                                                    <option value="Kopka">Kopka</option>
                                                    <option value="Serda">Serda</option>
                                                    <option value="Sertu">Sertu</option>
                                                    <option value="Serka">Serka</option>
                                                    <option value="Serma">Serma</option>
                                                    <option value="Pelda">Pelda</option>
                                                    <option value="Peltu">Peltu</option>
                                                    <option value="Letda">Letda</option>
                                                    <option value="Lettu">Lettu</option>
                                                    <option value="Kapten">Kapten</option>
                                                    <option value="Mayor">Mayor</option>
                                                    <option value="Letkol">Letkol</option>
                                                    <option value="Kolonel">Kolonel</option>
                                                    <option value="Brigjen">Brigjen</option>
                                                    <option value="Mayjend">Mayjend</option>
                                                    <option value="Letjend">Letjend</option>
                                                    <option value="Jendral">Jendral</option>
                                                    <option value="Laksma">Laksma</option>
                                                    <option value="Laksda">Laksda</option>
                                                    <option value="Laksdya">Laksdya</option>
                                                    <option value="Laksamana">Laksamana</option>
                                                    <option value="Marsma">Marsma</option>
                                                    <option value="Marsda">Marsda</option>
                                                    <option value="Marsdya">Marsdya</option>
                                                    <option value="Marsekal">Marsekal</option>
                                                </select>
                                            </div>
                                             <div class="input-field col s4">
                                                <label for="korps">Korps</label></br>
                                                <input placeholder="Korps" id="korps" type="text" class="validate" name="korps">
                                                
                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="input-field col s4">
                                               <label for="matra">Matra</label><br>
                                               <select name="matra">
                                                    <option value="" disabled selected>-- Pilih Matra --</option>
                                                    <option value="TNI AD">TNI AD</option>
                                                    <option value="TNI AL">TNI AL</option>
                                                    <option value="TNI AU">TNI AU</option>
                                                </select>
                                           </div>
                                             <div class="input-field col s4">   
                                                <label for="jabatan">Jabatan</label> <br>                                            
                                                <input placeholder="Jabatan" id="jabatan" type="text" class="validate" name="jabatan">
                                                
                                            </div>
                                            <div class="input-field col s4">     
                                                <label for="kesatuan">Kesatuan</label> <br>                                          
                                                <input placeholder="Kesatuan" id="kesatuan" type="text" class="validate" name="kesatuan">
                                                
                                            </div>


                                        </div>
                                        <div class ="row">
                                            <div class="input-field col s4">
                                                <select name="id_user">
                                                    <option value="" disabled selected>Pilih Username</option>
                                                    <?php foreach($user as $user){?>
                                                        <option value="<?php echo $user->user_id; ?>"><?php echo $user->user_name; ?></option>
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
            