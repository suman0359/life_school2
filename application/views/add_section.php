


            <!-- page content -->
            <div class="right_col" role="main">
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
                    
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Add Section </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url() . 'creation/create_section' ?>">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Add Section <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="first-name" name="section_name" value="<?php echo set_value('section_name'); ?>" required class="form-control col-md-7 col-xs-12">
                                            </div>
                                            <?php echo form_error('section_name'); ?>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control" readonly="readonly" placeholder="" type="text">
                                            </div>
                                        </div>
                                        
                                                                             
                                        
                                                                               
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="reset" class="btn btn-primary">Cancel</button>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Edit Section </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url() . 'creation/edit_section' ?>">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Shift List<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="select2_group form-control" name="section_name">
                                                    <option value="">Select Section Name</option>
                                                    <?php foreach ($get_section as $list) {
                                                        ?>
                                                        <option value="<?php echo $list->section_id; ?>"><?php echo $list->section_name; ?></option>
                                                        <?php
                                                    }
                                                    ?> 
                    
                                                </select>
                                                <?php echo form_error('id'); ?>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Edit Section</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="first-name" name="new_section" value="<?php echo set_value('new_section'); ?>" required class="form-control col-md-7 col-xs-12">
                                            </div>
                                            <?php echo form_error('new_section'); ?>
                                        </div>
                                        
                                                                             
                                        
                                                                               
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="reset"  class="btn btn-primary">Cancel</button>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Section List </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings">
                                                <th>
                                                    <input type="checkbox" class="tableflat">
                                                </th>
                                                <th>No </th>
                                                <th>Section List</th>
                                                <th>Action</th>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            
                                            
                                            <?php
												if (!empty($section_list)) {
													$i = 1;
													foreach ($section_list as $list) {
														?> 
                                            <tr class="odd pointer">
                                                <td class="a-center ">
                                                    <input type="checkbox" class="tableflat">
                                                </td>
                                                <td class=" "><?php echo $i; ?></td>
                                                <td class=" "><?php echo $list->section_name; ?></td>
                                                <td class=" "><a href="<?php echo base_url() . 'creation/delete_section/' . $list->section_id; ?>" onclick="return confirm('Are you sure?')" class="btn btn-xs btn-danger" data-rel="tooltip" title="Delete">
                                        Delete
                                        </a></td>
                                                
                                            </tr>
                                            <?php
                                $i++;
                            }
                        } else {
                            echo '<tr><td colspan="3" align="center"><h4><br/><br/>- NO DATA FOUND -<br/><br/></h4></td></tr>';
                        }
                        ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                        <br />
                        <br />
                        <br />

                    </div>

                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#birthday').daterangepicker({
                                singleDatePicker: true,
                                calender_style: "picker_4"
                            }, function (start, end, label) {
                                console.log(start.toISOString(), end.toISOString(), label);
                            });
                        });
                    </script>

                

                <!-- footer content -->

                