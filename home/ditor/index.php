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


require'header.php';

require'sidebar_menu.php';
?>
      

      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
           <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/jquery-1.8.3.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="../assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="../assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="../assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="../assets/js/sparkline-chart.js"></script>    
	<script src="../assets/js/zabuto_calendar.js"></script>	
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  
                
                  
                      
                      <div class="row mt">

                     
                    </div>
                    
                    <div class="row mtbox">
                        <!-- <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                            <div class="box1">
                                <span class="fa "> <img src="..\assets/img/f-icon.png" class="img-center" width="60"> </span>
                                <h4 class="assigned">Assigned</h4>
                                <h5> <b>933</b></h5>
                            </div>
                               <a href="#Assigned "  data-toggle="modal" data-target="#Assigned"><p>View Orders</p><i class="fa icon-"></i> </a> 
                               
                        </div>
                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                                <span class="fa "><img src="..\assets/img/f-icon.png" class="img-center" width="60">  </span>
                                <h4 class="current">Current</h4>
                                <h5> <b>933</b></h5>
                            </div>
                            <a href="#Current "  data-toggle="modal" data-target="#Current"><p>View Orders</p></a> 
                        </div> -->


                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                                <span class="fa "><img src="..\assets/img/f-icon.png" class="img-center" width="60">  </span>
                                <h4 class="editing">Editing</h4>
                                <h5> <b>

                                <?php
                               
                                require "php/conn.php";
                               

                                $sql ="SELECT COUNT(o_id) FROM order_prog where e_id=$_SESSION[sess_id] and status=3";
                                
                                $result= $conn->query($sql);
                                // echo $conn->error;
                                $row = $result->fetch_array();
                                
                                echo '#:', $row[0];

                                
                                
                                ?>
                            
                                </b></h5>
                            </div>
                            <a href="#Editing "  data-toggle="modal" data-target="#editing"><p>View Orders</p></a> 
                        </div>

                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                                <span class="fa "><img src="..\assets/img/f-icon.png" class="img-center" width="60">  </span>
                                <h4 class="revision">Revision</h4>
                                <h5> <b>
                                <?php
                                require "php/conn.php";

                                $results= $conn->query("SELECT COUNT(o_id) FROM order_prog where e_id=$_SESSION[sess_id] and status=4");
                                $row = $results->fetch_row();
                                echo '#:', $row[0];

                                ?>

                                </b></h5>
                            </div>
                            <a href="#Revision "  data-toggle="modal" data-target="#Revision"><p>View Orders</p></a> 
                        </div>
                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                                <span class="fa "><img src="..\assets/img/f-icon.png" class="img-center" width="60"> </span>
                                <h4 class="closed">Closed</h4>
                                <h5> <b>
                                <?php
                                require "php/conn.php";

                                $results= $conn->query("SELECT COUNT(o_id) FROM order_prog where e_id=$_SESSION[sess_id] and status=5");
                                $row = $results->fetch_row();
                                echo '#:', $row[0];

                                ?>
                                
                                </b></h5>
                            </div>
                            <a href="#Closed "  data-toggle="modal" data-target="#closed"><p>View Orders</p></a> 
                        </div>
                    
                    </div><!-- /row mt -->	
                                    
                    <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editing" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header assigned">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Editing Orders</h4>
                            </div>
                            <div class="modal-body">
                                
                                <div class="row mt">
                     <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                          <?php
                                    require"../php/conn.php";
    

                                    $sql = "select e.e_id,o.* from order_prog e join orders o on o.o_id=e.o_id  where e.e_id=$_SESSION[sess_id] and e.status=3 ORDER by o.o_id desc";
                                   
                                    $res = $conn->query($sql);
                                
                                    while($row = mysqli_fetch_assoc($res)){


                                   
                    
                                ?>
	                  	  	  
                                  <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i>Order ID</th>
                                  <th><i class="fa fa-bullhorn"></i>Order Title</th>
                                  <th ><i class="fa fa-question-circle btn-success"></i> User Assigned</th>
                                  <!-- <th ><i class="fa fa-question-circle btn-warning"></i> Editor Assigned</th> -->
                                  <th><i class="fa fa-bookmark"></i> Pages</th>
                                  <th><i class=" fa fa-edit"></i> Action</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              <?php
                                    require"../php/conn.php";
    

                                    $sql = "select e.u_id,u.u_name,o.* from order_prog e join orders o on o.o_id=e.o_id and e.status=3 join users u on e.u_id=u.u_id where e.e_id=$_SESSION[sess_id] ORDER by o.o_id desc";
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
                                </tr>
                                ';
                              } 
                            }
                              // <td style="color:green;"> '.$row["eu_name"].'</td>
                              ?>
                              
                              </tbody>

                          </table>
                          
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
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
                            <div class="modal-header assigned">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Revision Orders</h4>
                            </div>
                            <div class="modal-body">
                                
                                <div class="row mt">
                     <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                          <?php
                                    require"../php/conn.php";
    

                                    $sql = "select e.e_id,o.* from order_prog e join orders o on o.o_id=e.o_id  where e.e_id=$_SESSION[sess_id] and status=4";
                                   
                                    $res = $conn->query($sql);
                                
                                    while($row = mysqli_fetch_assoc($res)){


                                   
                    
                                ?>
	                  	  	  
                                  <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i>Order ID</th>
                                  <th><i class="fa fa-bullhorn"></i>Order Title</th>
                                  <th ><i class="fa fa-question-circle btn-success"></i> User Assigned</th>
                                  <!-- <th ><i class="fa fa-question-circle btn-warning"></i> Editor Assigned</th> -->
                                  <th><i class="fa fa-bookmark"></i> Pages</th>
                                  <th><i class=" fa fa-edit"></i> Action</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              <?php
                                    require"../php/conn.php";
    

                                    $sql = "select e.u_id,u.u_name,o.* from order_prog e join orders o on o.o_id=e.o_id and e.status=4 join users u on e.u_id=u.u_id ORDER by o.o_id desc";
                                    $res = $conn->query($sql);
                                    echo $conn->error;  
                                 
                              while($row = mysqli_fetch_assoc($res)){

                                echo'
                                <tr>
                                <td> '.$row["o_id"].' </td>
                                <td> '.$row["order_title"].' </td>
                                <td style="color:blue;"> '.$row["u_name"].'</td>
                                
                                <td> '.$row["pages"].'</td>
                                
                                <td> <a href="revision/details.php?o_id='.$row["o_id"].'&& user='.$row['u_id'].'"> <span class="label label-info label-mini">Details</span> </a> </td> 
                                </tr>
                                ';
                              } 
                            }
                              // <td style="color:green;"> '.$row["eu_name"].'</td>
                              ?>
                              
                              </tbody>

                          </table>
                          
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default btn-warning" type="button">Cancel</button>
                                
                            </div>
                        </div>
                    </div>
                 </div>
                <!-- modal -->

                 <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="closed" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header assigned">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Closed Orders</h4>
                            </div>
                            <div class="modal-body">
                                
                                <div class="row mt">
                     <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                          <?php
                                    require"../php/conn.php";
    

                                    $sql = "select e.e_id,o.* from order_prog e join orders o on o.o_id=e.o_id  where e.e_id=$_SESSION[sess_id] and e.status=5";
                                   
                                    $res = $conn->query($sql);
                                
                                    while($row = mysqli_fetch_assoc($res)){


                                   
                    
                                ?>
	                  	  	  
                                  <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i>Order ID</th>
                                  <th><i class="fa fa-bullhorn"></i>Order Title</th>
                                  <th ><i class="fa fa-question-circle btn-success"></i> User Assigned</th>
                                  <!-- <th ><i class="fa fa-question-circle btn-warning"></i> Editor Assigned</th> -->
                                  <th><i class="fa fa-bookmark"></i> Pages</th>
                                  <th><i class=" fa fa-edit"></i> Action</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              <?php
                                    require"../php/conn.php";
    

                                    $sql = "select e.u_id,u.u_name,o.* from order_prog e join orders o on o.o_id=e.o_id join users u on e.u_id=u.u_id where e.status=5 and e_id=$_SESSION[sess_id] ORDER by o.o_id desc";
                                    $res = $conn->query($sql);
                                    echo $conn->error;  
                                 
                              while($row = mysqli_fetch_assoc($res)){

                                echo'
                                <tr>
                                <td> '.$row["o_id"].' </td>
                                <td> '.$row["order_title"].' </td>
                                <td style="color:blue;"> '.$row["u_name"].'</td>
                                
                                <td> '.$row["pages"].'</td>
                                
                                <td> <a href="closed/details.php?o_id='.$row["o_id"].'&& user='.$row['u_id'].'"> <span class="label label-info label-mini">Details</span> </a> </td> 
                                </tr>
                                ';
                              } 
                            }
                              // <td style="color:green;"> '.$row["eu_name"].'</td>
                              ?>
                              
                              </tbody>

                          </table>
                          
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default btn-warning" type="button">Cancel</button>
                                
                            </div>
                        </div>
                    </div>
                 </div>
                <!-- modal -->

               



                              </tbody>

                          </table>
                         
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
                            
            </div>
                <div class="modal-footer">
                         <button data-dismiss="modal" class="btn btn-default btn-warning" type="button">Cancel</button>
                                
                    </div>
                    <?php 
                                    }
                                    
                          ?>
                    </div>
                    </div>
                 </div>
               



					<div class="row">
					
						
					</div> <!-- /row -->
					
					
					
                  </div> <!-- /col-lg-9 END SECTION MIDDLE --><br>
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                  <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
						<h3> NOTIFICATIONS </h3>
                                        
                      <!-- First Action -->
                      <div class="desc">
                      	<div class="thumb">
                      		<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                      	</div>
                      	<div class="details">
                      		<p><muted>2 Minutes Ago</muted><br/>
                      		   <a href="#">James Brown</a> subscribed to your newsletter.<br/>
                      		</p>
                      	</div>
                      </div>
                     
                      </div>

                      
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
    