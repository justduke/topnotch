<?php 
                                             require"..\php/conn.php";

                                             $sq="select m.o_id,m.u_id,m.message from messages m join orders o on m.o_id=o.o_id join users u on m.u_id=u.u_id where m.o_id=$_GET[o_id]";
                                             $res= $conn->query($sq);
                                            // $row= $res->fetch_assoc();
                                            while($row= $res->fetch_assoc()){
                                            echo'
                                            <span>'.$row['date_created'].'</span>
                                            <span>'.$row['message'].'</span>
                                            ';
                                            }
                                            ?>