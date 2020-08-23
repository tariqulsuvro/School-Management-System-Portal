<!--php file call -->
<?php
    include 'includes/header.php';
    include 'includes/navbar.php';
    include 'includes/leftSidebar.php';

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage All Mentors</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">All Mentors</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col-md-12 -->
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <!--card header -->
              <div class="card-header">
                <h5 class="m-0">Manage All Mentors Profile or Settings</h5>
              </div>
              <!--card body start -->
              <div class="card-body">

                <!--table start -->

                <table class="table">
                <thead class="thead-light">
                <tr>
                <th scope="col">Sl.</th>
                <th scope="col">Avater</th>
                <th scope="col">Full Name</th>
                <th scope="col">User Name</th>
                <th scope="col">Email Address</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>


                </tr>
                </thead>
    <!--mentor data read from database -->
                <?php
                  $query = "SELECT * FROM mentor";
                  $all_mentor = mysqli_query($db,$query);
                  $i=0;

                  while ( $row = mysqli_fetch_assoc($all_mentor)) {
                   $mentor_id = $row['mentor_id'];
                   $fullname =  $row['fullname'];
                   $username =  $row['username'];
                   $password =  $row['password'];
                   $email =  $row['email'];
                   $phone =  $row['phone'];
                   $address =  $row['address'];
                   $join_date =  $row['join_date'];
                   $status =  $row['status'];
                   $user_role = $row['user_role'];
                   $image = $row['image'];
                   $i++;
                   ?>
                   <!--All Mentor Table Loop Start -->
                   <tr>
                <th scope="row"><?php echo $i;?></th>
                <td><img src="dist/img/mentor/<?php echo $image?>" width="30"></td>
                <td><?php echo $fullname;?></td>
                <td><?php echo $username;?></td>
                <td><?php echo $email;?></td>
                <td><?php echo $phone;?></td>
                <td>
                  <!--active mentor code-->
                    <?php 
                          if($status == 0 ){
                           echo '<div class = "badge badge-danger">Inactive</div>';
                                  }
                             else {
                           echo '<div class = "badge badge-primary">Active</div>';
                             }
                    ?>
                <!--active mentor code-->
                </td>

                <td>

                  <ul class="nav-users">
                    <li data-toggle="tooltip" data-placement="bottom" title="View">
                      <a href="#">
                       <i class="fas fa-eye"></i>
                      </a>
                    </li>

                    <li data-toggle="tooltip" data-placement="bottom" title="Edit">
                      <a href="#">
                       <i class="fas fa-user-edit"></i>
                      </a>
                    </li>

                    <li data-toggle="tooltip" data-placement="bottom" title="Delete">
                      <a href="#">
                       <i class="fas fa-user-slash"></i>
                      </a>
                    </li>
                  </ul>
                </td>

                </tr>
                <!--All Mentor Table Loop end -->

                    
                 <?php 
                      }
                     ?>
             
                
                </tbody>
                </table>

                <!--table end-->
                


              </div>
              <!--card body end -->
            </div>

            <div class="">
              <a href="addMentor.php" class="btn btn-primary btn-flat pull-right">Add New Member</a> 
            </div>

          </div>
          <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php
     include 'includes/footer.php';
     ?>


