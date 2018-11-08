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

<?php 

  $output ='';

  foreach($personil as $row){
  $output .= ' <option value="'.$row->id.'">'.$row->nama.'</option>';
 }



?>

<main class="mn-inner">
      <div class="row">
            <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                Menu ini untuk membuat setting alur sebuah surat, baik surat masuk atau pun surat keluar.
                            </div>
                        </div>
                    </div>
            <div class="col s12">
                    <div class="card">
                          <div class="card-content">
                    

                              <form action="#" method="post">

                               <div class="row">
                                    <div class="input-field col s3">
                                      <p> Pilih Alur</p>
                                         <select class="js-states browser-default" tabindex="-1" style="width: 100%" id="" name="id_workflow">
                                                 <?php foreach($workflow as $alur){?>
                                                        <option value="<?php echo $alur->id; ?>"><?php echo $alur->nama_workflow; ?></option>
                                                 <?php } ?>       
                                         </select>
                                    </div>
                              </div>
                            <br/>
                            <br/>
                              <div class="row">
                                  <div class="input-field col s12">
                                      <table class="striped" id="item_table" >
                                          <thead>
                                              <tr>
                                                 <th class="col s3">Urutan</th>
                                                 <th class="col s9">Nama Personil</th>
                                                 <th><a href="#" name="add" class=" add btn-floating btn-large waves-effect waves-light right"><i class="material-icons ">add</i></a></th>
                                              </tr>
                                          </thead>
                                          <tbody>
           
                                          </tbody>
                                      </table>
                                     </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button type="submit" name="submit" class="btn-floating btn-large waves-effect waves-light right"><i class="material-icons" value="Insert">save</i></button>
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