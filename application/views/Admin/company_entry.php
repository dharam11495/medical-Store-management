<?php include('header.php'); ?>
<div class="container">
	<div class="row">



		<div class="col-md-12"><h4 class="text-center" style="color: red;">Company Entry</h4></div><br>

			<?php  if($user=$this->session->flashdata('user')): 

			$user_class=$this->session->flashdata('user_class')

			?>
			
			<div class="col-md-12">
			<div class="alert <?= $user_class ?>">
			<?= $user; ?>
			</div>
			</div>
			

			<?php endif; ?>

		<div class="col-md-12 card" style="background-color: #F5DEB3;">
						
			<?php 	echo form_open('welcome/companyEntry'); ?>
        <div class="row" style="padding: 20px;">
			<div class="form-group col-md-4">
				<label for="qwert">Company Name</label>
				<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Company Name','name'=>'company_name','value'=>set_value('company_name')]); ?>	
				<?php  echo form_error('company_name');  ?>	 		
			</div>

			<div class="form-group col-md-4">
				<label for="qwert">Company Address</label>
				<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Company Address','name'=>'company_address','value'=>set_value('company_address')]); ?>
				<?php  echo form_error('company_address');  ?>			

			</div>

			<div class="form-group col-md-4">
				<label for="qwert">City</label>
				<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter City','name'=>'city','value'=>set_value('city')]); ?>
				<?php  echo form_error('city');  ?>			

			</div>

			<div class="form-group col-md-4">
				<label for="qwert">Pin Code</label>
				<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Pin Code','name'=>'pin_code','value'=>set_value('pin_code')]); ?>	
				<?php  echo form_error('pin_code');  ?>			

			</div>


			<div class="form-group col-md-4">
				<label for="qwert">Company Registration Number</label>
				<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Company Registration Number','name'=>'register_no','value'=>set_value('register_no')]); ?>	
				<?php  echo form_error('register_no');  ?>			

			</div>

			<div class="form-group col-md-4">
				<label for="qwert">Company CIN Number</label>
				<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Company CIN Number','name'=>'cin_no','value'=>set_value('cin_no')]); ?>
				<?php  echo form_error('cin_no');  ?>			

			</div>


			<div class="form-group col-md-4">
				<label for="qwert">Select Company Type</label>
				<select class="form-control" name="company_type">
					<option value="">Select</option>				
					<?php if(count($res)): ?>
						<?php foreach($res as $value): ?>
							<option value="<?php echo $value->name; ?>"><?php echo $value->name; ?></option>
					<?php endforeach; ?>	
				<?php else: ?>
				<?php endif; ?>

				</select>
				<?php  echo form_error('company_type');  ?>			

			</div>
            </div>
            </div>
				<br>
				<div class="col-md-12 text-center" style="margin-top: 25px;">
				<?php echo form_submit(['type'=>'submit','class'=>'btn btn-outline-success','value'=>'Submit Entry']); ?>
				<?php echo form_reset(['type'=>'reset','class'=>'btn btn-outline-warning','value'=>'Reset']); ?>


				<?php echo form_close(); ?>
			</div>
		
	</div>
</div>
<?php include('footer.php'); ?>