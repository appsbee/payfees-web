
              <table >
                <thead>
                  <tr>
                    <th>Fee Type</th>
                    <th>Class I</th>
                    <th>Class II</th>
                    <th>Class III</th>
                    <th>Class IV</th>
                    <th>Class V</th>
                    <th>Class VI</th>
                    <th>Class VII</th>
                    <th>Class VIII</th>
                    <th>Class IX</th>
                    <th>Class X</th>
                    <th>Class XI</th>
                    <th>Class XII</th>
                  </tr>
                </thead> 
                <tbody>
                <tr>
                
                
                
                    <td><strong>Fee Amount</strong></td>
                    <?php for ($i=0; $i<=11;$i++){ ?>
                    <td><input type="text" name="cls<?php echo $i+1; ?>fessamopunt" class="form-control famount" id="famount<?php echo $i+1; ?>" value="<?php echo isset($feesdetails[$i]['fessamopunt']) ? $feesdetails[$i]['fessamopunt'] : ''; ?>"/></td>
                    
                    <?php }?>
                  </tr>
                  <tr>
                    <td><strong>Frequency</strong></td>
                    
                    <?php for ($k=0; $k<=11;$k++){ ?>
                    <td>
                    
                    
                    
                    <select class="browser-default frequency" name="cls<?php echo $k+1; ?>frequency" id="frequency<?php echo $k+1; ?>">
                        <option value="">Select</option>
                        <option value="Monthly"<?php if ( isset($feesdetails[$k]['frequency']) && $feesdetails[$k]['frequency'] === 'Monthly') echo ' selected="selected"'?>>Monthly</option>
                        <option value="Half yearly"<?php if (isset($feesdetails[$k]['frequency'])&& $feesdetails[$k]['frequency'] === 'Half yearly') echo ' selected="selected"'?>>Half yearly</option>
                        <option value="Yearly"<?php if ( isset($feesdetails[$k]['frequency']) && $feesdetails[$k]['frequency'] === 'Yearly') echo ' selected="selected"'?>>Yearly</option>
                        <option value="Onetime"<?php if ( isset($feesdetails[$k]['frequency']) && $feesdetails[$k]['frequency'] === 'Onetime') echo ' selected="selected"'?>>Onetime</option>
                    </select></td>
                    <?php }?>
                  <tr>
                    <td><strong>Due Date</strong></td>
                    
                     <?php for ($l=0; $l<=11;$l++){ ?>
                    <td>
                    
                    
                    
                    <div class="">
                        <input class="datepicker" name="cls<?php echo $l+1; ?>duedate" id="" type="text" value="<?php echo isset( $feesdetails[$l]['duedate']) ?  $feesdetails[$l]['duedate'] : ''; ?>"/>
                        </div>
                        
                        
                        </td>
                    
                    <?php }?>
                    
                    
                  </tr>
                  <tr>
                    <td><strong>Grace Period</strong></td>
                    
                     <?php for ($j=0; $j<=11;$j++){ ?>
                    <td><input type="text" name="cls<?php echo $j+1; ?>grace" class="" value="<?php echo isset(  $feesdetails[$j]['grace']) ?   $feesdetails[$j]['grace']: ''; ?>"/></td>
                    
                    <?php }?>
                    
                    
                  </tr>
                  <tr>
                    <td><strong>Last Date</strong></td>
                     <?php for ($m=0; $m<=11;$m++){ ?>
                    <td>
                    
                    
                    <div class="">
                        <input class="datepicker" name="cls<?php echo $m+1; ?>lastdate" id="id-date-picker-<?php echo $m; ?>" type="text" value="<?php echo isset(  $feesdetails[$m]['lastdate']) ?  $feesdetails[$m]['lastdate']: '' ; ?>"/>
                       </div></td>
                    
                    <?php }?>
                   
                  </tr>
                  <tr>
                    <td><strong>Penalty Type</strong></td>
                    <td><select class="browser-default" name="cls1penaltytype" id="">
                        
                        <option value="Fixed">Fixed</option>
                      
                      </select></td>
                    <td><select class="browser-default" name="cls2penaltytype" id="">
                      
                        <option value="Fixed">Fixed</option>
                       
                      </select></td>
                    <td><select class="browser-default" name="cls3penaltytype" id="">
                      
                        <option value="browser-default">Fixed</option>
                       
                      </select></td>
                    <td><select class="browser-default" name="cls4penaltytype" id="">
                       
                        <option value="browser-default">Fixed</option>
                       
                      </select></td>
                    <td><select class="browser-default" name="cls5penaltytype" id="">
                        
                        <option value="Fixed">Fixed</option>
                      
                      </select></td>
                    <td><select class="browser-default" name="cls6penaltytype" id="">
                     
                        <option value="Fixed">Fixed</option>
                     
                      </select></td>
                    <td><select class="browser-default" name="cls7penaltytype" id="">
                     
                        <option value="Fixed">Fixed</option>
                      
                      </select></td>
                    <td><select class="browser-default" name="cls8penaltytype" id="">
                   
                        <option value="Fixed">Fixed</option>
                      
                      </select></td>
                    <td><select class="browser-default" name="cls9penaltytype" id="">
                       
                        <option value="Fixed">Fixed</option>
                      
                      </select></td>
                    <td><select class="browser-default" name="cls10penaltytype" id="">
                      
                        <option value="Fixed">Fixed</option>
                       
                      </select></td>
                    <td><select class="browser-default" name="cls11penaltytype" id="">
                     
                        <option value="Fixed">Fixed</option>
                        
                      </select></td>
                    <td><select class="browser-default" name="cls12penaltytype" id="">
                      
                        <option value="Fixed">Fixed</option>
                      
                      </select></td>
                  </tr>
                  <tr>
                    <td><strong>Penalty Amount</strong></td>
                    <?php for ($n=0; $n<=11;$n++){ ?>
                    <td><input type="text" name="cls<?php echo $n+1; ?>penaltyamount" class="form-control" value="<?php echo isset(   $feesdetails[$n]['penaltyamount']) ?   $feesdetails[$n]['penaltyamount']: ''; ?>"/></td>
                    
                    <?php }?>
                    
                  </tr>
                  <tr>
                    <td><strong>Penalty Waiver</strong></td>
                    
                     <?php for ($p=0; $p<=11;$p++){ ?>
                    <td align="center">
                    
                  
                        
                        
                        <input type="checkbox" name="cls<?php echo $p+1; ?>penaltywaiver" id="Penalty<?php echo $p+1; ?>" <?php if (isset($feesdetails[$p]['penaltywaiver']) && $feesdetails[$p]['penaltywaiver'] === 'on') {
                        echo ' checked="checked"';}?> />

                          <label for="Penalty<?php echo $p+1; ?>"></label>
                        
                        
                        
                        </td>
                    
                     
                    <?php }?>
                  </tr>
                  
                  

                </tbody>
              </table>
              
             
              
              
          
              <div class="pull-right" id="submit_hide">
              <div class="divider"></div>
              <br />
              <div class="col s12 m12 l3 right">
                      
              
              
              <a class="btn waves-effect waves-light" style="padding-right: 10px;" href="<?php echo site_url() ?>/admin/Addfee/editfee/<?php if(isset($feesdetails[1]['school_id'])){echo $feesdetails[1]['school_id'];} ; ?>" style="">Cancel</a>  
               <button class="btn waves-effect waves-light" type="submit" name="submit"  value="submit"> Submit</button>         
             </div>
              </div>


<!-- Date picker script -->
<script type="text/javascript">
           $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
</script>