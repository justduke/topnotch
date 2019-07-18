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
    ?>
      
     
      <?php
        require'sidebar_menu.php';
        ?>
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Responsive Table Examples</h3>
		  		<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">
                      <h4><i class="fa fa-angle-right"></i> Responsive Table</h4>
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>Code</th>
                                  <th>Company</th>
                                  <th class="numeric">Price</th>
                                  <th class="numeric">Change</th>
                                  <th class="numeric">Change %</th>
                                  <th class="numeric">Open</th>
                                  <th class="numeric">High</th>
                                  <th class="numeric">Low</th>
                                  <th class="numeric">Volume</th>
                              </tr>
                              </thead>
                              
                                  <?php 
                              require'php/conn.php';
                             $ress= $conn->query("select m.u_id,m.o_id,o.o_id,u.u_id from messages m join orders o on m.o_id=o.o_id join users u on m.u_id=u.u_id where m.status=1");      
                                  echo $conn->error;
                             $row = $ress->fetch_assoc();
                                  echo'
                                  <li>
                                  <a href=" mess.php ">
                                  <span class="subject"> '.$row['u_name'].' has a 
                                  <span class="from">'.$row['o_id'].' query</span>
                                  <span class="time"></span>
                                  </span> 
                                  </a>
                                  </li>
                                
                                  <tbody>
                              <tr>
                                  <td>AGO</td>
                                  <td>ATLAS IRON LIMITED</td>
                                  <td class="numeric">$3.17</td>
                                  <td class="numeric">-0.02</td>
                                  <td class="numeric">-0.47%</td>
                                  <td class="numeric">$3.11</td>
                                  <td class="numeric">$3.22</td>
                                  <td class="numeric">$3.10</td>
                                  <td class="numeric">5,416,303</td>
                              </tr> 
                              </tbody>';
                              ?>
                             
                          </table>
                          </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->			
		  	</div><!-- /row -->
		  	
		  
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
     
      
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="..\assets/js/jquery.js"></script>
    <script src="..\assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="..\assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="..\assets/js/jquery.scrollTo.min.js"></script>
    <script src="..\assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="..\assets/js/common-scripts.js"></script>

    <!--script for this page-->
    

  </body>
</html>
            <?php }?>