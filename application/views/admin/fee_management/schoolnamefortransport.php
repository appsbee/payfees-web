<table border='1'>

    <?php
if (count($auto_comp) > 0) {

    foreach ($auto_comp as $key => $each) {
?>
   
    <ul>
        <li> <a href="<?php echo site_url() ?>/admin/Addfee/edittransportfee/<?php echo $each['id'] ?>"><?php echo $each['school_name'] ?></a> </li>
    </ul>
   
    <?php }
} else { ?>
    <ul>
        <li>No result.</li>
    </ul>
    <?php } ?>

</table>