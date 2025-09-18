

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
        <!-- <small>Control panel</small> -->
      </h1>
    </section>
    
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>11<?//= $total_students ?></h3>
                  <p>User Registerations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="<?php echo base_url(); ?>addStudent" class="small-box-footer">Add  Users <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>
                  <p>Active Users</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>44</h3>
                  <p>Inactive Users</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>65</h3>
                  <p>Unique Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>

          <div class= "row">
          <div class="col-md-12">
          <div class="box box-info" >
            <div class="box-header with-border">
              <h3 class="box-title">Category wise Count</h3>

              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <?php //if (empty($categoryCounts)): ?>
                    <div class="alert alert-warning">
                        No records found.
                    </div>
                <?php //else: ?>
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Category</th>
                    <th>Category Type</th>
                    <th>Item Name </th>
                    <th>Item code </th>
                    <th>Total Count </th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    
                    <!-- <?php foreach($categoryCounts as $row): ?>
                  <tr>
                    <td><?= ($row->category == 1) ? "Individual" : (($row->category == 2) ? "Group" : "Unknown") ?></td>
                    <td><?= isset($categories[$row->category_type]) ? $categories[$row->category_type] : "";?></td>
                    <td><?= $row->category_name ?></td>
                    <td><?= $row->category_code ?></td>
                    <td><?= $row->total_students ?></td>
                  </tr>
                  <?php endforeach; ?> -->
                  
                  
                  
                  
                  </tbody>
                </table>
                <?php //endif; ?>
              </div>
              <!-- /.table-responsive -->
            </div>
            
            
          </div>

</div>
</div>



    </section>
</div>






<!-- <div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('logout'); ?>">Logout</a>
      </li>
    </ul>
  </nav>

  <div class="content-wrapper" style="min-height: 200px; padding: 20px;">
    <h3>Welcome, <?php echo html_escape($user->name); ?></h3>
    <p>Your email: <?php echo html_escape($user->email); ?></p>
    <p>Role: <?php echo html_escape($user->role_id);?></p>

    <div class="row">
      <div class="col-md-4">
        <div class="card card-primary">
          <div class="card-header"><h3 class="card-title">Sample Widget</h3></div>
          <div class="card-body">Use this area to show whatever stats or widgets you like.</div>
        </div>
      </div>
    </div>
  </div>
</div> -->
