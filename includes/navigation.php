<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Sundaram Lokprabhat</a>
            </div>
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="event.php">Events</a>
                    </li>
                    
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <li>
                        <a href="about.php">About US</a>
                    </li>
                    <li>
                        <a href="gallery.php">Gallery</a>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Complaints
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="complaint.php">Add Complaint</a></li>
                            <li><a href="check_status.php">Check Status</a></li>
                        </ul>
                    </li>



                    <li>
                        <a href="notice.php">Notice</a>
                    </li>


                    <li class="dropdown">
                        <?php 
                        if(isset($_SESSION['mem_name'])) { ?>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        
                        <?php 

                            
                                echo "Bill";
                        ?>
                          
                        <span class="caret"></span></a>
                        <?php
                          }

                         ?>
                        <ul class="dropdown-menu">
                            <li><a href="yourbill.php">New Bill</a></li>
                            <li><a href="yourreciept.php">Last Payment</a></li>
                        </ul>
                    </li>

                    
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="login.php"><b>

                        <?php 

                            if(isset($_SESSION['mem_name'])) {
                                echo $_SESSION['mem_name'];
                            }

                         ?>

                    </b></a>
                    </li>
                    <li>
                        <?php 

                            if(isset($_SESSION['mem_name'])) {
                                echo "<a href='logout.php'>Logout</a>";
                            } else {
                                echo "<a href='login.php'>Login</a>";
                            }

                         ?>

                    </li>
                    <li>
                        <a href="members.php">

                        <?php 

                            if(isset($_SESSION['mem_name'])) {
                                echo "";
                            } else {
                                echo "Sign UP";
                            }

                         ?>

                        </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>