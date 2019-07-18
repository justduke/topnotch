

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
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3> <i class="fa"><img src="..\..\assets/img/assign-icon.png" class="img" width="60"></i>Order Details</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
          		<div class="tab-pane" id="chartjs">
                  <div class="row mt">
                      <div class="col-lg-6">
                          <div class="content-panel">
							  <h4>Order Information <span class="label label-info label-mini" >Assigned</span></h4>
                              <div class="panel-body text-left">
                                  <div  height="300" width="400"></div>
                                  <?php
                                    require"../php/conn.php";
    

                                    
                                    $sql = "select a.u_id,u.u_name,o.* from order_prog a join orders o on o.o_id=$_GET[o_id] and a.status=1 join users u on a.u_id=u.u_id";
                                        
                                    
                                    // echo $sql;
                                    $res = $conn->query($sql);
                                    echo $conn->error;  
                                    
                                 
                              $row = $res->fetch_assoc();

                                
                                echo'
                                     <p><b style="color:black;">Order ID : </b>'.$row["o_id"].'</p>
                                     <p><b style="color:black;">Order Name : </b>'.$row["order_name"].'</p>
                                     <p><b style="color:black;">Order Tilte : </b>'.$row["order_title"].'</p>
                                     <p><b style="color:black;">Date Created : </b>'.$row["date_created"].'</p>
                                     <p><b style="color:black;">Level : </b>'.$row["level"].'</p>
                                     <p><b style="color:black;">Pages : </b>'.$row["pages"].'</p>
                                     <p><b style="color:black;">Format : </b>'.$row["format"].'</p>
                                     <p><b style="color:black;">Deadline : </b> <b style="color:red">'.$row["deadline"].'</b></p>
                                     <p><b style="color:black;">Service : </b>'.$row["service"].'</p>
                                     
                                     ';
                              
                              
                            
                    
                            
                              ?> 
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="content-panel">
							  <h4>Instructions</h4>
                              <div class="panel-body text-left">
                                  <div id="line" height="300" width="400"></div>

                                  <?php 
                                //    $row = $res->fetch_assoc();
                                //     echo'
                                //     <p><a href="..\..\admin'.$row["attachment"].'"> '.$row["attachment"].' </a></p>:[by support]</p>
                                //     ';
                                $sl= "select a.o_id,o.*,u.u_id from order_prog a join orders o on a.o_id=o.o_id join users u on a.u_id=u.u_id where a.o_id=$_GET[o_id] and a.status=1";
                                
                                $ress= $conn->query($sl);
                                $row = $ress->fetch_assoc();

                                
                                echo'
                                <p style="color:black;">'.$row["order_details"].'</p>
                                ';
                                
                                  ?>
                                 
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row mt">
                      <div class="col-lg-6">
                          <div class="content-panel">
							  <h4>Attachments</h4>
                              <div class="panel-body text-center">
                              
                                  
                                  <?php 
                                //    $row = $res->fetch_assoc();
                                //     echo'
                                //     <p><a href="..\..\admin'.$row["attachment"].'"> '.$row["attachment"].' </a></p>:[by support]</p>
                                //     ';
                                $sl= "select a.o_id,o.*,u.u_id from order_prog a join orders o on a.o_id=o.o_id join users u on a.u_id=u.u_id where a.o_id=$_GET[o_id] and a.status=1";
                                
                                $ress= $conn->query($sl);
                                $row = $ress->fetch_assoc();

                                
                                echo'
                                <p><a href="..\..\attachments/support/'.$row["attachment"].'"> '.$row["attachment"].' </a></p><p>:[by support]</p>
                                ';
                                
                                  ?>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="content-panel">
                          <h4> Seek Action From:
                                  <?php
                                  require"../php/conn.php";
                                  $ql="select u.u_name,p.u_id,u.u_id from users u join order_prog p on p.u_id=u.u_id where o_id=$_GET[o_id]";
                                  $rss= $conn->query($ql);
                                  echo $conn->error;
                                   while($row = $rss->fetch_assoc()){
                                        
                                    echo ' '.$row["u_name"].''; 
                                        } 
                                        ?>
                                   </i> </h4>
                              <div class="panel-body text-center">
                                <?php
                                $row = $res->fetch_assoc();
                               echo' 
                            <a href="..\view/reassign.php?order_id='.$_GET['o_id'].' && user_id='.$_GET['user'].'"> <button data-dismiss="modal" class="btn btn-danger" type="button">Re-Assign</button></a>
                            ';
                                
                               ?>
                                    
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  
              </div>

          		</div>
          	</div>
                                      
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      
      

  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="..\..\assets/js/jquery.js"></script>
    <script src="..\..\assets/js/bootstrap.min.js"></script>
    <script src="..\..\assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="..\..\assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="..\..\assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="..\..\assets/js/jquery.scrollTo.min.js"></script>
    <script src="..\..\assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="..\..\assets/js/common-scripts.js"></script>

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