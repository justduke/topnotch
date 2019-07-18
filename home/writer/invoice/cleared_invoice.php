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
          <section class="wrapper">
          	
          <h4><i class="fa fa-angle-right"></i> Invoice </h4>
		  	<div class="row mt">
              <div class="col-lg-12">
                      <div class="content-panel">
						  <h4>Cleared</h4>
                          <section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> Id</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Ordder Name</th>
                                  <th><i class="fa fa-bookmark"></i> Pages</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              <?php 
                              
                              require"..\php/conn.php";
                            // $sql="select cl.u_id,cl.o_id,o.* from closed cl cl.status=1 and cl.u_id=$_SESSION[sess_id] join orders o on o.o_id=cl.o_id";
                            $sql = "select cl.u_id,o.* from closed cl join orders o on o.o_id=cl.o_id  where cl.u_id=$_SESSION[sess_id] and o.o_id=cl.o_id";
                            $res= $conn->query($sql);

                            $row = mysqli_fetch_assoc($res);
                              echo'
                              <tr>
                                  <td><a href="#">'.$row['o_id'].'</a></td>
                                  <td class="hidden-phone"> '.$row['order_name'].'</td>
                                  <td>'.$row['pages'].' </td>
                                  <td><span class="label label-info label-mini">Completed</span></td>
                                  <td>
                                      <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                      <!-- <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                      <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button> -->
                                  </td>
                              </tr>
                              ';
                              ?>
                              </tbody>
                          </table>
                          </section>
                      </div><!-- /content-panel -->
                  </div><!-- /col-lg-12 -->
              </div><!-- /row -->

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
     
     
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="..\..\assets/js/jquery.js"></script>
    <script src="..\..\assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="..\..\assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="..\..\assets/js/jquery.scrollTo.min.js"></script>
    <script src="..\..\assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="..\..\assets/js/common-scripts.js"></script>

    <!--script for this page-->
    

  </body>
</html>
<?php
}
?>