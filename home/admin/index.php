<?php
ob_start();
session_start();
include("php/conn.php");
if(!(isset($_SESSION['log_user'])))
			{
				header("location:php/writercheck.php");
			}
			else
			{	
$user_name=$_SESSION['log_user'];
?>

<?php 
require'header.php';

require'sidebar_menu.php';
?>
      

      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  
                
                  
                      
                      <div class="row mt">

                     
                    </div>
                    
                    <div class="row mtbox">
                        <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                            <div class="box1">
                                <span class="fa "> <img src="..\assets/img/f-icon.png" class="img-center" width="60"> </span>
                                <h4 class="assigned">Assigned</h4>
                                <h5> <b>
                                <?php
                                require "php/conn.php";
                                
                                $results= $conn->query("SELECT COUNT(id) FROM order_prog where status=1");
                                echo $conn->error;
                                
                                $row = $results->fetch_row();
                                echo '#:', $row[0];
                                echo $conn->error;

                                ?>
                                
                                </b></h5>
                            </div>
                               <a href="#Assigned "  data-toggle="modal" data-target="#Assigned"><p>View Orders</p><i class="fa icon-"></i> </a> 
                               
                        </div>
                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                                <span class="fa"> <img src="..\assets/img/f-icon.png" class="img-center" width="60"></span>
                                <h4 class="current">Current</h4>
                                <h5> <b>
                                <?php
                                require "php/conn.php";
                                $results = $conn->query("select count(*) from order_prog where status=2");
                                $row = $results->fetch_row();
                                echo '#:', $row[0];
                                
                                ?>
                                
                                
                                
                                </b></h5>
                            </div>
                            <a href="#Current "  data-toggle="modal" data-target="#Current"><p>View Orders</p></a> 
                        </div>
                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                                <span class="fa " ><img src="..\assets/img/f-icon.png" class="img-center" width="60"></span>
                                <h4 class="editing">Editing</h4>
                                <h5> <b>
                                <?php
                                require"php/conn.php";
                                $results = $conn->query("select count(*) from order_prog where status=3");
                                $row = $results->fetch_row();
                                echo '#:', $row[0];
                                
                                ?>
                                
                                </b></h5>
                            </div>
                            <a href="#Editing "  data-toggle="modal" data-target="#Editing"><p>View Orders</p></a> 
                        </div>
                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                                <span class="fa "> <img src="..\assets/img/f-icon.png" class="img-center" width="60"> </span>
                                <h4 class="revision">Revision</h4>
                                <h5> <b>
                                
                                <?php
                                require"php/conn.php";
                                $results = $conn->query("select count(*) from order_prog where status=4");
                                $row = $results->fetch_row();
                                echo '#:', $row[0];
                                
                                ?>
                                </b></h5>
                            </div>
                            <a href="#Revision "  data-toggle="modal" data-target="#Revision"><p>View Orders</p></a> 
                        </div>
                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                                <span class="fa "> <img src="..\assets/img/f-icon.png" class="img-center" width="60"> </span>
                                <h4 class="closed">Closed</h4>
                                <h5> <b>
                                
                                <?php
                                require"php/conn.php";
                                $results = $conn->query("select count(*) from order_prog where status=5");
                                $row = $results->fetch_row();
                                echo '#:', $row[0];
                                
                                ?>
                                
                                </b></h5>
                            </div>
                            <a href="#Closed "  data-toggle="modal" data-target="#Closed"><p>View Orders</p></a> 
                        </div>
                    
                    </div><!-- /row mt -->	
                                    
                    <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Assigned" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header assigned">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Assigned Orders 
                                <?php
                                require"php/conn.php";
                                $results = $conn->query("select count(*) from order_prog where status=1");
                                $row = $results->fetch_row();
                                echo ':', $row[0];
                                
                                ?>
                                </h4>
                            </div>
                            <div class="modal-body" style="overflow:auto; height:400px;">
                                
                           




                                <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  
                          <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i>Order ID</th>
                                  <th><i class="fa fa-bullhorn"></i>Order Title</th>
                                  <th ><i class="fa fa-question-circle"></i>User Asssigned</th>
                                  <th><i class="fa fa-bookmark"></i> Pages</th>

                                  <th><i class=" fa fa-edit"></i> Action</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                                    require"../php/conn.php";
    

                                    $sql = "select a.u_id,u.u_name,o.* from order_prog a join orders o on o.o_id=a.o_id and a.status=1 join users u on a.u_id=u.u_id ORDER by o.o_id desc";
                                    $res = $conn->query($sql);
                                    echo $conn->error;  
                                 
                              while($row = mysqli_fetch_assoc($res)){

                                echo'
                                <tr>
                                <td> '.$row["o_id"].' </td>
                                <td> '.$row["order_title"].' </td>
                                <td > '.$row["u_name"].'</td>
                                <td> '.$row["pages"].'</td>
                                
                                <td> <a href="assigned/details.php?o_id='.$row["o_id"].'&&user='.$row['u_id'].'"> <span class="label label-info label-mini">Details</span> </a> </td> 
                                </tr>
                                ';
                              } 
                            
                            
                    
                            
                              ?> 
                              
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

              <!-- add users/editors and orders -->
             
                

              <!-- end add orders/editors/users -->

                              <!-- panel order details -->
                            </div>
                            <div class="modal-footer">
                                <br><br><br><br>
                                <button data-dismiss="modal" class="btn btn-default btn-warning" type="button">Cancel</button>
                                
                            </div>
                        </div>
                    </div>
                 </div>
                <!-- modal -->

                <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Current" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header current">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Current Orders  
                                <?php
                                require"php/conn.php";
                                $results = $conn->query("select count(*) from order_prog where status=2");
                                $row = $results->fetch_row();
                                echo ':', $row[0];
                                
                                ?>
                                </h4>
                            </div>
                            <div class="modal-body" style="overflow:auto; height:400px;">
                            <table class="table table-striped table-advance table-hover">
	                  	  	  
                                 

                            <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i>Order ID</th>
                                  <th><i class="fa fa-bullhorn"></i>Order Title</th>
                                  <th ><i class="fa fa-question-circle"></i> User Assigned</th>
                                  <th><i class="fa fa-bookmark"></i> Pages</th>
                                  <th><i class=" fa fa-edit"></i> Action</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              <?php
                                    require"../php/conn.php";
    

                                    $sql = "select c.u_id,u.u_name,o.* from order_prog c join orders o on o.o_id=c.o_id and c.status=2 join users u on c.u_id=u.u_id ORDER by o.o_id desc";
                                    $res = $conn->query($sql);
                                    echo $conn->error;  
                                 
                              while($row = mysqli_fetch_assoc($res)){

                                echo'
                                <tr>
                                <td> '.$row["o_id"].' </td>
                                <td> '.$row["order_title"].' </td>
                                <td > '.$row["u_name"].'</td>
                                <td> '.$row["pages"].'</td>
                                
                                <td> <a href="current/details.php?o_id='.$row["o_id"].' && user='.$row['u_id'].'"> <span class="label label-info label-mini">Details</span> </a> </td> 
                                </tr>
                                ';
                              } 
                              
                              ?>
                              </tbody>


                              </table>
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default btn-warning" type="button">Cancel</button>
                                
                            </div>
                        </div>
                    </div>
                 </div>
                <!-- modal -->

                <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Editing" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header editing">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Editing Orders   
                                <?php
                                require"php/conn.php";
                                $results = $conn->query("select count(*) from order_prog where status=3 ");
                                $row = $results->fetch_row();
                                echo ':', $row[0];
                                
                                ?>
                                </h4>
                            </div>
                            <div class="modal-body" style="overflow:auto; height:400px;">
                            <table class="table table-striped table-advance table-hover">
	                  	  	  
                                 

                            <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i>Order ID</th>
                                  <th><i class="fa fa-bullhorn"></i>Order Title</th>
                                  <th ><i class="fa fa-question-circle btn-success"></i> User Assigned</th>
                                  <!-- <th ><i class="fa fa-question-circle btn-warning"></i> Editor Assigned</th> -->
                                  <th><i class="fa fa-bookmark"></i> Pages</th>
                                  <th><i class=" fa fa-edit"></i> Action</th>
                                  <th><i class="fa fa-bookmark"></i> Status</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              <?php
                                    require"../php/conn.php";
    

                                    $sql = "select e.u_id,u.u_name,o.* from order_prog e join orders o on o.o_id=e.o_id and e.status=3 join users u on e.u_id=u.u_id ORDER by o.o_id desc";
                                    $res = $conn->query($sql);
                                    echo $conn->error;  
                                 
                              while($row = mysqli_fetch_assoc($res)){

                                echo'
                                <tr>
                                <td> '.$row["o_id"].' </td>
                                <td> '.$row["order_title"].' </td>
                                <td style="color:blue;"> '.$row["u_name"].'</td>
                                
                                <td> '.$row["pages"].'</td>
                                
                                <td> <a href="editing/details.php?o_id='.$row["o_id"].'&& user='.$row['u_id'].'"> <span class="label label-info label-mini">Details</span> </a> </td> 
                               ';
                               ?>
                                <?php
                                       
                                       $sq="select a_mess,status from approves where u_id=$row[u_id] and o_id=$row[o_id] ";
                                      
                                         $rst=$conn->query($sq);
                                         while($row=$rst->fetch_assoc()){
                                             if($row['status'] == 1){
                                                 echo' <td><span class="label label-primary label-mini" >Reviewed</span> </td> ';
                                             }else{
                                                if($row['status'] != ''){
                                                 echo' <td><span class="label label-warning label-mini" >Under Reviewed</span> </td>';
                                                }
                                             }
                                         }
        
                                       
                                         ?>
                               
                               <?php
                               echo'
                                </tr>
                                ';
                              } 
                              // <td style="color:green;"> '.$row["eu_name"].'</td>
                              ?>
                              
                              </tbody>

                              </table>
      
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default btn-warning" type="button">Cancel</button>
                               
                            </div>
                        </div>
                    </div>
                 </div>
                <!-- modal -->

                <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Revision" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header revision">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Revision Orders
                                
                                <?php
                                    require "php/conn.php";
                                    $result = $conn->query("select count(*) from order_prog where status=4");
                                    $row = $result->fetch_row();

                                    echo":", $row[0];

                            
                                ?>
                                
                                
                                </h4>
                            </div>
                            <div class="modal-body" style="overflow:auto; height:400px;">
                            <table class="table table-striped table-advance table-hover">
	                  	  	  
                                  
                            <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i>Order ID</th>
                                  <th><i class="fa fa-bullhorn"></i>Order Title</th>
                                  <th ><i class="fa fa-question-circle"></i> User Assigned</th>
                                  <th><i class="fa fa-bookmark"></i> Pages</th>
                                  <th><i class=" fa fa-edit"></i> Action</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              <?php
                                    require"../php/conn.php";
    

                                    $sql = "select r.u_id,u.u_name,o.* from order_prog r join orders o on o.o_id=r.o_id and r.status=4 join users u on r.u_id=u.u_id ORDER by o.o_id desc";
                                    $res = $conn->query($sql);
                                    echo $conn->error;  
                                 
                              while($row = mysqli_fetch_assoc($res)){

                                echo'
                                <tr>
                                <td> '.$row["o_id"].' </td>
                                <td> '.$row["order_title"].' </td>
                                <td > '.$row["u_name"].'</td>
                                <td> '.$row["pages"].'</td>
                                
                                <td> <a href="revision/details.php?o_id='.$row["o_id"].'&& user='.$row['u_id'].'"> <span class="label label-info label-mini">Details</span> </a> </td> 
                                </tr>
                                ';
                              } 
                              
                              ?>
                              
                              </tbody>

                              </table>
      
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default btn-warning" type="button">Cancel</button>
                                
                            </div>
                        </div>
                    </div>
                 </div>
                <!-- modal -->

                <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Closed" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header closed">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Closed Orders
                                <?php
                                require"php/conn.php";
                                $results = $conn->query("select count(*) from order_prog where status=5");
                                $row = $results->fetch_row();
                                echo ':', $row[0];
                                
                                ?>
                                
                                </h4>
                            </div>
                            <div class="modal-body" style="overflow:auto; height:400px;">
                            <table class="table table-striped table-advance table-hover">
	                  	  	  
                                 
                            <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i>Order ID</th>
                                  <th><i class="fa fa-bullhorn"></i>Order Title</th>
                                  <th ><i class="fa fa-question-circle"></i> User Assigned</th>
                                  <th><i class="fa fa-bookmark"></i> Pages</th>
                                  <th><i class=" fa fa-edit"></i> Action</th>
                                  <th><i class="fa fa-bookmark"></i> Status</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              <?php
                                    require"../php/conn.php";
    

                                    $sql = "select cl.u_id,u.u_name,o.* from order_prog cl join orders o on o.o_id=cl.o_id and cl.status=5 join users u on cl.u_id=u.u_id ORDER by o.o_id desc";
                                    $res = $conn->query($sql);
                                    echo $conn->error;  
                                 
                              while($row = mysqli_fetch_assoc($res)){

                                echo'
                                <tr>
                                <td> '.$row["o_id"].' </td>
                                <td> '.$row["order_title"].' </td>
                                <td > '.$row["u_name"].'</td>
                                <td> '.$row["pages"].'</td>
                                
                                <td> <a href="closed/details.php?o_id='.$row["o_id"].'&& user='.$row['u_id'].'"> <span class="label label-info label-mini">Details</span> </a> </td> 
                               ';?>
                                <?php 
                                if ($row['payment'] == 2){
                                    echo'<td><span class="label btn-success"> PAID</td></span>';
                                    
                                  } else {
                                     echo'<td><span class="label label-warning label-mini">Pending Approval</span></td>';
                                     
                                  }
                              ?> 

                               
                               <?php
                               echo'
                                </tr>
                                ';
                              } 
                              
                              ?>
                              
                              </tbody>

                              </table>
      
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default btn-warning" type="button">Cancel</button>
                                
                            </div>
                        </div>
                    </div>
                 </div>
                <!-- modal -->

                    <!-- add items -->
                    <div class="row">
                  <div class="col-lg-9 main-chart">
                  
                
                  
                      
                      <div class="row mt">

                     
                    </div>
                    
                    <div class="row mtbox">
                        <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                            <div class="box1">
                                <span class="fa "> <img src="..\assets/img/add-order-icon.png" class="img-center" width="60"> </span>
                                <h4 class="">Create Orders</h4>
                                <h5> <b>
                                
                                <?php
                                   
                                    require"php/conn.php";
                                    $result = $conn->query("SELECT COUNT(*) FROM orders");
                                    $row = $result->fetch_row();
                                    echo '#: ', $row[0];
                                
                                ?>
                                
                                
                                </b></h5>
                            </div>
                               <a href="#createorder "  data-toggle="modal" data-target="#createorder"><p>Create</p><i class="fa fa-plus-o"></i> </a> 
                               
                        </div>
                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                            <a href="view/users.php"><span class="fa  tooltips" data-original-title="View Users"> <img src="..\assets/img/user-icon.png" class="img-center" width="60">
                            <!-- <div class="fa fa-bars tooltips" data-placement="right" data-original-title="View Users"></div> -->
                            </span></a>
                                <h4 class="">Create Users</h4>
                                <h5> <b>
                                <?php
                                    
                                    require"php/conn.php";
                                    $result = $conn->query("SELECT COUNT(*) FROM users");
                                    $row = $result->fetch_row();
                                    echo '#: ', $row[0];
                                
                                ?></b></h5>
                            </div>
                            <a href="#Current "  data-toggle="modal" data-target="#createuser"><p>Create</p></a> 
                        </div>
                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                                <a href="view/editors.php"><span class="fa  tooltips" data-original-title="View Editors"> <img src="..\assets/img/user-icon.png" class="img-center" width="60"> </span></a>
                                <h4 class="">Create Editors</h4>
                                <h5> <b>
                                <?php
                                    
                                    require"php/conn.php";
                                    $result = $conn->query("SELECT COUNT(*) FROM editors") or die($conn->error);
                                    $row = $result->fetch_row();
                                    echo '#: ', $row[0];
                                
                                ?>
                                
                                
                                </b></h5>
                            </div>
                            <a href="#Editing "  data-toggle="modal" data-target="#createeditor"><p>Create</p></a> 
                        </div>
                       

                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                                <span class="fa "> <img src="..\assets/img/f-icon.png" class="img-center" width="60"></span>
                                <h4 class="">Available Orders</h4>
                                <h5> <b>
                                <?php
                                    
                                    require"php/conn.php";
                                    $result = $conn->query("SELECT COUNT(*) FROM orders");
                                    $row = $result->fetch_row();
                                    echo '#: ', $row[0];
                                
                                ?>
                                
                                
                                </b></h5>
                            </div>
                            <a href="#Closed "  data-toggle="modal" data-target="#available"><p>View Orders</p></a> 
                        </div>

                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                                <span class="fa "> <img src="..\assets/img/reject-icon.png" class="img-center" width="60"></span>
                                <h4 class="">Rejected Orders</h4>
                                <h5> <b>
                                <?php
                                    
                                    require"php/conn.php";
                                    $result = $conn->query("SELECT COUNT(*) FROM qued where status=1");
                                    $row = $result->fetch_row();
                                    echo '#: ', $row[0];
                                
                                ?>
                                
                                
                                </b></h5>
                            </div>
                            <a href="#Closed "  data-toggle="modal" data-target="#rejected"><p>View Orders</p></a> 
                        </div>

                       
                    
                    </div><!-- /row mt -->
                    
                    </div><!-- /row mt -->	
                                    
                    <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="createorder" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header assigned">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Create Order</h4>
                            </div>
                            <div class="modal-body" style="overflow:auto; height:400px;">
                                
                    <div class="row mt">
                     <div class="col-md-12">
                      <div class="content-panel">

                             <form class="form-horizontal tasi-form" method="post" action="php/inst_order.php" enctype="multipart/form-data">
                             
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="o_name" placeholder="Order Name">
                              </div>
                            
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="o_title" placeholder="Order Title">
                              </div>

                                
                              <div class="col-sm-10">
                                  <textarea rows="5" cols="50" type="text-area" class="form-control" name="o_details" placeholder="Details"> Instructions </textarea>
                              </div>
                              
                              
                              <div class="col-sm-10">
                                
                                  <select type="text" class="form-control" name="level">
		
                                        <option value="">Level of Study</option>
                                            <?php
                                            require"php/conn.php";
                                            $sql = "SELECT * FROM study";
                                                                $result = mysqli_query($conn, $sql);
                                                                while($rows=mysqli_fetch_array($result))
                                            { 
                                                    ?>
                                                        <option value="<?php echo $rows['stdy']?>"><?php echo $rows['stdy']?></option>
                                                        
                                                <?php
                                                }
                                            ?>
                                            </select>

                              </div>
                             

                              <div class="col-sm-10">
                                  <input type="integer" class="form-control" name="pages" placeholder="Pages">
                              </div>
                              
                              <div class="col-sm-10">
                                  <!-- <label for="uname"><b>Order Format</b></label> -->
                                   <select type="text" class="form-control" name="format">
		
                                    <option value="">Order Format</option>
                                        <?php
                                        require"php/conn.php";
                                        $sql = "SELECT * FROM format";
                                                            $result = mysqli_query($conn, $sql);
                                                            while($rows=mysqli_fetch_array($result))
                                        { 
                                                ?>
                                                    <option value="<?php echo $rows['fmt']?>"><?php echo $rows['fmt']?></option>
                                                    
                                            <?php
                                            }
                                        ?>
                                        </select>
                              </div>

                              
                              <br>
                              <div class="col-sm-10">
                                  <input type="file" class="form-control" name="attachment" placeholder="Attachments">
                              </div>
                              <br>
                              <div class="col-sm-10">
                                  <input type="datetime-local" class="form-control" name="deadline" placeholder="Deadline">
                                        
                                 
                                  <!-- begin datepicker  -->
                                  
                                    <div >
                                        <div id="picker"> </div>
                                        <input type="hidden" id="result" value="" placeholder=""/>
                                    </div>

                                    <script type="text/javascript">

                                        var _gaq = _gaq || [];
                                        _gaq.push(['_setAccount', 'UA-36251023-1']);
                                        _gaq.push(['_setDomainName', 'jqueryscript.net']);
                                        _gaq.push(['_trackPageview']);

                                        (function() {
                                            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                                            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                                            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                                        })();

                                        </script>
                                        <!-- end datepicker -->

                              </div>
                                    <br>
                                    <br>
                              <div class="col-sm-10">
                                  
                                  <select type="text" class="form-control" name="service">
		
                                            <option value="">Service Providence</option>
                                                <?php
                                                require"php/conn.php";
                                                $sql = "SELECT * FROM service";
                                                                    $result = mysqli_query($conn, $sql);
                                                                    while($rows=mysqli_fetch_array($result))
                                                { 
                                                        ?>
                                                            <option value="<?php echo $rows['srv']?>"><?php echo $rows['srv']?></option>
                                                            
                                                    <?php
                                                    }
                                                ?>
                                                </select>


                              </div>
                                    <br>
                                    <br>
                             
                             <div class="modal-footer">
                             
                           </div>
                             
                              <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-danger" type="button">Cancel</button>
                                <input class="btn btn-success" type="submit" name="submit" value="Create Order">
                            </div>
                          </form>
                         
                        
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

              <!-- add users/editors and orders -->
             
                

              <!-- end add orders/editors/users -->

                              <!-- panel order details -->
                            </div>
                            
                        </div>
                    </div>
                 </div>
                <!-- modal -->

                <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="createuser" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header current">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Create User</h4>
                            </div>
                            <div class="modal-body" style="overflow:auto; height:400px;">
                            
                            <form class="form-horizontal tasi-form" method="post" action="php/inst_user.php">
                             
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="f_name" placeholder="First Name">
                                  
                              </div>
                            
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="l_name" placeholder="Last Name">
                                 
                              </div>
                                
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="u_name" placeholder="User Name">
                                  
                              </div>

                              <div class="col-sm-10">
                                  <input type="email" class="form-control" name="email"placeholder="Email">
                                 
                              </div>
                              
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="phone" placeholder="Phone No">
                                  
                              </div>

                              <div class="col-sm-10">
                                  <input type="password" class="form-control" name="pass" placeholder="User Password">
                                  
                              </div>
                              <br>
                              <div class="col-sm-10">
                                  <input type="password" class="form-control" name="cpass" placeholder="Confirm Password">
                                  
                              </div>
                              <br>
                              
                                    <br>
                             
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-danger" type="button">Cancel</button> 
                                    <br> <hr>
                                     <input class="btn btn-success" name="submit" type="submit" value="Create">
                                </div>
                          
                            </div>
                            
                            </form>
                        </div>
                    </div>
                 </div>
                <!-- modal -->

                <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="createeditor" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header editing">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Create Editor</h4>
                            </div>
                            <div class="modal-body" style="overflow:auto; height:400px;">
                          
                            <form class="form-horizontal tasi-form" method="post" action="php/inst_editor.php">
                             
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="ef_name" placeholder="First Name">
                                  
                              </div>
                            
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="el_name" placeholder="Last Name">
                                 
                              </div>
                                
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="eu_name" placeholder="User Name">
                                  
                              </div>

                              <div class="col-sm-10">
                                  <input type="email" class="form-control" name="e_email"placeholder="Email">
                                 
                              </div>
                              
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="e_phone" placeholder="Phone No">
                                  
                              </div>

                              <div class="col-sm-10">
                                  <input type="password" class="form-control" name="e_pass" placeholder="Editor Password">
                                  
                              </div>
                              <br>
                              <div class="col-sm-10">
                                  <input type="password" class="form-control" name="ec_pass" placeholder="Confirm Password">
                                  
                              </div>
                              <br>
                              
                                    <br>
                             
                             
                              <div class="modal-footer">
                              
                            </div>
                          
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-danger" type="button">Cancel</button>
                                <input class="btn btn-theme" type="submit" name="submit" value="Create Editor">
                            </div>
                            </form>
      
                            </div>
                            
                        </div>
                    </div>
                 </div>
                <!-- modal -->

               
                <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="available" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header closed">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"> Orders Created</h4>
                            </div>
                            <div class="modal-body" style="overflow:auto; height:400px;">
                            <table class="table table-striped table-advance table-hover">
                            <thead>
                                <tr>
                            <th><i class="fa fa-bookmark"></i> ID</th>
                            <th><i class="fa fa-bookmark"></i> Order Name</th>
                            <th class="hidden-phone"><i class="fa fa-bookmark"></i> Pages</th>
                            <th><i class="fa fa-bookmark"></i> Level</th>
                            <th><i class=" fa fa-bullhorn"></i> Deadline</th>
                           <th><i class="fa fa-question-circle"></i> Action</th>
                        </tr>
                      </thead>  <tbody>

                            <?php
                    require"php/conn.php";

                    $sql= "select * from orders ORDER by o_id desc";
                    $results= $conn->query($sql);

                    echo $conn->error;
                   
                    if ($results->num_rows >0){
                    

                        
                        while($row = $results->fetch_assoc()){

                            echo '
                            <tr>
                            <td><a href="#"> '.$row["o_id"].'</a></td>
                             <td><a href="#">'.$row["order_name"].'</a></td>
                             <td class="hidden-phone">'.$row["pages"].'</td>
                             <td> '.$row["level"].' </td>
                             <td> '.$row["deadline"].' </td>
                             
                             <td>
                                <a href="view/o_details.php?id='.$row['o_id'].'"><i class="fa">Details</i></a>
                                ';?>

                                <div class="popup padding-left" onclick="myFunction(<?php echo $row['o_id']; ?>)">
                                 <class="btn btn-danger btn-xs"><i class="fa fa-trash-o btn btn-danger"></i>
                                 <span class="popuptext" id="myPopup<?php echo $row['o_id']; ?>">
                                
                                 <a href="view/delete.php?id=<?php echo''.$row['o_id'].'';?>"><i class="fa fa-pencil btn btn-danger"></i></a>
                                 <i class="fa">Confirm Delete</i></a>
                                 </span>
                                </div>
                                <?php
                                echo'
                               
                                <a href="view/update.php?id='.$row['o_id'].'"><i class="fa btn btn-success">Update</i></a>

                                ';
                                ?>
                            <div>
                                <?php
                                    $sq="select * from order_prog where o_id=$row[o_id]";
                                    $res=$conn->query($sq);
                                   

                                    while($row=$res->fetch_assoc()){
                                        if($row['status']==5){
                                            echo'<a href="closed/details.php?o_id='.$row['o_id'].' && user='.$row['u_id'].'"><span class="label fa fa-pencil  label-primary">
                                            Completed</span></a>';
                                        }else {
                                            if($row['status']==0){
                                            echo'<span class="label fa fa-pencil  label-success">
                                            Not Assigned</span></a>';
                                            }else {
                                                echo'<span class="label fa fa-pencil  label-warning">
                                            In-Progress</span></a>';
                                            }
                                        }
                                    }
                                ?>
                            </div>
                            


                            
                                <?php
                                echo'
                             </td>
                         </tr>

                         
                            
                            ';

                        }

                            

                            echo"</tbody></table> ";
                        }else {
                            echo"0 Results";
                        }
                        
                        // $query = "select COUNT(o_id) from orders";
                        // $rst = $conn->query($query);
                        // $row = mysqli_fetch_row($rst);
                        // $total_rcds = $row[0];
                        // $total_pages = ceil($total_rcds / $limit);
                        // $pageLink = "<nav> <ul class='pagination'>";
                        // for ($i=1; $i < $total_pages; $i++) { 
                        //     $pageLink .= "<li><a href='index.php?page=".$i." '>".$i."</a></li>";
                        // };
                        // echo $pageLink . "</ul></nav>";

                    
                    

                                 
                    ?>   

                    <!-- <script>
                        $(document).ready(function(){
                            $('.pagination').pagination({
                                items:<?php echo $total_rcds;?>,
                                itemsOnPage: <?php echo $limit;?>,
                                
                                currentPage: <?php echo $page;?>,
                                hrefTextPrefix: 'index.php?page='
                            });
                        });
                    </script> -->

      
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-warning" type="button">Close</button>
                               
                            </div>
                        </div>
                    </div>
                 </div>

                 <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="rejected" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header closed">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"> Orders Rejected</h4>
                            </div>
                            <div class="modal-body" style="overflow:auto; height:400px;">

                        <table class="table table-striped table-advance table-hover">
                        <thead>
                        <tr>
                        <th><i class="fa fa-bookmark"></i> ID</th>
                            <th><i class="fa fa-bookmark"></i> Order Name</th>
                            <th class="hidden-phone"><i class="fa fa-bookmark"></i> Pages</th>
                            <th><i class="fa fa-bookmark"></i> Level</th>
                            <th><i class=" fa fa-bullhorn"></i> Deadline</th>
                           <th><i class="fa fa-question-circle"></i> Action</th>
                        </tr>
                        </thead>  <tbody>
                            <?php
                    require"php/conn.php";

                    $sql= "select q.u_id,o.* from qued q join orders o on q.o_id=o.o_id where q.status=1";
                    $results= $conn->query($sql);
                   
                    if ($results->num_rows >0){
                    

                       
                        while($row = $results->fetch_assoc()){

                            echo '
                            <tr>
                            <td><a href="#"> '.$row["o_id"].'</a></td>
                             <td><a href="#">'.$row["order_name"].'</a></td>
                             <td class="hidden-phone">'.$row["pages"].'</td>
                             <td> '.$row["level"].' </td>
                             <td> '.$row["deadline"].' </td>
                             
                             <td>
                                <a href="view/o_details.php?id='.$row['o_id'].'"><i class="fa">Details</i></a>
                                <a href="view/deleteqeud.php?id='.$row['o_id'].'"><i class="fa fa-pencil btn btn-danger"></i></a>
                               

                                    ';
                              
                                
                                ?>
                               
                              

                            <?php 
                            echo'
                                <a href="view/update.php?id='.$row['o_id'].'"><i class="fa btn btn-success">Update</i></a>
                                <a href="view/update.php?id='.$row['o_id'].'"><i class="fa btn btn-success">Update</i></a>
                                <a href="view/.php?id='.$row['o_id'].'"><i class="fa btn btn-Primary">Order Completed</i></a>
                             </td>
                         </tr>

                         
                            
                            ';

                        }

                            

                            echo"</tbody></table> ";
                        }else {
                            echo"0 Results";
                        }
                        
                        // $query = "select COUNT(o_id) from orders";
                        // $rst = $conn->query($query);
                        // $row = mysqli_fetch_row($rst);
                        // $total_rcds = $row[0];
                        // $total_pages = ceil($total_rcds / $limit);
                        // $pageLink = "<nav> <ul class='pagination'>";
                        // for ($i=1; $i < $total_pages; $i++) { 
                        //     $pageLink .= "<li><a href='index.php?page=".$i." '>".$i."</a></li>";
                        // };
                        // echo $pageLink . "</ul></nav>";

                    
                    

                                 
                    ?>   

                    <!-- <script>
                        $(document).ready(function(){
                            $('.pagination').pagination({
                                items:<?php echo $total_rcds;?>,
                                itemsOnPage: <?php echo $limit;?>,
                                
                                currentPage: <?php echo $page;?>,
                                hrefTextPrefix: 'index.php?page='
                            });
                        });
                    </script> -->

      
                            </div>
                            <script>
                                    // When the user clicks on div, open the popup
                                    function myFunction(el) {
                                    var popup = document.getElementById("myPopup"+el);
                                    popup.classList.toggle("show");
                                    }
                                    </script>
 
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-warning" type="button">Close</button>
                               
                            </div>
                        </div>
                    </div>


                        

                    <!-- end add items -->

            
          </section>

          <div class="single-contact d-flex col-sm-10">
                <i class="icon-contract">

                </i>
            </div>

      </section>

      <!--main content end-->
   
                            
  </section>
                    <?php }?>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="..\assets/js/jquery.js"></script>
    <script src="..\assets/js/jquery-1.8.3.min.js"></script>
    <script src="..\assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="..\assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="..\assets/js/jquery.scrollTo.min.js"></script>
    <script src="..\assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="..\assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="..\assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="..\assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="..\assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="..\assets/js/sparkline-chart.js"></script>    
    <script src="..\assets/js/zabuto_calendar.js"></script>	
    <script src="..\assets/date picker/js/bootstrap-datetimepicker.min.js"></script>
	
	<script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Welcome ',
            // (string | mandatory) the text inside the notification

            text: ' <?php echo $user_name; ?>',
            // (string | optional) the image to display on the left
            image: '../assets/img/ui.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '12/12/2018',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class, img-circle'
        });

        return false;
        });
	</script>
	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  

  </body>
</html>

