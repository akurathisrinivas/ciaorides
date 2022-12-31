
<div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
              try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="<?php echo site_url();?>admin/dashboard">Home</a>
              </li>
              <li>                 
                <a href="<?php echo site_url();?>admin/roles">Roles</a>
              </li>
              <li class="active"> Edit</li>
            </ul><!-- /.breadcrumb -->            
          </div>

          <div class="page-content">
            <div class="page-header-2">
              <h1 class="col-lg-4 col-md-3 col-sm-3 col-xs-12 pdg-top-10">
                <i class="menu-icon fa fa-list-ul blue"></i>Roles
                <span class="label label-purple arrowed">Edit<span>
              </h1>
              <div class="pull-right ">              
                 <input type="hidden" name="hiv" id="hiv" value="0" />
                           </div>
            </div><!-- /.page-header -->
            
             <?php echo $message; ?>

          <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                    <form class="form-horizontal" role="form" name="myform" id="myform" method="post" action="<?php echo base_url()?>admin/roles/edit_roles/<?php echo $record['id'] ?>?>" enctype="multipart/form-data">
              <div class="row">
                <div class="col-lg-9 col-xs-12 col-sm-9 col-md-9 col-lg-offset-1">

                  <div class="row form-group frm-btm">
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                      <label class="input-text">Select State<span class="red bigger-120">*</span></label>
                    </div>
                    <div class="col-lg-1 col-xs-1 col-sm-1 col-md-1 input-text"> : </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 word-brk">
                      <select class="form-control" name="state_id" id="state_id" required="" onchange="getOrganisations(this.value)">
                                <option value="">Select State</option>
                                <?php
                                if(!empty($states))
                                {
                                  foreach($states as $state)
                                  {
                                    ?>
                                    <option value="<?=$state['id'];?>" <?php if($state['id'] == $record['state_id']){?> selected <?php }?>><?=$state['state'];?></option>
                                    <?php
                                  }
                                }
                                ?>
                              </select>
                    </div>
                  </div>

                  <div class="row form-group frm-btm">
                      <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                        <label class="input-text">Select Organisation <span class="red bigger-120">*</span></label>
                      </div>
                      <div class="col-lg-1 col-xs-1 col-sm-1 col-md-1 input-text"> : </div>
                      <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 word-brk">
                        <select class="form-control" name="organisation_id" id="organisation_id" required="" onchange="getCenters(this.value)">
                                 <option value="">Select Organisation</option> 
                                 <?php
                                if(!empty($organisations))
                                {
                                  foreach($organisations as $organisation)
                                  {
                                    ?>
                                    <option value="<?=$organisation['id'];?>" <?php if($organisation['id'] == $record['organisation_id']){?> selected <?php }?> ><?=$organisation['organisation_name'];?></option>
                                    <?php
                                  }
                                }
                                ?>

                        </select>
                      </div>  
                    </div>        
                

                  <div class="row form-group frm-btm">
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                      <label class="input-text">Center<span class="red bigger-120">*</span></label>
                    </div>
                    <div class="col-lg-1 col-xs-1 col-sm-1 col-md-1 input-text"> : </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 word-brk">
                      <select class="form-control" name="center_id" id="center_id" required="" onchange="getCourses(this.value)">
                                <option value="">Select Center</option>
                                <?php
                                if(!empty($centers))
                                {
                                  foreach($centers as $center)
                                  {
                                    ?>
                                    <option value="<?=$center['id'];?>" <?php if($center['id'] == $record['center_id']){?> selected <?php }?>><?=$center['center'];?></option>
                                    <?php
                                  }
                                }
                                ?>
                              </select>
                    </div>
                  </div>
              <div class="row form-group frm-btm">
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-5">
                      <label class="input-text">Enter Role<span class="red bigger-120">*</span></label>
                    </div>
                    <div class="col-lg-1 col-xs-1 col-sm-1 col-md-1 input-text"> : </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 word-brk">
                      <input class="form-control" placeholder="" type="text" name="rolename" value="<?php echo $record['rolename'] ?>" id="rolename" onkeyup="" required>
                    </div>
                  </div>
      
         
              <div class="row">
								<?php 
        foreach($module_names as $field_key => $values){ 
        $array_keys = implode(',',array_keys($values));
          $field_name = strtolower(str_replace(' ', '_',$field_key));
        ?>  
                <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12 ">
                <div class="pdg-15 bg-style points-cont1" >
                  <div class="sub-heading">
                    <!--<input name="form-field-checkbox" type="checkbox" class="ace" />-->
                    <input class="ace" <?php if($record[$field_name] == $array_keys){ ?> checked <?php } ?> type="hidden" id="module<?php echo $field_name; ?>" name="module[]" class="" value="<?php echo $field_name; ?>" onclick="fun_methods(this.value)" />
                    <span class="lbl  blue"> <b><?php echo $field_key; ?> </b></span>
                  </div>
                  <div class="form-group">
                  <?php foreach($values as $key => $method){
                          $module_values = explode(',',$record[$field_name]);
                  ?>
                    <div class="col-lg-12 input-text">
                      <input class="ace" <?php if(in_array($key,$module_values)){ ?> checked <?php } ?>  type="checkbox" id="<?php echo $field_name; ?>" name="method[<?php echo $field_name; ?>][<?php echo $key; ?>]" class="<?php echo $field_name; ?>" value="<?php echo $key; ?>" />
                      <span class="lbl"> <?php echo $method; ?>  </span>
                    </div>
                    <?php } ?>
                  </div>
                </div>                  
                </div>
              <?php } ?>	
								
							 
							</div>
              

          

        
           

        <!-- <a href="javascript:void(0)" class="add_field_button"><span class="" style="float: right; margin-right: 200px; color: green"><i class="fa fa-plus"></i></span></a>-->

  </div>
          </div>
          <div class="panel-footer">
            <a href="<?=base_url();?>admin/roles/roles" class="btn btn-primary pull-right" style="margin-left:10px;">Cancel</a>    
            <button type="submit" name="submit" value="edit" class="btn btn-primary pull-right" id="btnSubmit">Submit</button>
          </div>
           </form>
        </div>
     

    </div>
  </div>
</div>
</div>
<!-- END PAGE CONTENT WRAPPER -->
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-validate-additional-methods.js"></script>

<script>
  $(document).ready(function() { //alert();
      $("#validation").validate({
          rules: {
            // simple rule, converted to {required:true}            
            category_id: {
                required : true,
            },
            title: {
                required : true,
            }
          },
          submitHandler: function(form) {
              $("#btnSubmit").prop('disabled', true);
              form.submit();
          }
        });
  });

 





</script>
