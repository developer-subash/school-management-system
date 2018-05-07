<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title">
            		<i class="entypo-plus-circled" ></i>
					<?php echo get_phrase('add_parent');?>
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open(base_url() . 'index.php?admin/parent/create/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
                    
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name');?>*</label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"  autofocus
                            	value="">
						</div>
					</div>
                    
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email');?>*</label>
						<div class="col-sm-5">
							<input type="email" class="form-control" name="email" value="" data-validate="required">
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('password');?>*</label>
                        
						<div class="col-sm-5">
							<input type="password" class="form-control" name="password" value="" data-validate="required">
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('phone');?>*</label>
                        
						<div class="col-sm-5">
							<input type="tel" class="form-control" name="phone" data-validate="required" value="">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('current_address');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="current_address" value="">
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('permanent_address');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="permanent_address" value="">
						</div>
					</div>
					
					
					<!-- <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('p_relation');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="p_relation" value="">
						</div>
					</div> -->

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('education');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="education" value="">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('profession');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="profession" value="">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('income');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="income" value="">
						</div>
					</div>

					

						<div class="form-group">
						<button for="field-2"  type="Reset" class="btn btn-default" style="margin-left: 20px;">Reset</button> 
                        
						<div class="col-sm-5" style="float: right;">
							<button type="submit" class="btn btn-default"><?php echo get_phrase('add_parent');?></button>
						</div>
					</div>
				
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>