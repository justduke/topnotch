  <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.php"><img src="..\assets/img/ui.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered user" > <?php echo $user_name; ?></h5>
              	  	
                  <li class="mt">
                      <a class="active" href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Invoice</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="invoice/invoice.php">To be paid</a></li>
                          <!-- <li><a  href="invoice/cleared_invoice.php">Cleared Invoice</a></li> -->
                      </ul>
                  </li>
                  
                  <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa fa-th"></i>
                        <span>Others</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="cancelled/cancelled_orders.php">Cancelled Orders</a></li>
                        <li><a  href="order_message.php">Order Messages</a></li>
                    </ul>
                </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->