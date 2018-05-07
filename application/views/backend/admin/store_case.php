<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('Set_CAA_item');?>
                        </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_ciaa_item');?>
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
                            
                            <th><div><?php echo get_phrase('caa_category'); ?></div> </th>
                            <th><div><?php echo get_phrase('item_name'); ?></div></th>
                            <th><div><?php echo get_phrase('class_name'); ?></div></th>
                            <th><div><?php echo get_phrase('year');?></div></th>
                            
                            <th><div><?php echo get_phrase('option');?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($caa_category as $row):


                        ?>
                        <tr>

                            <td><?php echo ucfirst($row->category_name); 
                                        $caa_item  = $this->db->get_where('tbl_caa_store',array('caa_category_id' => $row->category_id))->result();
                            ?></td>
                            <td>
                                <?php 

                                $arr= array();

                                foreach ($caa_item as $key => $value): 

                                    $arr[$key] = $value;
                                    $key++;
                                    ?>
                                        
                                         
                                        <?php $caa_item_name = $this->db->get_where('tbl_caa_item',array('id' => $value->caa_item_id))->row(); 

                                        ;
                                        ?>

                                       <?php echo $caa_item_name->item_name; ?> 

                                <?php endforeach 


                                ?>
                           </td>

                           <td>
                           <?php
                            $var;
                           foreach ($arr as $key => $value) {
                                                              
                                  $class_name = $this->db->get_where('class',array('class_id'=>$value->class_id))->row();

                                  echo $class_name->name;    

                           }
                            
                             

                              ?>

                              </td>

                             
                            <td><?php echo "suabsh";?></td> 
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
                    <?php echo form_open(base_url() . 'index.php?admin/create_case/add' , array('class' => 'form-horizontal form-groups validate','target'=>'_top'));?>

                        <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('class_name');?></label>
                                <div class="col-sm-5">

                                      <select name="class_id" class="form-control" data-validate="required" id="class_id" onchange="get_subject_id_case(this.value)"
                                        data-message-required="<?php echo get_phrase('class_name');?>" >
                                        <option value=""><?php echo get_phrase('select');?></option>
                                        <?php
                                        foreach($class as $row):
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
                                   
                                <label class="col-sm-3 control-label"><?php echo get_phrase('exam'); ?></label>

                                <div class="col-md-5">
                                    
                                    <select name="exam-id"  onchange="get_case_item(this.value)" class="form-control">
                                        <option value=""><?= get_phrase('Select_exam') ?></option>
                                        <?php foreach ($exam as $key => $value): ?>
                                            
                                            <option value="<?php echo $value->exam_id ?>"><?php echo $value->name; ?></option>
                                        <?php endforeach ?>
                                    </select>

                                </div>
                               </div> 

                                <div class="form-group">
                                   
                                <label class="col-sm-3 control-label"><?php echo get_phrase('select_subject'); ?></label>

                                <div class="col-md-5">
                                    
                                    <select name="subject_id" id="subject_id" class="form-control">
                                        
                                        <option value="">Select subject</option>


                                    </select>

                                </div>
                               </div> 



                                 <div class="form-group"> 

                                <label class="col-sm-3 control-label"><?php echo get_phrase('case_title');?></label>

                                    <div class="col-sm-5"> 
                                    <select name="case_title_id" id="case_title" class="form-control">
                                        


                                    </select>
                                                                                   
                                      </div>
                                  </div>


                        <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo get_phrase('add_ciaa_item');?></button>
                              </div>
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

function get_subject_id_case(class_id)
{

    $.ajax({

        'url': '<?php echo base_url(); ?>index.php?admin/get_subject_id_case/'+ class_id,
        success: function(res)
        {

            $('#subject_id').html(res);
        }

    });

    
}

function get_case_item(exam_id)
    {

        $.ajax({

            'url' : '<?php echo  base_url(); ?>index.php?admin/get_case_item/'+ exam_id,

            success: function(response)
            {

                $('#case_title').html(response);
            } 

        });
    }

</script>

