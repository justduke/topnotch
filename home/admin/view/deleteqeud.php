<?php
                        require"..\php/conn.php";


                       // sql to delete a record
                        $sql = "DELETE from qued where o_id=$_GET[id]";
                        $res =$conn->query($sql);
                        // $row =$res->fetch_assoc();

                        if ($res === TRUE) {
                            echo '<script>alert("Order deleted successfully");</script>';

                            echo '<script>
                            setTimeout(() => {
                                window.location="../"
                            }, 100);
                        </script>';
                    
                        } else {
                            echo "Error deleting record: " . $conn->error;
                        }
                        
                        
                        $conn->close();
                        ?>


