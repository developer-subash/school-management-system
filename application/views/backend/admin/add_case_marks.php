
<div class="col-md-12">
    <form method="post" action="<?php echo base_url('index.php?admin/store_cases_marks') ?>">
        <input type="hidden" name="exam_id" value="<?= $exam_id; ?>">
        <input type="hidden" name="class_id" value="<?= $class_id; ?>">
        <input type="hidden" name="section_id" value="<?= $section_id; ?>">
        <input type="hidden" name="subject_id" value="<?= $subject_id; ?>">
        <input type="hidden" name="case_title_id" value="<?= $case_title_id ; ?>">
        <!-- <input type="hidden" name="section_id" value="<?= $section_id; ?>"> -->
            <table class="table table-bordered" id="my_table">
                <thead>
                    <tr>
                        <td style="text-align: center;">
                        <?php echo get_phrase('students'); ?> <i class="entypo-down-thin"></i> | <?php echo get_phrase('case_item'); ?> <i class="entypo-right-thin"></i>
                        </td>

                        <?php 
                        $year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
                        foreach ($case_items->result() as $key => $value): 
                        	
                        		
                        ?>

                        	 <td >
                        	<label><?php echo ucfirst($value->item_name) ; ?></label>
                            <input type="hidden" name="item_id[]" value="<?php echo $value->id; ?>">
                        	 		
                                    
                        	</td>	

                        <?php endforeach ?>
                        
     

                    </tr>
                </thead>

                <tbody>
                        <?php foreach ($student_details as $key => $value): ?>         
                               	
                	<tr>
                		
                        <td style="text-align: center;">
                            <label><?php echo $this->db->get_where('student', array('student_id' => $value->student_id))->row()->name; ?></label>
                            <input type="hidden" name="student_id[]" value="<?php echo $value->student_id; ?>">


                        </td>
                        <?php
                        
                        foreach ($case_items->result() as $key => $value1): 
                        $case_name = $this->db->select('*')->from('tbl_caa_item')->where('id',$value1->id)->get()->row();
                       

                       $marks = $this->db->select('marks')->from('tbl_term_case_marks')->where('year',$year)->where('class_id',$_POST['class_id'])->where('student_id')->get()->result();

							                        	

                        ?>

                            <td>


                                <select name="marks[]" class="form-control"  >
                                	
                                	<option value="">Select marks..</option>

                                		<option value="A" <?php if($marks->marks == "A") { echo "selected";} ?>>A</option>
                                		<option value="B" <?php if($marks->marks == "B") { echo "selected";} ?>>B</option>
                                		<option value="C" <?php if($marks->marks == "C") { echo "selected";} ?>>C</option>
                                		

                                </select>
                            
                            </td>   

                        <?php endforeach ?>

                	</tr>

<?php endforeach ?>
                </tbody>
            </table>

        </div>

                <center>
            <button type="submit" class="btn btn-success" id="submit_button">
                <i class="entypo-thumbs-up"></i> <?php echo get_phrase('save'); ?>
            </button>
        </center>


</form>
        <script type="text/javascript">
            
            $(document).ready(function(){

               $('#submit_button').click(function(){


                console.log($('#obtain_marks').val());



               }); 

            });

        </script>