
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
?>
      
<?php
    require'sidebar_menu.php';
?>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Top Notch Writers</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
          		<p></p>
                  </div>
                  <div class="modal-body">
                  <table class="table table-striped table-advance table-hover">
                        <thead>
                        <tr>
                        <th><i class="fa fa-bookmark"></i> ID</th>
                            <th><i class="fa fa-bookmark"></i> Name</th>
                            <th><i class="fa fa-bookmark"></i>User Name</th>
                            <th class="hidden-phone"><i class="fa fa-bookmark"></i> Email</th>
                            <th><i class="fa fa-bookmark"></i> Phone</th>
                            <th><i class=" fa fa-bullhorn"></i> Availability Status</th>
                           <th><i class="fa fa-question-circle"></i> Action</th>
                        </tr>
                        </thead>
                    <?php
                    require"..\php/conn.php";

                    $sql= "select * from users";
                    $results= $conn->query($sql);
                   
                    if ($results->num_rows >0){
                    

                        echo '
                          <tbody>'; 
                        while($row = $results->fetch_assoc()){

                            
                            echo '
                            <tr>
                            <td><a href="#"> '.$row["u_id"].'</a></td>
                             <td><a href="#">'.$row["f_name"].'</a></td>
                             <td><a href="#">'.$row["u_name"].'</a></td>
                             <td class="hidden-phone">'.$row["email"].'</td>
                             <td> '.$row["phone"].' </td>';
                            
                             ?>
                             <td><?php 
                            
                                if($row['status'] ==1){
                                    echo '<span class="label label-info label-mini">Approved</span>';
                                
                                }else{
                                    echo'<span class="label label-warning label-mini">Waiting Approval</span>';
                                }

                             

                             ?></td>
                            <?php
                            echo'
                             <td class="position-relative">
                                 <a href="approve.php?user='.$row["u_id"].'"><button class="btn btn-success btn-xs">
                                 <i class="fa fa-check">Approve</i></button></a>
                                 <a href="edit.php?user='.$row["u_id"].'"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>

                                 ';
                                 ?>
                                 <div class="popup" onclick="myFunction(<?php echo $row["u_id"]; ?>)">
                                 <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o ">Delete</i></button>
                                 <span class="popuptext" id="myPopup<?php echo $row["u_id"]; ?>">
                                 <a href="del_user.php?user=<?php echo' '.$row["u_id"].' ';?>" class="btn btn-success btn-xs">
                                 <i class="fa fa-trash-o">Confirm Delete</i></a>
                                 </span>
                                </div>
                                 
                                 
                                 <?php
                                 echo'
                             </td>

                         </tr>
                            ';

                        }
                            echo"</tbody></table> ";
                        }else {
                            echo"0 Results";
                        }    
                    ?>              
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
                                    // When the user clicks on div, open the popup
                                    function myFunction(el) {
                                    var popup = document.getElementById("myPopup"+el);
                                    popup.classList.toggle("show");
                                    }
                                    </script>
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>
<?php }?>
  </body>
</html>