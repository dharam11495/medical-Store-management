<?php include('header.php'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<form>
				<h4 class="text-center">Medicine Entry</h4>
				<input type="txt" name="name" class="form-control"><br>
				<input type="txt" name="name" class="form-control"><br>
				<input type="txt" name="name" class="form-control"><br>
				<input type="txt" name="name" class="form-control"><br>
				<input type="txt" name="name" class="form-control"><br>

				<select class="form-control">
					<option value="">Select</option>				
					<?php if(count($res)): ?>
						<?php foreach($res as $value): ?>
							<option value=<?php echo $value->name; ?>><?php echo $value->name; ?></option>
					<?php endforeach; ?>	
				<?php else: ?>
				<?php endif; ?>		
				</select><br>
				<?php echo form_submit(['type'=>'submit','class'=>'btn btn-outline-success','value'=>'Login']); ?>
				<?php echo form_reset(['type'=>'reset','class'=>'btn btn-outline-warning','value'=>'Reset']); ?>
			</form>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>