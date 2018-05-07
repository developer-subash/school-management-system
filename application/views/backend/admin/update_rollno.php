	
<div class="row">
	
	<div class="col-md-3">
		
		 <form  action="<?php echo base_url(). 'index.php?admin/store_students_section_info'; ?>" method="post" id="form"> 
			
			<div class="form-group">
			
			<select class="form-control" onchange="get_student_id(this.value)" name="class_id" id="class_id">
					
					<option value="">select class....</option>

					<?php foreach ($class as $key => $value): ?>
						
						<option value="<?= $value->class_id; ?>"><?= $value->name_numeric; ?>(<?php echo $value->name; ?>)</option>	

					<?php endforeach ?>
					

			</select>		

			</div>
		</div>

		<div class="col-md-3">
			
			<select id="section_id" name="section_id" onchange="get_student_id_change_section_id(this.value)" class="form-control">
				
				<option><?php echo get_phrase('select_class_first') ?></option>



			</select>	

		</div>		
</div>
		<div class="col-md-12 col-sm-12 col-lg-12">
			


		</div>

		

				<img src=" https://camo.githubusercontent.com/a1a81b0529517027d364ee8432cf9a8bd309542a/687474703a2f2f692e696d6775722e636f6d2f56446449444f522e676966" id="loading-image" style="display: none;" >	
			
				<div class="col-md-12" id="table_div" style="display: none;">

                <table class="table table-bordered" >
                	<thead>
                		<tr>
                			
                    		<th><div><?php echo get_phrase('year');?></div></th>
                           <th><div><?php echo get_phrase('admit_date');?></div></th>
                            <th><div><?php echo get_phrase('student_name'); ?></div></th>
                            <th><div><?php echo get_phrase('assign_roll') ?></div></th>
                            
                    		
                    		
						</tr>
					</thead>
                    <tbody>

                    	
                       
                    </tbody>

                    
                </table>
			
                <center>
                	
                	<input type="submit" name="submit" class="btn btn-sm btn-success" value="<?php echo get_phrase('save_changes'); ?>" > 

                </center>

                </div>    

			 
					


		

	</div>
	
	</form> 

</div>

<script type="text/javascript">
	
	$(document).ready(function(){


		$('#class_id').change(function(){

			var class_id = $('#class_id').val();
		
		$.ajax({


			'url': '<?php echo base_url();?>index.php?admin/getting_section_id/' + class_id ,

			success: function(response)
			{

				
				$('#section_id').html(response);
			}


		});

		});
		

	});

	function check_man(std_id)
	{


 		var class_id = $('#class_id').val();
 		
 		var std_id = std_id;	
 		
 		var form_data = { class_id: class_id, std_id: std_id};

 		showAjaxModal('<?php echo base_url();?>index.php?modal/popup/student_section_assign/'+ class_id + '/' + std_id );



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

				 $('#table_div').css('display','block');
				 $('#result').html(data);
				
				}


		       });

	}
	// when change occur on section_id

	function get_student_id_change_section_id(section_id)

	{

		var class_id = $('#class_id').val();

		$('#loading-image').show();
		$.ajax({

			'url': '<?php echo base_url(); ?>index.php?admin/get_student_rollno_sectionwise/'+ class_id + '/' + section_id,
			'type': "post",
			success: function(response)
			{

				 $('#table_div').css('display','block');
				 $('tbody').html(response);

				
			},
		      	complete: function(){
		        $('#loading-image').hide();
      }

		});			


	}

	function get_student_id(class_id)
	{

		var section_id = $('#section_id').val();

		

$('#loading-image').show();
		$.ajax({

			'url': '<?php echo base_url(); ?>index.php?admin/get_student_rollno_classwise/'+ class_id + '/' + section_id,
			'type': "get",
			success: function(response)
			{

				 $('#table_div').css('display','block');
				 $('tbody').html(response);

				
			},
		      	complete: function(){
		        $('#loading-image').hide();
      }

		});

	}

	function check_roll_no(roll_no)
	{

		var class_id = $('#class_id').val();
		var section_id = $('#section_id').val();
		var roll = roll_no;

		var data = { class_id: class_id, section_id: section_id, roll: roll};

		console.log(data);

	}
</script>	









