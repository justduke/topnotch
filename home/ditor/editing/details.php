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
          	<h3> <i><img src="..\..\assets/img/edit-icon.png" class="img" width="60"></i>Order Details</h3>

              <?php
                 require"../php/conn.php";
                    $msg ='';

                 $sql = "select e.e_id,o.* from order_prog e join orders o on o.o_id=e.o_id  where e.e_id=$_SESSION[sess_id] and o.o_id=$_GET[o_id] and e.status=3 ";
                 $res = $conn->query($sql);
                    echo $conn->error;  
                    
                 $row = mysqli_num_rows($res);
               


                
                    
                ?>

          	<div class="row mt">
          		<div class="col-lg-12">
          		<div class="tab-pane" id="chartjs">
                  <div class="row mt">
                      <div class="col-lg-6">
                          <div class="content-panel">
							  <h4>Order Information 
                                  <?php
                                  $sq="select a_mess,status from approves where e_id=$_SESSION[sess_id] and o_id=$_GET[o_id]";
                                    $rst=$conn->query($sq);

                                    while($row=$rst->fetch_assoc()){
                                        if($row['status'] == 1){
                                            echo'<span class="label label-primary label-mini" >Reviewed</span>';
                                        }elseif($row['a_mess'] != ''){
                                            echo'<span class="label label-primary label-mini" >'.$row['a_mess'].'</span>';
                                            
                                        }
                                    }

                                  
                                  ?>
                                  <span class="label label-warning label-mini" >Editing</span>
                              
                            
                            </h4>
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
                          <div class="content-panel" style="padding:4px;">
							  <h4>Instructions</h4>
                              <div class="panel-body text-left" style="color:black;background-color:#eee;padding:4px;text-size:12px;width:100%;font-family:sans serif;">
                                  <div id="line" height="300" width="400"></div>

                                  <?php 
                                
                                $sl= "select ed.o_id,o.*,u.u_id from order_prog ed join orders o on ed.o_id=o.o_id join users u on ed.u_id=u.u_id where ed.o_id=$_GET[o_id] and ed.status=3";
                                
                                $ress= $conn->query($sl);
                                $row = $ress->fetch_assoc();

                                
                                echo'
                                <span style="color:black;">'.$row["order_details"].'</span>
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
                              <div class="panel-body text-left">
                              <?php 
                               
                                $sl= "select ed.o_id,o.*,u.u_id from order_prog ed join orders o on ed.o_id=o.o_id join users u on ed.u_id=u.u_id where ed.o_id=$_GET[o_id] and ed.status=3";
                                
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
                                $row = $ress->fetch_assoc();

                                
                                echo'
                                <p><a href="..\..\attachments/writer/'.$row["attached"].'"> '.$row["attached"].' </a></p><p>:[by writer]</p>
                                ';

                                
                                ?>
                                <hr>
                                <?php 
                                require"../php/conn.php";
                                $srl= "select ed.attach_rev,ed.o_id,o.o_id from order_prog ed join orders o on ed.o_id=o.o_id where ed.o_id=$_GET[o_id] and ed.status=3";
                                $ress= $conn->query($srl);
                                $row = $ress->fetch_assoc();

                                
                                echo'
                                <p><a href="..\..\attachments/writer/'.$row["attach_rev"].'"> '.$row["attach_rev"].' </a></p><p>:[by writer: Revised]</p>
                                ';

                                
                                ?>
                                <br>
                                <?php
                                 require"../php/conn.php";
                                 $srl= "select ed.attached_ed,ed.o_id,o.o_id,ed.e_id from order_prog ed join orders o on ed.o_id=o.o_id where ed.o_id=$_GET[o_id] and ed.e_id=$_SESSION[sess_id] and ed.status=3";
                                 $ress= $conn->query($srl);

                                 echo $conn->error; 
                                 $row = $ress->fetch_assoc();
 
                                 
                                 echo'
                                 <p><a href="..\..\attachments/support/'.$row["attached_ed"].'"> '.$row["attached_ed"].' </a></p><p>
                                 ';
                                
                                ?>

                              </div>
                          </div>
                      </div>

                      <div class="col-lg-6">
                          <div class="content-panel">
							  




                              
                          </div>
                      </div>

                      <div class="col-lg-6">
                          <div class="content-panel">
                          <h4> Seek Action From:
                                  <?php
                                  require"../php/conn.php";
                                  $ql="select u.u_name,p.u_id,u.u_id from users u join order_prog p on p.u_id=u.u_id join editors e on p.e_id=e.e_id where o_id=$_GET[o_id] and e.e_id=$_SESSION[sess_id]";
                                  $rss= $conn->query($ql);
                                  echo $conn->error;
                                   while($row = $rss->fetch_assoc()){
                                        
                                    echo ' <span class="label label-primary label-mini" >User: '.$row["u_name"].'</span>'; 
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
                             <a href="..\php/reassigne.php?order_id='.$_GET['o_id'].' && user_id='.$_GET['user'].'"> <button data-dismiss="modal" class="btn btn-danger" type="button">Re-Assign</button></a>
                             <a href="..\php/approve.php?order_id='.$_GET['o_id'].' && user_id='.$_GET['user'].'&& editor_id='.$_SESSION['sess_id'].' "> <button data-dismiss="modal" class="btn btn-info" type="button">Approve Order</button></a>

                             <a href="..\php/revise.php?order_id='.$_GET['o_id'].' && user_id='.$_GET['user'].' && editor_id='.$_SESSION['sess_id'].'"> <button data-dismiss="modal" class="btn btn-success" type="button">Revise Order</button></a>
                            
                             ';
                            // }   
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
                                                <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                <i>
                                                    <?php
                                                        $sq="select a_mess from approves where e_id=$_SESSION[sess_id] and o_id=$_GET[o_id]";
                                                            $rst=$conn->query($sq);

                                                            while($row=$rst->fetch_assoc()){
                                                                if($row['a_mess'] !=''){
                                                                    echo'<span class="label label-primary label-mini" >'.$row['a_mess'].'</span>';
                                                                }
                                                            }

                                                        
                                                        ?>
                                                    </i>
                                                </a></h6>
                                        <div id="collapseOne" style="padding:4px;" class="accordion-content collapse show text-left">

                                           <?php   require"..\php/conn.php";

                                            $sq="select m.o_id,m.u_id,m.message,m.date_created,e.e_id from messages m join orders o on m.o_id=o.o_id join users u on m.u_id=u.u_id join editors e on m.e_id=e.e_id where m.o_id=$_GET[o_id] and m.e_id=$_SESSION[sess_id] ";
                                            $res= $conn->query($sq);
                                            echo $conn->error;
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

                                    <div class="col-lg-6">
                                    <div class="content-panel">
                                        <h4> Upload The Edited Draft</h4>
                                        <div style="padding-left:12px;"class=" panel-body text-right">
                                            <form action="upldraft.php" method="post" enctype="multipart/form-data">
                                            
                                            <input type="file" name="udraft" value="Draft">
                                            <input type="hidden" name="o_id"  value=<?php echo "'$_GET[o_id]'"; ?> >
                                            <input type="hidden" name="user_id" value=<?php echo "'$_GET[user]'"; ?> >   
                                            <input type="hidden" name="editor_id"  value=<?php echo "'$_SESSION[sess_id]'"; ?> > 

                                            <input class="btn btn-success text-left" type="submit" name="submit" value="Upload Draft">  
                                            
                                            
                                            </form>
                                            <!-- <hr><br> -->
                                            
                                        </div>
                                    </div>
                                </div>
                                    
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
                                <input type="hidden" name="editor" value=<?php echo "'$_SESSION[sess_id]'"; ?> >    
                                <input type="submit" class="btn btn-success" value="Add Comment">
                              </form>
                              
                          </div>


                  </div>
                  
              </div>

          		</div>
          	</div>
              
           
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      
      <!-- <?php
            require'footer.php';
        ?> -->

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
    <script src="..\..\..\js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="..\..\..\js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="..\..\..\js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="..\..\..\js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="..\..\..\js/active.js"></script>
    
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
