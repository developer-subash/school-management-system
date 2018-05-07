

<div class="col-md-12">
    <form method="post" action="<?php echo base_url('index.php?admin/store_student_marks') ?>">
        <input type="hidden" name="exam_id" value="<?= $exam_id; ?>">
        <input type="hidden" name="class_id" value="<?= $class_id; ?>">
        <input type="hidden" name="section_id" value="<?= $section_id; ?>">
        <!-- <input type="hidden" name="section_id" value="<?= $section_id; ?>"> -->
            <table class="table table-bordered" id="my_table">
                <thead>
                    <tr>
                        <td style="text-align: center;">
    <?php echo get_phrase('students'); ?> <i class="entypo-down-thin"></i> | <?php echo get_phrase('subject'); ?> <i class="entypo-right-thin"></i>
                        </td>

                        <?php 
                        $year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
                        foreach ($subjects as $key => $value): 
                        	$subject_name = $this->db->select('*')->from('subject')->where('subject_id',$value->subject_id)->get()->row();
                        		
                        ?>

                        	 <td >


                        	<label><?php echo ucfirst($subject_name->name) ; ?>(<?php echo $value->max_num; ?>)</label>
                            <input type="hidden" name="subject_id[]" value="<?php echo ucfirst($subject_name->subject_id) ; ?>">
                        	 		
                                    
                        	</td>	

                        <?php endforeach ?>
                        
     <!--                    <td><?php echo get_phrase('options') ?></td> -->

                    </tr>
                </thead>

                <tbody>
                        <?php foreach ($students as $key => $value): ?>                	
                	<tr>
                		
                        <td style="text-align: center;">
                            <label><?php echo $this->db->get_where('student', array('student_id' => $value->student_id))->row()->name; ?></label>
                            <input type="hidden" name="student_id[]" value="<?php echo $value->student_id; ?>">
                            <!--  <?php echo $this->db->get_where('student', array('student_id' => $value->student_id))->row()->name; ?> -->

                        </td>
                        <?php
                        
                        foreach ($subjects as $key => $value1): 
                            $subject_name = $this->db->select('*')->from('subject')->where('subject_id',$value1->subject_id)->get()->row();

                            $marks = $this->db->get_where('tbl_term_marks',array('student_id' => $value->student_id),array('subject_id' => $value1->subject_id))->row();


                                
                        ?>

                            <td>

                            <div class="tab-content">
                            <br>

                            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open(base_url() . 'index.php?admin/subject/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                        <div class="padded">
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" data-validate="required" placeholder="<?php echo get_phrase('name'); ?>" data-message-required="<?php echo get_phrase('value_required');?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('class');?></label>
                                <div class="col-sm-5">
                                    <select name="class_id" class="form-control select2" style="width:100%;" required>
                                    <option value=""><?php echo get_phrase('select_class'); ?></option>
                                        <?php
                                        $classes = $this->db->get('class')->result_array();
                                        foreach($classes as $row):
                                        ?>
                                            <option value="<?php echo $row['class_id'];?>"
                                                <?php if($row['class_id'] == $class_id) echo 'selected';?>>
                                                    <?php echo $row['name'];?>
                                            </option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('teacher');?></label>
                                <div class="col-sm-5">
                                    <select name="teacher_id" class="form-control selectboxit" style="width:100%;">
                                        <option value=""><?php echo get_phrase('select_teacher');?></option>
                                        <?php
                                        $teachers = $this->db->get('teacher')->result_array();
                                        foreach($teachers as $row):
                                        ?>
                                            <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['name'];?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('select_type');?></label>
                                
                                <div class="col-sm-5">

                                       <select name="type" class="form-control selectboxit" style="width:100%;">
                                        <option disabled><?php echo get_phrase('select_type'); ?></option>
                                        <option value="theory"><?php echo get_phrase('theory');?></option>
                                        
                                            <option value="th/pr"><?php echo get_phrase('th/pr');?></option>
                                       
                                    </select>  
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo get_phrase('add_subject');?></button>
                              </div>
                           </div>
                    </form>
                </div>
            </div>



            </div>


                                                <input type="number" placeholder="Enter number lessa than <?php echo $value1->max_num; ?>"  class="form-control" name="marks[]" value="<?php
                                if($marks !='' ){ echo $marks->marks;} else { echo "";} ; ?>">

     </td>   



    <?php endforeach ?>

                		

                	</tr>

<?php endforeach ?>
                </tbody>
            </table>

        </div>

                <center>
            <button type="submit" class="btn btn-success" id="submit_button">
                <i class="entypo-thumbs-up"></i> <?php echo get_phrase('save_changes'); ?>
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