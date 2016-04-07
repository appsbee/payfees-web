<table border='1'>

 <ul class="suarch_result">
    <?php
if (count($auto_comp) > 0) {



    foreach ($auto_comp as $key => $each) {
?>
   
   
   
        <li> <a href="<?php echo site_url() ?>/admin/Addfee/editfee/<?php echo $each['id'] ?>"><?php echo $each['school_name'] ?></a> </li>
   
   
    <?php }
    
    
} else { ?>
   
        <li>No Result.</li>
    
    <?php } ?>
 </ul>
</table>

<style>
.suarch_result{ padding-left:50px;}
.suarch_result li a{ padding:3px 5px; display: block; }
.suarch_result li a:hover{ background: #E0FFFF; }
</style>