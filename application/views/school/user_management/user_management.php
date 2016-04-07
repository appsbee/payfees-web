<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>



<section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper" class=" grey lighten-3">
            <!-- Search for small screen -->
            <div class="header-search-wrapper grey hide-on-large-only">
                <i class="mdi-action-search active"></i>
                <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
            </div>
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">User Management </h5>
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">User Management </a></li>
                    <li class="active">Add User</li>
                </ol>
              </div>
            </div>

          </div>

        </div>

        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">


<div class="col s12 m4 l4">



                	 <div class="input-field col s12">
                     <a class="waves-effect waves-light btn modal-trigger right" href="#myModal"> <i class="mdi-image-control-point left"></i> Add User</a>

                     </div>


                </div>

              </div>
              <div class="divider"></div>
              <br><br>
              <div class="col s12 m4 l12" style="text-align:center;">
                <p style="color:green" id="sucessjavas"><?php //echo $this->session->flashdata('add_success'); ?>
                </div>
<div class="col-xs-12" id="">
            <table>
                    <thead>
                      <tr>

                        <td align="center">Name</td>
                        <td align="center">Email</td>
                        <td align="center">User Level</td>
                        <td align="center" width="7%">Status</td>
                         <td align="center">Joined</td>
                        <td align="center">Action</td>
                      </tr>
                    </thead>
                    <tbody>
                   <?php if (isset($userData) && is_array($userData) && count($userData)) {
	foreach ($userData as $key => $userRow) {
		?>

                    <tr id="<?php echo isset($userRow->usermanagement_id) ? $userRow->usermanagement_id : ''; ?>">
                         <td align="center"><?php echo isset($userRow->name) ? $userRow->name : ''; ?></td>
                        <td align="center"><?php echo isset($userRow->useremail) ? $userRow->useremail : ''; ?></td>
                        <td align="center">

                        <?php if ($userRow->useruserlevel == "1") {
			echo 'Admin';
		}
		if ($userRow->useruserlevel == "2") {
			echo 'Member';
		}
		if ($userRow->useruserlevel == "3") {
			echo 'Teacher';
		}

		?>


                         <td align="center" class="status" id="<?php echo isset($userRow->usermanagement_id) ? $userRow->usermanagement_id : ''; ?>"style=" <?php if ($userRow->status == "1") {?>
                                                color:green;
                                                    <?php } else {?>
                                                color:red;
                                                <?php }?>
                                           ">

                                           <?php if ($userRow->status == "1") {
			echo 'Active';
		}
		if ($userRow->status == "0") {
			echo 'Deactive';
		}?>

                                           </td>


                          <td align="center">
                            <?php
$splitTimeStamp = explode(" ", $userRow->created);
		$date = $splitTimeStamp[0];
		$time = $splitTimeStamp[1];
		$date = date('d-m-Y', strtotime($date));
		echo isset($date) ? $date : '';
		?>
                         </td>




                        <td align="center">       <a class="editmember" id="<?php echo isset($userRow->usermanagement_id) ? $userRow->usermanagement_id : ''; ?>" href="javascript:void(0)" data-name="new" class="btn-floating waves-effect waves-light edit" id="1"><i class="mdi-editor-border-color"></i></a></td>

                    </tr>
                    <?php }}?>


                    </tbody>
            </table>
</div>

        </div>
        <!--end container-->
      </section>


<div class="modal"   id="myModal" role="dialog" style="width:850px;">
    <div class="modal-content">
      <h4>Add User <a class="btn-floating waves-effect waves-light right modal-close "><i class="mdi-content-clear"></i></a></h4>
      <div class="row"><div class="divider"></div></div>

     <p id="sucess" style="color: green;"></p>
      <p id="error" style="color: red;"></p>

      <div class="row">

       <div class="input-field col s6">
           <input type="text" id="username" class="" />
                 <label for="first_name">Name</label>

           </div>

          <div class="input-field col s6">
                 <input type="text" id="email" class="" />
                 <label for="email">Email</label>
          </div>

           <div class="input-field col s6">
           <input type="password" id="password" class="" />
                 <label for="password">Password</label>

           </div>

          <div class="input-field col s6">
                 <input type="password" id="confirmpassword" class="" />
                 <label for="confirmpassword">Confirm Password</label>
          </div>

           <div class="input-field col s6">
                <select class="" id="userlevel">
                <option value="" selected>User Level</option>
                <option value="1">Admin</option>
                <option value="2">Member</option>
                 <option value="3">Teacher</option>
              </select>

          </div>




       </div>
    </div>
    <div class="modal-footer">
<div class="divider"></div>
     <div class="input-field col s12">

     <button class="btn btn-info pull-right " type="button" id="addmember"> <i class="ace-icon fa fa-check bigger-110"></i> Submit </button>




      </div>

    </div>
     <br>
  </div>



<div class="modal"   id="myeditModal" role="dialog">
    <div class="modal-content">
      <h4>Update User <a class="btn-floating waves-effect waves-light right modal-close "><i class="mdi-content-clear"></i></a></h4>
      <div class="row"><div class="divider"></div></div>

     <p id="" style="color: green;"></p>
      <p id="" style="color: red;"></p>
      <div class="row">

       <div class="input-field col s6">
           <input type="text" id="editusername" class="" />
                 <label for="first_name">Name</label>

           </div>

          <div class="input-field col s6">
                 <input type="text" id="editemail" class="" />
                 <label for="email">Email</label>
          </div>

           <div class="input-field col s6">
           <input type="password" id="editpassword" class="" />
                 <label for="password">Password</label>

           </div>

          <div class="input-field col s6">
                 <input type="password" id="editconfirmpassword" class="" />
                 <label for="confirmpassword">Confirm Password</label>
          </div>

           <div class="input-field col s6">
                <select class="browser-default" id="edituserlevel">
                <option value="1">Admin</option>
                <option value="2">Member</option>
              </select>
          </div>




       </div>
    </div>
    <div class="modal-footer">
<div class="divider"></div>
     <div class="input-field col s12">

     <button class="btn btn-info pull-right modal-close" type="button" id="addfees"> <i class="ace-icon fa fa-check bigger-110"></i> Submit </button>



      </div>

    </div>
     <br>
  </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


<script>
$('#addmember').click(function(){


        $('#sucess').html("");
        $('#error').html("");
    //alert('adadadad');return false;
    var name=$('#username').val();
    if(name ==""){
         alert("Enter The member Name")
         $('#username').focus()
        return false;
    }
    //console.log(name);
    var useremail=$('#email').val();
    if(useremail ==""){
         alert("Enter The member Email")
         $('#email').focus()
        return false;
    }
    //console.log(useremail);
     var userpassword=$('#password').val();
    //console.log(userpassword);
    if(userpassword ==""){
         alert("Enter The Password")
         $('#password').focus()
        return false;
    }
    var userconfirmpassword=$('#confirmpassword').val();
    //console.log(userconfirmpassword);
     if(userconfirmpassword ==""){
         alert("Enter The Confirm Password")
         $('#confirmpassword').focus()
        return false;
    }

   var  useruserlevel=$('#userlevel').val();
   //console.log(useruserlevel);return false;

    if(useruserlevel ==""){
        alert("Select The User Level")

        return false;
    }
    //console.log(useruserlevel);
    //return false;
$.ajax({
		type: "GET",
		//dataType: "html",
		url: '<?php echo site_url() ?>/school/Usermanagement/addMemeber',
		data: {
			'name': name,'useremail': useremail,'userpassword': userpassword,'userconfirmpassword': userconfirmpassword,'useruserlevel': useruserlevel
		},
		success: function(resp) {
		 console.log(resp);//return false;
         $('#error').html(resp.error);
         if(resp.sucess=="Sucess"){
            $('#sucess').html("School Member Added Successfully");
            location.reload()

         }

         }

    });
 });

 $('.editmember').click(function(){
    var edit_id=$(this).attr('id');
    console.log(edit_id);

    $.ajax({
		type: "GET",
		//dataType: "html",
		url: '<?php echo site_url() ?>/school/Usermanagement/getupdatedata',
		data: {
			'edit_id': edit_id
		},
		success: function(resp) {
          console.log(resp);
          $('#editusername').val(resp.name);
          $('#myeditModal').openModal();
		}

    });

 });




$(".status").click(function(){
    var self= $(this);
    var edit_id=$(this).attr('id');
    //console.log(edit_id);return false;


    var status =$(this).text();
    var status =status.trim();

    //console.log("status"+status);return false;

    var isactive="";
    if(status=="Active"){
         isactive ="0";
    }else{
        isactive = "1";
    }
     //console.log("isactive"+isactive);return false;

    $.ajax({
		type: "GET",
		//dataType: "html",
		url: '<?php echo site_url() ?>/school/Usermanagement/changestatus',
		data: {
			'edit_id': edit_id,'status': status,'isactive': isactive
		},
		success: function(resp) {
		 //console.log(resp);return false;
         if(resp.stateactive=="1"){
         //alert('green');return false;
            self.text('Active');
            self.css({color:'green'})
         }
         if(resp.stateactive=="0"){
            //alert('red');return false;

            self.text('Deactive');
            self.css({color:'red'})

         }


         }

    });





})

 </script>