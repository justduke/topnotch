<?php
ob_start();
session_start();
include("../php/conn.php");
if(!(isset($_SESSION['log_user'])) )
			{
				header("location:../php/writercheck.php");
			}
			else
			{	
$user_name=$_SESSION['log_user'];
    require'header.php';

    require'sidebar_menu.php';
?>
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->

   <!-- js placed at the end of the document so the pages load faster -->
   <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/bootstrap.min.js "></script>
    <script src="../../assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="../../assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="../../assets/js/popper.min.js"></script>
    <script class="include" type="text/javascript" src="../../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../../assets/js/jquery.nicescroll.js" type="text/javascript"></script>



    <!--common script for all pages-->
    <script src="../../assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box
      $(document).ready(function(){
        $(function(){
          $('select.styled').customSelect();
      });
      })
      

  </script>      

      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3> Order Details</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
          		<div class="tab-pane" id="chartjs">
                    <?php
                        require"..\php/conn.php";

                        $sql ="select * from orders where o_id=$_GET[id]";

                        $results =$conn->query($sql);


                            while($row=$results->fetch_assoc()){

                                echo '
                                <div class="row mt">
                                <div class="col-lg-6">
                                    <div class="content-panel">
                                        <h4> Order Information</h4>
                                        <div class="panel-body ">
                                            <div  height="300" width="400">
                                            <p><b style="color:black;">Order ID : </b>'.$row["o_id"].'</p>
                                            <p><b style="color:black;">Order Name : </b>'.$row["order_name"].'</p>
                                            <p><b style="color:black;">Order Tilte : </b>'.$row["order_title"].'</p>
                                            <p><b style="color:black;">Date Created : </b>'.$row["date_created"].'</p>
                                            <p><b style="color:black;">Level : </b>'.$row["level"].'</p>
                                            <p><b style="color:black;">Pages : </b>'.$row["pages"].'</p>
                                            <p><b style="color:black;">Format : </b>'.$row["format"].'</p>
                                            <p><b style="color:black;">Deadline : </b> <b style="color:red">'.$row["deadline"].'</b></p>
                                            <p><b style="color:black;">Service : </b>'.$row["service"].'</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            

                                
                                <div class="col-lg-6">
                                <div class="content-panel">
                                    <h4>Instructions</h4>
                                    <div class="panel-body">
                                        <div id="line" height="300" width="400">
                                        <p style="color:black;">'.$row["order_details"].'</p>
                                        
                                        
                                        </div>
                                    </div>
                                </div>
                                </div>

                                </div>
                                <div class="row mt">
                                <div class="col-lg-6">
                                     <div class="content-panel">
							        <h4>Attachments</h4>
                                      <div class="panel-body ">
                                        <p><a href=" ../../attachments/support/'.$row["attachment"].'"> '.$row["attachment"].' </a></p>
                                     </div>
                                     </div>
                                    </div>

                                
                                    <div class="col-lg-6">
                                    <div class="content-panel">
                                        <h4 style="color:black"> Assign Order: "#'.$row["o_id"].', '.$row["order_name"].' "</i> </h4>
                                        <div class="panel-body text-center">
                                             
                                            
                                              <a href="#users_avable"  data-toggle="modal" data-target="#users_avable"><span class="btn btn-primary">View Writers</span></a> 
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                
                                ';

                            }
                            

                        
                    ?>

                    <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="users_avable" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header closed">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"> Writers To be Assigned</h4>
                            </div>
                        <div class="modal-body">
                        <table class="table table-striped table-advance table-hover">
                        <thead>
                        <tr>
                        <th><i class="fa fa-bookmark"></i> ID</th>
                            <th><i class="fa fa-bookmark"></i> Name</th>
                            <th class="hidden-phone"><i class="fa fa-bookmark"></i> Email</th>
                            <th><i class="fa fa-bookmark"></i> Phone</th>
                            <th><i class=" fa fa-bullhorn"></i>Tasks done</th>
                           <th><i class="fa fa-question-circle"></i> Action</th>
                        </tr>
                        </thead>  <tbody>
                            <?php
                    require"..\php/conn.php";

                    
                    $sql ="select * from users where status=1";
                    $results= $conn->query($sql);

                        
                        while($row = $results->fetch_assoc()){

                           
                            ?>
                        
                           
                            <tr>
                            <td> <?php echo''.$row["u_id"].''; ?></td>
                             <td> <?php echo''.$row["f_name"].''; ?></td>
                             <td class="hidden-phone"><?php echo''.$row["email"].''; ?></td>
                             <td> <?php echo' '.$row["phone"].''; ?> </td>
                             <td><span class="label label-info label-mini">
                             <?php 
                            //  if($row == true){
                            
                              $query= $conn->query("select count(o_id) from order_prog where u_id=$row[u_id]");
                              $rw= $query->fetch_row();
                                echo $rw[0];
                            // }
                             ?>
                             </span></td>
                             <td>
                                 
                                 <a class="btn btn-primary btn-xs fa fa-pencil" href="assignorder.php?user=<?php echo''.$row["u_id"].'&&o_id='.$_GET['id'].' '; ?>">Assign</a>
                             
                             </td>
                         </tr>

                         
                            
                            ';

                        

                            <?php }?>
                        <?php
                            
                            echo"</tbody></table> ";
                        // } 
                        // else {
                        //     echo"0 Results";
                        // }
                    
                    
                    

                                 
                    ?> 

      
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-warning" type="button">Close</button>
                               
                            </div>
                        </div>
                    </div>
                 </div>
                        
                     <!-- end add items -->


                  
                      
                  
                      
                  </div>
                  
              </div>

          		</div>
          	</div>
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      
      

  </section>


  </body>
</html>
    <?php }?>
