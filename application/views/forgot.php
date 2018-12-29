<!DOCTYPE html>
<html>
<head>
	<title>Medical Store</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<style type="text/css">
	  body html{
	  	margin: 0px;
	  	padding: 0px;
	  }
	  .btn--cta:hover,.btn--cta:visited:hover{
background-color:#fff;
box-shadow:0 0 30px 1px rgba(204,78,70,.2);
color:#cc4e46!important
}        
		.backgroundimg{
			background-image: url("<?= base_url('Assets/img/background.jpg'); ?>");
			background-size: cover;
			background-position: center center;
			background-repeat: no-repeat;
			height: 100vh;
			width: 90%;
		}
	</style>
</head>
<body class="backgroundimg">

	<div class="container-fluid">
		<div class="row">
				<?php  if($error=$this->session->flashdata('Login_Failed')):  ?>
		
			<div class="col-lg-4"></div>
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<div class="alert alert-danger">
					<?php echo $error; ?>
				</div>
			</div>
		
	<?php endif; ?>
			<div class="col-lg-4"></div>
			<div class="col-lg-4" style="margin-top: 15%;">
				<div class="form-group" style="margin-top: 10%;">
					<?php  echo form_error('uname'); ?>
				</div>
				<div class="form-group" style="margin-top: 10%;">
					<?php  echo form_error('pass'); ?>
				</div>
			</div>
			<div class="col-lg-4" style="margin-top: 15%;">

				<?php 	echo form_open('Login/forgot'); ?>
				<div class="form-group">
				<label for="qwert">Email</label>
				<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Email','name'=>'uname','value'=>set_value('uname'),'type'=>'email']); ?>				
				</div>
				
				

				

				

				<?php echo form_submit(['type'=>'submit','class'=>'btn btn-outline-light','value'=>'Reset']); ?>
				<?php echo form_reset(['type'=>'reset','class'=>'btn btn-outline-warning','value'=>'Reset']); ?>
				
				 <?php echo anchor('login', 'Login?', ['class'=>'link-class float-right','style'=>'color:lightred; text-decoration:none;' ]) ?>
				
				
			</div>
		</div>
		
	</div>
	
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>