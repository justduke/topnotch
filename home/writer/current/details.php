<?php
ob_start();
session_start();
include("../php/conn.php");
if(!(isset($_SESSION['log_user'])))
			{
				header("location:../php/writercheck.php");
			}
			else
			{	
$user_name=$_SESSION['log_user'];

require'header.php';

    require'sidebar_menu.php';

// $q = "select * from users where u_name= $user_name";
//   $rest = $conn->query($q);
//   $rw = mysqli_num_rows($rest);

//   if ($rw == tru){
      
//       $_SESSION['sess_id'] = $row['u_id']; 
//   }
?>


      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa"><img src="..\..\assets/img/currnt-icon.png" class="img" width="60"></i>Order Details </h3>
          	<div class="row mt">
          		<div class="col-lg-12">
          		<div class="tab-pane" id="chartjs">

                  <?php
                 require"../php/conn.php";
                    $msg ='';

                 $sql = "select c.u_id,o.* from order_prog c join orders o on o.o_id=c.o_id  where c.u_id=$_SESSION[sess_id] and o.o_id=$_GET[o_id] and c.status=2";
                 $res = $conn->query($sql);
                //  $row = $res->num_rows();    
                    
                 $row =mysqli_num_rows($res);
                    


           
                    
                ?>

                    

                <p>

                  <div class="row mt">
                      <div class="col-lg-6">
                          <div class="content-panel">
							  <h4>Order Information <span class="label label-success label-mini" >Current</span></h4>
                              <div class="panel-body text-left">
                                  <div height="300" width="400"></div>
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
                      <div class="col-lg-6">
                          <div class="content-panel">
							  <h4>Instructions</h4>
                              <div class="panel-body text-left" style="color:black;background-color:#eee;padding:4px;text-size:12px;width:100%;font-family:sans serif;">
                                  <div id="line" height="300" width="400"></div>

                                  <?php 
                                
                                $sl= "select cu.o_id,o.*,u.u_id from order_prog cu join orders o on cu.o_id=o.o_id join users u on cu.u_id=u.u_id where cu.o_id=$_GET[o_id] and cu.status=2";
                                
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

                                require"../php/conn.php";
                                $sl="select cu.o_id,o.*,u.u_id from order_prog cu join orders o on cu.o_id=o.o_id join users u on cu.u_id=u.u_id where cu.o_id=$_GET[o_id] and cu.status=2";
                                
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
							  <h4> Upload Complete Draft</h4>
                              <?php 
                                // if (isset($_FILES['udraft'])){
                                //     pre_r($_FILES);
 
                                //     }
                                // function pre_r($array){
                                //         echo'<pre>';
                                //         print_r($array);
                                //         echo'</pre>';
                                    // }
                              ?>
                              <div class="panel-body text-center">
                                  <form action="upldraft.php" method="post" enctype="multipart/form-data">
                                   
                                    <input type="file" name="udraft" value="Draft">
                                    <input type="hidden" name="o_id"  value=<?php echo "'$_GET[o_id]'"; ?> >
                                    <input type="hidden" name="user_id" value=<?php echo "'$_SESSION[sess_id]'"; ?> >    

                                    <input class="btn btn-primary text-left" type="submit" name="submit" value="Upload Draft">  
                                   
                                    
                                  </form>
                                  <!-- <hr><br> -->
                                  
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