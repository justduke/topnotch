

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
                              <h4>Order Information <span class="label label-info label-mini" >Closed</span></h4>
                             <div> 
                                 <?php 
                              require"../php/conn.php";
    

                            //   $sql = "select cl.u_id,u.u_name,o.* from order_prog cl join orders o on o.o_id=cl.o_id and cl.status=5 join users u on cl.u_id=$_GET[user]";
                              
                            $sql = "select payment from orders where o_id=$_GET[o_id]";
                            $res = $conn->query($sql);
                              
                              while ($row= $res->fetch_assoc()) {
                                
                                if ($row['payment'] == 2){
                                    echo'<span class="label btn-success">Completed & PAID</span>';
                                    
                                  } else {
                                     echo'<span class="label label-warning label-mini">Pending Approval</span>';
                                     
                                  }
                              }
                             
                              

                            
                    
                              
                              ?> </div>
                              <div class="panel-body text-left">
                                  <div  height="300" width="400"></div>
                                  <?php
                                    require"../php/conn.php";
    

                                    $sql = "select cl.u_id,cl.date_closed,u.u_name,o.* from order_prog cl join orders o on o.o_id=$_GET[o_id] and cl.status=5 join users u on cl.u_id=u.u_id";
                                    $res = $conn->query($sql);
                                    echo $conn->error;  
                                 
                            //   while($row = mysqli_fetch_assoc($res)){
                                $row = mysqli_fetch_assoc($res);
                                
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
                          <div class="content-panel"  sytle="padding:4px;">
							  <h4>Instructions</h4>
                              <div class="panel-body text-left" style="color:black;background-color:#eee;padding:4px;text-size:12px;width:100%;font-family:sans serif;">
                                  <div id="line" height="300" width="400"></div>

                                  <?php 
                                
                                // $sl= "select cl.o_id,o.*,u.u_id from closed cl join orders o on cl.o_id=o.o_id join users u on cl.u_id=u.u_id where cl.o_id=$_GET[o_id]";
                                
                                // $ress= $conn->query($sl);
                                // $row = $ress->fetch_assoc();

                                
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
                               
                                $sl= "select cl.o_id,o.*,u.u_id from order_prog cl join orders o on cl.o_id=o.o_id join users u on cl.u_id=u.u_id where cl.o_id=$_GET[o_id]";
                                
                                $ress= $conn->query($sl);
                                $row = $ress->fetch_assoc();

                                
                                echo'
                                <p><a href="..\..\admin\attachments/'.$row["attachment"].'"> '.$row["attachment"].' </a></p><p>:[by support]</p>
                                ';
                                
                                  ?><hr>
                                   <?php 
                                require"../php/conn.php";
                                $sl= "select ed.attached,ed.o_id,o.o_id from order_prog ed join orders o on ed.o_id=o.o_id where ed.o_id=$_GET[o_id] and status=5";
                                $ress= $conn->query($sl);
                                $row = $ress->fetch_array();

                                
                                echo'
                                <p><a href="..\..\writer/user-attach/'.$row["attached"].'"> '.$row["attached"].' </a></p><p>:[by writer]</p>
                                ';

                                
                                ?><hr>
                                <?php 
                                require"../php/conn.php";
                                $sl= "select ed.attach_rev,ed.o_id,o.o_id from order_prog ed join orders o on ed.o_id=o.o_id where ed.o_id=$_GET[o_id] and rev_status=4";
                                $ress= $conn->query($sl);
                                $row = $ress->fetch_array();

                                
                                echo'
                                <p><a href="..\..\writer/user-attach/'.$row["attach_rev"].'"> '.$row["attach_rev"].' </a></p><p>:[by writer: Revised]</p>
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
                                        
                                    echo '  <a href="../view/users.php"><span class="label label-primary label-mini" >User: '.$row["u_name"].'</span></a>'; 
                                        } 
                                        ?>--
                                        <?php
                                  require"../php/conn.php";
                                  $ql="select u.eu_name,p.e_id,u.e_id from editors u join order_prog p on p.e_id=u.e_id where o_id=$_GET[o_id]";
                                  $rss= $conn->query($ql);
                                  echo $conn->error;
                                   while($row = $rss->fetch_assoc()){
                                        
                                    echo '  <a href="../view/editors.php"><span class="label label-primary label-mini" >Editor: '.$row["eu_name"].'</span></a>'; 
                                        } 
                                        ?>
                                   </i> </h4>
                              <div class="panel-body text-center">
                                   
                                    <button data-dismiss="modal" class="btn btn-danger" type="button">Reject</button>


                                   <?php
                                //    $sql = "select cl.u_id,u.u_name,o.* from order_prog cl join orders o on o.o_id=cl.o_id and cl.status=5 join users u on cl.u_id=u.u_id";
                                //    $res = $conn->query($sql);
                                    echo '<a href="payment.php?user='.$_GET["user"].'&& o_id='.$_GET['o_id'].'">
                                    <input class="btn btn-success" name="accept" type="button" value="Complete Payment"></a>'; 
                                    ?>
                                    
                              </div>
                          </div>

                                 <!-- ##### Accordians ##### -->
                            <div class="col-12 col-lg-6">
                                <div class="accordions mb-100" id="accordion" role="tablist" aria-multiselectable="true">
                                    <!-- single accordian area -->
                                    <div class="panel single-accordion">
                                        <h6><a role="button" class="" aria-expanded="true" aria-controls="collapseOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Revision  Comments
                                       

                                                <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                </a>
                                            
                                                <?php
                                                    require"../php/conn.php";
                                                    $sq="select a.a_mess,a.status,a.e_id,a.u_id from approves a join editors ed on a.e_id=ed.e_id and a.u_id=$_GET[user] ";
                                                        $rst=$conn->query($sq);

                                                        while($row=$rst->fetch_assoc()){
                                                            if($row['status'] == 0){
                                                                echo'<span class="label label-info label-mini" >Closed</span>';
                                                            }elseif($row['a_mess'] != ''){
                                                                echo'<span class="label label-primary label-mini" >'.$row['a_mess'].'</span>';
                                                                
                                                            }
                                                        }

                                                    
                                                    ?> 
                                            </h6>
                                        <div id="collapseOne" style="padding:4px;" class="accordion-content collapse show border rounded">

                                           <?php   require"..\php/conn.php";

                                            $sq="select m.o_id,m.u_id,m.message,m.date_created from messages m join orders o on m.o_id=o.o_id join users u on m.u_id=u.u_id where m.o_id=$_GET[o_id]";
                                            $res= $conn->query($sq);
                                            // $row= $res->fetch_assoc();
                                            while($row= $res->fetch_assoc()){
                                            if($row['message'] !=''){
                                                echo'
                                            <p>'.$row['date_created'].'</p>
                                            <span style="color:black;background-color:#eee;padding:4px;text-size:12px;width:100%;font-family:sans serif;">*-'.$row['message'].'</span>
                                            ';
                                            }

                                            }
 ?> 
                                            
                                        </div>
                                        <div id="collapseOne" style="padding:4px;" class="accordion-content collapse show text-right rounded">
                                        <?php   require"..\php/conn.php";

                                        $sq="select m.o_id,m.u_id,m.u_message,m.date_created from messages m join orders o on m.o_id=o.o_id join users u on m.u_id=u.u_id where m.o_id=$_GET[o_id]";
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
          	</div>
                                <?php ?>
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