<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
   <!-- START CONTENT -->

      <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper" class=" grey lighten-3">
            <!-- Search for small screen -->
            <div class="header-search-wrapper grey hide-on-large-only">
                <i class="mdi-action-search active"></i>
                <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
            </div>
            <link href="<?php echo base_url("assets/css/styles/token-input.css"); ?>" type="text/css" rel="stylesheet" media="screen,projection">
<link href="<?php echo base_url("assets/css/styles/token-input-facebook.css"); ?>" type="text/css" rel="stylesheet" media="screen,projection">
<link href="<?php echo base_url("assets/css/styles/token-input-mac.css"); ?>" type="text/css" rel="stylesheet" media="screen,projection">
 <style>
.multi_mail{color:#9e9e9e; padding:0 0 10px 0; margin-bottom:15px;}
.multi_mail span{ float:left; padding-right:20px;}
.multi_mail ul li{ float:left; background:#fed3d4; padding:3px 10px; margin:0 5px;}
.multi_mail ul li a{ color:#ff5f61;}
 .token-input-token{width: 55px; float: left;}
  .token-input-input-token{width: 20px; float: left;}
</style>
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title ">Assign Teacher</h5>
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url() ?>/school/dashboard">Dashboard</a></li>
                    <li><a href="#">User Management</a></li>
                  <li class="active">Assign Teacher</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->

        <div class="col s12 l12">






        <!--start container-->

        <div class="container min_con">
        <div class="col s12 m4 l12" style="text-align:center;">
                <p style="color:green"><?php echo $this->session->flashdata('add_teacher'); ?>
                 <p style="color:red"><?php echo $this->session->flashdata('error'); ?>
                </div>


         <?php echo form_open("school/Usermanagement/saveteacher", array('id' => "addteacher")); ?>


         <div class="row">







          <div class="input-field col s6 l3">
                <select class="" id="teacher" name="teacher">
                <option value="" selected> Select Teacher</option>
                <?php if (isset($teacherdropdown) && $teacherdropdown != "") {

	foreach ($teacherdropdown as $teacher) {?>
                     <option value="<?php echo isset($teacher->usermanagement_id) ? $teacher->usermanagement_id : ''; ?>"><?php echo isset($teacher->name) ? $teacher->name : ''; ?></option>
                <?php }}
?>
              </select>
          </div>

          <div class="input-field col s6 l6 multi_mail">
              <ul id="appclass">
              </ul>
                <input type="hidden" id="selected_section" name="selected_section">
                <input type="text" id="sendto2">
                <span id="messageresp"></span>
                 <input type="hidden" name="mailidto" id="postclass" value="" />
                <input type="hidden" name="classesid" id="classesid" value="" />
          </div>

         <div class="input-field col s6 l3">
          <!-- <button class="btn waves-effect waves-light right" type="submit" name="submit"  value="submit">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Save
                        </button>  -->


          <button class="btn waves-effect waves-light right blue" type="submit" name="submit" value="submit"><i class="mdi-content-send"></i> Save </button>

          </div>
      <div class="clr20"></div> <div class="clr20"></div>
         </div>


          <?php echo form_close(); ?>
<table>
                    <thead>
                      <tr>
                      <th align="center">Teacher</th>
                        <th align="center">class</th>
                        <th align="center">Section</th>

                      </tr>
                    </thead>

                    <tbody>
                       <?php
//echo '<pre>';
//print_r($result); //die();
if (isset($result) && $result != "") {
	foreach ($result as $key => $teacherrow) {
		?>

  <tr id=""> <td align=""><?php echo $teacherrow['teachername']; ?></td>
                        <td align=""><?php echo $teacherrow['class']; ?></td>
                        <td align=""><?php echo $teacherrow['section']; ?></td>


  </tr>

    <?php }} else {?>
        <td align="">&nbsp;</td>
        <td align="" style="color: red;">Assign Teacher</td>
        <td align="">&nbsp;</td>
  <?php }
?>
                    </tbody>
                  </table>

<!--
         <div class="input-field col s12 l9">
                <select class="form-control browser-default" id="classteacher" name="classteachesr">
                <option value="" selected>Select Class</option>
                 /<?php //for ($t = 1; $t <= 12; $t++) {?>
                     <option value="<?php// echo $t; ?>"><?php //echo $t; ?> </option>
               <?php //}?>


              </select>

          </div>
-->
           <div class="clr20"></div> <div class="clr20"></div>
          <div class="divider"></div>

          <div id="tableres">

          </div>




        <!--end container-->
        </div>






        </div>



      </section>
      <!-- END CONTENT -->

<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"/>
<link rel="stylesheet" href="<?php echo base_url("assets/css/main.css"); ?>">

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<script src="<?php echo base_url("assets/js/src/jquery.autocomplete.multiselect.js"); ?>"></script>

<!-- Auto Complete -->
<script type="text/javascript">
$(document).ready(function() {
  //$("#sendto2").hide();
  $("#sendto2").prop('disabled',true);
    $("#sendto2").autocomplete({
      multiselect: true,

      source: function(request, response) {
          $.ajax({
              url: '<?php echo site_url() ?>/school/Usermanagement/sectionlist',
              dataType: "json",
              data: {
                  term : request.term,
                  section : $('#selected_section').val(),
                  teacher_id : $('#teacher').val()
              },
              success: function(data) {//console.log(data);
                  response(data);
              }
          });
      }




    });
});
</script>
<!-- Auto Complete -->
<script >

$("#teacher").change(function() {
  if($('#teacher').val()!=""){
  $("#sendto2").removeAttr("disabled");
  }
  else{
  $("#sendto2").prop('disabled',true);
  }
});
</script>


<script>
  $("#addteacher").submit(function(){

    if($('#class').val()==""){
         alert("Select Class")

        return false;
    }
    if($('#section').val()==""){
         alert("Select Section")

        return false;
    }
    if($('#teacher').val()==""){
         alert("Select Teacher")

        return false;
    }
  });



$("#classteacher").change(function() {

    var classte=$(this).val()
    //alert(classte);


   $.ajax({
    type: "GET",
    //dataType: "html",
    url: '<?php echo site_url() ?>/school/Usermanagement/teacherdetails',
    data: {
      'classte': classte
    },

    success: function(resp) {
      console.log(resp);
          $('#tableres').html(resp);

    }


  });

});

;(function($){
    $.fn.extend({
        donetyping: function(callback,timeout){
            timeout = timeout || 1e3; // 1 second default timeout
            var timeoutReference,
                doneTyping = function(el){
                    if (!timeoutReference) return;
                    timeoutReference = null;
                    callback.call(el);
                };
            return this.each(function(i,el){
                var $el = $(el);
                $el.is(':input') && $el.on('keyup keypress paste',function(e){
                    if (e.type=='keyup' && e.keyCode!=8) return;

                    if (timeoutReference) clearTimeout(timeoutReference);
                    timeoutReference = setTimeout(function(){

                        doneTyping(el);
                    }, timeout);
                }).on('blur',function(){
                    doneTyping(el);
                });
            });
        }
    });
})(jQuery);



$('#sendto').donetyping(function(){

   var keywords= $('#sendto').val();
   //alert(keywords);return false;
   if(keywords==""){
  $('#messageresp').html("");
   }

    $('#typeset').val('notice');
    var string = keywords,
    substring = "class";
    console.log(string.indexOf(substring) > -1);
      if(string.indexOf(substring) > -1){
       //console.log('if');
       //return false
        $.ajax({
    type: "GET",
    url: '<?php echo site_url() ?>/school/Composemessage/classname',
    data: {
      'keywords': keywords
    },
    success: function(resp) {
      console.log(resp)
          $('#messageresp').html(resp);
    }
  });

    }
});

mailids = [];
clsids=[];

$('body').on('click', '.getclass',function(){
   // alert('adadad');
    var cl=$(this).attr('id');
    var clid=$(this).attr('data-val');
    //alert("clid"+clid);

   //'<li>'+cl+ '<a href="#"> <strong>X</strong></a></li>'

   $('#appclass').append('<li value="'+cl+'"  value_id="'+clid+'" >'+cl+ '<a href="javascript:void(0)"> <strong class="remove">X</strong></a></li>');
    $(this).remove();
    mailids.push(cl);
    $('#classesid').val(mailids);
     //console.log(mailids);

    clsids.push(clid);
    //$('#classesid').val(clsids);
    $('#postclass').val(clsids);
})

$('body').on('click', '.remove',function(){

   var finalcl =$(this).closest('li').attr('value');
   var finalcl_id =$(this).closest('li').attr('value_id');

   $(this).closest('li').remove();
   $('#add').prepend('<tr><td class="getclass" data-val="'+finalcl_id+'" id="'+finalcl+'">'+finalcl+'</td></tr>');
   console.log(finalcl);
    //$(this).$('#add').append();
    console.log(mailids);
    console.log(mailids.indexOf(finalcl));
    if(mailids.indexOf(finalcl)!=-1){
        //mailids.splice(0,1);
        var index = mailids.indexOf(finalcl);
        console.log(index);
        mailids.splice(index, 1);
        $('#postclass').val(mailids);

    }
     if(clsids.indexOf(finalcl_id)!=-1){

        //finalcl_id.splice(0,1);
        var index = clsids.indexOf(finalcl_id);
        console.log(index);
        clsids.splice(index, 1);
        $('#classesid').val(clsids);

    }



})


</script>

