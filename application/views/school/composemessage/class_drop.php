<table border='1' id="add">


    <?php
    
    
if (!empty($classsec)) {
    foreach ($classsec as $key => $classrow) {
?>
        <tr>
            <td class="getclass" data-val="<?php echo $classrow['section_id'];?>" id="<?php echo $classrow['name'];?>"><?php echo $classrow['name'];?></td>
        </tr>
    <?php 
    
    
    }
    
    
} 

        
else if (!empty($classresult)) {
    foreach ($classresult as $ckey => $clarow) {
?>
        <tr>
            <td class="getclass" data-val="<?php echo'c_'.$clarow['ID'];?>" id="<?php echo $clarow['name'];?>">
            
            
            <?php echo $clarow['name'];?>
            
            
            </td>
        </tr>
    <?php 
    
    
    }
    
    
} else{
    ?>
    <tr>
            <td class="getclass">No records</td>
        </tr>
  <?php  
}
   ?>

</table>






















<style>

th {background: #fff ; color: #fff; padding: 10px; border-radius: 0;}
tr:nth-child(even) {background: #fff }
tr:nth-child(odd) {background: #fff;border-radius: 0;}

</style>