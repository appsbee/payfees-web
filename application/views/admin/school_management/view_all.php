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
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">View All School</h5>
                <ol class="breadcrumb">
                    <li><a href="index.html">School Management</a></li>
                    <li><a href="#">View All School</a></li>
                   <!-- <li class="active">Blank Page</li> -->
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
        <div class="input-field col s12">
          <i class="mdi-action-search prefix"></i>
          <input id="search_school" type="text" class="validate">
          <label for="icon_prefix">Search School</label>
        </div>
        <ul id="sc_name"></ul>

        <!--start container-->
        <div class="container">
          <div class="section">

             <div class="row">
                <!--<div class="col s12 m4 l4">

          <div class="input-field col s12">
          <i class="mdi-action-search prefix"></i>
          <input id="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">Search School</label>
        </div>
                </div> -->





              </div>
              <div class="divider"></div>
            <div id="borderless-table">
              <h4 class="header">School List</h4>
              <div class="row">
              <div >
      <p style="color:green;margin-top:16px; font-size:15px;" align="center"><strong><?php echo $this->session->flashdata('success'); ?></strong></p>
                  </div>

                <div class="col s12 m12 l12">
                  <table class="responsive-table">
                    <thead>
                      <tr>
                        <th data-field="id">School Name</th>
                        <th data-field="name">School Address</th>
                        <th data-field="price">Contact Name </th>
                        <th data-field="id">Contact Email </th>
                        <th data-field="name">Phone No.</th>
                      </tr>
                    </thead>
                <tbody>
                    <?php

foreach ($schools as $school) {
	echo "<tr>\n";
	echo "<td><a href='" . site_url("admin/school-management/edit/" . $school->id) . "'>$school->school_name</a></td>\n";
	echo "<td>$school->address</td>\n";
	// echo "<td>$school->contact_person</td>\n"; old
	// echo "<td>$school->contact_email</td>\n";  old
	//  echo "<td>$school->contact_no</td>\n";  old

	echo "<td>$school->name</td>\n";
	echo "<td>$school->email</td>\n";
	echo "<td>$school->phone_number</td>\n";
	echo "</tr>\n";
}
?>
                      <!--<tr>
                        <td>Jawahar High School</td>
                        <td>30, Rishi tech park</td>
                        <td>R Sharma</td>
                        <td>studentmanagemnt@gmail.com</td>
                        <td>9830545585</td>
                      </tr>
                       <tr>
                        <td>Jawahar High School</td>
                        <td>30, Rishi tech park</td>
                        <td>R Sharma</td>
                        <td>studentmanagemnt@gmail.com</td>
                        <td>9830545585</td>
                      </tr>-->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- Floating Action Button -->
            <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red">
                  <i class="large mdi-editor-mode-edit"></i>
                </a>
                <ul>
                  <li><a href="css-helpers.html" class="btn-floating red"><i class="large mdi-communication-live-help"></i></a></li>
                  <li><a href="app-widget.html" class="btn-floating yellow darken-1"><i class="large mdi-device-now-widgets"></i></a></li>
                  <li><a href="app-calendar.html" class="btn-floating green"><i class="large mdi-editor-insert-invitation"></i></a></li>
                  <li><a href="app-email.html" class="btn-floating blue"><i class="large mdi-communication-email"></i></a></li>
                </ul>
            </div>
            <!-- Floating Action Button -->
        </div>
        <!--end container-->
      </section>
      <!-- END CONTENT -->



<script>
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
$('#search_school').donetyping(function(){
    var keywords= $('#search_school').val();
    //console.log(keywords);return false;
if(keywords!=""){
 $.ajax({
    type: "POST",
    url: '<?php echo site_url() ?>/admin/School_management/getschoolname',
    data: {
      'keywords': keywords
    },
    success: function(resp) {
     // console.log(resp.length);return false;

    var list ="";
     var name="";
     if(resp!=""){
 for (i = 0; i < resp.length; i++) {


        list += '<li ><a href=<?=base_url()?>admin/school-management/edit/'+resp[i].id+'>'+resp[i].school_name+'</a></li>';


        }
        console.log(list);
        $('#sc_name').html(list);
     }
     else{
    $('#sc_name').html("No School Found");
     }

    }
  });
}else{
$('#sc_name').html("");
}



});
</script>
