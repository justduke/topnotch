<?php
    require'conn.php';

    
?>
<form  method="post" action="inst_user.php" class="form-horizontal tasi-form">
                             
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" name="f_name" placeholder="First Name">
                                 
                             </div>
                           
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" name="l_name" placeholder="Last Name">
                                
                             </div>
                               
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" name="u_name" placeholder="User Name">
                                 
                             </div>

                             <div class="col-sm-10">
                                 <input type="email" class="form-control" name="email"placeholder="Email">
                                
                             </div>
                             
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" name="phone" placeholder="Phone No">
                                 
                             </div>

                             <div class="col-sm-10">
                                 <input type="password" class="form-control" name="pass" placeholder="User Password">
                                 
                             </div>
                             <br>
                             <div class="col-sm-10">
                                 <input type="password" class="form-control" name="c_pass" placeholder="Confirm Password">
                                 
                             </div>
                             <br>
                             
                                   <br>
                            
                               <div class="modal-footer">
                                   <button data-dismiss="modal" class="btn btn-danger" type="button">Cancel</button> 
                                   <br> <hr>
                                    <input class="btn btn-success" name="submit" type="submit" value="Create">
                               </div>
                         
                           </div>
                           
                           </form>