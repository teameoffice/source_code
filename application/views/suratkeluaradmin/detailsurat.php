<!DOCTYPE html>
<html lang="en">
    <?php  $this->load->view("common/common_head"); ?>
    <body>
        
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/plugins/materialize/css/materialize.min.css"); ?>"> 
        <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/plugins/material-preloader/css/materialPreloader.min.css"); ?>"> 

        <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/plugins/sweetalert/sweetalert.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/plugins/dropzone/dropzone.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/plugins/dropzone/basic.min.css"); ?>"
        >
        <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/plugins/select2/css/select2.css"); ?>">

        <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/plugins/sweetalert/sweetalert.css"); ?>">

        <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/css/alpha.min.css"); ?>"> 
        <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/css/custom.css"); ?>"> 



        <div class="mn-content fixed-sidebar">
            <?php  $this->load->view("admin/common/common_header"); ?>

            <?php  $this->load->view("admin/common/common_sidebar"); ?>

            <main class="mn-inner">
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                Detail Dokumen / Surat.
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <form class="col s12" action="<?php echo site_url("suratkeluaradmin/index")?>">

                                      <div class="row">


                                          <div class="col s12 m12 l6">


                                            <div class="input-field col s6">
                                                <label for="icon_prefix" class="">Nomer Dokumen *</label>
                                                <input id="icon_prefix" type="text" class="validate" name="no_dokumen" value="<?php echo $dokumen->no_dokumen; ?>" disabled>
                                            </div>



                                          </div>



                                      </div>

                                      <div class="row">


                                          <div class="col s12 m12 l6">


                                            <div class="input-field col s6">
                                                <label for="icon_prefix" class="">Nama Dokumen *</label>
                                                <input id="icon_prefix" type="text" class="validate" name="nama_dokumen" value="<?php echo $dokumen->nama_dokumen; ?>" disabled>


                                            </div>



                                          </div>


                                          <div class="col s12 m12 l6">

                                            <div class="input-field col m6 s12">
                                                  <label for="">Tanggal Dokumen *</label>
                                                  <input name="tanggal_dokumen" type="text" value="<?php echo $dokumen->tanggal_dokumen; ?>" disabled>
                                            </div>


                                          </div>



                                      </div>

                                      <div class="row">

                                        <div class="col s12 m12 l6">

                                              <label for="textarea1" class="active">Deskripsi *</label>
                                              <div class="input-field col s12">
                                                <textarea id="textarea1" class="materialize-textarea" name="deskripsi" value="" disabled><?php echo $dokumen->deskripsi; ?></textarea>

                                                

                                              </div>

                                          </div>

                                      </div>
                                          
                                        <div class="row">

                                          <div class="col s12 m12 l6">
                                              <div class="card">
                                                  <div class="card-content">
                                                    <div class="file-field input-field">
                                                            <div class="btn teal lighten-1">
                                                               <span>

                                                              <?php 
                                                              if($dokumen->file_name!=""){
                                                              $file = $this->config->item('base_url')."images/".$dokumen->file_name;?><?php } ?>
                                                                   <a href="<?php echo $file; ?>" download class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Unduh"><i class="material-icons">cloud_download</i>
                                                                   </a>
                                                              </span>
                                                                
                                                            </div>
                                                            <div class="file-path-wrapper">
                                                                <input class="file-path validate" type="text" value="<?php echo $dokumen->file_name; ?>" disabled>
                                                            </div>
                                                    </div>
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="col s12 m12 l6">
                                              <div class="card">
                                                  <div class="card-content">
                                                      <span class="card-title"> Kategori *</span>
                                                      <input name="" type="text" value="<?php echo $kategori->nama_kategori; ?>" disabled>
                                                  </div>
                                              </div>
                                          </div>

                                        </div>
                                        <div class="row">
                                           <div class="col s12 m12 l6">
                                              <div class="card">
                                                  <div class="card-content">
                                                      <span class="card-title">Alur Surat *</span>
                                                      <input name="" type="text" value="<?php echo $workflow->nama_workflow; ?>" disabled>
                                                  </div>
                                              </div>
                                          </div>
                                         <div class="col s12 m12 l6">
                                              <div class="card">
                                                  <div class="card-content">
                                                      <span class="card-title">Jenis Surat*</span>
                                                      <input name="" type="text" value="<?php echo $dokumen->jenissurat; ?>" disabled>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button type="" name="" class="btn-floating btn-large waves-effect waves-light right tooltipped" data-position="bottom" data-delay="50" data-tooltip="Kembali"><i class="material-icons">keyboard_backspace</i></button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
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
  
        <script src="<?php echo base_url($this->config->item("theme_admin")."/js/alpha.min.js"); ?>"></script>


        <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/dropzone/dropzone.min.js"); ?>"></script>
        <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/dropzone/dropzone-amd-module.min.js"); ?>"></script>
        <script src="<?php echo base_url($this->config->item("theme_admin")."/js/pages/form_elements.js"); ?>"></script>

        <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/select2/js/select2.min.js"); ?>"></script>\
        <script src="<?php echo base_url($this->config->item("theme_admin")."/js/pages/form-select2.js"); ?>"></script>

        <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/sweetalert/sweetalert.min.js"); ?>"></script>


          <script>
            $(document).ready(function(){
                $('#tanggal_dokumen').pickadate({
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