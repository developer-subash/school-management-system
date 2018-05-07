<?php 

    	

	$running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
	   

    $term_marks = $this->db->select('*')->from('tbl_term_marks')->where('class_id',$class_id)->where('section_id',$section_id)->where('exam_id',$exam_id)->where('student_id',$std_id)->get()->result();
	   

    $student_details = $this->db->get_where('student',array('student_id' => $std_id))->row();


	$class_details = $this->db->select('*')->from('class')->where('class_id', $class_id)->where('year',$running_year)->get()->row();



	$school_name = $this->db->get_where('settings',array('type' => 'system_title'))->row()->description;

	$school_address = $this->db->get_where('settings',array('type' => 'address'))->row()->description;
	// $class_section = $this->db->select('*')->from('section')->where('class_id',$class_details->class_id)->get()->result();


	$section_name = $this->db->get_where('section',array('section_id' => $section_id))->row()->name;

	$std_roll_no  = $this->db->select('*')->from('enroll')->where('student_id',$std_id)->get()->row();

    $exam_type = $this->db->get_where('exam',array('exam_id'=>$exam_id))->row();

    $subject_list = $this->db->select('*')->from('tbl_routine')->where('academic_year',$running_year)->where('exam_id',$exam_id)->where('class_id',$class_id)->get()->result_array();



 ?>

<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	
	
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-9 col-lg-offset-1">
				<div class="box">
					<div class="top">
						<p>"Education For Eternity"</p>
						<p style="color: #000099;text-align: center;font-size: 22px;font-weight: bold;font-family: lato;"><?php echo strtoupper($school_name); ?></p>
						<p style="color: #000099;text-align: center;font-size: 12px;font-weight: bold;font-family: Arial, Helvetica, sans-serif; "><?= $school_address ;?> <br>
ESTD: 2004 <br>
Phone No.: <?= $student_details->phone; ?></p>
<br>
<h5>PROGRESS REPORT</h5>
<br>
<br>
					<!-- </div>
					<div class="middle"> -->
						<!-- <div class="col-lg-3"> -->
							<div class="left">
							<p ><strong> Student Name &nbsp;&nbsp;:</strong><small> <?= strtoupper($student_details->name); ?></small></p><br>
							<p style="padding-right: 600px;"><strong> Class &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><small> <?php echo strtoupper($class_details->name); ?></small></p><br>
							<p><strong > Exam Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong><small> <?= ucwords($exam_type->name);  ?></small></p>

						</div>

						<div class="middle">
							<p><strong> Date Of Birth &nbsp;&nbsp;&nbsp;&nbsp;:</strong><small> <?php echo date('Y M j ',strtotime($student_details->birthday)); ?></small></p><br>
							<p><strong> Section &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  :</strong><small> <?= $section_name; ?></small></p><br>
							<p><strong> Year&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong><small>&nbsp;<?= date('Y');?> </small></p>

						</div>

						<div class="right">
                            <p><strong>  Reg ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><small> <?= $std_roll_no->enroll_code; ?></small></p><br>
                            <p><strong> Roll No.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong><small> <?= $std_roll_no->roll; ?></small></p><br>
                            <!-- <p><strong> Exam Type :</strong><small> THIRD TERMINAL</small></p> -->

                        </div>
                    </div>
                    
						
						<table class=" studentInfo" style="font-family:  Arial, Helvetica, sans-serif; font-size: 13px;" >
        <tbody>
        <tr class="mainRow">
            <td><strong>S.N</strong></td>
            <td><strong>Subjects</strong></td>
            <td><strong>Credit<br>
            &nbsp;&nbsp;&nbsp;Hours</strong></td>
            <td><strong>Obtain<br>
            &nbsp;&nbsp;&nbsp;Grade</strong></td>
            <td><strong>Final<br>
            &nbsp;&nbsp;&nbsp;Grade</strong></td>
            <td><strong> Grade<br>
            &nbsp;&nbsp;&nbsp;Point</strong></td>
        </tr>

       
            <?php foreach ($subject_list as $key => $value): 
                    $subject_name = $this->db->get_where('subject',array('subject_id' => $value['subject_id']))->row();
            ?>
                
            

        <tr class="altRow">
            <td><strong><?= ++$key; ?></strong></td>
            <td><strong><?php echo $subject_name->name; ?></strong></td>
            <td>3</td>
            <td>N*</td>
            <td rowspan="2"><strong>N</strong></td>
            <td rowspan="2"><strong>0</strong></td>
        </tr>
            

        
        <tr>
            <td></td>
            <td><strong>Nepali(Pr)</strong></td>
            <td>1</td>
            <td>N*</td>
            
        </tr>

       
<?php 
++$key;
endforeach ?>
       <!--  <tr class="altRow">
            <td><strong>1</strong></td>
            <td><strong>Nepali</strong></td>
            <td>3</td>
            <td>N*</td>
            <td rowspan="2"><strong>N</strong></td>
            <td rowspan="2"><strong>0</strong></td>
        </tr>
        <tr>
            <td></td>
            <td><strong>Nepali(Pr)</strong></td>
            <td>1</td>
            <td>N*</td>
            
        </tr>


        <tr class="altRow">
            <td><strong>1</strong></td>
            <td><strong>Nepali</strong></td>
            <td>3</td>
            <td>N*</td>
            <td rowspan="2"><strong>N</strong></td>
            <td rowspan="2"><strong>0</strong></td>
        </tr>
        <tr>
            <td></td>
            <td><strong>Nepali(Pr)</strong></td>
            <td>1</td>
            <td>N*</td>
            
        </tr>


        <tr class="altRow">
            <td><strong>1</strong></td>
            <td><strong>Nepali</strong></td>
            <td>3</td>
            <td>N*</td>
            <td rowspan="2"><strong>N</strong></td>
            <td rowspan="2"><strong>0</strong></td>
        </tr>
        <tr>
            <td></td>
            <td><strong>Nepali(Pr)</strong></td>
            <td>1</td>
            <td>N*</td>
            
        </tr>


        <tr class="altRow">
            <td><strong>1</strong></td>
            <td><strong>Nepali</strong></td>
            <td>3</td>
            <td>N*</td>
            <td rowspan="2"><strong>N</strong></td>
            <td rowspan="2"><strong>0</strong></td>
        </tr>
        <tr>
            <td></td>
            <td><strong>Nepali(Pr)</strong></td>
            <td>1</td>
            <td>N*</td>
            
        </tr>


        <tr class="altRow">
            <td><strong>1</strong></td>
            <td><strong>Nepali</strong></td>
            <td>3</td>
            <td>N*</td>
            <td rowspan="2"><strong>N</strong></td>
            <td rowspan="2"><strong>0</strong></td>
        </tr>
        <tr>
            <td></td>
            <td><strong>Nepali(Pr)</strong></td>
            <td>1</td>
            <td>N*</td>
            
        </tr>


        <tr class="altRow">
            <td><strong>1</strong></td>
            <td><strong>Nepali</strong></td>
            <td>3</td>
            <td>N*</td>
            <td rowspan="2"><strong>N</strong></td>
            <td rowspan="2"><strong>0</strong></td>
        </tr>
        <tr>
            <td></td>
            <td><strong>Nepali(Pr)</strong></td>
            <td>1</td>
            <td>N*</td>
            
        </tr> -->
       

        <tr>
            <td colspan="6"><br></td>
        </tr>
        </tbody>
    </table>
        

        <table class=" tala studentInfo" style="margin-top: -20px; " >
        <tbody>
            <tr class="altRow">
                <td colspan="4"><strong>Habits</strong></td>
            </tr>
        <tr class="altRow">
            <td><strong>Homework</strong></td>
            <td><strong>No Data</strong></td>
            <td><strong>Discipline</strong></td>
            <td><strong>No Data</strong></td>
            
        </tr>
        <tr class="altRow">
            <td><strong>Punctuality</strong></td>
            <td><strong>No Data</strong></td>
            <td colspan="2"></td>
            
            
        </tr>
    


        <br>

        
            <table class="mathi studentInfo" style="font-family:  Arial, Helvetica, sans-serif; font-size: 12px;" >
        <tbody>
            <tr class="altRow">
                <td colspan="2"><strong>Personal and Social Skill</strong></td>
            </tr>
        <tr class="altRow">
            <td><strong>Leadership</strong></td>
            <td><strong>No Data</strong></td>
            
        </tr>

        <tr class="altRow">
            <td><strong>Co-operation</strong></td>
            <td><strong>No Data</strong></td>
            
        </tr>

        <tr class="altRow">
            <td><strong>Manners/Etiquettes</strong></td>
            <td><strong>No Data</strong></td>
            
        </tr>

        <tr class="altRow">
            <td><strong>Sence of Discipline</strong></td>
            <td><strong>No Data</strong></td>
            
        </tr>

        <tr class="altRow">
            <td><strong>Self Confidence</strong></td>
            <td><strong>No Data</strong></td>
            
        </tr>

        <tr class="altRow">
            <td><strong>Sence of responsibility</strong></td>
            <td><strong>No Data</strong></td>
            
        </tr>

        <tr class="altRow">
            <td><strong>Emotional Stability</strong></td>
            <td><strong>No Data</strong></td>
            
        </tr>

        <tr class="altRow">
            <td><strong>Sense of hygiene</strong></td>
            <td><strong>No Data</strong></td>
            
        </tr>

        <tr class="altRow">
            <td><strong>Attentive in class</strong></td>
            <td><strong>No Data</strong></td>
            
        </tr>

        <tr class="altRow">
            <td><strong>Gentle and Polite</strong></td>
            <td><strong>No Data</strong></td>
             </tr>
        <tr class="altRow">
                <td colspan="2"><strong>Personal and Social Skill</strong></td>
            </tr>
        
        <tr class="altRow">
            <td><strong>EN Writing</strong></td>
            <td><strong>No Data</strong></td>
             </tr>

             <tr class="altRow">
            <td><strong>EN Reading</strong></td>
            <td><strong>No Data</strong></td>
             </tr>

             <tr class="altRow">
            <td><strong>EN Listening/Speaking</strong></td>
            <td><strong>No Data</strong></td>
             </tr>

             <tr class="altRow">
            <td><strong>EN Handwriting</strong></td>
            <td><strong>No Data</strong></td>
             </tr>

             <tr class="altRow">
            <td><strong>EN Diction</strong></td>
            <td><strong>No Data</strong></td>
             </tr>

             <tr class="altRow">
            <td><strong>NP Handwriting</strong></td>
            <td><strong>No Data</strong></td>
             </tr>

             <tr class="altRow">
            <td><strong>Nepali Reading</strong></td>
            <td><strong>No Data</strong></td>
             </tr>

             <tr class="altRow">
            <td><strong>Nepali Dictation</strong></td>
            <td><strong>No Data</strong></td>
             </tr>

             <tr class="altRow">
            <td><strong>Nepali Writing</strong></td>
            <td><strong>No Data</strong></td>
             </tr>
        </table>
        
    <br>
    <br>
    <div class="boxa" style="border: 2px solid #ccc; margin: 0px 20px; ">
        <br>
    <h5 style="margin:0px 10px;font-family: Arial, Helvetica, sans-serif; font-size: 13px; "><b >Average Grade : N</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Total Days &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b> <b>Present Days &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b> <b>Absent Days : </b></h5>
    <br>
    <h5 style="margin:0px 10px; font-family: Arial, Helvetica, sans-serif; font-size: 13px;"><b> ENSU &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>Below Avrge on small Subject.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> Result :&nbsp;&nbsp; Unsatisfactory*</b> </h5>
    <br>
    <div class="box" style="border: 1px solid #ccc; font-family: Arial, Helvetica, sans-serif;">
        <b >Remarks:&nbsp;&nbsp;</b><i>Labour hard on below average subject. </i>
    </div>

    
     </div>
         <br>
    <br>
    <br><br>
   <h5 style="padding:0px 50px; font-family: Arial, Helvetica, sans-serif; font-size: 13px;"> <b>2074-12-13</b></h5>
    <br>
    <br>
    <br>
    <h5 style="padding:0px 30px; font-family: Arial, Helvetica, sans-serif; font-size: 13px;"><b style="border-top: 2px solid #ccc; padding: 20px 0px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of issue&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b style="border-top: 2px solid #ccc; padding: 20px 0px;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Exam Head&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b style="border-top: 2px solid #ccc; padding: 20px 0px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Class Teacher&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b style="border-top: 2px solid #ccc;padding: 20px 0px; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Principal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></h5>
    <br>
    </div>
			
            <br>		
					


				</div>
			</div>
		</div>
	







