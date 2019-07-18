

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
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3> <i class="fa"><img src="..\..\assets/img/assign-icon.png" class="img" width="60"></i>Order Details</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
          		<div class="tab-pane" id="chartjs">
                  <div class="row mt">
                      <div class="col-lg-6">
                          <div class="content-panel">
							  <h4>Order Information <span class="label label-warning label-mini" >
                              
                              
                              Editing</span>
                              <?php
                                                    require"../php/conn.php";
                                                    $sq="select a.a_id,a.a_mess,a.status,a.e_id,a.u_id from approves a join editors ed on a.e_id=ed.e_id and a.u_id=$_GET[user] ";
                                                        $rst=$conn->query($sq);

                                                        while($row=$rst->fetch_assoc()){
                                                            if($row['a_id'] !=''){
                                                                if($row['status'] == 1){
                                                                    echo'<span class="label label-primary label-mini" >Reviewed</span>';
                                                                }elseif($row['a_mess'] != ''){
                                                                    echo'<span class="label label-primary label-mini" >'.$row['a_mess'].'</span>';
                                                                    
                                                                }
                                                            }
                                                            
                                                        }

                                                    
                                                    ?> </h4>
                              <div class="panel-body text-left">
                                  <div  height="300" width="400"></div>
                                  <?php
                                    require"../php/conn.php";
    

                                    $sql = "select e.u_id,u.u_name,o.* from order_prog e join orders o on o.o_id=$_GET[o_id] and e.status=3 join users u on e.u_id=u.u_id";
                                    $res = $conn->query($sql);
                                    echo $conn->error;  
                                 
                              while($row = mysqli_fetch_assoc($res)){

                                
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
                          <div class="content-panel" style="padding:4px;">
							  <h4>Instructions</h4>
                              <div class="panel-body text-left" style="color:black;background-color:#eee;padding:4px;text-size:12px;width:100%;font-family:sans serif;">
                                  <div id="line" height="300" width="400"></div>

                                  <?php 
                                
                                // $sl= "select ed.o_id,o.*,u.u_id from order_prog ed join orders o on ed.o_id=o.o_id join users u on ed.u_id=u.u_id where ed.o_id=$_GET[o_id] status=3";
                                
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
                               
                                $sl= "select ed.o_id,o.*,u.u_id from order_prog ed join orders o on ed.o_id=o.o_id join users u on ed.u_id=u.u_id where ed.o_id=$_GET[o_id]";
                                
                                $ress= $conn->query($sl);
                                $row = $ress->fetch_assoc();
                                
                                
                                echo'
                                <p><a href="..\..\attachments/support/'.$row["attachment"].'"> '.$row["attachment"].' </a></p><p>:[by support]</p>
                                ';
                                
                                  ?>
                            <hr>
<?php 
                                require"../php/conn.php";
                                $sl= "select ed.attached,ed.o_id,o.o_id from order_prog ed join orders o on ed.o_id=o.o_id where ed.o_id=$_GET[o_id] and ed.status=3";
                                $ress= $conn->query($sl);
                                $row = $ress->fetch_array();

                                
                                echo'
                                <p><a href="..\..\attachments/writer/'.$row["attached"].'"> '.$row["attached"].' </a></p><p>:[by writer]</p>
                                ';

                                
                                ?>
                                <hr>
                               
<?php 
                                require"../php/conn.php";
                                $sl= "select ed.attach_rev,ed.o_id,o.o_id from order_prog ed join orders o on ed.o_id=o.o_id where ed.o_id=$_GET[o_id] and rev_status=4";
                                $ress= $conn->query($sl);
                                $row = $ress->fetch_array();

                                
                                echo'
                                <p><a href="..\..\attachments/writer/'.$row["attach_rev"].'"> '.$row["attach_rev"].' </a></p><p>:[by writer: Revised]</p>
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
                              <?php
                            //    $qr= "select e.u_id,u.u_name,e.e_id,o.* from editing e join orders o on o.o_id=e.o_id and e.status=1 join users u on e.u_id=u.u_id join editors ed on e.e_id=ed.e_id";
                            //    $rees = $conn->query($qr);
                            //    echo $conn->error; 
                               
                            //    while($rw =mysqli_fetch_assoc($rees)){

                               echo' 
                             <a href="..\view/reassigne.php?order_id='.$_GET['o_id'].' && user_id='.$_GET['user'].'"> <button data-dismiss="modal" class="btn btn-danger" type="button">Re-Assign</button></a>
                             <a href="..\view/complete.php?order_id='.$_GET['o_id'].' && user_id='.$_GET['user'].' "> <button data-dismiss="modal" class="btn btn-info" type="button">Complete Order</button></a>

                             <a href="..\view/revise.php?order_id='.$_GET['o_id'].' && user_id='.$_GET['user'].'"> <button data-dismiss="modal" class="btn btn-success" type="button">Revise Order</button></a>
                            
                             ';
                            // }   
                                ?>
                                <a href="#Assign to Users "  data-toggle="modal" data-target="#editors_avable"><p class="btn btn-warning">View Editors</p></a>
                                <!-- <a href="..\view/assigneditor.php?order_id='.$_GET['o_id'].' && user_id='.$_GET['user'].'"> <button data-dismiss="modal" class="btn btn-warning" type="button">Assign Editor</button></a> -->
                                </div>
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
                            
                         <div class="col-lg-6">
                          <div class="content-panel">
                              <h4> Add Revision Comment </h4>
                          <div class="panel-body text-left">
							  <form action="revcomm.php" method="POST">
                              <textarea name="rev_comm"rows="7" cols="70"></textarea>  
                              <input type="hidden" name="o_id"  value=<?php echo "'$_GET[o_id]'"; ?> >
                                <input type="hidden" name="user" value=<?php echo "'$_GET[user]'"; ?> >   
                                <input type="submit" class="btn btn-success" value="Add Comment">
                              </form>
                              
                          </div>
                      </div>
                    </div>

                      </div>
                  </div>
  
              </div>

               <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editors_avable" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header closed">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"> Editors To be Assigned</h4>
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

                    // $sql= "select u.*,cl.o_id from users u join closed cl on u.u_id=cl.u_id and cl.status=1";
                    $sql ="select * from editors where status=1";
                    $results= $conn->query($sql);
                   
                    // if ($results == true){
                    

                        
                        while($row = $results->fetch_assoc()){

                           
                            ?>
                        
                           
                            <tr>
                            <td><a href="#"> <?php echo''.$row["e_id"].''; ?></a></td>
                             <td><a href="#"> <?php echo''.$row["eu_name"].' '; ?></a></td>
                             <td class="hidden-phone"><?php echo''.$row["email"].' '; ?></td>
                             <td> <?php echo' '.$row["phone"].''; ?> </td>
                             <td><span class="label label-info label-mini">
                             <?php 
                             if($row == true){
                            
                              $query= $conn->query("select count(e_id) from order_prog where e_id=$row[e_id]");
                              $rw= $query->fetch_row();
                                echo $rw[0];
                            }
                             ?>
                             </span></td>
                             <td>
                                 
                                 <a class="btn btn-primary btn-xs fa fa-pencil" href="..\view/assigneditor.php?editor=<?php echo''.$row["e_id"].'&&o_id='.$_GET['o_id'].' '; ?>">Assign</a>
                             
                             </td>
                         </tr>

                         
                            
                            ';

                        

                            
                        <?php
                            }
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


          		</div>
          	</div>
                                <?php }?>
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      
      

  </section>

   
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php }?>