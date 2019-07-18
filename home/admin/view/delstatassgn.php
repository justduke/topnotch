<?php
                        require"..\php/conn.php";


                       // sql to delete a record
                        $sql = "DELETE from assigned where status = 0";
                        $res =$conn->query($sql);
                        // $row =$res->fetch_assoc();

                        if ($res === TRUE) {
                            echo '<script>alert("Reset successful");</script>';

                            echo '<script>
                            setTimeout(() => {
                                window.location="../"
                            }, 100);
                        </script>';
                    
                        } else {
                            echo "Error deleting Qued: " . $conn->error;
                        }
                        
                        
                        $conn->close();
                        ?>


