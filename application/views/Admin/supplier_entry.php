<?php include('header.php'); ?>
<div class="container">
	<div class="row">



		<div class="col-md-12"><h4 class="text-center" style="color: red;">Supplier Entry</h4></div><br>

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
						
			<?php 	echo form_open('welcome/supplier'); ?>
        <div class="row" style="padding: 20px;">
			<div class="form-group col-md-4">
				<label for="qwert">Select Company Name</label>
				<select class="form-control" name="company_name">
					<option value="">Select Company</option>				
					<?php if(count($res)): ?>
						<?php foreach($res as $value): ?>
							<option value="<?php echo $value->company_name; ?>"><?php echo $value->company_name; ?></option>
					<?php endforeach; ?>	
				<?php else: ?>
				<?php endif; ?>

				</select>
				<?php  echo form_error('company_name');  ?>				
			</div>

			<div class="form-group col-md-4">
				<label for="qwert">Supplier Name</label>
				<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Supplier Name','name'=>'suppiler_name','value'=>set_value('suppiler_name')]); ?>
				<?php  echo form_error('suppiler_name');  ?>			

			</div>

			<div class="form-group col-md-4">
				<label for="qwert">Supplier Address</label>
				<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Supplier Address','name'=>'suppiler_address','value'=>set_value('suppiler_address')]); ?>
				<?php  echo form_error('suppiler_address');  ?>			

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
				<label for="qwert">Supplier Mobile Number</label>
				<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Supplier Mobile Number','name'=>'mobile_no','value'=>set_value('mobile_no')]); ?>	
				<?php  echo form_error('mobile_no');  ?>			

			</div>

			<div class="form-group col-md-4">
				<label for="qwert">Supplier Email.</label>
				<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Supplier Email','name'=>'email','value'=>set_value('email')]); ?>
				<?php  echo form_error('email');  ?>			

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