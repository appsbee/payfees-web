
            <?php
            if(isset($route)){ ?>
                 <option value="">Select</option>
          <?php   foreach($route as $routename){
                
                
                ?>
                        <option value="<?php echo $routename->routename_id ; ?>"><?php echo $routename->route_name ;?></option>
             <?php  } }?>  
 