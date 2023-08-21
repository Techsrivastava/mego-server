<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <!-- /.col -->
         <div class="col-md-12">
            <div class="card">
               <div class="card-header p-2">
                  <ul class="nav nav-pills">
                     <li class="nav-item"><a class="nav-link active btn-sm" href="#industry" data-toggle="tab">Industry</a></li>
                     <li class="nav-item"><a class="nav-link btn-sm" href="#department" data-toggle="tab">Department</a></li>
                     <li class="nav-item"><a class="nav-link btn-sm" href="#designation" data-toggle="tab">Designation</a></li>
                     <li class="nav-item"><a class="nav-link btn-sm" href="#skills" data-toggle="tab">Skills</a></li>
                     <!--   <li class="nav-item"><a class="nav-link btn-sm" href="#logindetail" data-toggle="tab">Location</a></li> -->
                     <li class="nav-item"><a class="nav-link btn-sm" href="#experience" data-toggle="tab">Experience</a></li>
                     <li class="nav-item"><a class="nav-link btn-sm" href="#year" data-toggle="tab">Years</a></li>
                     <li class="nav-item"><a class="nav-link btn-sm" href="#qualification" data-toggle="tab">Qualification</a></li>
                     <li class="nav-item"><a class="nav-link btn-sm" href="#notice" data-toggle="tab">Notice Period</a></li>
                  </ul>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <div class="tab-content">
                     <div class="active tab-pane" id="industry">
                        <div class="">
                           <div class="card-header">
                              <div class="row">
                                 <div class="col-sm-12 text-right">
                                    <div class="dt-buttons btn-group flex-wrap">               
                                       <button class="btn btn-secondary buttons-copy buttons-html5 btn-sm"  data-toggle="modal" data-target="#industrymodal"  tabindex="0" aria-controls="example1" type="button">
                                       <span class="fa fa-plus"></span></button> 
                                      <!--  <button class="btn btn-secondary buttons-csv buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <span class="fa fa-edit"></span></button>  -->
                                       <button class="btn btn-secondary buttons-excel buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <span class="fa fa-trash"></span></button> 
                                       <button class="btn btn-secondary buttons-pdf buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <img src="<?php echo base_url(); ?>assets/dist/img/refresh.png" width="15"></button> 
                                    <!--    <button class="btn btn-secondary buttons-print btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <img src="<?php echo base_url(); ?>assets/dist/img/excel-download.png" width="15">
                                       </button> 
                                       <button class="btn btn-secondary buttons-print btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <img src="<?php echo base_url(); ?>assets/dist/img/excel-upload.png" width="15">
                                       </button>  -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <table id="industrytbl" class="display" style="width:100%">
                                          <thead>
                                             <tr>
                                                <th>SNO</th>
                                                <th>INDUSTRY</th>
                                                <th>DESCRIPTION</th>
                                                <th>IMAGE</th>                                               
                                                <th>STATUS</th>
                                                <th>ACTION</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php
                                                $i="1";
                                                foreach($industryList as $indusRow)
                                                {
                                                ?>
                                             <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $indusRow->PR_INDUSTRY; ?></td>
                                                <td><?php echo $indusRow->PR_DESC; ?></td>
                                          
                                                <td><?php echo $indusRow->PR_TYPE; ?></td>
                                                <td><?php echo $indusRow->PR_STATUS; ?></td>
                                                <td>
                                                   <a href="#" data-toggle="modal" data-target="#industrymodal" onclick="getIndusryData('<?php echo $indusRow->PR_INDUSTRY_ID; ?>')"><button class="btn btn-secondary buttons-csv buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                                   <span class="fa fa-edit"></span></button></a>
                                                </td>
                                             </tr>
                                             <?php
                                                $i++;
                                                }
                                                ?>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- /.card-body -->
                        </div>
                     </div>
                     <!-- /.tab-pane -->
                     <div class="tab-pane" id="department">
                        <div class="">
                           <div class="card-header">
                              <div class="row">
                                 <div class="col-sm-12 text-right">
                                    <div class="dt-buttons btn-group flex-wrap">               
                                       <button class="btn btn-secondary buttons-copy buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <span class="fa fa-plus"></span></button> 
                                       <button class="btn btn-secondary buttons-csv buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <span class="fa fa-edit"></span></button> 
                                       <button class="btn btn-secondary buttons-excel buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <span class="fa fa-trash"></span></button> 
                                       <button class="btn btn-secondary buttons-pdf buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <img src="<?php echo base_url(); ?>assets/dist/img/refresh.png" width="15"></button> 
                                       <button class="btn btn-secondary buttons-print btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <img src="<?php echo base_url(); ?>assets/dist/img/excel-download.png" width="15">
                                       </button> 
                                       <button class="btn btn-secondary buttons-print btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <img src="<?php echo base_url(); ?>assets/dist/img/excel-upload.png" width="15">
                                       </button> 
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <table id="departmenttbl" class="display" style="width:100%">
                                          <thead>
                                             <tr>
                                                <th>SNO</th>
                                                <th>INDUSTRY</th>
                                                <th>DEPARTMENT</th>
                                                <th>STATUS</th>
                                                <th>ACTION</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php
                                                $d="1";
                                                foreach($departmentList as $departRow)
                                                {
                                                ?>
                                             <tr>
                                                <td><?php echo $d; ?></td>
                                                <td><?php echo $departRow->PR_INDUSTRY; ?></td>
                                                <td><?php echo $departRow->PR_DEPART_NAME; ?></td>
                                                <td><?php echo $departRow->PR_STATUS; ?></td>
                                                <td>
                                                     <a href="#" data-toggle="modal" data-target="#departmentmodal" onclick="getIndusryData('<?php echo $departRow->PR_DEPARTMENT_ID; ?>')"><button class="btn btn-secondary buttons-csv buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                                   <span class="fa fa-edit"></span></button></a>
                                                </td>
                                             </tr>
                                             <?php
                                                $d++;
                                                }
                                                ?>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                                 <!-- /.timeline-label -->
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane" id="designation">
                        <div class="">
                           <div class="card-header">
                              <div class="row">
                                 <div class="col-sm-12 text-right">
                                    <div class="dt-buttons btn-group flex-wrap">               
                                       <button class="btn btn-secondary buttons-copy buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <span class="fa fa-plus"></span></button> 
                                       <button class="btn btn-secondary buttons-csv buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <span class="fa fa-edit"></span></button> 
                                       <button class="btn btn-secondary buttons-excel buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <span class="fa fa-trash"></span></button> 
                                       <button class="btn btn-secondary buttons-pdf buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <img src="<?php echo base_url(); ?>assets/dist/img/refresh.png" width="15"></button> 
                                       <button class="btn btn-secondary buttons-print btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <img src="<?php echo base_url(); ?>assets/dist/img/excel-download.png" width="15">
                                       </button> 
                                       <button class="btn btn-secondary buttons-print btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <img src="<?php echo base_url(); ?>assets/dist/img/excel-upload.png" width="15">
                                       </button> 
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <table id="designationtbl" class="display" style="width:100%">
                                          <thead>
                                             <tr>
                                                <th>SNO</th>
                                                <th>DEPARTMENT</th>
                                                <th>DESIGNATION</th>
                                                <th>STATUS</th>
                                                <th>ACTION</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php
                                                $des="1";
                                                foreach($designationList as $desigRow)
                                                {
                                                ?>
                                             <tr>
                                                <td><?php echo $des; ?></td>
                                                <td><?php echo $desigRow->PR_DEPART_NAME; ?></td>
                                                <td><?php echo $desigRow->PR_DESIG_NAME; ?></td>
                                                <td><?php echo $desigRow->PR_STATUS; ?></td>
                                                <td>
                                                        <a href="#" data-toggle="modal" data-target="#designationmodal" onclick="getIndusryData('<?php echo $desigRow->PR_DESIGNATION_ID; ?>')"><button class="btn btn-secondary buttons-csv buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                                   <span class="fa fa-edit"></span></button></a>
                                                </td>
                                             </tr>
                                             <?php
                                                $des++;
                                                }
                                                ?>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                                 <!-- /.timeline-label -->
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane" id="skills">
                        <div class="">
                           <div class="card-header">
                              <div class="row">
                                 <div class="col-sm-12 text-right">
                                    <div class="dt-buttons btn-group flex-wrap">               
                                       <button class="btn btn-secondary buttons-copy buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <span class="fa fa-plus"></span></button> 
                                       <button class="btn btn-secondary buttons-csv buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <span class="fa fa-edit"></span></button> 
                                       <button class="btn btn-secondary buttons-excel buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <span class="fa fa-trash"></span></button> 
                                       <button class="btn btn-secondary buttons-pdf buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <img src="<?php echo base_url(); ?>assets/dist/img/refresh.png" width="15"></button> 
                                       <button class="btn btn-secondary buttons-print btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <img src="<?php echo base_url(); ?>assets/dist/img/excel-download.png" width="15">
                                       </button> 
                                       <button class="btn btn-secondary buttons-print btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <img src="<?php echo base_url(); ?>assets/dist/img/excel-upload.png" width="15">
                                       </button> 
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <table id="skillstbl" class="display" style="width:100%">
                                          <thead>
                                             <tr>
                                                <th>SNO</th>
                                                <th>INDUSTRY</th>
                                                <th>DEPARTMENT</th>
                                                <th>DESIGNATION</th>
                                                <th>SKILLS</th>
                                                <th>STATUS</th>
                                                <th>ACTION</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php
                                                $s="1";
                                                foreach($skillsList as $skillRow)
                                                {
                                                ?>
                                             <tr>
                                                <td><?php echo $s; ?></td>
                                                <td><?php echo $skillRow->PR_INDUSTRY; ?></td>
                                                <td></td>
                                                <td></td>
                                                <td><?php echo $skillRow->PR_SKILL; ?></td>
                                                <td><?php echo $skillRow->PR_STATUS; ?></td>
                                                <td>
                                                      <a href="#" data-toggle="modal" data-target="#skillmodal" onclick="getIndusryData('<?php echo $skillRow->PR_SKILL_ID; ?>')"><button class="btn btn-secondary buttons-csv buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                                   <span class="fa fa-edit"></span></button></a>
                                                </td>
                                             </tr>
                                             <?php
                                                $s++;
                                                }
                                                ?>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                                 <!-- /.timeline-label -->
                              </div>
                           </div>
                        </div>
                     </div>
                        <div class="tab-pane" id="experience">
                        <div class="">
                           <div class="card-header">
                              <div class="row">
                                 <div class="col-sm-12 text-right">
                                    <div class="dt-buttons btn-group flex-wrap">               
                                       <button class="btn btn-secondary buttons-copy buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <span class="fa fa-plus"></span></button> 
                                       <button class="btn btn-secondary buttons-csv buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <span class="fa fa-edit"></span></button> 
                                       <button class="btn btn-secondary buttons-excel buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <span class="fa fa-trash"></span></button> 
                                       <button class="btn btn-secondary buttons-pdf buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <img src="<?php echo base_url(); ?>assets/dist/img/refresh.png" width="15"></button> 
                                       <button class="btn btn-secondary buttons-print btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <img src="<?php echo base_url(); ?>assets/dist/img/excel-download.png" width="15">
                                       </button> 
                                       <button class="btn btn-secondary buttons-print btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <img src="<?php echo base_url(); ?>assets/dist/img/excel-upload.png" width="15">
                                       </button> 
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <table id="exptbl" class="display" style="width:100%">
                                          <thead>
                                             <tr>
                                                <th>SNO</th>
                                                <th>EXPERIENCE</th>                                            
                                                <th>STATUS</th>
                                                <th>ACTION</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php
                                                $s="1";
                                                foreach($skillsList as $skillRow)
                                                {
                                                ?>
                                             <tr>
                                                <td><?php echo $s; ?></td>
                                                
                                                <td></td>
                                                <td></td>
                                                
                                                <td>
                                                      <a href="#" data-toggle="modal" data-target="#expmodal" onclick="getIndusryData('<?php echo $skillRow->PR_SKILL_ID; ?>')"><button class="btn btn-secondary buttons-csv buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                                   <span class="fa fa-edit"></span></button></a>
                                                </td>
                                             </tr>
                                             <?php
                                                $s++;
                                                }
                                                ?>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                                 <!-- /.timeline-label -->
                              </div>
                           </div>
                        </div>
                     </div>
                      <div class="tab-pane" id="year">
                        <div class="">
                           <div class="card-header">
                              <div class="row">
                                 <div class="col-sm-12 text-right">
                                    <div class="dt-buttons btn-group flex-wrap">               
                                       <button class="btn btn-secondary buttons-copy buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <span class="fa fa-plus"></span></button> 
                                       <button class="btn btn-secondary buttons-csv buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <span class="fa fa-edit"></span></button> 
                                       <button class="btn btn-secondary buttons-excel buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <span class="fa fa-trash"></span></button> 
                                       <button class="btn btn-secondary buttons-pdf buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <img src="<?php echo base_url(); ?>assets/dist/img/refresh.png" width="15"></button> 
                                       <button class="btn btn-secondary buttons-print btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <img src="<?php echo base_url(); ?>assets/dist/img/excel-download.png" width="15">
                                       </button> 
                                       <button class="btn btn-secondary buttons-print btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <img src="<?php echo base_url(); ?>assets/dist/img/excel-upload.png" width="15">
                                       </button> 
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <table id="yeartbl" class="display" style="width:100%">
                                          <thead>
                                             <tr>
                                                <th>SNO</th>
                                                <th>YEAR</th>                                            
                                                <th>STATUS</th>
                                                <th>ACTION</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php
                                                $s="1";
                                                foreach($skillsList as $skillRow)
                                                {
                                                ?>
                                             <tr>
                                                <td><?php echo $s; ?></td>
                                                
                                                <td></td>
                                                <td></td>
                                                
                                                <td>
                                                      <a href="#" data-toggle="modal" data-target="#yearmodal" onclick="getIndusryData('<?php echo $skillRow->PR_SKILL_ID; ?>')"><button class="btn btn-secondary buttons-csv buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                                   <span class="fa fa-edit"></span></button></a>
                                                </td>
                                             </tr>
                                             <?php
                                                $s++;
                                                }
                                                ?>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                                 <!-- /.timeline-label -->
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane" id="qualification">
                        <div class="">
                           <div class="card-header">
                              <div class="row">
                                 <div class="col-sm-12 text-right">
                                    <div class="dt-buttons btn-group flex-wrap">               
                                       <button class="btn btn-secondary buttons-copy buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <span class="fa fa-plus"></span></button> 
                                       <button class="btn btn-secondary buttons-csv buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <span class="fa fa-edit"></span></button> 
                                       <button class="btn btn-secondary buttons-excel buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <span class="fa fa-trash"></span></button> 
                                       <button class="btn btn-secondary buttons-pdf buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <img src="<?php echo base_url(); ?>assets/dist/img/refresh.png" width="15"></button> 
                                       <button class="btn btn-secondary buttons-print btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <img src="<?php echo base_url(); ?>assets/dist/img/excel-download.png" width="15">
                                       </button> 
                                       <button class="btn btn-secondary buttons-print btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <img src="<?php echo base_url(); ?>assets/dist/img/excel-upload.png" width="15">
                                       </button> 
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <table id="quaaltbl" class="display" style="width:100%">
                                          <thead>
                                             <tr>
                                                <th>SNO</th>
                                                <th>QUALIFICATION</th>                                            
                                                <th>STATUS</th>
                                                <th>ACTION</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php
                                                $s="1";
                                                foreach($skillsList as $skillRow)
                                                {
                                                ?>
                                             <tr>
                                                <td><?php echo $s; ?></td>
                                                
                                                <td></td>
                                                <td></td>
                                                
                                                <td>
                                                      <a href="#" data-toggle="modal" data-target="#qualmodal" onclick="getIndusryData('<?php echo $skillRow->PR_SKILL_ID; ?>')"><button class="btn btn-secondary buttons-csv buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                                   <span class="fa fa-edit"></span></button></a>
                                                </td>
                                             </tr>
                                             <?php
                                                $s++;
                                                }
                                                ?>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                                 <!-- /.timeline-label -->
                              </div>
                           </div>
                        </div>
                     </div>

                      <div class="tab-pane" id="notice">
                        <div class="">
                           <div class="card-header">
                              <div class="row">
                                 <div class="col-sm-12 text-right">
                                    <div class="dt-buttons btn-group flex-wrap">               
                                       <button class="btn btn-secondary buttons-copy buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <span class="fa fa-plus"></span></button> 
                                       <button class="btn btn-secondary buttons-csv buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <span class="fa fa-edit"></span></button> 
                                       <button class="btn btn-secondary buttons-excel buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <span class="fa fa-trash"></span></button> 
                                       <button class="btn btn-secondary buttons-pdf buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <img src="<?php echo base_url(); ?>assets/dist/img/refresh.png" width="15"></button> 
                                       <button class="btn btn-secondary buttons-print btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <img src="<?php echo base_url(); ?>assets/dist/img/excel-download.png" width="15">
                                       </button> 
                                       <button class="btn btn-secondary buttons-print btn-sm" tabindex="0" aria-controls="example1" type="button">
                                       <img src="<?php echo base_url(); ?>assets/dist/img/excel-upload.png" width="15">
                                       </button> 
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <table id="noticetbl" class="display" style="width:100%">
                                          <thead>
                                             <tr>
                                                <th>SNO</th>
                                                <th>NOTICE PERIOD</th>                                            
                                                <th>STATUS</th>
                                                <th>ACTION</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php
                                                $s="1";
                                                foreach($skillsList as $skillRow)
                                                {
                                                ?>
                                             <tr>
                                                <td><?php echo $s; ?></td>
                                                
                                                <td></td>
                                                <td></td>
                                                
                                                <td>
                                                      <a href="#" data-toggle="modal" data-target="#noticemodal" onclick="getIndusryData('<?php echo $skillRow->PR_SKILL_ID; ?>')"><button class="btn btn-secondary buttons-csv buttons-html5 btn-sm" tabindex="0" aria-controls="example1" type="button">
                                                   <span class="fa fa-edit"></span></button></a>
                                                </td>
                                             </tr>
                                             <?php
                                                $s++;
                                                }
                                                ?>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                                 <!-- /.timeline-label -->
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- /.tab-pane -->
                     <div class="tab-pane" id="settings">
                        <form class="form-horizontal">
                           <div class="form-group row mb-2">
                              <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                              <div class="col-sm-10">
                                 <input type="email" class="form-control" id="inputName" placeholder="Name">
                              </div>
                           </div>
                           <div class="form-group row mb-2">
                              <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                              <div class="col-sm-10">
                                 <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                              </div>
                           </div>
                           <div class="form-group row mb-2">
                              <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                              <div class="col-sm-10">
                                 <input type="text" class="form-control" id="inputName2" placeholder="Name">
                              </div>
                           </div>
                           <div class="form-group row mb-2">
                              <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                              <div class="col-sm-10">
                                 <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                              <div class="col-sm-10">
                                 <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10">
                                 <div class="checkbox">
                                    <label>
                                    <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                    </label>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10">
                                 <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                              </div>
                           </div>
                        </form>
                     </div>
                     <!-- /.tab-pane -->
                     <div class="tab-pane" id="warehouse">
                        <form class="form-horizontal">
                           <div class="form-group row">
                              <label for="inputName" class="col-sm-2 col-form-label">Name 3</label>
                              <div class="col-sm-10">
                                 <input type="email" class="form-control" id="inputName" placeholder="Name">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                              <div class="col-sm-10">
                                 <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                              <div class="col-sm-10">
                                 <input type="text" class="form-control" id="inputName2" placeholder="Name">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                              <div class="col-sm-10">
                                 <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                              <div class="col-sm-10">
                                 <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10">
                                 <div class="checkbox">
                                    <label>
                                    <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                    </label>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10">
                                 <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                              </div>
                           </div>
                        </form>
                     </div>
                     <!-- /.tab-pane -->
                     <div class="tab-pane" id="logindetail">
                        <form class="form-horizontal">
                           <div class="form-group row">
                              <label for="inputName" class="col-sm-2 col-form-label">Name 4</label>
                              <div class="col-sm-10">
                                 <input type="email" class="form-control" id="inputName" placeholder="Name">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                              <div class="col-sm-10">
                                 <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                              <div class="col-sm-10">
                                 <input type="text" class="form-control" id="inputName2" placeholder="Name">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                              <div class="col-sm-10">
                                 <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                              <div class="col-sm-10">
                                 <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10">
                                 <div class="checkbox">
                                    <label>
                                    <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                    </label>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10">
                                 <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                              </div>
                           </div>
                        </form>
                     </div>
                     <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.card -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
   <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

</div>




<!-- Industry Modal -->
<div class="modal fade" id="industrymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true"  data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h6 class="modal-title" id="addindustryTitle">Add Industry</h6>
            <h6 class="modal-title" id="editindustryTitle" style="display:none;">Edit Industry</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>       
         </div>
         <form enctype="#" action="#" method="post">
            <div class="modal-body">
               <div class="form-group row">
                  <div class="col-sm-6">
                     <label  for="example-nf-email" >Industry Name<sup style="color:red;">*</sup></label>
                     <input type="text" id="industry_name" name="industry_name" class="form-control input-sm" placeholder="Enter Industry Name" required="required">
                  </div>
                  <div class="col-sm-6">
                     <label  for="example-input-small">Image<sup style="color:red;">*</sup></label>                            
                     <input type="file" id="industry_file" name="industry_file" class="form-control input-sm" placeholder="Enter File" required="required">
                  </div>
                  <div class="col-sm-6">
                     <label  for="example-input-small">Status<sup style="color:red;">*</sup></label>                            
                     <select class="form-control" id="industry_status" name="industry_status" required="required">
                        <option>Select Status</option>
                        <option  value="1" >Enable</option>
                        <option  value="0" >Disable</option>
                     </select>
                  </div>
                  <div class="col-sm-12">
                     <label  for="example-input-small">Description</label>                            
                     <input type="text" id="industry_desc" name="industry_desc" class="form-control input-sm" placeholder="Enter Description">
                  </div>
               </div>
            </div>
            <div class="modal-footer">       
               <button type="submit" class="btn btn-primary pull-right btn-sm">Save</button>
               <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"  style="margin-right:10px;">Close</button>        
            </div>
         </form>
      </div>
   </div>
</div>
<!-- Industry Modal -->



<!-- Department Modal -->
<div class="modal fade" id="departmentmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true"  data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">Add Department</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>       
         </div>
         <form enctype="#" action="#" method="post">
            <div class="modal-body">
               <div class="form-group row">
                  <div class="col-sm-6">
                     <label  for="example-nf-email" >Industry<sup style="color:red;">*</sup></label>
                      <select class="form-control" id="depart_industry" name="depart_industry" required="required">
                        <option>Select Industry</option>
                        
                     </select>
                  </div>
                     <div class="col-sm-6">
                     <label  for="example-nf-email" >Department Name<sup style="color:red;">*</sup></label>
                     <input type="text" id="depart_name" name="depart_name" class="form-control input-sm" placeholder="Enter Department Name" required="required">
                  </div>
                  <div class="col-sm-6">
                     <label  for="example-input-small">Image<sup style="color:red;">*</sup></label>                            
                     <input type="file" id="depart_file" name="depart_file" class="form-control input-sm" placeholder="Enter File" required="required">
                  </div>
                  <div class="col-sm-6">
                     <label  for="example-input-small">Status<sup style="color:red;">*</sup></label>                            
                     <select class="form-control" id="depart_status" name="depart_status" required="required">
                        <option>Select Status</option>
                        <option  value="1" >Enable</option>
                        <option  value="0" >Disable</option>
                     </select>
                  </div>
                  <div class="col-sm-12">
                     <label  for="example-input-small">Description</label>                            
                     <input type="text" id="depart_desc" name="depart_desc" class="form-control input-sm" placeholder="Enter Description">
                  </div>
               </div>
            </div>
            <div class="modal-footer">       
               <button type="submit" class="btn btn-primary pull-right btn-sm">Save</button>
               <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"  style="margin-right:10px;">Close</button>        
            </div>
         </form>
      </div>
   </div>
</div>
<!--Department Industry Modal -->


<!-- Designation Modal -->
<div class="modal fade" id="designationmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true"  data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">Add Designation</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>       
         </div>
         <form enctype="#" action="#" method="post">
            <div class="modal-body">
               <div class="form-group row">
                  <div class="col-sm-6">
                     <label  for="example-nf-email" >Industry<sup style="color:red;">*</sup></label>
                      <select class="form-control" id="desig_industry" name="desig_industry" required="required">
                        <option>Select Industry</option>
                        
                     </select>
                  </div>
                  <div class="col-sm-6">
                     <label  for="example-nf-email" >Department<sup style="color:red;">*</sup></label>
                      <select class="form-control" id="desig_department" name="desig_department" required="required">
                        <option>Select Industry</option>
                        
                     </select>
                  </div>
                     <div class="col-sm-6">
                     <label  for="example-nf-email" >Designation Name<sup style="color:red;">*</sup></label>
                     <input type="text" id="desig_name" name="desig_name" class="form-control input-sm" placeholder="Enter Designation Name" required="required">
                  </div>
                  <div class="col-sm-6">
                     <label  for="example-input-small">Image<sup style="color:red;">*</sup></label>                            
                     <input type="file" id="desig_file" name="desig_file" class="form-control input-sm" placeholder="Enter File" required="required">
                  </div>
                  <div class="col-sm-6">
                     <label  for="example-input-small">Status<sup style="color:red;">*</sup></label>                            
                     <select class="form-control" id="desig_status" name="desig_status" required="required">
                        <option>Select Status</option>
                        <option  value="1" >Enable</option>
                        <option  value="0" >Disable</option>
                     </select>
                  </div>
                  <div class="col-sm-12">
                     <label  for="example-input-small">Description</label>                            
                     <input type="text" id="desig_desc" name="desig_desc" class="form-control input-sm" placeholder="Enter Description">
                  </div>
               </div>
            </div>
            <div class="modal-footer">       
               <button type="submit" class="btn btn-primary pull-right btn-sm">Save</button>
               <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"  style="margin-right:10px;">Close</button>        
            </div>
         </form>
      </div>
   </div>
</div>
<!-- Designation Modal -->




<!-- Skill Modal -->
<div class="modal fade" id="skillmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true"  data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">Add Skill</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>       
         </div>
         <form enctype="#" action="#" method="post">
            <div class="modal-body">
               <div class="form-group row">
                  <div class="col-sm-6">
                     <label  for="example-nf-email" >Industry<sup style="color:red;">*</sup></label>
                      <select class="form-control" id="skill_industry" name="skill_industry" required="required">
                        <option>Select Industry</option>
                        
                     </select>
                  </div>
                  <div class="col-sm-6">
                     <label  for="example-nf-email" >Department<sup style="color:red;">*</sup></label>
                      <select class="form-control" id="skill_department" name="skill_department" required="required">
                        <option>Select Industry</option>
                        
                     </select>
                  </div>
                  <div class="col-sm-6">
                     <label  for="example-nf-email" >Designation<sup style="color:red;">*</sup></label>
                      <select class="form-control" id="skill_department" name="skill_department" required="required">
                        <option>Select Industry</option>
                        
                     </select>
                  </div>
                     <div class="col-sm-6">
                     <label  for="example-nf-email" >Skill Name<sup style="color:red;">*</sup></label>
                     <input type="text" id="skill_name" name="skill__name" class="form-control input-sm" placeholder="Enter Skill Name" required="required">
                  </div>
                  <div class="col-sm-6">
                     <label  for="example-input-small">Image<sup style="color:red;">*</sup></label>                            
                     <input type="file" id="skill_file" name="skill_file" class="form-control input-sm" placeholder="Enter File" required="required">
                  </div>
                  <div class="col-sm-6">
                     <label  for="example-input-small">Status<sup style="color:red;">*</sup></label>                            
                     <select class="form-control" id="skill_status" name="skill_status" required="required">
                        <option>Select Status</option>
                        <option  value="1" >Enable</option>
                        <option  value="0" >Disable</option>
                     </select>
                  </div>
                  <div class="col-sm-12">
                     <label  for="example-input-small">Description</label>                            
                     <input type="text" id="skill_desc" name="skill_desc" class="form-control input-sm" placeholder="Enter Description">
                  </div>
               </div>
            </div>
            <div class="modal-footer">       
               <button type="submit" class="btn btn-primary pull-right btn-sm">Save</button>
               <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"  style="margin-right:10px;">Close</button>        
            </div>
         </form>
      </div>
   </div>
</div>
<!-- Skill Modal -->



<!-- Experience Modal -->
<div class="modal fade" id="expmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true"  data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">Add Experience</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>       
         </div>
         <form enctype="#" action="#" method="post">
            <div class="modal-body">
               <div class="form-group row">
                 
                     <div class="col-sm-6">
                     <label  for="example-nf-email" >Experience Name<sup style="color:red;">*</sup></label>
                     <input type="text" id="exp_name" name="exp_name" class="form-control input-sm" placeholder="Enter Experience Name" required="required">
                  </div>
                  
                  <div class="col-sm-6">
                     <label  for="example-input-small">Status<sup style="color:red;">*</sup></label>                            
                     <select class="form-control" id="exp_status" name="exp_status" required="required">
                        <option>Select Status</option>
                        <option  value="1" >Enable</option>
                        <option  value="0" >Disable</option>
                     </select>
                  </div>
                  <div class="col-sm-12">
                     <label  for="example-input-small">Description</label>                            
                     <input type="text" id="exp_desc" name="exp_desc" class="form-control input-sm" placeholder="Enter Description">
                  </div>
               </div>
            </div>
            <div class="modal-footer">       
               <button type="submit" class="btn btn-primary pull-right btn-sm">Save</button>
               <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"  style="margin-right:10px;">Close</button>        
            </div>
         </form>
      </div>
   </div>
</div>
<!-- Experience Modal -->


<!-- Years Modal -->
<div class="modal fade" id="yearmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true"  data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">Add Year</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>       
         </div>
         <form enctype="#" action="#" method="post">
            <div class="modal-body">
               <div class="form-group row">
                 
                     <div class="col-sm-6">
                     <label  for="example-nf-email" >Year Name<sup style="color:red;">*</sup></label>
                     <input type="text" id="year_name" name="year_name" class="form-control input-sm" placeholder="Enter Experience Name" required="required">
                  </div>
                  
                  <div class="col-sm-6">
                     <label  for="example-input-small">Status<sup style="color:red;">*</sup></label>                            
                     <select class="form-control" id="year_status" name="year_status" required="required">
                        <option>Select Status</option>
                        <option  value="1" >Enable</option>
                        <option  value="0" >Disable</option>
                     </select>
                  </div>
                  <div class="col-sm-12">
                     <label  for="example-input-small">Description</label>                            
                     <input type="text" id="year_desc" name="year_desc" class="form-control input-sm" placeholder="Enter Description">
                  </div>
               </div>
            </div>
            <div class="modal-footer">       
               <button type="submit" class="btn btn-primary pull-right btn-sm">Save</button>
               <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"  style="margin-right:10px;">Close</button>        
            </div>
         </form>
      </div>
   </div>
</div>
<!-- Years Modal -->


<!-- Qualification Modal -->
<div class="modal fade" id="qualmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true"  data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">Add Qualification</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>       
         </div>
         <form enctype="#" action="#" method="post">
            <div class="modal-body">
               <div class="form-group row">
                 
                     <div class="col-sm-6">
                     <label  for="example-nf-email" >Qualification Name<sup style="color:red;">*</sup></label>
                     <input type="text" id="qual_name" name="qual_name" class="form-control input-sm" placeholder="Enter Qualification Name" required="required">
                  </div>
                  
                  <div class="col-sm-6">
                     <label  for="example-input-small">Status<sup style="color:red;">*</sup></label>                            
                     <select class="form-control" id="qual_status" name="qual_status" required="required">
                        <option>Select Status</option>
                        <option  value="1" >Enable</option>
                        <option  value="0" >Disable</option>
                     </select>
                  </div>
                  <div class="col-sm-12">
                     <label  for="example-input-small">Description</label>                            
                     <input type="text" id="qual_desc" name="qual_desc" class="form-control input-sm" placeholder="Enter Description">
                  </div>
               </div>
            </div>
            <div class="modal-footer">       
               <button type="submit" class="btn btn-primary pull-right btn-sm">Save</button>
               <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"  style="margin-right:10px;">Close</button>        
            </div>
         </form>
      </div>
   </div>
</div>
<!-- Qualification Modal -->


<!-- Notice Period Modal -->
<div class="modal fade" id="noticemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true"  data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">Add Notice Period</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>       
         </div>
         <form enctype="#" action="#" method="post">
            <div class="modal-body">
               <div class="form-group row">
                 
                     <div class="col-sm-6">
                     <label  for="example-nf-email" >Notice Period Name<sup style="color:red;">*</sup></label>
                     <input type="text" id="noticename" name="notice_name" class="form-control input-sm" placeholder="Enter Notice Period Name" required="required">
                  </div>
                  
                  <div class="col-sm-6">
                     <label  for="example-input-small">Status<sup style="color:red;">*</sup></label>                            
                     <select class="form-control" id="notice_status" name="notice_status" required="required">
                        <option>Select Status</option>
                        <option  value="1" >Enable</option>
                        <option  value="0" >Disable</option>
                     </select>
                  </div>
                  <div class="col-sm-12">
                     <label  for="example-input-small">Description</label>                            
                     <input type="text" id="notice_desc" name="notice_desc" class="form-control input-sm" placeholder="Enter Description">
                  </div>
               </div>
            </div>
            <div class="modal-footer">       
               <button type="submit" class="btn btn-primary pull-right btn-sm">Save</button>
               <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"  style="margin-right:10px;">Close</button>        
            </div>
         </form>
      </div>
   </div>
</div>
<!-- notice period Modal -->


<script type="text/javascript">
    function getIndusryData(id)
    {
        document.getElementById('addindustryTitle').style.display = "none";
        document.getElementById('editindustryTitle').style.display = "block";
        //alert(id);
        var url="<?php echo base_url('admin/getIndustryData'); ?>"+id,
        $.ajax({
          url:
          type:'post',
          data: {industryId:id},
          success: function(res)
          { 
            document.getElementById(btnid).style.display = "block";
          //  alert("Applied successfully");  
            swal("","Applied Successfully" , "success" );   

          }
        });
    }
</script>