
<div class="container">

	<div class="row">

	<form  action="<?php echo base_url(). 'index.php?admin/eaa_category/add'; ?>" method="post" id="form">
			
			

			<div class="col-md-3">
			<div class="form-group">
					
			<input type="text" name="category_name" class="form-control" placeholder="<?php echo get_phrase('category_name'); ?>">

			</div>
			</div>

			<div class="col-md-3">
			<div class="form-group">
					
				<button type="submit" class="btn btn-sm btn-success"><?php echo get_phrase('save'); ?></button>

			</div>
			</div>

		</form>

		</div>

		</div>