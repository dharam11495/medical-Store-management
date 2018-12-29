<?php include('header.php'); ?>
<div class="container">
	<div class="row">



		<div class="col-md-12"><h4 class="text-center" style="color: red;">Medicine Entry</h4></div><br>

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
						
			<?php 	echo form_open('welcome/product'); ?>
        <div class="row" style="padding: 20px;">
        	<div class="form-group col-md-4">
				<label for="qwert">Trade Name</label>
				<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Trade Name','name'=>'trade_name','value'=>set_value('trade_name')]); ?>	
				<?php  echo form_error('trade_name');  ?>			
			</div>
			<div class="form-group col-md-4">
				<label for="qwert">Type Of Variants</label>
				<select class="form-control" name="variats_name">
					<option value="">Select Variats</option>									
					<option value="Capsules">Capsules</option>				
					<option value="Drops">Drops</option>				
					<option value="Injections">Injections</option>	
					<option value="Inhalers">Inhalers</option>				
					<option value="Implants or patches">Implants or patches</option>
					<option value="Suppositories">Suppositories</option>
					<option value="Syrup">Syrup</option>
					<option value="Tablet">Tablet</option>				
					<option value="Sprey">Sprey</option>				
					<option value="Other">Other</option>				
					

				</select>	
				<?php  echo form_error('variats_name');  ?>	
			</div>
			<div class="form-group col-md-4">
				<label for="qwert">Company Name</label>
				<select class="form-control" name="company_name" id="company_name">
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
				<select class="form-control" name="supplier_name" id="supplier_name">
					<option value="">Select Supplier Name</option>

				</select>
				<?php  echo form_error('supplier_name');  ?>		
			</div>

			<div class="form-group col-md-4">
				<label for="qwert">Salt Name</label>
				<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Salt Name','name'=>'salt_name','value'=>set_value('salt_name')]); ?>
				<?php  echo form_error('salt_name');  ?>			

			</div>

			<div class="form-group col-md-4">
				<label for="qwert">Quantity</label>
				<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Quantity','name'=>'order','value'=>set_value('order')]); ?>
				<?php  echo form_error('order');  ?>			

			</div>

			<div class="form-group col-md-4">
				<label for="qwert">Rate</label>
				<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Rate ','name'=>'rate','value'=>set_value('rate')]); ?>
				<?php  echo form_error('rate');  ?>			

			</div>

			<div class="form-group col-md-4">
				<label for="qwert">Batch No.</label>
				<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Batch No.','name'=>'batch_no','value'=>set_value('batch_no')]); ?>
				<?php  echo form_error('batch_no');  ?>			

			</div>

			<div class="form-group col-md-4">
				<label for="qwert">MFD Date</label>
				<?php echo form_input(['class'=>'form-control','type'=>'date','name'=>'mfd_date','value'=>set_value('mfd_date')]); ?>	
				<?php  echo form_error('mfd_date');  ?>			

			</div>


			<div class="form-group col-md-4">
				<label for="qwert">Exp- Date</label>
				<?php echo form_input(['class'=>'form-control','type'=>'date','name'=>'exp_date','value'=>set_value('exp_date')]); ?>	
				<?php  echo form_error('exp_date');  ?>			

			</div>

			<input type="hidden" name="date_time">
			<input type="hidden" name="take_in_quantity">
			


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