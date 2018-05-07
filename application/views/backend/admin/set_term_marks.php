<hr />
<div class="row">
	<div class="col-md-12">
    


            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" >
                <div class="box-content">
                	<?php echo form_open(base_url() . 'index.php?admin/add_term_marks' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('select_exam');?></label>
                                <div class="col-sm-5">
                                        
                                  <select name="exam_id" class="form-control" data-validate="required" id="exam_id"
                                        data-message-required="<?php echo get_phrase('value_required');?>" >
                                        <option value=""><?php echo get_phrase('select');?></option>
                                        <?php

                                        foreach($exam_term as $row):
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
                            	
                            	<label class="col-sm-3 control-label"><?php echo get_phrase('exam_held_date');?></label>
                                <div class="col-sm-5">
                                    
                                        <select name="exam_held_date" class="form-control" id="held_year">

                                        	<option value="" selected><?php echo get_phrase('exam_held_date'); ?></option>



                                        </select>

                                </div>

                            </div>

                <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('class');?></label>
                                <div class="col-sm-5">

                                	<select name="class_id" onchange="get_section_id(this.value)" class="form-control" data-validate="required" id="class_id"
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
                                <label class="col-sm-3 control-label"><?php echo get_phrase('select_section');?></label>
                                <div class="col-sm-5">
                                    
                                        <select name="section_id" class="form-control" onchange="get_student_details(this.value)" id="section_id">

                                       <option value=""><?php get_phrase('select');?></option>     

                                        </select>

                                </div>
                            </div>

                        <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" id="btn_save" class="btn btn-info"><?php echo get_phrase('save');?></button>
                                </div>
                        </div>                            

    

                    </form>                
                </div>                
		

            <div id="table"></div>
            
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



		$('#exam_id').change(function(){

			var form_data = $(this).val();

			var data = { id: form_data }

			$.ajax({
            'url': '<?php echo base_url();?>index.php?admin/get_exam_held_date/' + form_data ,

            success: function(response)
            {
                // console.log(response);	
                jQuery('#held_year').html(response);
            }
        });   			

		});



        $('#subject_id').change(function(){


            var exam_id = $('#exam_id').val();
            var exam_held_date = $('#held_year').val();
            var class_id = $('#class_id').val();
            var subject_id = $(this).val();


            var data = {


                'exam_id': exam_id, 'exam_held_date': exam_held_date, 'class_id': class_id,'subject_id': subject_id
            }


         $.ajax({

            
            'url': "<?php echo base_url();?>index.php?admin/get_pass_marks/",
            type: "POST",
            data: data,
            // contentType: "application/json; charset=utf-8", // this
            // dataType: "json",

            success: function(data)
            {

                // console.log(data);
                $('#pass_mark').html(data);

            }



         });



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

    function get_student_details(section_id)
       
     {

       var class_id = $('#class_id').val();
       var section_id = $('#section_id').val();
        
            var data = {


                 'class_id': class_id,'section_id': section_id
            }        


       $.ajax({

        'url': "<?php echo base_url();?>index.php?admin/get_student_details/",
         type: "POST",
            data: data,
            // contentType: "application/json; charset=utf-8", // this
            // dataType: "json",

            success: function(data)
            {

                // console.log(data);
                $('#student_id').html(data);

            }

       });

     }

    function get_subject_marks(subject_id)
    {

            var exam_id = $('#exam_id').val();
            var exam_held_date = $('#held_year').val();
            var class_id = $('#class_id').val();
            var subject_id = subject_id;


            var data = {


                'exam_id': exam_id, 'exam_held_date': exam_held_date, 'class_id': class_id,'subject_id': subject_id
            }


         $.ajax({

            
            'url': "<?php echo base_url();?>index.php?admin/get_subject_marks/",
            type: "POST",
            data: data,
            // contentType: "application/json; charset=utf-8", // this
            // dataType: "json",

            success: function(data)
            {


                $('#full_marks').html(data);

            }

         });

    }


	function get_section_id(section_id)
    
        {
        	

        	$.ajax({

        		'url': '<?php echo base_url();?>index.php?admin/get_section_id/' + section_id , 

        		success: function(data)
        		{
        			$('#section_id').html(data);
        		}

        		});

        	

        }

		
</script>