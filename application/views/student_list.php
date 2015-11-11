<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
                    <p><?php
                if ($this->session->userdata('action_status') == 1):
                   ?>
                   <div style="padding:5px;box-sizing: border-box;text-align: center;background:lightgreen">
                       <h4><?php echo $this->session->userdata('action_message'); ?></h4>
                   </div>
                   <?php
                endif;
                $this->session->unset_userdata('action_status');
                $this->session->unset_userdata('action_message');
                ?>
                <!-- /.page-content -->
                <div class="row">
                    <?php
                    if ($this->session->userdata('action_status') == 1):
                       ?>
                       <div style="padding:5px;box-sizing: border-box;text-align: center;background:lightgreen">
                           <h4><?php echo $this->session->userdata('action_message'); ?></h4>
                       </div>
                       <?php
                    endif;
                    $this->session->unset_userdata('action_status');
                    $this->session->unset_userdata('action_message');
                    ?></p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Dashboard</a></li>
			</ul>

					

			<?php
        $se = $this->session->userdata('check');
//        echo '<pre>';
//        print_r($get_school_code);
//        echo '</pre>';
//        exit();
        ?>
        
			
            <div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="<?php echo base_url() . 'manage_student/create_student'; ?>">
						  <fieldset>
							
                              <div class="control-group">
								<label class="control-label" for="selectError">Class</label>
								<div class="controls">
								  <select id="student_class_id" class="span6 typeahead" name="student_class">
									<?php foreach ($class_list as $class) {
                                        ?>
                                        <option value="<?php echo $class->class_id; ?>"><?php echo $class->class_name; ?></option>
                                        <?php
                                    }
                                    ?> 
								  </select>
                                  <?php echo form_error('student_class'); ?>
								</div>
							  </div>
                              
                              <div class="control-group">
								<label class="control-label" for="selectError">Shift</label>
								<div class="controls">
								  <select id="student_shift_id" class="span6 typeahead" name="student_shift"  >
									<?php foreach ($shift_list as $shift) { ?>
                                       <option value="<?php echo $shift->shift_id; ?>"><?php echo $shift->shift_name; ?></option>
                                        <?php } ?> 
								  </select>
                                  <?php echo form_error('student_shift'); ?>
								</div>
							  </div>
                              <div class="control-group">
								<label class="control-label" for="selectError">Section</label>
								<div class="controls">
								  <select id="student_section_id" class="span6 typeahead" name="student_section"  >
									<?php foreach ($section_list as $section) {
                                                    ?>
                                                    <option value="<?php echo $section->section_id; ?>"><?php echo $section->section_name; ?></option>
                                                    <?php
                                                }
                                                ?>
								  </select>
                                  <?php echo form_error('student_section'); ?>
								</div>
							  </div>
                            
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Submit </button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
					
						
			
			<div class="row-fluid sortable">
				
				
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Striped Table</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped">
							  <thead>
								  <tr>
									  <th>Student Name</th>
									  <th>Student Inique Code</th>
									  <th>Class</th>
									  <th>Roll</th>
									  <th>Shift</th>                                          
									  <th>Section</th>
									  <th>Student Image</th>
									  <th>Status</th>
								  </tr>
							  </thead>   
							  <tbody>

							  <?php foreach ($student_list as $key => $value) { ?>
							  	
								<tr>
									<td><?php echo $value['student_name']; ?></td>
									<td class="center"><?php echo $value['student_name']; ?></td>
									<td class="center"><?php echo $value['student_unique_code']; ?></td>
									<td class="center"><?php echo $value['student_class']; ?></td>
									<td class="center"><?php echo $value['student_class_position']; ?></td>
									<td class="center"><?php echo $value['student_shift']; ?></td>
									<td class="center"><?php echo $value['student_section']; ?></td>
									<td class="center">
										<span class="label label-success">Active</span>
									</td>                                       
								</tr>

								<?php } ?> 
								                                  
							  </tbody>
						 </table>  
						 <div class="pagination pagination-centered">
						  <ul>
							<li><a href="#">Prev</a></li>
							<li class="active">
							  <a href="#">1</a>
							</li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">Next</a></li>
						  </ul>
						</div>     
					</div>
				</div><!--/span-->
			</div>
			
			
			
       

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	<div class="clearfix"></div>



<script type="text/javascript">

$(document).ready(function() {

	  $(".box-content").on('change', '#student_class_id', function(){
	  		var student_class_id = $(this).val(); 

	  		$(".box-content").on('change', '#student_shift_id', function(){
	  			var student_shift_id = $(this).val(); 

	  			$(".box-content").on('change', '#student_section_id', function(){

        		var student_section_id = $(this).val(); 

		        $.ajax({
		          url: "<?php echo base_url() ?>index.php/ajax_call/select_student/"+student_class_id + "/" + student_shift_id + "/" + student_section_id,
		          beforeSend: function( xhr ) {
		            xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
		            $("#college_id").html("<option>Loading .... </option>") ; 
		          }
		        })

		      .done(function( data ) {
		      
		         $("#college_id").html("<option value=''>Select a College </option>"); 
		            data=JSON.parse(data);
		        $.each(data, function(key, val) {
		              $("#college_id").append("<option value='"+val.id+"'>"+val.name+"</option>");
		              
		            });  
		            
		   });
 		}); 
	  });
	});

}
</script>
	
	