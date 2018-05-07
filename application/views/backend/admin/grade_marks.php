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
					<?php echo get_phrase('add_grade');?>
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
                            <th><div><?php echo get_phrase('sn'); ?></div></th>
                    		<th><div><?php echo get_phrase('grade_name');?></div></th>
                            <th><div><?php echo get_phrase('gpa_value');?></div></th>
                    		<th><div><?php echo get_phrase('lower_mark_range');?></div></th>
                            <th><div><?php echo get_phrase('upper_mark_range');?></div></th>
                    		<th><div><?php echo get_phrase('ensu');?></div></th>

                    		<th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>

                    	<?php foreach($grade as $key => $row):?>
                        <tr>
                            <td><?php echo ++$key;?></td>
							<td><?php echo ucfirst($row['grade_name']) ;?></td>
                            <td><?= $row['grade_value']; ?></td>
							<td><?php echo $row['max_value'];?></td>
                            <td><?php echo $row['min_value'];?></td>
							<td><?php echo $row['ensu'];?></td>
							<td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    
                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_grade_exam/<?php echo $row['id'];?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                            </a>
                                                    </li>
                                    <li class="divider"></li>
                                    
                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/grade_marks/delete/<?php echo $row['id'];?>');">
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
                	<?php echo form_open(base_url() . 'index.php?admin/grade_marks/store' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                        
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('letter_grade');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="grade_name" data-validate="required" placeholder="<?php echo get_phrase('letter_grade'); ?>" data-message-required="<?php echo get_phrase('value_required');?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('grade_point');?></label>
                                <div class="col-sm-5">
                                    <input type="number" class="form-control" name="grade_value" placeholder="<?php echo get_phrase('grade_point'); ?>"  data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('lower_percent');?></label>
                                <div class="col-sm-5">
                                    <input type="number" class="form-control" name="min_value" placeholder="<?php echo get_phrase('lower_percent'); ?>" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('upper_mark');?></label>
                                <div class="col-sm-5">
                                    <input type="number" class="form-control" placeholder="<?php echo get_phrase('upper_mark'); ?>" name="max_value"  />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('ensu');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" placeholder="<?php echo get_phrase('ensu'); ?>" name="ensu"  />
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
	});
		
</script>