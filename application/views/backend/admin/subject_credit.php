<hr />
<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('exam_list');?>
                </a>

            </li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_exam');?>
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
                            <th><div><?php echo get_phrase('running_session');?></div></th>
                    		<th><div><?php echo get_phrase('subject_name');?></div></th>
                            <th><div><?php echo get_phrase('teacher');?></div></th>
                    		<th><div><?php echo get_phrase('subject_credit');?></div></th>

                    		<th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php
                        $subject = $this->db->get_where('subject',array('year'=>$running_year))->result();
                         foreach($subject as $row):

                          $teacher_name = $this->db->get_where('teacher',array('teacher_id' => $row->teacher_id ))->row()->name;   
                                
                        ?>
                        <tr>
                            <td><?php echo $running_year; ?></td>
                            <td><?php echo $row->name; ?></td>
                            <td><?php echo $teacher_name; ?></td>
                            <td><?php echo $row->credit_point; ?></td>

                             <td>
                             
                             <div class="btn-group">
                                     
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                    <!-- EDITING LINK -->
                                <li>
                                        <a href="#" >
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                            </a>
                                </li>    

                                <li class="divider"></li>

                                <!-- DELETING LINK -->

                                <li>
                                    
                                    <a href="#" >
                                            <i class="entypo-trash"></i>
                                                <?php echo get_phrase('delete');?>
                                            </a>

                                </li>

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
                	<?php echo form_open(base_url() . 'index.php?admin/subject_credit/update_subject_credit' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                        
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('select_class');?></label>
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
                                <label class="col-sm-3 control-label"><?php echo get_phrase('select_subject_credit');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" placeholder="<?php echo get_phrase('subject_credit'); ?>" name="credit_point" placeholder="<?=  get_phrase('subject_credit');?>" />
                                </div>
                            </div>



                        		<div class="form-group">
                              	<div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo get_phrase('save');?></button>
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
            'url': '<?php echo base_url();?>index.php?admin/get_subject_id/' + form_data ,

            success: function(response)
            {
                
                jQuery('#subject_id').html(response);
            }
        });    

        });


        });



		
</script>