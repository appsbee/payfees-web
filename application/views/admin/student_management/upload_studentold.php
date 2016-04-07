<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


  
  <div class="main-content">
    <div class="main-content-inner">
      <div class="widget-main seach_part breadcrumbs">
        <form class="form-search">
          <div class="row">
          <!--  <div class="col-xs-12 col-sm-10 no_mar">
              <div class="input-group">
                <input type="text" class="form-control search-query" placeholder="Type your query">
                <span class="input-group-btn">
                <button type="button" class="btn btn-purple btn-sm"> <span class="ace-icon fa fa-search icon-on-right bigger-110"></span> Search </button>
                </span> </div>
            </div> -->
          </div>
        </form>
      </div>
      <!--<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Dashboard</li>
						</ul>-->
      <!-- /.breadcrumb -->
      <!--<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div>
					</div>-->
      <div class="page-content">
      <label class="" for="">Search School</label>
<input type="text" id="search_school" placeholder="Search School...." value="" class="form-control" />
</div>
<div id="sc_name"></div>

<p style="color:green"><?php echo $this->session->flashdata('add_details'); ?>
        
                    </p>  
                    <p style="color:red"><?php echo $this->session->flashdata('error_details'); ?>
        
                    </p>  

<?php if(isset($schools_id)){
    echo $schools_id;
}
?>


<?php if(isset($school_name)){ ?>
    <h2 style="  margin-left: 290px;margin-bottom: 28px;color: green;"><?php if(isset($schools_id)){

    echo "School Name::". $school_name;
   
    }?></h2>
  <?php   
}
?>

<?php if(isset($schools_id)){ ?>
    
    <div class="row">
          <div class="advanced_btn"> <a href="#credits" class="btn btn-danger toggle" >Advaced Search</a> </div>
          <div class="top_gap2 top_section well hidden" id="credits">
            <form>
              <div class="col-sm-4 ">
                <div class="form-group no-margin">
                  <input type="text" id="" placeholder="Class" class="form-control">
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group no-margin">
                  <input type="text" id="" placeholder="Section" class="form-control">
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group no-margin">
                  <input type="text" id="" placeholder="Roll No." class="form-control">
                </div>
              </div>
              <div class="col-sm-2 pull-right">
                <div class="form-group no-margin">
                  <button type="button" class="btn btn-sm btn-success">Submit</button>
                </div>
              </div>
              <div class="clearfix"></div>
            </form>
          </div>
          <div class="top_gap top_section">
            <div class="col-sm-4 pull-left no-padding-left">
              <button class="btn btn-primary">Promote Student</button>
            </div>
            <div class="col-sm-4" style="text-align:center;">
              <!-- <button class="btn btn-light "><i class="ace-icon fa fa-print bigger-160"></i> Print</button>-->
            </div>
            	<?php echo form_open_multipart('admin/Studentmanagement/uploadStudentdata', array('id' =>"addFrm"))?>            
            <div class="col-sm-4 no-padding-right"> 
                <span class="btn btn-warning btn-file pull-right "> Upload New Student
              <input type="file" name="studentdetails"/>
              </span>
              <input type="text" id="school_id" name="school_id" value="
<?php if(isset($schools_id)){
    echo $schools_id;
}
?>" />
            <button class="btn btn-info pull-right" type="submit" name="submit" value="submit">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Submit
                        </button>
              
               </div>
               
               <?php echo form_close()?>
               
                              
            <div class="clearfix"></div>
          </div>
          <div class="col-xs-12 gap_top1">
            <table id="simple-table" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Registration</th>
                  <th>Class/Section</th>
                  <th>Roll</th>
                  <th>Parent Name</th>
                  <th>Phone</th>
                  <th>View Details</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td> Rakesh Verma </td>
                  <td>2505050505225</td>
                  <td>10th</td>
                  <td>26015</td>
                  <td> Ravi Shankar Verma </td>
                  <td>7685859054</td>
                  <td><a href="#">View Details</a></td>
                </tr>
                <tr>
                  <td> Rakesh Verma </td>
                  <td>2505050505225</td>
                  <td>10th</td>
                  <td>26015</td>
                  <td> Ravi Shankar Verma </td>
                  <td>7685859054</td>
                  <td><a href="#">View Details</a></td>
                </tr>
                <tr>
                  <td> Rakesh Verma </td>
                  <td>2505050505225</td>
                  <td>10th</td>
                  <td>26015</td>
                  <td> Ravi Shankar Verma </td>
                  <td>7685859054</td>
                  <td><a href="#">View Details</a></td>
                </tr>
                <tr>
                  <td> Rakesh Verma </td>
                  <td>2505050505225</td>
                  <td>10th</td>
                  <td>26015</td>
                  <td> Ravi Shankar Verma </td>
                  <td>7685859054</td>
                  <td><a href="#">View Details</a></td>
                </tr>
                <tr>
                  <td> Rakesh Verma </td>
                  <td>2505050505225</td>
                  <td>10th</td>
                  <td>26015</td>
                  <td> Ravi Shankar Verma </td>
                  <td>7685859054</td>
                  <td><a href="#">View Details</a></td>
                </tr>
                <tr>
                  <td> Rakesh Verma </td>
                  <td>2505050505225</td>
                  <td>10th</td>
                  <td>26015</td>
                  <td> Ravi Shankar Verma </td>
                  <td>7685859054</td>
                  <td><a href="#">View Details</a></td>
                </tr>
              </tbody>
            </table>
            <div class="col-sm-12">
              <div class="modal-footer no-margin-top no-padding-left">
                <div class="pull-left">
                  <button class="btn btn-primary"><i class="glyphicon glyphicon-export"></i> Export</button>
                  <button class="btn btn-success"><i class="glyphicon glyphicon-print"></i> Print</button>
                </div>
                <ul class="pagination pull-right no-margin">
                  <li class="prev disabled"> <a href="#"> <i class="ace-icon fa fa-angle-double-left"></i> </a> </li>
                  <li class="active"> <a href="#">1</a> </li>
                  <li> <a href="#">2</a> </li>
                  <li> <a href="#">3</a> </li>
                  <li class="next"> <a href="#"> <i class="ace-icon fa fa-angle-double-right"></i> </a> </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
  <?php   
}
?>
    

        <!--start body part-->
        
        <!--end body part-->
        <!-- /.row -->
      </div>
      <!-- /.page-content -->
    </div>
  </div>
  <!-- /.main-content -->
  
  
<!-- /.main-container -->
 
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
$('#search_school').donetyping(function(){
    var keywords= $('#search_school').val();
    //console.log(keywords);return false;
    
     $.ajax({
		type: "GET",
		url: '<?php echo site_url() ?>/admin/Studentmanagement/getschoolname',
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

<script>
        $(function () {
    $('.toggle').click(function (event) {
        event.preventDefault();
        var target = $(this).attr('href');
        $(target).toggleClass('hidden show');
    });

});
        </script>