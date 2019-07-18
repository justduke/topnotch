
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
?>
      
<?php
    require'sidebar_menu.php';
    ?>      

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	
				

              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel table-responsive">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4> Completed Orders</h4>
                                  <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i>User</th>
                                  <th><i class="fa fa-bullhorn"></i>Orders to be paid</th>
                                 
                                  <th><i class="fa fa-bookmark"></i> Amount</th>
                                  <th><i class="fa fa-bookmark"></i> Status</th>

                                 
                                  <th></th>
                              </tr>
                              </thead>
                                <tbody>
                                <?php
                                require'php/conn.php';

                                $qry="SELECT u.*,i.*,o.status,o.u_id from invoice i join users u on u.u_id=i.u_id join order_prog o on i.u_id=o.u_id where i.status=1 and o.status=5";

                                

                                // echo $qry;
                                $rst=$conn->query($qry);
                                echo $conn->error;

                                $row=$rst->fetch_assoc();

                                echo'
                                <tr>
                                <td> <a href="closed/inv-details.php?user='.$row['u_id'].'">'.$row["u_name"].'</a></td>';
                                ?>
                                <?php
                                $qr="SELECT COUNT(i.o_id),i.u_id,u.u_id from invoice i join users u on i.u_id=u.u_id where i.u_id=$row[u_id]";
                                $rst=$conn->query($qr);

                                echo $conn->error;
                                $rows=$rst->fetch_array();
                                  echo'  
                                <td> '.$rows[0].' </td>
                                ';
                                
                    
                                ?>
                                <?php
                                $qr="select sum(i.amount),i.u_id,u.u_id from invoice i join users u on i.u_id=u.u_id where i.status=1 and i.u_id=$row[u_id] ";
                                $rst=$conn->query($qr);
                                $ro=$rst->fetch_row();
                                echo'
                                <td> '.$ro[0].'</td>
                                <td><span class="label label-info label-mini">Completed</span></td>
                                ';
                                
                            

                                ?>

                               
                                
                                



                                </tbody>
                            
                                <br>



                                  
                                  
                                  
                                  <!-- <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i>Order ID</th>
                                  <th><i class="fa fa-bullhorn"></i>Order Name</th>
                                  <th ><i class="fa fa-question-circle"></i> User Assigned</th>
                                  <th><i class="fa fa-bookmark"></i> Pages</th>
                                  <th><i class="fa fa-bookmark"></i> Status</th>
                                  <th><i class=" fa fa-edit"></i> Action</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              <?php
                            //         require"../php/conn.php";
    

                            //         $sql = "select cl.u_id,u.u_name,o.* from order_prog cl join orders o on o.o_id=cl.o_id and cl.status=5 join users u on cl.u_id=u.u_id and payment=1 ORDER by o.o_id desc";
                            //         $res = $conn->query($sql);
                            //         echo $conn->error;  
                                 
                            //   while($row = mysqli_fetch_assoc($res)){

                            //     echo'
                            //     <tr>
                            //     <td> '.$row["o_id"].' </td>
                            //     <td> '.$row["order_title"].' </td>
                            //     <td > '.$row["u_name"].'</td>
                            //     <td> '.$row["pages"].'</td>
                            //     <td><span class="label label-info label-mini">Completed</span></td>
                                
                            //     <td> <a href="closed/details.php?o_id='.$row["o_id"].'&& user='.$row['u_id'].'"> <span class="label label-info label-mini">Details</span> </a> </td> 
                            //     </tr>
                            //     ';
                            //   } 
                              
                              ?>
                             

                              </tbody>
                              <!-- <div class="modal-body" style="overflow:auto; height:400px;">
                            <table class="table table-striped table-advance table-hover">
	                  	  	  
                                 
                           
                              
                              <!-- </tbody>

                              </table> -->
      
                            </div> 
                          </table> 
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
              <hr/> 

              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4> Completed & PAID Orders</h4>
                                  <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i>User</th>
                                  <th><i class="fa fa-bullhorn"></i>Orders to be paid</th>
                                 
                                  <th><i class="fa fa-bookmark"></i> Amount</th>
                                  <th><i class="fa fa-bookmark"></i> Status</th>

                                 
                                  <th></th>
                              </tr>
                              </thead>
                                <tbody>
                                <?php
                                require'php/conn.php';

                                $qry="SELECT u.*,i.*,o.status,o.u_id from invoice i join users u on u.u_id=i.u_id join order_prog o on i.u_id=o.u_id where o.status=5 and i.status=1";

                                // echo $qry;
                                $rst=$conn->query($qry);
                                echo $conn->error;

                              $row=$rst->fetch_assoc();
                                

                                        echo'
                                        <tr>
                                        <td> <a href="closed/inv-details.php?user='.$row['u_id'].'">'.$row["u_name"].'</a></td>';
                               
                                    $qr="SELECT COUNT(i.o_id),i.u_id,u.u_id from invoice i join users u on i.u_id=u.u_id where i.status=2 and i.u_id=$row[u_id]";
                                    $rst=$conn->query($qr);
                                    echo $conn->error;
                                    $rows=$rst->fetch_row();
                                    echo'  
                                    <td> '.$rows[0].' </td>
                                    ';
                                    
                                
                                    $qr="SELECT sum(i.amount),i.u_id,u.u_id from invoice i join users u on i.u_id=u.u_id where i.status=2 and i.u_id=$row[u_id]";
                                    echo $qr;
                                    $rst=$conn->query($qr);
                                    echo $conn->error;

                                    $r=$rst->fetch_array();
                                    echo'
                                    <td> '.$r[0].'</td>
                                    <td><span class="label label-success label-mini">Completed & paid</span></td>
                                    ';
                                    
                                 
                                      
                                ?>
                                </tbody>
      
                            </div> 
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
   
      

 <!--footer start-->
 <!-- <footer class="site-footer">
          <div class="text-center">
              <p>
                  Copyright@ <script>
                      document.write(new Date().getFullYear()); 
                  </script> | Writers Club-Freelancer
              </p>
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer> -->
      <!--footer end-->
  </section>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="..\assets/js/jquery.js"></script>
    <script src="..\assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="..\assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="..\assets/js/jquery.scrollTo.min.js"></script>
    <script src="..\assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="..\assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
    <?php }?>