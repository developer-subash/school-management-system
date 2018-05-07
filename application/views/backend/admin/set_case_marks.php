
	
<div class="row">
	
	<div class="col-md-3">
		
		<form  action="<?php echo base_url(). 'index.php?admin/set_case_marks'; ?>" method="post" id="form">
			
			<div class="form-group">
			
			<select class="form-control" onchange="get_section_id(this.value
			)" name="class_id" id="class_id">
					
					<option value="">select class....</option>

					<?php foreach ($class as $key => $value): ?>
						
						<option value="<?= $value->class_id; ?>"><?= $value->name; ?></option>	

					<?php endforeach ?>
					

			</select>		

			</div>
		</div>

			<div class="col-md-3">
			<div class="form-group">
					
				<select class="form-control" id="section_id" name="section_id">
						
					<option >Select section..</option>	

				</select>	

			</div>
			</div>



		   <div class="col-md-3">
			<div class="form-group">
						
				<select class="form-control" id="subject_id" name="subject_id">
						
					<option value=""><?php echo get_phrase('select_subject'); ?></option>



				</select>	

			</div>
			</div>

			<div class="col-md-3">
			<div class="form-group">
					<?php
					$year = $this->db->get_where('settings', array('type' => 'running_year'))->row()->description;
					$exam = $this->db->get_where('exam',array('year' => $year))->result();
					?>	
				<select class="form-control" onchange="get_case_title_id(this.value)" id="exam_term" name="exam_id">
						
					<option value="">Select exam..</option>

					<?php foreach ($exam as $key => $value): ?>
						
						<option value="<?= $value->exam_id; ?>"><?= $value->name; ?></option>
					<?php endforeach ?>
				</select>	

			</div>
			</div>



			<div class="col-md-3">
			<div class="form-group">
						
				<select class="form-control" id="case_title_id" name="case_title_id">
						
					<option value=""><?php echo get_phrase('Select_case_title'); ?></option>

				</select>	

			</div>
			</div>

			<div class="col-md-3">
			<div class="form-group">
					
				<button type="submit" class="btn btn-sm btn-success"><?php echo get_phrase('show_entry'); ?></button>

			</div>
			</div>

		</form>

	</div>

</div>

<script type="text/javascript">
	
	$(document).ready(function(){

		// $('#form').submit(function(e){



		// 	console.log($(this));
		// });


		$('#class_id').change(function(){

			var class_id = $('#class_id').val();

			$.ajax({

				'url' : '<?php echo base_url(); ?>index.php?admin/get_subject/' + class_id,
				success: function(res)
				{

					$('#subject_id').html(res);
				}

			});

		});






	});

	function get_section_id(class_id)
	{

		
		
		$.ajax({


			'url': '<?php echo base_url();?>index.php?admin/getting_section_id/' + class_id ,

			success: function(response)
			{
				
				
				$('#section_id').html(response);
			}


		});


	}

	function get_case_title_id(exam_id)
	{
		
		var subject_id = $('#subject_id').val();


		var data = { exam_id: exam_id, subject_id: subject_id};


		$.ajax({


		'url': '<?php echo base_url();?>index.php?admin/getting_case_title_id/',
			'type': 'POST',
			'data': data,

			success: function(response)
			{

				
				$('#case_title_id').html(response);

				// console.log(response);
			}


		});	   

	}
</script>	


