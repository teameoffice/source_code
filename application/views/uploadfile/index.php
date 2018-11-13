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
            <?php  $this->load->view("front/common/common_header"); ?>

            <?php  $this->load->view("front/common/common_sidebar"); ?>

            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">File Upload</div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <form class="col s12" action="" method="post" enctype="multipart/form-data">

                                      <div class="row">


                                          <div class="col s12 m12 l6">


                                            <div class="input-field col s6">
                                                <!-- <i class="material-icons prefix">account_circle</i> -->
                                                <input id="icon_prefix" type="text" class="validate" name="no_dokumen">
                                                <label for="icon_prefix" class="">Nomer Dokumen *</label>
                                            </div>



                                          </div>



                                      </div>

                                      <div class="row">


                                          <div class="col s12 m12 l6">


                                            <div class="input-field col s6">
                                                <!-- <i class="material-icons prefix">account_circle</i> -->
                                                <input id="icon_prefix" type="text" class="validate" name="nama_dokumen">
                                                <label for="icon_prefix" class="">Nama Dokumen *</label>
                                            </div>



                                          </div>


                                          <div class="col s12 m12 l6">

                                            <div class="input-field col m6 s12">
                                                  <label for="">Tanggal Dokumen *</label>
                                                  <input name="tanggal_dokumen" type="date" class="datepicker required">
                                            </div>


                                          </div>



                                      </div>

                                      <div class="row">

                                        <div class="col s12 m12 l6">


                                              <div class="input-field col s12">
                                                <textarea id="textarea1" class="materialize-textarea" name="deskripsi" length="120" style="height: 21.2px;"></textarea>
                                                <label for="textarea1" class="active">Deskripsi *</label>
                                                <span class="character-counter" style="float: right; font-size: 12px; height: 1px;"></span>

                                              </div>

                                          </div>

                                      </div>
                                          
                                        <div class="row">

                                          <div class="col s12 m12 l6">
                                              <div class="card">
                                                  <div class="card-content">
                                                    <div class="file-field input-field">
                                                            <div class="btn teal lighten-1">
                                                                <span>File *</span>
                                                                <input type="file" name="file">
                                                            </div>
                                                            <div class="file-path-wrapper">
                                                                <input class="file-path validate" type="text">
                                                            </div>
                                                    </div>
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="col s12 m12 l6">
                                              <div class="card">
                                                  <div class="card-content">
                                                      <span class="card-title">Pilih Kategori *</span>
                                                      <select class="js-states browser-default" tabindex="-1" style="width: 100%" name="id_kategori">
                                                              <option value="" disabled selected>Pilih Kategori</option>
                                                              <?php foreach($kategori as $kat){?>
                                                                <option value="<?php echo $kat->id; ?>"><?php echo $kat->nama_kategori; ?></option>
                                                              <?php } ?>
                                                      </select>
                                                  </div>
                                              </div>
                                          </div>

                                        </div>
                                        <div class="row">
                                           <div class="col s12 m12 l6">
                                              <div class="card">
                                                  <div class="card-content">
                                                      <span class="card-title">Pilih Alur Surat *</span>
                                                      <select class="js-states browser-default" tabindex="-1" style="width: 100%" name="id_workflow" >
                                                          <option value="" disabled selected>Pilih Alur Surat</option>
                                                          <?php foreach($workflow as $alur){?>
                                                              <option value="<?php echo $alur->id; ?>"><?php echo $alur->nama_workflow; ?></option>
                                                          <?php } ?>
                                                      </select>
                                                  </div>
                                              </div>
                                          </div>
                                         <div class="col s12 m12 l6">
                                              <div class="card">
                                                  <div class="card-content">
                                                      <span class="card-title">Pilih Jenis Surat*</span>
                                                      <select class="js-states browser-default" tabindex="-1" style="width: 100%" name="jenissurat">
                                                            <option value="" disabled selected>Pilih Jenis Surat</option>
                                                          <?php foreach($jenissurat as $surat){?>
                                                              <option value="<?php echo $surat->deskripsi; ?>"><?php echo $surat->deskripsi; ?></option>
                                                          <?php } ?>
                                                      </select>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button type="submit" name="submit" class="btn-floating btn-large waves-effect waves-light right tooltipped" data-position="bottom" data-delay="50" data-tooltip="Upload"><i class="material-icons">save</i></button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
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