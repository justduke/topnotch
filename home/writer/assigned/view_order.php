

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

//   $q = "select * from users where u_name= $user_name";
//   $rest = $conn->query($q);
//   $rw = mysqli_num_rows($rest);

//   if ($rw == true){
      
//       $_SESSION['sess_id'] = $row['u_id']; 
//   }

?>
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3> <i class="fa"> <img src="..\..\assets/img/assign-icon.png" class="img" width="60"></i> Order Details</h3>

                <?php
                 require"../php/conn.php";
                    $msg ='';

                 $sql = "select a.u_id,o.* from order_prog a join orders o on o.o_id=a.o_id  where a.u_id=$_SESSION[sess_id] and o.o_id=$_GET[o_id] and a.status=1";
                //  echo $sql;
                 $res = $conn->query($sql);
                    echo $conn->error;  
                    
                //  $row = mysqli_num_rows($res);
               


                
                    
                ?>

                    

                <p>

          	<div class="row mt">
          		<div class="col-lg-12">
          		<div class="tab-pane" id="chartjs">
                  <div class="row mt">
                      <div class="col-lg-6"> 
                          <div class="content-panel">
							  <h4>Order Information<span class="label label-info label-mini" >Assigned</span> </h4>
                              <div class="panel-body text-left">
                                  <div  height="300" width="400">
                                  <?php 
                                  
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
                      </div>
                      <div class="col-lg-6">
                          <div class="content-panel">
							  <h4>Instructions</h4>
                              <div class="panel-body text-left" style="color:black;background-color:#eee;padding:4px;text-size:12px;width:100%;font-family:sans serif;">
                                  <div id="line" height="300" width="400">
                                  <?php 
                                    echo'
                                    <p style="color:black;">'.$row["order_details"].'</p>
                                    ';
                                   


                                  ?>
                                  
                                  </div>
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
                              
                                    echo'
                                    <p><a href="..\..\attachments/support/'.$row["attachment"].'"> '.$row["attachment"].' </a></p>
                                    :[by support]</p>
                                    '
                                    ;
                                   


                                  ?>

                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="content-panel">
							  <h4> Order Confirmation </i> </h4>
                              <div class="panel-body text-center">
                                <?php 
                                    
                                echo'
                                <a href="reject.php?user='.$_SESSION["sess_id"].'&&o_id='.$_GET['o_id'].'"><input  class="btn btn-danger" name="reject" type="button" value="Reject"></a>
                                <a href="accept.php?user='.$_SESSION["sess_id"].'&&o_id='.$_GET['o_id'].'"><input class="btn btn-success" name="accept" type="button" value="Accept"></a>
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
<?php
     }
?>
