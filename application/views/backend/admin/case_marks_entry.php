<?php

	if(!empty($res))
	{

		$url = base_url('index.php?admin/update_case_marks');



	} else {

			$url = base_url('index.php?admin/case_marks_added');		
		
	}

?>


<div class="col-md-12">
	<form method="post" action="<?php echo $url;  ?>" id="form">
		<input type="hidden" name="exam_id" value="<?= $exam_id; ?>">
        <input type="hidden" name="class_id" value="<?= $class_id; ?>">
        <input type="hidden" name="section_id" value="<?= $section_id; ?>">
        <input type="hidden" name="case_title_id" value="<?= $exam_id; ?>">
        <input type="hidden" name="subject_id" value="<?= $subject_id; ?>">


	<table class="table table-bordered" id="my_table">
                <thead>
                    <tr>
        <td style="text-align: center;">
    <?php echo get_phrase('students'); ?> <i class="entypo-down-thin"></i> | <?php echo get_phrase('case_item'); ?> <i class="entypo-right-thin"></i>


</td>

<td >


<label><?php echo ucfirst('classwork') ; ?></label><i class="entypo-down-thin"></i>
	

                        	 		
                                    
 </td>		

 <td >


<label><?php echo ucfirst('behaviour') ; ?></label><i class="entypo-down-thin"></i>
	

                        	 		
                                    
 </td>		

 <td >


<label><?php echo ucfirst('creativity') ; ?></label><i class="entypo-down-thin"></i>
	

                                    
 </td>		

 <td >


<label><?php echo ucfirst('homework') ; ?></label><i class="entypo-down-thin"></i>
	

                        	 		
                                    
 </td>		

 <td >


<label><?php echo ucfirst('attendence') ; ?></label><i class="entypo-down-thin"></i>
	
	
                                    
 </td>		


</tr>
</thead>

<tbody>

	<?php foreach ($students as $key => $value): ?>
		
		<?php foreach ($res as $key => $row): ?>
				
			<?php if ($row->student_id == $value->student_id): ?>
					


	
	<tr>
		
		<td style="text-align: center;">
			
<label><?php echo $this->db->get_where('student', array('student_id' => $value->student_id))->row()->name; ?></label>
<input type="hidden" name="std_id[]" value="<?= $value->student_id; ?>">	
		</td>

		<td >
			
  <select class="form-control" name="classwork[]">
	
   <option value=""><?php echo 'select'; ?></option>	
	
	<option value="a" <?php if($row->classwork == 'a'){ echo "selected"; } ?>>A</option>
	<option value="b" <?php if($row->classwork == 'b'){ echo "selected"; } ?>>B</option>
	<option value="c" <?php if($row->classwork == 'c'){ echo "selected"; } ?>>C</option>
	<option value="d" <?php if($row->classwork == 'd'){ echo "selected"; } ?>>D</option>

</select>	
                        	 	


		</td>

	
				<td >
			
  <select class="form-control" name="behaviour[]">
	
   <option value=""><?php echo 'select'; ?></option>	
	
	<option value="a" <?php if($row->behaviour == 'a'){ echo "selected"; } ?>>A</option>
	<option value="b" <?php if($row->behaviour == 'b'){ echo "selected"; } ?>>B</option>
	<option value="c" <?php if($row->behaviour == 'c'){ echo "selected"; } ?>>C</option>
	<option value="d" <?php if($row->behaviour == 'd'){ echo "selected"; } ?>>D</option>

</select>	
                        	 	


		</td>


				<td >
			
  <select class="form-control" name="creativity[]">
	
   <option value=""><?php echo 'select'; ?></option>	
	
	<option value="a" <?php if($row->creativity == 'a'){ echo "selected"; } ?>>A</option>
	<option value="b" <?php if($row->creativity == 'b'){ echo "selected"; } ?>>B</option>
	<option value="c" <?php if($row->creativity == 'c'){ echo "selected"; } ?>>C</option>
	<option value="d" <?php if($row->creativity == 'd'){ echo "selected"; } ?>>D</option>

</select>	
                        	 	

	
		</td>

				<td >
			
  <select class="form-control" name="homework[]">
	
   <option value=""><?php echo 'select'; ?></option>	
	
	<option value="a" <?php if($row->homework == 'a'){ echo "selected"; } ?>>A</option>
	<option value="b" <?php if($row->homework == 'b'){ echo "selected"; } ?>>B</option>
	<option value="c" <?php if($row->homework == 'c'){ echo "selected"; } ?>>C</option>
	<option value="d" <?php if($row->homework == 'd'){ echo "selected"; } ?>>D</option>

</select>	
                        	 	


		</td>

				<td >
			
  <select class="form-control" name="attendence[]">
	
   <option value=""><?php echo 'select'; ?></option>	
	
	<option value="a" <?php if($row->attendence == 'a'){ echo "selected"; } ?>>A</option>
	<option value="b" <?php if($row->attendence == 'b'){ echo "selected"; } ?>>B</option>
	<option value="c" <?php if($row->attendence == 'c'){ echo "selected"; } ?>>C</option>
	<option value="d" <?php if($row->attendence == 'd'){ echo "selected"; } ?>>D</option>

</select>	
                        	 	


		</td>





	</tr>

<?php endif ?> 

	<?php endforeach ?>

	<?php endforeach ?>


</tbody>	



</table>

	<center>
           
            <button type="submit" class="btn btn-success" id="submit_button">
                <i class="entypo-thumbs-up"></i> <?php echo get_phrase('save_changes'); ?>
            </button>
        </center>


</div>	

</form>