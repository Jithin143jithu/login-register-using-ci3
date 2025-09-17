<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Add New Users
        <small> </small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary"><br>
                    <!-- <div class="box-header"><br>
                        <h3 class="box-title">Enter Details</h3>
                    </div> -->
                    <!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="addNewUser" action="<?php echo base_url() ?>addNewUser" method="post" role="form" novalidate>
                    
                        <div class="box-body">

                        <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="text" class="form-control" id="password" name="password">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" id="first_name"  name="first_name" maxlength="50">
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" id="last_name"  name="last_name" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role_id">Select User Role*</label>
                                        <select name="role_id" id="role_id" class="form-control">
                                            <option value="">-- Select Role --</option>
                                            <?php if (!empty($roles)): ?>
                                                <?php foreach ($roles as $role): ?>
                                                    <option value="<?php echo $role->id; ?>">
                                                        <?php echo $role->role_name; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Mobile No</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile">
                                    </div>
                                </div>
                            </div>

                        </div><!-- /.box-body -->
                        
                            <!-- Success / Error Messages -->
                            <div id="form-messages"></div>
                            
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>            
        </div>    
    </section>
    
</div>

