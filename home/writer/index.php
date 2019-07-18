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
    

      <section id="main-content">
          <section class="wrapper ">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  
                
                  
                      
                      <div class="row mt">

                     
                    </div>
                    
                    <div class="row mtbox">
                        <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                            <div class="box1">
                                <span class="fa "><img src="..\assets/img/f-icon.png" class="img-center" width="60"> </span>
                                <h4 class="assigned">Assigned</h4>
                                <h5> <b>
                                <?php
                                require "php/conn.php";
                                

                                $results= $conn->query("SELECT COUNT(o_id) FROM order_prog  where u_id=$_SESSION[sess_id] and status=1");
                                // $results= $conn->query("SELECT COUNT(o_id) FROM order_prog where u_id=$_SESSION[sess_id] and status=1");
                                
                                $row = $results->fetch_row();
                                echo '#:', $row[0];

                               

                                ?>
                                
                                </b></h5>
                            </div>
                               <a href="#Assigned "  data-toggle="modal" data-target="#Assigned"><p>View Orders</p><i class="fa icon-"></i> </a> 
                               
                        </div>
                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                                <span class="fa "><img src="..\assets/img/f-icon.png" class="img-center" width="60"></span>
                                <h4 class="current">Current</h4>
                                <h5> <b>
                                <?php
                                require "php/conn.php";

                                $results= $conn->query("SELECT COUNT(o_id) FROM order_prog where u_id=$_SESSION[sess_id] and status=2");
                                $row = $results->fetch_row();
                                echo '#:', $row[0];

                                ?>
                                
                                </b></h5>
                            </div>
                            <a href="#Current "  data-toggle="modal" data-target="#Current"><p>View Orders</p></a> 
                        </div>
                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                                <span class="fa "> <img src="..\assets/img/f-icon.png" class="img-center" width="60"></span>
                                <h4 class="editing">Editing</h4>
                                <h5> <b>
                                <?php
                                require "php/conn.php";

                                $results= $conn->query("SELECT COUNT(o_id) FROM order_prog where u_id=$_SESSION[sess_id] and status=3");
                                $row = $results->fetch_row();
                                echo '#:', $row[0];

                                ?>
                                
                                </b></h5>
                            </div>
                            <a href="#Editing "  data-toggle="modal" data-target="#Editing"><p>View Orders</p></a> 
                        </div>
                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                                <span class="fa "> <img src="..\assets/img/f-icon.png" class="img-center" width="60"></span>
                                <h4 class="revision">Revision</h4>
                                <h5> <b>
                                
                                <?php
                                require "php/conn.php";

                                $results= $conn->query("SELECT COUNT(o_id) FROM order_prog where u_id=$_SESSION[sess_id] and status=4");
                                $row = $results->fetch_row();
                                echo '#:', $row[0];

                                ?>

                                </b></h5>
                            </div>
                            <a href="#Revision "  data-toggle="modal" data-target="#Revision"><p>View Orders</p></a> 
                        </div>
                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                                <span class="fa "><img src="..\assets/img/f-icon.png" class="img-center" width="60"></span>
                                <h4 class="closed">Closed</h4>
                                <h5> <b>
                                <?php
                                require "php/conn.php";

                                $results= $conn->query("SELECT COUNT(o_id) FROM order_prog where u_id=$_SESSION[sess_id] and status=5");
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
                                <h4 class="modal-title">Assigned Orders</h4>
                            </div>
                            <div class="modal-body">
                                
                            <?php
                                    require"../php/conn.php";
    

                                    $sql = "select a.u_id,o.* from order_prog a join orders o on o.o_id=a.o_id  where a.u_id=$_SESSION[sess_id] and a.status=1 ORDER by o.o_id desc";
                                    $res = $conn->query($sql);
                                        echo $conn->error;  
                                        
                                    $row = mysqli_num_rows($res);



                                    if($row == true){

                                   
                    
                ?>


                                <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i>Order ID</th>
                                  <th><i class="fa fa-bullhorn"></i>Order Title</th>
                                  <th ><i class="fa fa-question-circle"></i> Level</th>
                                  <th><i class="fa fa-bookmark"></i> Pages</th>
                                  <th><i class=" fa fa-edit"></i> Action</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              <?php
                              while($row = mysqli_fetch_assoc($res)){

                                echo'
                                <tr>
                                <td> '.$row["o_id"].' </td>
                                <td> '.$row["order_title"].' </td>
                                <td > '.$row["level"].'</td>
                                <td> '.$row["pages"].'</td>
                                
                                <td> <a href="assigned/view_order.php?o_id='.$row["o_id"].'"> <span class="label label-info label-mini">Details</span> </a> </td> 
                                </tr>
                                ';
                              } 
                              
                              ?> 

                                 
                              
                              
                              </tbody>
                          </table>
                          <?php 
                                    }
                                    
                          ?>
                      </div> <!-- /content-panel -->
                  </div> <!-- /col-md-12 -->
              </div> <!-- /row -->
                            </div>
                            <div class="modal-footer">
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
                                <h4 class="modal-title">Current Orders</h4>
                            </div>
                            <div class="modal-body">
                            <table class="table table-striped table-advance table-hover">
	                  	  	  
                            <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i>Order ID</th>
                                  <th><i class="fa fa-bullhorn"></i>Order Title</th>
                                  <th ><i class="fa fa-question-circle"></i> Level</th>
                                  <th><i class="fa fa-bookmark"></i> Pages</th>
                                  <th><i class=" fa fa-edit"></i> Action</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              <?php
                            require"../php/conn.php";
    

                            $sql = "select c.u_id,o.* from order_prog c join orders o on o.o_id=c.o_id  where c.u_id=$_SESSION[sess_id] and c.status=2 ORDER by o.o_id desc";
                            $res = $conn->query($sql);
                                echo $conn->error;  
                                
                            $row = mysqli_num_rows($res);



                            if($row == true){

                              while($row = mysqli_fetch_assoc($res)){

                                echo'
                                <tr>
                                <td> '.$row["o_id"].' </td>
                                <td> '.$row["order_title"].' </td>
                                <td > '.$row["level"].'</td>
                                <td> '.$row["pages"].'</td>
                                
                                <td> <a href="current/details.php?o_id='.$row["o_id"].'"> <span class="label label-info label-mini">Details</span> </a> </td> 
                                </tr>
                                ';
                              } 
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
                                <h4 class="modal-title">Editing Orders</h4>
                            </div>
                            <div class="modal-body">
                            <table class="table table-striped table-advance table-hover">
	                  	  	  
                            <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i>Order ID</th>
                                  <th><i class="fa fa-bullhorn"></i>Order Title</th>
                                  <th ><i class="fa fa-question-circle"></i> Level</th>
                                  <th><i class="fa fa-bookmark"></i> Pages</th>
                                  <th><i class=" fa fa-edit"></i> Action</th>
                                  <th><i class="fa fa-bookmark"></i> Status</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              <?php
                                 require"../php/conn.php";
    

                                 $sql = "select e.u_id,o.* from order_prog e join orders o on o.o_id=e.o_id  where e.u_id=$_SESSION[sess_id] and e.status=3 ORDER by o.o_id desc";
                                 $res = $conn->query($sql);
                                     echo $conn->error;  
                                     
                                 $row = mysqli_num_rows($res);
     
     
     
                                 if($row == true){

                              while($row = mysqli_fetch_assoc($res)){

                                echo'
                                <tr>
                                <td> '.$row["o_id"].' </td>
                                <td> '.$row["order_title"].' </td>
                                <td > '.$row["level"].'</td>
                                <td> '.$row["pages"].'</td>
                                
                               

                                 
                                
                              
                               <td> <a href="editing/details.php?o_id='.$row["o_id"].'"> <span class="label label-info label-mini">Details</span> </a> </td> 
                               ';
                                ?>
                               <?php
                                       
                               $sq="select a_mess,status from approves where u_id=$_SESSION[sess_id] and o_id=$row[o_id] ";
                              
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
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Revision" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header revision">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Revision Orders</h4>
                            </div>
                            <div class="modal-body">
                            <table class="table table-striped table-advance table-hover">
	                  	  	  
                            <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i>Order ID</th>
                                  <th><i class="fa fa-bullhorn"></i>Order Title</th>
                                  <th ><i class="fa fa-question-circle"></i> Level</th>
                                  <th><i class="fa fa-bookmark"></i> Pages</th>
                                  <th><i class=" fa fa-edit"></i> Action</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              <?php

                                require"../php/conn.php";
                                    

                                $sql = "select r.u_id,o.* from order_prog r join orders o on o.o_id=r.o_id  where r.u_id=$_SESSION[sess_id] and r.status=4 ORDER by o.o_id desc";
                                $res = $conn->query($sql);
                                    echo $conn->error;  
                                    
                                $row = mysqli_num_rows($res);



                                if($row == true){

                              while($row = mysqli_fetch_assoc($res)){

                                echo'
                                <tr>
                                <td> '.$row["o_id"].' </td>
                                <td> '.$row["order_title"].' </td>
                                <td > '.$row["level"].'</td>
                                <td> '.$row["pages"].'</td>
                                
                                <td> <a href="revision/details.php?o_id='.$row["o_id"].'"> <span class="label label-info label-mini">Details</span> </a> </td> 
                                </tr>
                                ';
                              } 
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
                                <h4 class="modal-title">Closed Orders</h4>
                            </div>
                            <div class="modal-body">
                            <table class="table table-striped table-advance table-hover">
	                  	  	  
                            <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i>Order ID</th>
                                  <th><i class="fa fa-bullhorn"></i>Order Title</th>
                                  <th ><i class="fa fa-question-circle"></i> Level</th>
                                  <th><i class="fa fa-bookmark"></i> Pages</th>
                                  <th><i class=" fa fa-edit"></i> Action</th>
                                  <th><i class="fa fa-bookmark"></i> Status</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              <?php

                                require"../php/conn.php";
                                    

                                $sql = "select cl.u_id,o.* from order_prog cl join orders o on o.o_id=cl.o_id  where cl.u_id=$_SESSION[sess_id] and cl.status=5 ORDER by o.o_id desc";
                                $res = $conn->query($sql);
                                    echo $conn->error;  
                                    
                                $row = mysqli_num_rows($res);



                                if($row == true){

                              while($row = mysqli_fetch_assoc($res)){

                                echo'
                                <tr>
                                <td> '.$row["o_id"].' </td>
                                <td> '.$row["order_title"].' </td>
                                <td > '.$row["level"].'</td>
                                <td> '.$row["pages"].'</td>
                                
                                <td> <a href="closed/details.php?o_id='.$row["o_id"].'"> <span class="label label-info label-mini">Details</span> </a> </td> 
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

					<div class="row">
						<!-- TWITTER PANEL -->
						
						<div style="margin-top:100px;"class="col-lg-4">
                          <div class="content-panel">
							  <h5><i class="fa "></i> Query with support</h5>
                              <div class="panel-body text-center">
                                  <div id="line" height="300" width="400">
                                    <form class="form control" action="php/querysup.php" method="POST">
                                        <input type="hidden" name="u_id" value=<?php echo"'$_SESSION[sess_id]'";?>>
                                        <label for="order">Order ID:</label>
                                        <div>
                                            <input type="text" name="o_id" value="">
                                        </div>
                                        <label for="order">Order Query/Message:</label>
                                        <div>
                                            <textarea name="o_mess" rows="8" cols="35"></textarea>
                                        </div>
                                        
                                        <div>
                                            <input type="submit" name="submit" value="Forward Query">
                                        </div>
                                    </form>

                                  </div>
                              </div>
                          </div>
                      </div>
						
						
						
					</div><!-- /row -->
					<br>
					
					
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                  <div style="float:right;margin-top:-20px;" class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
						<h3> NOTIFICATIONS </h3>
                        <?php
                             require "php/conn.php";
                                

                             $results= $conn->query("SELECT s.status,s.o_id FROM order_prog s where s.u_id=$_SESSION[sess_id] and s.status=1");
                             // $results= $conn->query("SELECT COUNT(o_id) FROM order_prog where u_id=$_SESSION[sess_id] and status=1");
                             
                             
                            if ($row = $results->fetch_assoc()) {
                                echo'<div class="desc">
                                <div class="thumb">
                                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                                </div>
                                <div class="details">
                                    
                                <a href="assigned/view_order.php?o_id='.$row["o_id"].'">Order #:'.$row["o_id"].'</a> Has been assigned to you. <br/><i style="color:red;">CHECK ASAP</i>
                                
                                    </p>
                                </div>
                            </div>';
                            } 
                            
                            
                           
                        ?>
                        <?php
                             require "php/conn.php";
                                

                             $results= $conn->query("SELECT s.status,s.o_id FROM order_prog s where s.u_id=$_SESSION[sess_id] and s.status=4");
                             // $results= $conn->query("SELECT COUNT(o_id) FROM order_prog where u_id=$_SESSION[sess_id] and status=1");
                             
                             
                            while($row = $results->fetch_assoc()) {
                                echo'<div class="desc">
                                <div class="thumb">
                                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                                </div>
                                <div class="details">
                                    
                                <a href="revision/details.php?o_id='.$row["o_id"].'">Order #:'.$row["o_id"].'</a> Has been sent on REVISION.<br/> <i style="color:red;">CHECK ASAP</i>
                                    </p>
                                </div>
                            </div>';
                            } 
                            
                            
                           
                        ?>

                        <?php 
                            require "php/conn.php";
                            $ress= $conn->query("select status from users where u_id=$_SESSION[sess_id] and status=0");
                            while($row=$ress->fetch_assoc()) {
                                echo'<div class="desc">
                                <div class="thumb">
                                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                                </div>
                                <div class="details">
                                    
                                 Your Registration is awaiting approval<br/> <i style="color:red;">Forward Your samples to smartessays001@gmail.com for account verification.</i>
                                    </p>
                                </div>
                            </div>';
                            } 
                            

                        
                        
                        ?>


                      
                      
                      

                      
                  </div><!-- /col-lg-3 -->
              </div><! --/row -->

                 
          </section>
      </section>

      <!--main content end-->
     
    
  </section>

   
	
	<script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Welcome ',
            // (string | mandatory) the text inside the notification

            text: '<?php echo $user_name;?>',
            // (string | optional) the image to display on the left
            image: '../assets/img/ui.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '12/12/2018',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
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

<?php
}
?>