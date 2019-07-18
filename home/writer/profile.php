
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
    
    //   $q = "select * from users where u_name= $user_name";
    //   $rest = $conn->query($q);
    //   $rw = mysqli_num_rows($rest);
    
    //   if ($rw == true){
          
    //       $_SESSION['sess_id'] = $row['u_id']; 
    //   }
    
    ?>

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          <h3><i class="fa"></i> My Profile</h3>
              <!-- page start-->
              <div class="tab-pane" id="chartjs">
                  <div class="row mt">
                      <div class="col-lg-6">
                          <div class="content-panel">
							  <h4><i class="fa fa-angle-right"></i> Personal </h4>
                              <div class="panel-body text-left">
                                  <div id="doughnut" height="300" width="400">
                                  <?php
                                  require'php/conn.php';
                                  
                                  $ress= $conn->query("select * from users where u_id=$_SESSION[sess_id]");
                                  ; 

                                   while($row= $ress->fetch_assoc()){
                                    echo'
                                    <div style="padding-left:5px;" class="row">
                                        <span><span style="color:black;">Name:</span> '.$row['f_name'].' '.$row['l_name'].'</span><br><br>
                                        <span><span style="color:black;">User ID:</span>  '.$row['u_id'].'</span><br><br>
                                        <span><span style="color:black;">User Name:</span>  '.$row['u_name'].'</span><br><br>
                                        <span><span style="color:black;">Email:</span>  '.$row['email'].'</span><br><br>
                                        <span><span style="color:black;">User Phone:</span>  '.$row['phone'].'</span><br><br>

                                    </div>
                                    ';
                                   }

                                  ?>  

                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="content-panel">
							  <h4><i class="fa fa-angle-right"></i> Progress</h4>
                              <div class="panel-body text-center">
                                  <div id="line" height="300" width="400">
                                    <?php
                                        require'php/conn.php';

                                        $res=$conn->query("select p.u_id,p.status,o.o_id,p.o_id,o.payment,u.u_id from order_prog p join users u on p.u_id=u.u_id join orders o on o.o_id=p.o_id where p.status=5 and o.payment= 2 ");
                                        echo $res;
                                        $row=$res->fetch_array();
                                        echo $conn->error;

                                        echo'Paid Orders: #', $row[0];
                                    ?>


                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                 
                
              </div>
              <!-- page end-->
          </section>          
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->


   
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
