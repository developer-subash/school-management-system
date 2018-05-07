
<?php if ($_SERVER['REQUEST_METHOD'] == "GET"){ ?>

	
<div class="row">
	
	<div class="col-md-3">
		
		<form  action="<?php echo base_url(). 'index.php?admin/marksheet_list'; ?>" method="post" id="form">
			
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

	});

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


<?php } else { ?>



	<table class="table table-bordered table-hovered table-striped table-responsive">

		<thead>
			
			<tr>
				
				<th>Student Roll</th>
				<th>Student Name</th>
				<?php foreach ($subjects->result() as $key => $value): 
						$subject_name = $this->db->get_where('subject',array('subject_id' => $value->subject_id))->row(); ?>
					<th><?php echo $subject_name->name; ?>(F<?php echo $value->max_num;?>/P<?php echo $value->min_num; ?>)</th>

				<?php endforeach ?>
				<th>Remarks</th>
				<th>Print</th>
			</tr>

		</thead>
		
		<tbody>
			

				<?php foreach ($students as $key => $value): 

					$student = $this->db->select('*')->from('student')->where('student_id',$value->student_id)->get()->row();	
				?>
				<tr>	
					
				<td><?php echo $value->roll; ?></td>
				<td><?php echo $student->name; ?></td>

				<?php 
					$subtotal = 0;

				foreach ($subjects->result() as $key => $value1):


						$sub_marks = $this->db->select('*')->from('tbl_term_marks')->where('student_id',$value->student_id)->where('subject_id',$value1->subject_id)->get()->row();	
				 
						$subtotal += $sub_marks->marks;
				 ?>
				
						<td><?php echo $sub_marks->marks; 


							if($sub_marks->marks < $value1->min_num)
							{
								echo "*";
							} else {

								echo "";
							}

						?>
							


						</td>


				<?php endforeach ?>
					
					<td>
						
						<?php echo $subtotal; ?>

					</td>

					<td>
						<form action="#" method="POST" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_subject/<?php echo $value->student_id;?>');">
							
							<input type="hidden" name="class_id" value="<?= $_POST['class_id']; ?>">
							<input type="hidden" name="section_id" value="<?= $_POST['section_id']; ?>">
							<input type="hidden" name="exam_id" value="<?= $_POST['exam_id']; ?>">
							<input type="submit" class="btn btn-success" name="submit" value="<?= get_phrase('view_report'); ?>" >
						</form>
							
					</td>

			</tr>
			<?php endforeach ?>
		</tbody>


	</table>


	<div class="footer">
		
		<span class="label label-danger" style="font-size: 20px;">Note: * for  Fail</span>	

	</div>

<?php } ?>


