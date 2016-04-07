
                      
                     <option value="">Select FeesHead</option>
                            <?php
             
                            if(isset($feeshead)){ 

                            foreach($feeshead as $headrow){
                            ?>
                        <option value="<?php echo $headrow['feeshead_id'] ; ?>"><?php echo $headrow['feeshead_name'] ;?></option>
                    
                   <?php  } }?> 
                     