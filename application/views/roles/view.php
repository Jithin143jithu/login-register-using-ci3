<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> View Users
        <small></small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>users/add"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header"><br>
                    <h3 class="box-title">User List</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table class="table table-bordered table-striped" id="example1">
                  <thead>
                    <tr>
                      <th>Sl no</th>
                      <th>Role</th>
                      <th>Status</th>
                      <!-- <th>Date created</th> -->
                      <th class="text-center">Actions</th>
                    </tr>
                  </thead>
                    <?php
                    if(!empty($roles))
                    {
                        $i=1;
                        foreach($roles as $record)
                        { 
                          //$disabled = ($record->status == 0) ? 'disabled' : '';
                          
                    ?>
                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $record->role_name ?></td>
                      <td><?php if ($record->status == 1): ?>
                              <span class="label label-success">Active</span>
                              <?php else: ?>
                                  <span class="label label-danger">Inactive</span>
                              <?php endif; ?>
                      </td>
                      <!-- <td><?php echo date("d-m-Y H:i:s", strtotime($record->createdDtm)); ?></td> -->
                      <td class="text-center">
                          <a class="btn btn-sm btn-info" href="<?php echo base_url().'editUser/'.$record->id; ?>"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-sm btn-danger deleteUser" href="#" data-userid="<?php echo $record->id; ?>"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php
                        $i++;
                      }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>




