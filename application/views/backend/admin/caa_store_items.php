<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>  
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
                    <?php echo form_open(base_url() . 'index.php?admin/store_eaa/add' , array('class' => 'form-horizontal form-groups validate','target'=>'_top'));?>

                        <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('class_name');?></label>
                                <div class="col-sm-5">

                                      <select name="class_id" class="form-control" data-validate="required" id="exam_id"
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
                                        <label class="col-sm-3 control-label"><?php echo get_phrase('eaa_category');?></label>
                                        <div class="col-sm-5">

                                      <select name="caa_category_id" class="form-control" data-validate="required" id="exam_id"
                                        data-message-required="<?php echo get_phrase('class_name');?>" >
                                        <option value=""><?php echo get_phrase('select');?></option>
                                        <?php
                                        foreach($caa_category as $row):
                                            ?>
                                            <option value="<?php echo $row->category_id;?>">
                                                <?php echo $row->category_name;?>
                                            </option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>   



                                </div>

                                 </div>         

                                <div class="form-group"> 
                                        <label class="col-sm-3 control-label"><?php echo get_phrase('caa_item');?></label>
                                        <div class="col-sm-5">

                                      <select name="caa_item_id[]" class="form-control" data-validate="required" id="caa_id"
                                        data-message-required="<?php echo get_phrase('caa_name');?>" multiple >
                                        <option value=""><?php echo get_phrase('select');?></option>
                                        <?php
                                        foreach($caa_list as $row):
                                            ?>
                                            <option value="<?php echo $row['id'];?>">
                                                <?php echo $row['item_name'];?>
                                            </option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>   



                                </div>

                                 </div>             

                                 <div class="form-group"> 

                                <label class="col-sm-3 control-label"><?php echo get_phrase('comment');?></label>

                                    <div class="col-sm-5"> 

                                           <input type=" text" name="comment" class="form-control" placeholder="<?= get_phrase('comment');?>"> 

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

    $(document).ready(function(){

         $('#caa_id').select2();

    });
</script>

