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


            <?php if (empty($disposisi)) {
            ?>

                <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Lembar Disposisi</div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <form class="col s12" action="" method="post" enctype="multipart/form-data">

                                      <div class="row">
                                          <div class="col s4 m4 l6">
                                            <div class="input-field col s6">
                                                <label for="icon_prefix" class="">Nomor Agd *</label>
                                                <input id="icon_prefix" type="text" class="validate" name="no_agd">
                                                
                                            </div>
                                          </div>
                                      </div>
                                          
                                        <div class="row">

                                          <div class="col s12 m12 l6">
                                              <div class="card">
                                                  <div class="card-content">
                                                    <div class="file-field input-field">
                                                       
                                                            <label for="icon_prefix" class="">Terima Dari *</label>
                                                            <input id="icon_prefix" type="text" class="validate" name="terima_dari">
                                                        
                                                    </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col s12 m12 l6">
                                              <div class="card">
                                                  <div class="card-content">
                                                    <div class="file-field input-field">
                                                            <input id="icon_prefix" type="text" class="validate" name="no_surat">
                                                            <label for="icon_prefix" class="">No Surat / Tanggal *</label>
                                                        
                                                    </div>
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="col s12 m12 l6">
                                              <div class="card">
                                                  <div class="card-content">
                                                      <span class="card-title">Pilih Kategori *</span>
                                                      <select class="js-states browser-default" tabindex="-1" style="width: 100%" name="klasifikasi">
                                                              <option value="" disabled selected>Pilih Kategori</option>
                                                              <?php foreach($kategori as $kat){?>
                                                                <option value="<?php echo $kat->nama_kategori; ?>"><?php echo $kat->nama_kategori; ?></option>
                                                              <?php } ?>
                                                      </select>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col s12 m12 l6">
                                              <div class="card">
                                                  <div class="card-content">
                                                    <div class="file-field input-field">
                                                            <label for="icon_prefix" class="">Perihal *</label>
                                                            <input id="icon_prefix" type="text" class="validate" name="perihal">    
                                                    </div>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                        <hr/>

                                        <div class="row">
                                          <div class="col s12 m12 l6">
                                              <div class="card">
                                                  <div class="card-content">
                                                    <div class="file-field input-field">
                                                       
                                                      <select class="js-states browser-default" tabindex="-1" style="width: 100%" name="id_diteruskan_kepada">
                                                              <option value="" disabled selected>Diteruskan kepada *</option>
                                                              <?php foreach($diteruskan_kepada as $kep){?>
                                                                <option value="<?php echo $kep->id; ?>"><?php echo $kep->nama; ?></option>
                                                              <?php } ?>
                                                      </select>
                                                        
                                                    </div>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col s12 m12 l6">

                                            <div class="input-field col m6 s12">
                                                  <label for="">Tanggal *</label>
                                                  <input name="tanggal_terusan" type="date" class="datepicker required">
                                            </div>


                                          </div>

                                        </div>
                                        <hr/>
                                        <div class="row">

                                            <div class="col s12 m12">
                                              <div class="card">
                                                  <div class="card-content">
                                                    <div class="file-field input-field">
                                                       
                                                        <textarea id="textarea1" class="materialize-textarea" name="disposisi_kapus" length="120" style="height: 21.2px;"></textarea>
                                                        <label for="textarea1" class="active">Disposisi Kapus *</label>
                                                        <span class="character-counter" style="float: right; font-size: 12px; height: 1px;"></span>
                                                    </div>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                        <div class="row">

                                            <div class="col s12 m12">
                                              <div class="card">
                                                  <div class="card-content">
                                                    <div class="file-field input-field">
                                                       
                                                        <textarea id="textarea1" class="materialize-textarea" name="catatan_penyelesaian" length="120" style="height: 21.2px;"></textarea>
                                                        <label for="textarea1" class="active">Catatan Penyelesaian *</label>
                                                        <span class="character-counter" style="float: right; font-size: 12px; height: 1px;"></span>
                                                    </div>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button type="submit" name="submit" class="btn-floating btn-large  waves-effect waves-light right tooltipped" data-position="bottom" data-delay="50" data-tooltip="Simpan"><i class="material-icons">save</i></button>
                                            </div>
                                        </div>



                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
        </main>
<?php  } else { ?>



        <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Lembar Disposisi</div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <form class="col s12" action="" method="post" enctype="multipart/form-data">

                                      <div class="row">
                                          <div class="col s4 m4 l6">
                                            <div class="input-field col s6">
                                                <label for="icon_prefix" class="">Nomor Agd *</label>
                                                <input id="icon_prefix" type="text" class="validate" value="<?php echo $disposisi->no_agd; ?>" disabled>
                                                
                                            </div>
                                          </div>
                                      </div>
                                          
                                        <div class="row">

                                          <div class="col s12 m12 l6">
                                              <div class="card">
                                                  <div class="card-content">
                                                    <div class="file-field input-field">
                                                       
                                                            <label for="icon_prefix" class="">Terima Dari *</label>
                                                            <input id="icon_prefix" type="text" class="validate" value="<?php echo $disposisi->terima_dari; ?>" disabled>
                                                        
                                                    </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col s12 m12 l6">
                                              <div class="card">
                                                  <div class="card-content">
                                                    <div class="file-field input-field">
                                                            <input id="icon_prefix" type="text" class="validate" value="<?php echo $disposisi->no_surat; ?>" disabled>
                                                            <label for="icon_prefix" class="">No Surat / Tanggal *</label>
                                                        
                                                    </div>
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="col s12 m12 l6">
                                              <div class="card">
                                                  <div class="card-content">
                                                      <span class="card-title">Kategori *</span>
                                                      <input id="icon_prefix" type="text" class="validate" value="<?php echo $disposisi->klasifikasi; ?>" disabled> 
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col s12 m12 l6">
                                              <div class="card">
                                                  <div class="card-content">
                                                    <div class="file-field input-field">
                                                            <label for="icon_prefix" class="">Perihal *</label>
                                                            <input id="icon_prefix" type="text" class="validate" value="<?php echo $disposisi->perihal; ?>" disabled>    
                                                    </div>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                        <hr/>

                                        <div class="row">
                                          <div class="col s12 m12 l6">
                                              <div class="card">
                                                  <div class="card-content">
                                                    <div class="file-field input-field">
                                                       
                                                      <label for="">Diteruskan kepada *</label>

                                                      <input id="icon_prefix" type="text" class="validate" value="<?php echo $disposisi->id_diteruskan_kepada; ?>" disabled>   
                                                        
                                                    </div>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col s12 m12 l6">

                                            <div class="input-field col m6 s12">
                                                  <label for="">Tanggal *</label>
                                                  <input value="<?php echo $disposisi->tanggal_terusan; ?>" type="text" class="" disabled>
                                            </div>


                                          </div>

                                        </div>
                                        <hr/>
                                        <div class="row">

                                            <div class="col s12 m12">
                                              <div class="card">
                                                  <div class="card-content">
                                                    <div class="file-field input-field">
                                                        <label for="textarea1" class="active">Disposisi Kapus *</label>
                                                        <input value="<?php echo $disposisi->disposisi_kapus; ?>" type="text" class="" disabled>                                  
                                                        
                                                    </div>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                        <div class="row">

                                            <div class="col s12 m12">
                                              <div class="card">
                                                  <div class="card-content">
                                                    <div class="file-field input-field">
                                                       
                                                        <label for="textarea1" class="active">Catatan Penyelesaian *</label>
                                                        <input value="<?php echo $disposisi->catatan_penyelesaian; ?>" type="text" class="" disabled>   
                                                    </div>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>




                                    </form>

                                    <form class="col s12" action="<?php echo site_url("suratmasuk/kirim_surat_masuk/".$uniqid_doc); ?>">
                                        <div class="row">
                                            <div class="input-field col s12">
                                              <button class="btn-floating btn-large  waves-effect waves-light right tooltipped" data-position="bottom" data-delay="50" data-tooltip="Kirim" type="submit" onclick="return confirm('Yakin akan meneruskan?')"><i class="material-icons">send</i>
                                              </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
        </main>

<?php  } ?>



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
                $('#tanggal').pickadate({
                    selectMonths: true, // Creates a dropdown to control month
                    changeYear:true,
                    yearRange: "1960:2020"
                });
            });
        </script>


        <? if(isset($error) && $error!=""){echo $error; } ?>

 
        
    </body>
</html>