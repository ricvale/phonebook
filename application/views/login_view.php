<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>PHONE BOOK</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"  rel="stylesheet">
</head>
<body>
<div style="text-align:center; margin-top:10em;">
<form method="post">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Sign in <span class="glyphicon glyphicon-log-in"> </span> </h3>
					</div>
					<div class="panel-body">
						<?php echo form_open('admin'); ?>
						<fieldset>
							<div class="form-group">
							
								<?php 	
									$data = array(
									              'name'        => 'email',
									              'id'          => 'email',
									              'placeholder' => 'Your mail',
									              'maxlength'   => '100',
									              'class'       => 'form-control',
									            );

									echo form_input($data);

									//echo form_input('email', set_value('email'), 'id="email"'); 
								?>
							</div>
							<div class="form-group">
								
								<?php 
									$data = array(
									              'name'        => 'password',
									              'id'          => 'password',
									              'placeholder' => 'Password',
									              'value'       => '',
									              'maxlength'   => '100',
									              'class'       => 'form-control',
									            );

									echo form_password ($data); 

								?>
							</div>
							
							<?php echo form_submit('submit', 'Login', "class='btn btn-lg btn-primary btn-block'"); ?>

							<br/></br/>
						</fieldset>
						<?php echo form_close(); ?>

						<div class="errors" style="color:red;"> <?php echo validation_errors(); ?> </div>
						
						<a href="register">Register Here</a>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</form>
</div>

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>