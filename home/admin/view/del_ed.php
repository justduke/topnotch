<?php
                        require"..\php/conn.php";


                       // sql to delete a record
                        $sql = "DELETE from editors where e_id=$_GET[user]";
                        $res =$conn->query($sql);
                        // $row =$res->fetch_assoc();

                        if ($res === TRUE) {
                            echo '<script>alert("User deleted successfully");</script>';

                        //     echo '<script>
                        //     setTimeout(() => {
                        //         window.location="../"
                        //     }, 100);
                        // </script>';
                        header("location:../view/editors.php");
                    
                        } else {
                            echo "Error deleting record: " . $conn->error;
                        }
                        
                        
                        $conn->close();
                        ?>


