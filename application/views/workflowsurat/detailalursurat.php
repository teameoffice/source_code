<!DOCTYPE html>
<html lang="en"> 
    <?php  $this->load->view("common/common_head"); ?>                                       

    <body>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/plugins/materialize/css/materialize.min.css"); ?>"> 
        <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/plugins/material-preloader/css/materialPreloader.min.css"); ?>"> 

         <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/plugins/select2/css/select2.css"); ?>">

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
                                Detail Alur Surat
                            </div>
                        </div>
                    </div>
            <div class="col s12">
                    <div class="card">
                          <div class="card-content">
                              <form action="<?php echo site_url("workflowsurat/")?>">

                               <div class="row">
                                    <div class="col s12 m12 l12">
                                      <div class="card white darken-1">
                                        <div class="card-panel">
                                          <p> Nama Alur</p>
                                          <input id="icon_prefix" type="text" class="validate" name="" value="<?php echo $workflow->nama_workflow ;?>" disabled>
                                          <p> Deskripsi</p>
                                          <input id="icon_prefix" type="text" class="validate" name="" value="<?php echo $workflow->deskripsi ;?>" disabled>

                                        </div>
                                      </div>
                                    </div>
                              </div>
                              <div class="row">
                                  <div class="col s12 m12 l12">
                                      <div class="card white darken-7">
                                        <div class="card-content">
                                            <span class="card-title">Alur yang dilalui</span>
                                            <br>
                                              <table class="striped responsive-table" id="item_table" >
                                                  <thead>
                                                      <tr>
                                                         <th>Urutan</th>
                                                         <th>Nama</th>
                                                         <th>Pangkat</th>
                                                         <th>Korp</th>
                                                         <th>NRP</th>
                                                         <th>Kesatuan</th>
                                                         <th>Jabatan</th>
                                                         <th>Matra</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                        <?php foreach ($workflowsurat as $work) { ?>


                                                      <tr>
                                                          <td><?php echo $work->urutan;?></td>
                                                          <?php $data_personel = array(); ?>
                                                          <?php $data_personel = $this->personel_model->get_personel_by_id($work->id_personel);?>
                                                          <td><?php echo $data_personel->nama;?></td>
                                                          <td><?php echo $data_personel->pangkat;?></td>
                                                          <td><?php echo $data_personel->korps;?></td>
                                                          <td><?php echo $data_personel->nrp;?></td>
                                                          <td><?php echo $data_personel->kesatuan;?></td>
                                                          <td><?php echo $data_personel->jabatan;?></td>
                                                          <td><?php echo $data_personel->matra;?></td>
                                                      </tr>
                                                      <?php  } ?>
                   
                                                  </tbody>
                                              </table>
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


</div>

   
<?php  $this->load->view("admin/common/common_footer"); ?>
        </div>
        <div class="left-sidebar-hover"></div>      


        <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/jquery/jquery-2.2.0.min.js"); ?>"></script>
        <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/materialize/js/materialize.min.js"); ?>"></script>
        <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/material-preloader/js/materialPreloader.min.js"); ?>"></script>
        <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/jquery-blockui/jquery.blockui.js"); ?>"></script>
    
       


        <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/select2/js/select2.min.js"); ?>"></script>
        <script src="<?php echo base_url($this->config->item("theme_admin")."/js/alpha.min.js"); ?>"></script>
        <script src="<?php echo base_url($this->config->item("theme_admin")."/js/pages/form-select2.js"); ?>"></script>


<script>
$(document).ready(function(){

$("#e1").select2({
          placeholder: "Select a State",
          allowClear: true
        });

 
 $(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  html += '<td class="col s2"><input type="text" name="urutan[]" class="item_name"/></td>';
  html += '<td class="col s10"><select name="id_personel[]" class="item_unit js-states browser-default e1" tabindex="-1" style="width: 100%"><option value="">Pilih Personil</option><?php echo $output; ?></select></td>';
  html += '<td><a href="#" name="remove" class="remove"><i class="material-icons right">delete_forever</i></a></td></tr>';
  $('#item_table').append(html);
  $(".e1").select2();
 });
 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });
 
 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';
  $('.item_name').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Item Name at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.item_quantity').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Item Quantity at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.item_unit').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Unit at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  var form_data = $(this).serialize();
  if(error == '')
  {
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     if(data == 'ok')
     {
      $('#item_table').find("tr:gt(0)").remove();
      $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
     }
    }
   });
  }
  else
  {
   $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }
 });
 
});



</script>
 </body>
</html>