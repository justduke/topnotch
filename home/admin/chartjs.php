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

<?php require'header.php'; ?>
      <!--header end-->
      
   <?php  require'sidebar_menu.php'; ?>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          <h3><i class="fa fa-angle-right"></i> Chartjs Charts</h3>
              <!-- page start-->
              <div class="tab-pane" id="chartjs">
                  <div class="row mt">
                      <div class="col-lg-6">
                          <div class="content-panel">
							  <h4><i class="fa fa-angle-right"></i> Reset Counters</h4>
                              <div class="panel-body text-inline">
                                  <div id="doughnut" height="300" width="400">
                                  
                                  <?php
                                   
                                   require"php/conn.php";
                                   $result = $conn->query("SELECT COUNT(o_id) FROM assigned where status=1");
                                   $row = $result->fetch_row();
                                   echo 'Assigned #: ', $row[0];

                                   if ($row >= 1){
                                    

                                    // $sql= "select a.u_id,o.* from assigned a join orders o on a.o_id=o.o_id where a.status=1";
                                    $sql= "select * from assigned where status=1";
                                    $results= $conn->query($sql);
                                   
                                    if ($results->num_rows >0){
                                    
                                            echo '
                                            
                                                <a href="view/delstatassgn.php"><i class="fa fa-pencil btn btn-danger"> Reset Qued Status</i></a>
                                            
                                            ';
                
                                        }else{
                                            echo'-->No Que';
                                        }
                                }

                               
                               ?>
                                <br><br>
                                <?php
                                   
                                   require"php/conn.php";
                                   $result = $conn->query("SELECT COUNT(o_id) FROM current where status=0");
                                   $row = $result->fetch_row();
                                   echo 'Current#: ', $row[0];

                                   if ($row >= 1){
                                    

                                    // $sql= "select a.u_id,o.* from assigned a join orders o on a.o_id=o.o_id where a.status=1";
                                    $sql= "select * from current where status=0";
                                    $results= $conn->query($sql);
                                   
                                    if ($results->num_rows >0){
                                    
                                            echo '
                                            
                                                <a href="view/delstatcrrnt.php"><i class="fa fa-pencil btn btn-danger"> Reset Qued Status</i></a>
                                            
                                            ';
                
                                        }else{
                                            echo'-->No Que';
                                        }
                                }
                                   
                               
                               ?> <br><br>
                               <?php
                                   
                                   require"php/conn.php";
                                   $result = $conn->query("SELECT COUNT(o_id) FROM revision where status=0");
                                   $row = $result->fetch_row();
                                   echo 'Revision #: ', $row[0];
                                   if ($row >= 1){
                                    

                                    // $sql= "select a.u_id,o.* from assigned a join orders o on a.o_id=o.o_id where a.status=1";
                                    $sql= "select * from revision where status=0";
                                    $results= $conn->query($sql);
                                   
                                    if ($results->num_rows >0){
                                    
                                            echo '
                                            
                                                <a href="view/delstatrev.php"><i class="fa fa-pencil btn btn-danger"> Reset Qued Status</i></a>
                                            
                                            ';
                
                                        }else{
                                            echo'-->No Que';
                                        }
                                }
                               
                               ?>
                                  
                                  
                                  </div>
                                 

                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="content-panel">
							  <h4><i class="fa fa-angle-right"></i> Line</h4>
                              <div class="panel-body text-center">
                                  <canvas id="line" height="300" width="400"></canvas>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row mt">
                      <div class="col-lg-6">
                          <div class="content-panel">
							  <h4><i class="fa fa-angle-right"></i> Radar</h4>
                              <div class="panel-body text-center">
                                  <canvas id="radar" height="300" width="400"></canvas>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="content-panel">
							  <h4><i class="fa fa-angle-right"></i> Polar Area</h4>
                              <div class="panel-body text-center">
                                  <canvas id="polarArea" height="300" width="400"></canvas>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row mt">
                      <div class="col-lg-6">
                          <div class="content-panel">
							  <h4><i class="fa fa-angle-right"></i> Bar</h4>
                              <div class="panel-body text-center">
                                  <canvas id="bar" height="300" width="400"></canvas>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="content-panel">
							  <h4><i class="fa fa-angle-right"></i> Pie</h4>
                              <div class="panel-body text-center">
                                  <canvas id="pie" height="300" width="400"></canvas>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- page end-->
          </section>          
      </section><!-- /MAIN CONTENT -->

      <?php require'footer.php'; ?>
      <!--footer end-->
  </section>
  <?php }?>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="..\assets/js/jquery.js"></script>
    <script src="..\assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="..\assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="..\assets/js/jquery.scrollTo.min.js"></script>
    <script src="..\assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="..\assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="..\assets/js/chart-master/Chart.js"></script>
    <script src="..\assets/js/chartjs-conf.js"></script>
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
