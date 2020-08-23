

<!--php file call -->
<?php
    include 'includes/header.php';
    include 'includes/navbar.php';
    include 'includes/leftSidebar.php';

?>


<!-- insert data to database -->
            <?php
                    
                    $error = "";

                    if(isset($_POST['addMentor'])){

                      $fullname = $_POST['fullname'];
                      $username = $_POST['username'];

                      $password       = $_POST['password'];
                      $repeatPassword = $_POST['repeatPassword'];

                      $email   = $_POST['email'];
                      $phone   = $_POST['phone'];
                      $address = $_POST['address'];
                      $status  = $_POST['status'];

                     
                     $mentor_image      = $_FILES['image']['name'];
                     $mentor_image_temp = $_FILES['image']['tmp_name'];
                     move_uploaded_file($mentor_image_temp, "dist/img/mentor/$mentor_image");


                      if( $password != $repeatPassword)
                      {
                        $error = '<div class = "alert alert-danger">Password Not matched!!!! Please try again.</div>';
                      }
                      else{
                        $hassedPass = sha1($password);
                        
                        //data input query when password in right
                        $query = "INSERT INTO mentor (fullname, username, password, email, phone, address, join_date, status, user_role, image) VALUES ( '$fullname','$username','$hassedPass','$email','$phone','$address',now(),'$status','1','$mentor_image' )";

                        $addMentor = mysqli_query( $db, $query);

                        if(!$addMentor){
                          die("query failed" . mysqli_error($db));
                        }
                        else{
                          header("Location: allMentor.php");
                        }



                      }

                }
             ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add New Mentor</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Add New Mentor</li>
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
                <h5 class="m-0">Add New Profile of a Mentor</h5>
              </div>
              <!--card body start -->
              <div class="card-body">

                <div class="row">
                 <!--add new mentor form start -->

                  <div class="col-lg-6">
                    <form action="" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                      <label for="fullname">Full Name</label>
                      <input type="text" name="fullname" class="form-control" required="required" autocomplete="off">    
                    </div>

                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" name="username" class="form-control" required="required" autocomplete="off">    
                    </div>

                     <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password" class="form-control" required="required" autocomplete="off">    
                    </div>

                    <div class="form-group">
                      <label for="repeatPassword">Repeat Your Password</label>
                      <input type="password" name="repeatPassword" class="form-control" required="required" autocomplete="off">    
                    </div>

                    <div class="form-group">
                      <label for="email">Email Address</label>
                      <input type="email" name="email" class="form-control" required="required" autocomplete="off">    
                    </div>

                  </div>

                  <div class="col-lg-6">

                    <div class="form-group">
                      <label for="phone">Phone</label>
                      <input type="text" name="phone" class="form-control" required="required" autocomplete="off">    
                    </div>

                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" name="address" class="form-control" required="required" autocomplete="off">    
                    </div>

                  <div class="form-group">
                      <label for="status">Status</label>

                      <div class="form-check">
                      <input class="form-check-input" type="radio" name="status" value="1">
                      <label class="form-check-label" for="exampleRadios1">
                                 Active
                      </label>
                      </div>

                      <div class="form-check">
                      <input class="form-check-input" type="radio" name="status" value="0" checked>
                      <label class="form-check-label" for="exampleRadios2">
                                  Inactive
                      </label>
                     </div>
                  </div>

                  <div class="form-group">
                    <label>Profile Picture</label>
                    <input type="file" name="image" class="form-control-file">
                  </div>

                  <div class="form-group">
                    <input type="submit" name="addMentor" class="btn btn-primary btn-flat" value="Register New Mentor">
                    
                  </div>

                    </form>

                    
                    
                  </div>

                  <?php echo $error;?>
                  <!--add new mentor form end -->

                </div>


              </div>
              <!--card body end -->
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


