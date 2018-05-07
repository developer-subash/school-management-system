	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary" data-collapsed="0">
				<div class="panel-heading">
					<div class="panel-title" >
						<i class="entypo-plus-circled"></i>
						<?php echo get_phrase('add_student');?>
					</div>
				</div>
				<div class="panel-body">

					<?php echo form_open(base_url() . 'index.php?admin/student/create/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

					<div class="col-md-6"> <!-- Enrollement Details -->
						<div class="panel panel-primary" data-collapsed="0">
							<div class="panel-heading">
								<div class="panel-title" >
									<i class="entypo-plus-circled"></i>
									<?php echo get_phrase('academic_details');?>
								</div>
							</div>
							<div class="panel-body">
								<div class="form-group">
									<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>

									<div class="col-sm-5">
										<input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="" autofocus required>
									</div>
								</div>

								<div class="form-group">
									<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('class');?></label>

									<div class="col-sm-5">
										<select name="class_id" class="form-control" data-validate="required" id="class_id"
										data-message-required="<?php echo get_phrase('value_required');?>"
										onchange="return get_class_sections(this.value)">
										<option value=""><?php echo get_phrase('select');?></option>
										<?php
										$classes = $this->db->get('class')->result_array();
										foreach($classes as $row):
											?>
											<option value="<?php echo $row['class_id'];?>">
												<?php echo $row['name'];?>
											</option>
											<?php
										endforeach;
										?>
									</select>
								</div>
							</div>

							<!-- <div class="form-group">
								<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('section');?></label>
								<div class="col-sm-5">
									<select name="section_id" class="form-control" id="section_selector_holder">
										<option value=""><?php echo get_phrase('select_class_first');?></option>

									</select>
								</div>
							</div> -->

							<!-- <div class="form-group">
								<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('roll');?></label>

								<div class="col-sm-5">
									<input type="text" class="form-control" name="roll" value="" >
								</div>
							</div> -->

							<div class="form-group">
								<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('joining_date');?></label>

								<div class="col-sm-5">
									<input type="text" class="form-control datepicker" name="joining_date" value="" data-start-view="2">
								</div>
							</div>

						</div>
					</div>
				</div>


				<div class="col-md-6"> <!-- Contact Details -->
					<div class="panel panel-primary" data-collapsed="0">
						<div class="panel-heading">
							<div class="panel-title" >
								<i class="entypo-plus-circled"></i>
								<?php echo get_phrase('student_contact');?>
							</div>
						</div>
						<div class="panel-body">

							<div class="form-group">
								<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('parent');?></label>

								<div class="col-sm-5">
									<select name="parent_id" class="form-control select2" required>
										<option value=""><?php echo get_phrase('select');?></option>
										<?php
										$parents = $this->db->get('parent')->result_array();
										foreach($parents as $row):
											?>
											<option value="<?php echo $row['parent_id'];?>">
												<?php echo $row['name'];?> &nbsp; <?php echo $row['phone'];?>
											</option>
											<?php
										endforeach;
										?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('current_address');?></label>

								<div class="col-sm-5">
									<textarea type="text" class="form-control" name="current_address" value="<?php echo $row['current_address'];?>"></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('permanent_address');?></label>

								<div class="col-sm-5">
									<textarea type="text" class="form-control" name="permanent_address" value="<?php echo $row['permanent_address'];?>"></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('phone');?></label>

								<div class="col-sm-5">
									<input type="text" class="form-control" name="phone" value="" >
								</div>
							</div>



						</div>
					</div>
				</div>

					
				<div class="col-md-6"> <!-- Personal Details -->
					<div class="panel panel-primary" data-collapsed="0">
						<div class="panel-heading">
							<div class="panel-title" >
								<i class="entypo-plus-circled"></i>
								<?php echo get_phrase('personal_details');?>
							</div>
						</div>
						<div class="panel-body">

							<div class="form-group">
								<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('gender');?></label>

								<div class="col-sm-5">
									<select name="sex" class="form-control selectboxit">
										<option value=""><?php echo get_phrase('select');?></option>
										<option value="Male"><?php echo get_phrase('male');?></option>
										<option value="Female"><?php echo get_phrase('female');?></option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('birthday');?></label>

								<div class="col-sm-5">
									<input type="text" class="form-control datepicker" name="birthday" value="" data-start-view="2">
								</div>
							</div>

							<div class="form-group">
								<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('blood_group');?></label>

								<div class="col-sm-5">
									<select name="blood_group" class="form-control selectboxit">
										<option value=""><?php echo get_phrase('select');?></option>
										<option value="A+">A+</option>
										<option value="A-">A-</option>
										<option value="B+">B+</option>
										<option value="B-">B-</option>
										<option value="O+">O+</option>
										<option value="O-">O-</option>
										<option value="AB+">AB+</option>
										<option value="AB-">AB-</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('nationality');?></label>

								<div class="col-sm-5">
									<select name="nationality" class="form-control selectboxit">
										<option value=""><?php echo get_phrase('select');?></option>
										<option value="Nepali"><?php echo get_phrase('nepali');?></option>
										<option value="Indian"><?php echo get_phrase('indian');?></option>
										<option value="Others"><?php echo get_phrase('others');?></option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('mother_tongue');?></label>

								<div class="col-sm-5">
									<input type="text" class="form-control" name="mother_tongue" value="">
								</div>
							</div>

							<div class="form-group">
								<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('cast_category');?></label>

								<div class="col-sm-5">
									<select name="cast_category" class="form-control selectboxit">
										<option value=""><?php echo get_phrase('select');?></option>
										<option value="dalit"><?php echo get_phrase('general');?></option>
										<option value="dalit"><?php echo get_phrase('dalit');?></option>
										<option value="janjati"><?php echo get_phrase('janjati');?></option>
										<option value="surkheti"><?php echo get_phrase('surkheti');?></option>
										<option value="brahmin"><?php echo get_phrase('brahmin');?></option>
										<option value="chettri"><?php echo get_phrase('chettri');?></option>
										<option value="others"><?php echo get_phrase('others');?></option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('religion');?></label>

								<div class="col-sm-5">
									<input type="text" class="form-control" name="religion" value="">
								</div>
							</div>


							<div class="form-group">
								<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('disability');?></label>

								<div class="col-sm-5">
									<input type="text" class="form-control" name="disability" value="">
								</div>
							</div>

							<div class="form-group">
								<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('known_allergy');?></label>

								<div class="col-sm-5">
									<input type="text" class="form-control" name="known_allergy" value="">
								</div>
							</div>


						</div>
					</div>
				</div>

				<div class="col-md-6"> <!-- Login Details -->
					<div class="panel panel-primary" data-collapsed="0">
						<div class="panel-heading">
							<div class="panel-title" >
								<i class="entypo-plus-circled"></i>
								<?php echo get_phrase('login_details');?>
							</div>
						</div>
						<div class="panel-body">

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="email" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="">
								</div>
							</div>

							<div class="form-group">
								<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('password');?></label>

								<div class="col-sm-5">
									<input type="password" class="form-control" name="password" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="" >
								</div>
							</div>


						</div>
					</div>
				</div>

				<div class="col-md-6"> <!-- avatar -->
					<div class="panel panel-primary" data-collapsed="0">
						<div class="panel-heading">
							<div class="panel-title" >
								<i class="entypo-plus-circled"></i>
								<?php echo get_phrase('photo');?>
							</div>
						</div>
						<div class="panel-body">

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('photo');?></label>

								<div class="col-sm-5">
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
											<img src="http://placehold.it/200x200" alt="...">
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
										<div>
											<span class="btn btn-white btn-file">
												<span class="fileinput-new">Select image</span>
												<span class="fileinput-exists">Change</span>
												<input type="file" name="userfile" accept="image/*">
											</span>
											<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6">
						<button type="submit" class="btn btn-info pull-right"><?php echo get_phrase('add_student');?></button>
					</div>
				</div>

			</div>


			<?php echo form_close();?>
		</div>
	</div>
</div>

<script type="text/javascript">

	function get_class_sections(class_id) {

		$.ajax({
			url: '<?php echo base_url();?>index.php?admin/get_class_section/' + class_id ,
			success: function(response)
			{
				jQuery('#section_selector_holder').html(response);
			}
		});

	}

</script>
