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
                <h5 class="breadcrumbs-title">Compose Message</h5>
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>

                    <li class="active">Compose Message</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
        
<style>
.multi_mail{color:#9e9e9e; padding:0 0 10px 0; margin-bottom:15px;}
.multi_mail span{ float:left; padding-right:20px;}
.multi_mail ul li{ float:left; background:#fed3d4; padding:3px 10px; margin:0 5px;}
.multi_mail ul li a{ color:#ff5f61;}
</style>
        <!--start container-->
        <div class="container">
          <div class="section">

           <div id="basic-form" class="section">
              <div class="row">
                <div class="col s12 m12 l12">
                  <div class="card-panel">
                    <h4 class="header2">Compose Message</h4>
                    <div class="row">
             
           
            <div class="col s12 l3">
            
                <input class="with-gap browser-default stype" name="sendtype" type="radio" id="individualstudent" value="1"  />
                <label for="individualstudent">Individual Student</label>
                 
            </div>
             <div class="col s12 l3">
            
                <input class="with-gap browser-default stype" name="sendtype" type="radio" id="classbase" value="2" />
                <label for="classbase">Class Base</label>
                 
            </div>
            
            <div class="col s12 l3">
            
                <input class="with-gap browser-default stype" name="sendtype" type="radio" id="notice" value="3" checked="" />
                <label for="notice">Send Notice</label>
                 
            </div>
          

                       <?php echo form_open("school/Composemessage/send",array('id' =>"msend")); ?>

                        <div class="row">
                          <div class="input-field col s12">
                          
							<div class="multi_mail"><span>Send Message to:</span>
                            <ul id="appclass">
                            <!-- <li>mailto-1 <a href="#"> <strong>X</strong></a></li>
                            <li>mailto-2 <a href="#"> <strong>X</strong></a></li> -->
                            </ul>
                            <input type="text" id="sendto">
                            <span id="messageresp"></span>
                            <input type="hidden" name="mailidto" id="postclass" value="xyz" />
                            <input type="text" name="classesid" id="classesid" value="" />
                            </div>
                           
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="School" type="text" name="subject">
                            <label for="first_name">Subject:</label>
                          </div>
                        </div>
                        
                        
                        <div class="row">
                          <div class="input-field col s12">
                            <textarea id="Address" name="message" class="materialize-textarea"></textarea>
                            <label for="message">Message:</label>
                          </div>
                          
                          

                      
                      <div class="col s12 m12 l12">
                         <!-- <div class="file-field input-field col s12 l6">
                                  <input class="file-path validate" type="text"/>
                                    <div class="btn waves-light">
                                    <span> <i class="mdi-editor-attach-file"></i> Attachment </span>
                                        <input type="file" />
                                        </div>
                                </div> -->
                          <div class="input-field col s12">
                                 <button class="btn waves-effect waves-light right" name="action" type="submit">
Send
<i class="mdi-content-send right"></i>
</button>
                                    
                                </div>
                      </div>          
                         
                        
                            <div style="clear:both"></div> 
                       
                        </div>
                      <?php echo form_close(); ?>
                      
                      
                      
                    </div>
                  </div>
                </div>
                <!-- Form with placeholder -->
                
              </div>
              
              
            </div>
            <div class="divider"></div>
          
          </div>
          <!-- Floating Action Button
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
        Floating Action Button -->
        </div>
        <!--end container-->
      </section>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

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





$('#sendto').donetyping(function(){
   
   
   var typevalue = $( 'input[name=sendtype]:checked' ).val();
   // alert(typevalue);
   
   //var smtype= $('.stype').val();
   //alert(smtype);
  // return false;
   var keywords= $('#sendto').val();
   
    if(typevalue=="1"){
        //alert('individual');
     $.ajax({
		type: "GET",
		url: '<?php echo site_url() ?>/school/Composemessage/individualsend',
		data: {
			'keywords': keywords
		},
		success: function(resp) {
		  console.log(resp)
          $('#messageresp').html(resp);
          
   
 		}
	});
    
    
    
    }
    
     if(typevalue=="2"){
        //alert('class');
         //var keywords= $('#sendto').val();
   // console.log(keywords);
    
    var string = keywords,
    substring = "class";
    console.log(string.indexOf(substring) > -1);
    //keywords="class"
    
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
    
    
    }
    
    
    
   
    
    
    
    
     
   
  
});
mailids = [];
clsids=[];

$('body').on('click', '.getclass',function(){
   // alert('adadad');
    var cl=$(this).attr('id');
    var clid=$(this).attr('data-val');
    alert("clid"+clid);
   
   //'<li>'+cl+ '<a href="#"> <strong>X</strong></a></li>'
   
   $('#appclass').append('<li value="'+cl+'"  value_id="'+clid+'" >'+cl+ '<a href="javascript:void(0)"> <strong class="remove">X</strong></a></li>');
    //$(this).remove();
    mailids.push(cl);
    $('#postclass').val(mailids);
    // console.log(mailids);
    
    clsids.push(clid);
    $('#classesid').val(clsids);
})
$('body').on('click', '.remove',function(){
   
   
   var finalcl =$(this).closest('li').attr('value');
   var finalcl_id =$(this).closest('li').attr('value_id');
    alert("finalcl_id"+finalcl_id);
   //.slice(0,-1);
   
   $(this).closest('li').remove();
   
   
   
   //$('#messageresp').append('<lr>'+finalcl+ '<a href="javascript:void(0)"> <strong class="remove">X</strong></a></li>');
   console.log(finalcl);
    //$(this).closest('li').$('#appclass').append();
 
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