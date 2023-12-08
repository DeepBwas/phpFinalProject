<div class="wrapper mb-5">
        <div class="container-fluid">
            <div class="row  justify-content-center">
                <div class="col-md-8">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Registered Users</h2>
                        <a href="sign.php?register=true" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Create New Account</a>
                    </div>
                    <?php
                    $sql = "SELECT * FROM gitsocialusers";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<div class="table-responsive">';
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Action</th>";
                                        echo "<th>#</th>";
                                        echo "<th>Username</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Password</th>";                                    
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>";
                                            echo '<a href="update.php?id='. $row['id'] .'" class="me-5" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['password'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            echo '</div>';
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>        
        </div>
    </div>