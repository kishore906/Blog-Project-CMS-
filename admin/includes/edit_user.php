

<?php 

if(isset($_GET['edit_user'])){

$the_user_id = $_GET['edit_user'];
    
    
    $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
    $select_users_query = mysqli_query($connection,$query);  
                    
     while($row = mysqli_fetch_assoc($select_users_query))  {
                                    
     $user_id = escape($row['user_id']);
     $username = escape($row['username']);
     $user_password = escape($row['user_password']);
     $user_firstname = escape($row['user_firstname']);
     $user_lastname = escape($row['user_lastname']);
     $user_email = escape($row['user_email']);
     $user_image = escape($row['user_image']);
     $user_role = escape($row['user_role']);
    
    
     }

}


if(isset($_POST['edit_user'])){
    
    //$user_id = $_POST['user_id'];  
    $user_firstname = escape($_POST['user_firstname']);
    $user_lastname = escape($_POST['user_lastname']);
    $user_role = escape($_POST['user_role']);
    
   // $post_image = $_FILES['image']['name'];
    //$post_image_temp = $_FILES['image']['tmp_name'];
    
    $user_email = escape($_POST['user_email']);
    $username = escape($_POST['username']);
    $user_password = escape($_POST['user_password']);
    
    
    //$post_date = date('d-m-y');
    //$post_comment_count = 4;
    
 //   move_uploaded_file($post_image_temp, "../images/$post_image" );
    
    
         // $query = "SELECT randSalt FROM users";
        //  $select_randsalt_query = mysqli_query($connection, $query);
          
        //  if(!$select_randsalt_query){
              
        //      die("Query Failed" . mysqli_error($connection));
           
    
        //  $row = mysqli_fetch_array($select_randsalt_query);   
        //  $salt = $row['randSalt'];
        //  $hashed_password = crypt($user_password, $salt);

          if(!empty($user_password)){
              
              $query = "SELECT user_password FROM users WHERE user_id = $the_user_id ";
              $get_user_query = mysqli_query($connection, $query);
              confirmQuery($get_user_query);
              
              $row = mysqli_fetch_array($get_user_query);
              $db_user_password = $row['user_password'];
              
               if($db_user_password != $user_password){
              
              $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
          }    
              
          $query = "UPDATE users SET ";
          $query .="user_firstname = '{$user_firstname}', ";
          $query .="user_lastname = '{$user_lastname}', ";
          $query .="user_role = '{$user_role}', ";
          $query .="user_email = '{$user_email}', ";
          $query .="username = '{$username}', ";
          $query .="user_password = '{$hashed_password}' ";
    //      $query .="post_content = '{$post_content}', ";
      //    $query .="post_image = '{$post_image}' ";
          $query .= "WHERE user_id = {$the_user_id} ";
   
    
         $edit_user_query = mysqli_query($connection,$query);
    
         confirmQuery($edit_user_query);
    
                echo "User Updated:" . "<a href='users.php'>View Users?</a>";
           
          }  
  
}
  

?>
  
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
        
        <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option> 
        
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
        
        <input type="submit" class="btn btn-primary" name="edit_user" value="Update User">
        
    </div>
</form>