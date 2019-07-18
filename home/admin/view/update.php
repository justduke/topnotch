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
          	<h3><i class="fa fa-angle-right"></i> Update Order details</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="modal-body">
                         
                  <?php
                        require"..\php/conn.php";

                        $sql ="select * from orders where o_id=$_GET[id]";

                        $results =$conn->query($sql);

                        if($results->num_rows>0){


                            while($row=$results->fetch_assoc()){


                           echo'         


                    <div class="row mt">
                     <div class="col-md-12">
                      <div class="content-panel">

                             <form class="form-horizontal tasi-form" method="post" action="">
                             
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="o_name" value="'.$row[order_name].'">
                              </div>
                            
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="o_title" value=" '.$row[order_title].'">
                              </div>
                                
                              <div class="col-sm-10">
                                  <textarea rows="5" cols="50" type="text-area" class="form-control" name="o_details" value="'.$row[order_details].'">'.$row[order_details].'</textarea>
                              </div>
                              
                              
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="level" value="'.$row[level].'">
                              </div>
                             

                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="pages" value="'.$row[pages].'">
                              </div>
                              
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="format" value="'.$row[format].'">
                              </div>
                              <br>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="attachment" value="'.$row[attachment].'">
                              </div>
                              <br>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="deadline" value="'.$row[deadline].'">
                              </div>
                                    <br>
                                    <br>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="service" value="'.$row[service].'">
                              </div>
                                    <br>
                                    <br>
                             
                             <div class="modal-footer">
                             
                           </div>
                             
                              <div class="modal-footer">
                              
                                <input class="btn btn-success" type="submit" name="submit" value="Update Order">
                            </div>
                          </form>
                         
                        
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

              <!-- add users/editors and orders -->
             
                

              <!-- end add orders/editors/users -->

                              <!-- panel order details -->
                            </div>
                  


          		</div>
          	</div>
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
                                
      <!--main content end-->

      ';}

    }
      ?>

  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="..\..\assets/js/jquery.js"></script>
    <script src="..\..\assets/js/bootstrap.min.js"></script>
    <script src="..\..\assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="..\..\/js/jquery.ui.touch-punch.min.js"></script>
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
