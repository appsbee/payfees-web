<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="footer">
    <div class="footer-inner">
        <div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">PayFees</span>
                            &copy; Appsbee Technology 2015-2016
						</span>

            &nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
                                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                            </a>

							<a href="#">
                                <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
                            </a>

							<a href="#">
                                <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
                            </a>
						</span>
        </div>
    </div>
</div>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="<?php //echo base_url("assets/js/jquery.2.1.1.min.js");?>"></script>
<!-- <![endif]-->

<!--[if IE]>
<script src="<?php echo base_url("assets/js/jquery.1.11.1.min.js");?>"></script>
<![endif]-->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='<?php echo base_url("assets/js/jquery.min.js")?>'>"+"<"+"/script>");
</script>




<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='<?php echo base_url("assets/js/jquery1x.min.js");?>'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url("assets/js/jquery.mobile.custom.min.js");?>'>"+"<"+"/script>");
</script>
<script src="<?php echo base_url("assets/js/bootstrap.min.js");?>"></script>

<!-- page specific plugin scripts -->


<script src="<?php echo base_url("assets/js/jquery.dataTables.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/jquery.dataTables.bootstrap.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/dataTables.tableTools.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/dataTables.colVis.min.js");?>"></script>
<!-- ace scripts -->
<script src="<?php echo base_url("assets/js/ace-elements.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/ace.min.js");?>"></script>
<!-- date picker -->
<script src="<?php echo base_url("assets/js/jquery-ui.custom.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/jquery.ui.touch-punch.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/chosen.jquery.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/fuelux.spinner.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/bootstrap-datepicker.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/bootstrap-timepicker.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/moment.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/daterangepicker.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/bootstrap-datetimepicker.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/bootstrap-colorpicker.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/jquery.knob.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/jquery.autosize.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/jquery.inputlimiter.1.3.1.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/jquery.maskedinput.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/bootstrap-tag.min.js");?>"></script>


  

<script>

    $('#id-input-file-1 , #id-input-file-2').ace_file_input({
        no_file:'No File ...',
        btn_choose:'Choose',
        btn_change:'Change',
        droppable:false,
        onchange:null,
        thumbnail:false //| true | large
        //whitelist:'gif|png|jpg|jpeg'
        //blacklist:'exe|php'
        //onchange:''
        //
    });
    $('#id-input-file-1 , #id-input-file-5').ace_file_input({
        no_file:'No File ...',
        btn_choose:'Choose',
        btn_change:'Change',
        droppable:false,
        onchange:null,
        thumbnail:false //| true | large
        //whitelist:'gif|png|jpg|jpeg'
        //blacklist:'exe|php'
        //onchange:''
        //
    });
</script>


<!-- inline scripts related to this page -->

<?php
if(isset($scripts)){
    foreach($scripts as $script){
        echo '<script type="text/javascript">';
        echo $script;
        echo "</script>";
    }
}
if(isset($script_js_list)){
    foreach($script_js_list as $script_js){
        echo "<script src=\"$script_js\"></script>";
    }
}
?>


</body>
</html>
