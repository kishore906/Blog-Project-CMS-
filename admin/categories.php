<?php include "includes/admin_header.php"; ?>
   
    <div id="wrapper">

        <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>    

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            WELCOME TO ADMIN
                        </h1>
                        
                        
                       <div class="col-xs-6">
                           
                          <?php  insert_categories(); ?>
                           
                           
                        
                            <form action="" method="post">
                                
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                
                                <div class="form-group">
                                    
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                   
                                </div>
                             
                            </form>
                            
                            
                            <?php  
                           
                           
                           if(isset($_GET['edit'])){
                               
                               $cat_id = $_GET['edit'];
                               include "includes/update_categories.php";
                               
                               
                           }
                       
                           ?>
                        
                        </div> 
                        
                           <!--Add Category Form -->
                           
                        <div class="col-xs-6"> 
                     
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Title</th>
                                    <th>DELETE</th>
                                      <th>EDIT</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                               <?php    //Find All Categories Query
                                
                                findAllCategories();
                              
                                 ?>
                                 
                                 
                                 <?php     //DELETE THE QUERY !!!!!!!!!!!
                                
                                   deleteCategories();
                                
                                
                            
                                ?>
                                 
                                
                            </tbody>
                        </table>
                        
                        
                        
                        
                        </div>      
                   
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
