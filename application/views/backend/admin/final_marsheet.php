	
<div class="row">
	
	<div class="col-md-3">
		
		<!-- <form  action="<?php echo base_url(). 'index.php?admin/marksheet_list'; ?>" method="post" id="form"> -->
			
			<div class="form-group">
			
			<select class="form-control" onchange="get_section_id()" name="class_id" id="class_id">
					
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
					<?php
					$year = $this->db->get_where('settings', array('type' => 'running_year'))->row()->description;
					$exam = $this->db->get_where('exam',array('year' => $year))->result();
					?>	
				<select class="form-control" id="exam_term" name="exam_id">
						
					<option value="">Select exam..</option>

					<?php foreach ($exam as $key => $value): ?>
						
						<option value="<?= $value->exam_id; ?>"><?= $value->name; ?></option>
					<?php endforeach ?>
				</select>	

			</div>
			</div>

			<div class="col-md-3">
			<div class="form-group">
					
				<button type="submit" onclick="get_form_data()" class="btn btn-sm btn-success"><?php echo get_phrase('show_entry'); ?></button>

			</div>
			</div>

		<!-- </form> -->

				<img src=" https://camo.githubusercontent.com/a1a81b0529517027d364ee8432cf9a8bd309542a/687474703a2f2f692e696d6775722e636f6d2f56446449444f522e676966" id="loading-image" style="display: none;" >	
			
				<div class="col-md-12">

				<table style="display: none;" class='table table-bordered table-hovered table-striped table-responsive' id ="table123">
                      
				<th><?php echo get_phrase('Student_Roll'); ?></th>
				<th><?php echo get_phrase('Student_Name'); ?></th>
				<th><?php echo get_phrase('reg_number'); ?></th>
				<th><?php echo get_phrase('Report');  ?></th>

                       


                      <tbody id="result"> 

								                      		
                       	
                       </tbody>
                    </table>

                </div>    

			 
					


		

	</div>
	

</div>

<script type="text/javascript">
	
	$(document).ready(function(){



	});

	function check_man(std_id)
	{


 		var class_id = $('#class_id').val();
 		var section_id = $('#section_id').val();
 		var exam_id = $('#exam_term').val();

 		var std_id = std_id;	
 		var data = { class_id: class_id, section_id: section_id, exam_id: exam_id, std_id: std_id };

 		showAjaxModal('<?php echo base_url();?>index.php?modal/marksheet/modal_print_marksheet/'+ class_id + '/' + section_id + '/' + exam_id + '/' + std_id );

 				

	}

	function get_form_data()
	{

		var class_id = $('#class_id').val();
		var section_id = $('#section_id').val();
		var exam_id = $('#exam_term').val();
		
		
		var form_data = { class_id: class_id, section_id: section_id, exam_id: exam_id }

				// $('#result').load("<?php echo base_url();?>index.php?admin/marksheet_list/", function(){
			
			

		// });
		$('#loading-image').show();
		$.ajax({

				'url': '<?php echo base_url();?>index.php?admin/students_marksheet/' ,
				'type': 'POST',
				data: form_data,

				success: function(data)
				{

				 $('#table123').css('display','block');
				 $('#result').html(data);
				
				},
		      	complete: function(){
		        $('#loading-image').hide();
      }


		       });

	}

	function get_section_id()
	{

		var class_id = $('#class_id').val();
		
		$.ajax({


			'url': '<?php echo base_url();?>index.php?admin/getting_section_id/' + class_id ,

			success: function(response)
			{

				
				$('#section_id').html(response);
			}


		});

	}
</script>	









