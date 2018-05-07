<?php foreach ($marks as $key => $value) { 

	$std = $this->db->get_where('student',array('student_id'=>$value->student_id))->row();

	?>	

	<table>
		
		<thead>
			
			<tr>
				
			<td>student_name</td>
				

			</tr>	

		</thead>
	</table>

	<?php

	echo "<pre>";
	 print_r($std); 

	 ?>	

	
 <?php } ?>