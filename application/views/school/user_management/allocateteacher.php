<table>
                    <thead>
                      <tr>
                        <th align="center">class</th>
                        <th align="center">Section</th>
                        <th align="center">Teacher</th>
                      </tr>
                    </thead>

                    <tbody>
                       <?php
                       
            if(isset($result) && $result!="" ){
            foreach($result as $teacherrow){
                ?>
  
  <tr id="">
                        <td align=""><?php echo $teacherrow->class; ?></td>
                        <td align=""><?php echo $teacherrow->section; ?></td>
                        <td align=""><?php echo $teacherrow->name; ?></td>
    
  </tr>
  
    <?php  } }
    else{ ?>
        <td align="">&nbsp;</td>
        <td align="" style="color: red;">Assign Teacher</td>
        <td align="">&nbsp;</td>
  <?php   }
    ?> 
                    </tbody>
                  </table>


