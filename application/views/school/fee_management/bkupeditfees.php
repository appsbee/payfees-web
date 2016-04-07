<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo 'Search School'; ?>



<input type="text" id="example" value="" />
<div id="sc_name"></div>


<?php
if(isset($schools_id)){
    echo $schools_id;
    
    
}
else{
    echo 'initial';
}

 ?>
  <select class="form-control" name="schoolname" id="schoolname">
            <?php
            if(isset($fees)){
            foreach($fees as $fees){
                ?>
                        <option value="<?php echo $fees['feeshead_id'] ; ?>"><?php echo $fees['feeshead_name'] ;?></option>
                    
                   <?php  } }?>  
                      </select>
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
$('#example').donetyping(function(){
    var keywords= $('#example').val();
    //console.log(keywords);return false;
    
     $.ajax({
		type: "GET",
		url: '<?php echo site_url() ?>/admin/Addfee/getschoolname',
		data: {
			'keywords': keywords
		},
		success: function(resp) {
		  console.log(resp)
          
          $('#sc_name').html(resp);
		  //alert(resp);
 		}
	});
   
  
});
</script>