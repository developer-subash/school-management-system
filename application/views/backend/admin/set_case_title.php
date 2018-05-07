<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('Set_CASE_item');?>
                        </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_case_item');?>
                        </a></li>
        </ul>
        <!------CONTROL TABS END------>
        
    
        <div class="tab-content">
        <br>
            

              <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
                <table  class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            

                            <th><div><?php echo get_phrase('case_title'); ?></div></th>
                            
                            <th><div><?php echo get_phrase('year');?></div></th>
                            
                            <th><div><?php echo get_phrase('option');?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($case_item as $row):


                        ?>
                        <tr>

                            <td><?php echo ucfirst($row->name); 

                            ?></td>
                           <td>
                           <?php
                           
                           echo $row->year; 
                           
                            ?>

                              </td>

                              
                           <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    
                                    <!-- EDITING LINK -->

                                    
                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/exam/delete');">
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
            <br><br>
                <div class="box-content">
                    <?php echo form_open(base_url() . 'index.php?admin/set_case_title/add' , array('class' => 'form-horizontal form-groups validate','target'=>'_top'));?>

                        <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('case_title');?></label>
                                <div class="col-sm-5">

                                    <input type="text" name="name" class="form-control" placeholder="<?php echo get_phrase('case_title'); ?>">



                                </div>

                                <div class="col-sm-3">
                                  <button type="submit" class="btn btn-sm btn-info"><?php echo get_phrase('add_case_item');?></button>
                              </div>

                            </div>



                        <div class="form-group">

                            </div>
                    </form>                
                </div>                
            </div>
            <!----CREATION FORM ENDS-->
            
        </div>
    </div>
</div>

<script type="text/javascript">
    function get_class_section_subject(class_id) {
        $.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_class_section_subject/' + class_id ,
            success: function(response)
            {
                jQuery('#section_subject_selection_holder').html(response);
            }
        });
    }
</script>

