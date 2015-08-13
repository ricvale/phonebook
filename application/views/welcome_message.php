<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome - <?php echo $userRow->email; ?></title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"  rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap-editable/bootstrap-editable.css'); ?>">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css">
</head>
<body>

	
	
	
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" style="position:absolute;right:5px;">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-lock" style="text-shadow: rgba(127, 127, 127, 0.7) 0 9px 6px;"> 
			</span> <span style="text-shadow: rgba(127, 127, 127, 0.7) 0 9px 6px;"> Hi <?php echo $userRow->username; ?> &nbsp; </span>
		  </a> 
		 
        </div>
        <div id="navbar" class="collapse navbar-collapse">
         
				<form class="navbar-form navbar-right">
					<a href="index.php?refresh" class="btn btn-success"">
						<span class="glyphicon glyphicon-refresh"> </span> 
					</a>
				</form>
		
				<form class="navbar-form navbar-right">
					<a href="logout" class="btn btn-warning">
						<span class="glyphicon glyphicon-user"> Sign Out <span class="glyphicon glyphicon-log-out"></span> </span>
					</a>
				</form>
			
			
		 
        </div><!--/.navbar-collapse -->
	 </div>
    </nav>

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron" style="margin-top:60px;margin-right:-1em;margin-left:1em;">
        <h1> <span class="glyphicon glyphicon-list-alt"> </span> PHONE BOOK   
		
		  </h1>
		    <a class="btn btn-lg btn-primary" role="button" data-toggle="collapse" data-target="#main_content">
			 Toggle <span class="glyphicon glyphicon-menu-down"> </span> 
			
		  </a>
		</div>
		<div class="container collapse" id="main_content">
		  <table id="contact_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
		   <thead>
						<tr><th> Name <th> Phone number <th> Date of adding<th> Additional Notes  <th> Delete </tr>
		   </thead>
		   <tbody>
		   <?php
						
						
						if ( !empty ($result) )
						{
						  // Fetch one and one row
						  FOREACH ($result AS $result)
							{
							printf (
								"<tr>
								<td><a href='#' data-name='name' data-type='text' class='contact' data-pk='%s'>%s</a></td>
								<td><a href='#' data-name='phone' data-type='text' class='contact' data-pk='%s'>%s</a></td>
								<td> %s </td>
								<td><a href='#' data-name='note' data-type='textarea' class='contact' data-pk='%s'>%s</a></td>
								<td>
									<a href='#' class='deletecontact btn btn-xs btn-danger' rel=%s data-name='%s'><span class='glyphicon glyphicon-remove'> </span>
								</td>
								</tr>",
								$result['id'],
								$result['name'],
								$result['id'],
								$result['phone'],
								$result['date'],
								$result['id'],
								$result['note'],
								$result['id'],
								$result['name']
								);
							
							}
						}
						
		  ?>
		   </tbody>
		   <!--tfoot>
						<tr><th> Name <th> Phone number <th> Date of adding <th> Additional Notes  <th> Delete</tr>
		   </tfoot-->
		</table>
		<div style="margin-bottom:80px;">
			<a class="btn btn-default btn-lg" href="#" id="add_contact">
				<span class="glyphicon glyphicon-plus"></span> <span class="hidden-xs"> Add contact</span>
			</a>
	  </div>
      </div>

    </div> <!-- /container -->
	
	<div class="footer" style="background:black; color:gainsboro;text-align:left; 
		padding-top:15px; padding-bottom:15px; padding-right:50px; height:40px; position:fixed; bottom:0; left:0; width:100%;">
				   &copy; 2015 &raquo; 

 					<span  style="float:right;">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></span>

	</div>


    <!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	
		<!-- DATATABLES  -->
		<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#contact_table').dataTable();
			} );
		</script>
		
		<script type="text/javascript">
						/* Button Delete contact
			======================================= */
			$(document).on('click','.deletecontact',function(event){
				var id= $(this).attr('rel');
				var that = $(this);
				var name= $(this).attr('data-name');
				 var del = window.confirm('Confirm delete the contact '+name+'?');
					if (del === false) {
						event.preventDefault();
						return false;
					}
					
				$.ajax({
									url: '<?php echo base_url("delete"); ?>',
									type: 'POST',
									data: { id_contact: id },
									success: function (resp) {		
									  if (resp == 1) {  
									   //alert( 'ok '+resp); 
									   that.closest('tr').hide();
									  } 
									  else { alert('error '+resp);}
									},
									error: function(e){ alert ("Error " + e); }
				});
				event.preventDefault();
			
			});
	    </script>
	    <!-- // End DATATABLES -->
	
	   <!-- EDITABLE -->
	   <script type="text/javascript" language="javascript" src="<?php echo base_url('assets/bootstrap-editable/bootstrap-editable.js'); ?>"></script>
	   <script type="text/javascript" language="javascript">
	
			//Turn to inline/popup mode
		   $.fn.editable.defaults.mode = 'inline';
		   
		   // Contact EDITABLE ===================================================
			$('.contact').editable({
				type: 'POST',
				pk: 'pk',
				name: 'name',
				// '<?php //echo $this->security->get_csrf_token_name(); ?>' : '<?php //echo $this->security->get_csrf_hash(); ?>',
				 //csrf_test_name: $.cookie('csrf_cookie_name'),
				url: '<?php echo base_url("update"); ?>',
				//title: 'Enter yours',
				placement: 'top',
				emptytext: "Empty",
				validate: function(value) {
					if($.trim(value) == '') {
						return 'Required field'; 
					}
					if((value).length >254) {
						return 'Too long'; 
					}
				},
				success: function(response, newValue) {	
					//alert(response + newValue);
					} ,
				error:function(e){
				        console.log("err: "+e);
						alert("error "+e);
						//window.open("","MsgWindow","width=800,height=600").document.write(e);
				},				
			});	
			//End Contact Editable ===========================================================	
		</script>
		
		<script type="text/javascript" language="javascript">
		
		/* Button add one contact
			======================================= */
			$(document).on('click','#add_contact',function(e){
				that = this;
										
				$.ajax({
									url: '<?php echo base_url("create"); ?>',
									type: 'POST',
									data: { id_user: '<?php echo $_SESSION["id"]; ?>' },
									success: function (resp) {		
									   $('#contact_table').append(resp);
										
								        //INIT Plugin else it does not work.....
											
								        //begin - init EDITABLE
											$('.contact').editable({
												type: 'POST',
												pk: 'pk',
												name: 'name',
												url: '<?php echo base_url("update"); ?>',
												//title: 'Enter yours',
												placement: 'top',
												emptytext: "Empty",
												placeholder: "Enter a value",

												validate: function(value) {
													if($.trim(value) == '') {
														return 'Required';
													}
												},
												success: function(response, newValue) {	
												//echo (response);
													} ,
													error:function(e){
														alert("error "+e);
												},				
											});
											 
										//end init EDITABLE
										
											//Focus :
											setTimeout(function() { $('#contact_table').find('tr:last').find('.contact').eq(0).editable('show');}, 2000); 							
									},
									error: function(e){ alert ("Erro " + e); }
				}).done(function() {
					 //make required & next field focus
									$('#contact_table').find('tr:last').find('.contact').eq(0).editable('option', 'validate', function(v) {
										if(!v) {return 'Required!';}else{
										setTimeout(function() {
											$('#contact_table').find('tr:last').find('.contact').eq(1).editable('show');}, 400); 
																}	
									});
					//make required & next field	
						 			$('#contact_table').find('tr:last').find('.contact').eq(1).editable('option', 'validate', function(v) {
										if(!v) {return 'Required!';}else{
										setTimeout(function() {
											$('#contact_table').find('tr:last').find('.contact').eq(2).editable('show');}, 400); 
																}
									}); 
					//make required			
						 			$('#contact_table').find('tr:last').find('.contact').eq(2).editable('option', 'validate', function(v) {
										// if(!v) {return 'Required!';}
									}); 
									
				});	
				e.preventDefault();
			});
			// END Button add one Contact
		</script>	
</body>
</html>