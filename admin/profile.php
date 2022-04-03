<?php include "includes/admin_header.php"; ?>
  
<?php 


if(isset($_SESSION['username'])){
    
$username = $_SESSION['username'];    
    
 $query = "SELECT * FROM users WHERE username = '{$username}' ";
    
$select_user_profile_query = mysqli_query($connection, $query);
    
if(!$select_user_profile_query){
    
    die("Query Failed". mysqli_error($connection));
}  
    
while($row = mysqli_fetch_array($select_user_profile_query)){
    
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
    
}    
    
}

?>
 
<?php 

if(isset($_POST['edit_user'])){
    
    //$user_id = $_POST['user_id'];  
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    
   // $post_image = $_FILES['image']['name'];
    //$post_image_temp = $_FILES['image']['tmp_name'];
    
    $user_email = $_POST['user_email'];
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    
    
    //$post_date = date('d-m-y');
    //$post_comment_count = 4;
    
 //   move_uploaded_file($post_image_temp, "../images/$post_image" );
    
    
          $query = "UPDATE users SET ";
          $query .="user_firstname = '{$user_firstname}', ";
          $query .="user_lastname = '{$user_lastname}', ";
          $query .="user_role = '{$user_role}', ";
          $query .="user_email = '{$user_email}', ";
          $query .="username = '{$username}', ";
          $query .="user_password = '{$user_password}' ";
    //      $query .="post_content = '{$post_content}', ";
      //    $query .="post_image = '{$post_image}' ";
          $query .= "WHERE username = '{$username}' ";
   
    
         $edit_user_query = mysqli_query($connection,$query);
    
         confirmQuery($edit_user_query);    
    
}


?> 
 
    <div id="wrapper">

        <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>    

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <b>Welcome To Admin</b>
                        </h1>
                         <form action="" method="post" enctype="multipart/form-data">
    
       <div class="form-group">
        
        <label for="title">Firstname</label>
        <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
        
    </div>
    
    <div class="form-group">
        
        <label for="post_status">Lastname</label>
        <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
        
    </div>
    
    <div class="form-group">
        
        <select name="user_role" id="">
        
        <option value="subscriber"><?php echo $user_role; ?></option> 
        
         <?php
         
            if($user_role == 'admin'){
                
                
                echo "<option value='subscriber'>subscriber</option>";
                
            }else {
                
                
                echo "<option value='admin'>admin</option>";
                
            }
         
         
         ?>
          
          
            
            
       //    <?php 
            
        //     $query = "SELECT * FROM users";
        //     $select_users = mysqli_query($connection,$query);  
                    
        //     confirmQuery($select_users);
            
        //     while($row = mysqli_fetch_assoc($select_users))  {
                                    
          //    $user_id = $row['user_id'];
        //     $user_role = $row['user_role'];
                 
          //       echo "<option value='{$user_id}'>{$user_role}</option>";
        //     }
            
          //  ?> 
           
        </select>
       
    </div>
    
   <!--  <div class="form-group">
        
        <label for="post_image">Post Image</label>
        <input type="file"  name="image">
        
    </div> -->
    
    <div class="form-group">
        
        <label for="post_content">Email</label>
        <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">

        
    </div>
    
    <div class="form-group">
        
        <label for="post_tags">Username</label>
        <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
        
    </div>
    
    
    
     <div class="form-group">
        
        <label for="post_content">Password</label>
        <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password">

        
    </div>
    
    <div class="form-group">
        
        <input type="submit" class="btn btn-primary" name="edit_user" value="Update Profile">
        
    </div>
</form>
                      
                     
                           
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
