<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>


<hr />
<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('routine_list');?>
                </a>

            </li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_routine');?>
                </a>
            </li>
		</ul>
    	<!------CONTROL TABS END------>
		<div class="tab-content">
        <br>
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
                <table  class="table table-bordered datatable" id="table_export">
                	<thead>
                		<tr>
                    		<th><div><?php echo get_phrase('year');?></div></th>
                           <th><div><?php echo get_phrase('exam_term');?></div></th>
                            <th><div><?php echo get_phrase('class'); ?></div></th>
                            <th><div><?php echo get_phrase('subject_name'); ?></div></th>
                    		
                            <th><div><?php echo get_phrase('starting_time');?></div></th>
                    		<th><div><?php echo get_phrase('mark_distribution');?></div></th>
                            <th><div><?php echo get_phrase('comment');?></div></th>
                    		<th><div><?php echo get_phrase('option');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php foreach($routine as $row):
                            $exam_name = $this->db->select('*')->from('exam')->where('exam_id',$row['exam_id'])->get()->row();
                            $class_name = $this->db->select('*')->from('class')->where('class_id',$row['class_id'])->get()->row();
                            $subject = $this->db->select('*')->from('subject')->where('subject_id',$row['subject_id'])->get()->row();
                        ?>
                        <tr>
                            <td><?php echo date('Y M j',strtotime($row['start_date']));?></td>
							<td><?php echo ucfirst($exam_name->name); ?></td>
                            <td><?php echo ucfirst($class_name->name); ?></td>
                            <td><?php echo ucfirst($subject->name) ; ?></td>
                            
                            <td><?php echo date('h:ia',strtotime($row['start_from'])); ?>'to'<?php echo date('h:ia',strtotime($row['end_date'])); ?></td>
							
                            
							<td><?php echo $row['max_num']. 'F ';?> /<?php echo $row['min_num'].' P'; ?></td>
                            <td><?php echo ucfirst($row['comment']);?></td>
							<td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    
                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_exam/<?php echo $row['exam_id'];?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                            </a>
                                                    </li>
                                    <li class="divider"></li>
                                    
                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/exam/delete/<?php echo $row['exam_id'];?>');">
                                            <i class="entypo-trash"></i>
                                                <?php echo get_phrase('delete');?>
                                            </a>
                                                    </li>
                                </ul>
                            </div>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<?php echo form_open(base_url() . 'index.php?admin/routine/add', array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                        
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('exam_term');?></label>
                                <div class="col-sm-5">
                                        
                                <select name="exam_id" class="form-control" data-validate="required" id="exam_id"
                                        data-message-required="<?php echo get_phrase('exam_term');?>" >
                                        <option value=""><?php echo get_phrase('select');?></option>
                                        <?php
                                        foreach($exam as $row):
                                            ?>
                                            <option value="<?php echo $row['exam_id'];?>">
                                                <?php echo $row['name'];?>
                                            </option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>                                              

                                   
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('class');?></label>
                                <div class="col-sm-5">

                                	<select name="class_id" class="form-control" data-validate="required" id="class_id"
                                        data-message-required="<?php echo get_phrase('value_required');?>" >
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

                             <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('select_subject');?></label>
                                <div class="col-sm-5">
                                    
                                        <select name="subject_id" class="form-control" id="subject_id">

                                        </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('start_date');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="datepicker form-control" name="start_date"  data-validate="required" placeholder="<?php echo get_phrase('start_date'); ?>" data-message-required="<?php echo get_phrase('value_required');?>"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('end_date');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="datepicker form-control" name="end_date"  data-validate="required" placeholder="<?php echo get_phrase('end_date'); ?>" data-message-required="<?php echo get_phrase('value_required');?>"/>
                                </div>
                            </div>
                    

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('starting_time');?></label>
                                <div class="col-sm-5">

                                    <input type="text" class="timepicker form-control" name="start_time" placeholder="<?php echo get_phrase('starting_time'); ?>" data-validate="required"  data-message-required="<?php echo get_phrase('value_required');?>"/>



                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('to');?></label>
                                <div class="col-sm-5">

                                    <input type="text" class="timepicker form-control" name="end_time" placeholder="<?php echo get_phrase('to'); ?>" data-validate="required"  data-message-required="<?php echo get_phrase('value_required');?>"/>



                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('comment');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" placeholder="<?php echo get_phrase('comment'); ?>" name="comment" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('full_mark');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" placeholder="<?php echo get_phrase('full_mark'); ?>" name="full_mark"  />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('pass_mark');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" placeholder="<?php echo get_phrase('pass_mark'); ?>" name="pass_mark"  />
                                </div>
                            </div>




                        		<div class="form-group">
                              	<div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo get_phrase('add_routine');?></button>
                              	</div>
								</div>
                    </form>                
                </div>                
			</div>
			<!----CREATION FORM ENDS-->
            
		</div>
	</div>
</div>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">

	jQuery(document).ready(function($)
	{
		

		var datatable = $("#table_export").dataTable();
		
		$(".dataTables_wrapper select").select2({

			minimumResultsForSearch: -1
            
		});


        $('#class_id').change(function(){

            var form_data = $(this).val();

            var data = { id: form_data }
        $.ajax({
            'url': '<?php echo base_url();?>index.php?admin/get_subject_details/' + form_data ,

            success: function(response)
            {
                
                // console.log(response);
                $('#subject_id').html(response);
            }
        });    

        });


    $('input.timepicker').timepicker({});

        });



		
</script>