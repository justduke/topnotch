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
          <section class="wrapper site-min-height">
              
          	<h3><i class="fa"><img src="..\..\assets/img/closed-icon.png" class="img" width="60"></i>Order Details</h3>
          	
              
              <div class="row mt">
          		<div class="col-lg-12">
          		<div class="tab-pane" id="chartjs">
                  <div class="row mt">
                      <div class="col-lg-6">
                          <div class="content-panel">
                              <h4>Order Information 
                              
                              <?php
                                  $sq="select a_mess,status from approves where u_id=$_SESSION[sess_id] and o_id=$_GET[o_id]";
                                    $rst=$conn->query($sq);

                                    while($row=$rst->fetch_assoc()){
                                        if($row['status'] == 1){
                                            echo'<span class="label label-info label-mini" >Closed</span>';
                                        }elseif($row['a_mess'] != ''){
                                            echo'<span class="label label-primary label-mini" >'.$row['a_mess'].'</span>';
                                            
                                        }
                                    }

                                  
                                  ?>
                              
                              
                              </h4>
                              <?php
                                    require"..\php/conn.php";
                                    
                                    $sql ="select payment from orders where o_id=$_GET[o_id]";
                                    
                                    $res= $conn->query($sql);
                                    while($row=$res->fetch_assoc()){
                                        if ($row['payment']==2) {
                                            echo'<span class="label label-success label-mini">Completed & PAID</span>';
                                        } else {
                                            echo'<span class="label label-warning">Pending Approval</span>';
                                        }
                                    }
                                    

                                    ?>
                              <div class="panel-body text-left">
                                  <div  height="300" width="400"></div>
                                  <?php
                                    require"../php/conn.php";
                                        $msg ='';

                                    $sql = "select cl.u_id,cl.date_closed,o.* from order_prog cl join orders o on o.o_id=cl.o_id  where cl.u_id=$_SESSION[sess_id] and o.o_id=$_GET[o_id] and status=5 ";
                                    $res = $conn->query($sql);
                                        echo $conn->error;  
                                        
                                    //  $row = mysqli_num_rows($res);
                                


                                    
                                    ?>
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
                                     <p><b style="color:black;">Date Completed : </b> <span style="color:green;" >'.$row["date_closed"].'</p>
                                     ';
                                  
 
                                  
                                   ?>

                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="content-panel" style="padding:4px;">
							  <h4>Instructions</h4>
                              <div class="panel-body text-left"  style="color:black;background-color:#eee;padding:4px;text-size:12px;width:100%;font-family:sans serif;">
                                  <div id="line" height="300" width="400"></div>

                                  <?php 
                                
                                
                               

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
                               
                                $sl= "select cl.o_id,o.*,u.u_id from order_prog cl join orders o on cl.o_id=o.o_id join users u on cl.u_id=u.u_id where cl.o_id=$_GET[o_id] and cl.status=5";
                                
                                $ress= $conn->query($sl);
                                $row = $ress->fetch_assoc();

                                
                                echo'
                                <p><a href="..\..\attachments/support/'.$row["attachment"].'"> '.$row["attachment"].' </a></p><p>:[by support]</p>
                                ';
                                
                                  ?>
                                  <hr>
                                <?php 
                                require"../php/conn.php";
                                $sl= "select ed.attached,ed.o_id,o.o_id from order_prog ed join orders o on ed.o_id=o.o_id where ed.o_id=$_GET[o_id] and ed.status=5";
                                $ress= $conn->query($sl);
                                $row = $ress->fetch_array();

                                
                                echo'
                                <p><a href="..\..\attachments/writer/'.$row["attached"].'"> '.$row["attached"].' </a></p><p>:[by writer]</p>
                                ';

                                
                                ?>
                                <hr>
                                <?php 
                                require"../php/conn.php";
                                $srl= "select ed.attach_rev,ed.o_id,o.o_id from order_prog ed join orders o on ed.o_id=o.o_id where ed.o_id=$_GET[o_id] and ed.rev_status=4";
                                $ress= $conn->query($srl);
                                $row = $ress->fetch_array();

                                
                                echo'
                                <p><a href="..\..\attachments/writer/'.$row["attach_rev"].'"> '.$row["attach_rev"].' </a></p><p>:[by writer: Revised]</p>
                                ';

                                
                                ?>

                              


                              </div>
                          </div>
                      </div>
                      <!-- ##### Accordians ##### -->
                      <div class="col-12 col-lg-6">
                                <div class="accordions mb-100" id="accordion" role="tablist" aria-multiselectable="true">
                                    <!-- single accordian area -->
                                    <div class="panel single-accordion">
                                        <h6><a role="button" class="" aria-expanded="true" aria-controls="collapseOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Revision  Comments

                                        <?php
                                        $sq="select a_mess,status from approves where u_id=$_SESSION[sess_id] and o_id=$_GET[o_id]";
                                            $rst=$conn->query($sq);

                                            while($row=$rst->fetch_assoc()){
                                                if($row['status'] == 0){
                                                    echo'<span class="label label-info label-mini" >Closed</span>';
                                                }elseif($row['a_mess'] != ''){
                                                    echo'<span class="label label-primary label-mini" >'.$row['a_mess'].'</span>';
                                                    
                                                }
                                            }

                                        
                                        ?>
                                                <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                </a></h6>
                                        <div id="collapseOne" style="padding:4px;" class="accordion-content collapse show text-left">
                                        <i>
                                                <?php
                                                  require"../php/conn.php";
                                              $ql="select u.eu_name,p.e_id,u.e_id from editors u join order_prog p on p.e_id=u.e_id where o_id=$_GET[o_id]";
                                              $rss= $conn->query($ql);
                                              echo $conn->error;
                                               while($row = $rss->fetch_assoc()){
                                                    
                                                echo ' <span class="label label-primary label-mini" >Editor: '.$row["eu_name"].'</span>'; 
                                                    }                  
                                                    ?>
                                            </i>

                                           <?php   require"..\php/conn.php";

                                            $sq="select m.o_id,m.u_id,m.message,m.date_created from messages m join orders o on m.o_id=o.o_id join users u on m.u_id=u.u_id where m.o_id=$_GET[o_id] and m.u_id=$_SESSION[sess_id]";
                                            $res= $conn->query($sq);
                                            // $row= $res->fetch_assoc();
                                            while($row= $res->fetch_assoc()){
                                                if($row['message'] !=''){
                                                echo'
                                            <p>Support: '.$row['date_created'].'</p>
                                            <span style="color:black;background-color:#eee;padding:4px;text-size:12px;width:100%;font-family:sans serif;"> *-'.$row['message'].'</span>
                                            ';
                                                }
                                            }
 ?> 
                                            
                                        </div>
                                        <div id="collapseOne" style="padding:4px;" class="accordion-content collapse show text-right">
                                        <?php   require"..\php/conn.php";

                                        $sq="select m.o_id,m.u_id,m.u_message,m.date_created from messages m join orders o on m.o_id=o.o_id join users u on m.u_id=u.u_id where m.o_id=$_GET[o_id] and m.u_id=$_SESSION[sess_id]";
                                        $res= $conn->query($sq);
                                        // $row= $res->fetch_assoc();
                                        while($row= $res->fetch_assoc()){
                                        if($row['u_message'] !=''){
                                            echo'
                                        <p>User: '.$row['date_created'].'</p>
                                        <span style="color:black;background-color:#eee;padding:4px;text-size:12px;width:100%;font-family:sans serif;"> *-'.$row['u_message'].'</span>
                                        ';
                                        }
                                        }
                                        ?>
                                        </div>
                                    </div>
                                    <!-- single accordian area -->
                                
                                    
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
