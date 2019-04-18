<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li>
                    <a href="../index.php"><i class=""></i> Home</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 

                        <?php 

                            if($_SESSION['admin_name']) {
                                echo $_SESSION['admin_name'];
                            }

                         ?>

                     <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="members.php"><i class="fa fa-group"></i> Members</a>
                    </li>

                    <li>
                        <a href="yourbill.php"><i class="fa fa-file-text-o"></i> Generate Bill</a>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-user"></i> Admin <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="admin.php">All Admins</a>
                            </li>
                            <li>
                                <a href="admin.php?source=add_admin">Add Admins</a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-calendar"></i> Events <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo3" class="collapse">
                            <li>
                                <a href="event.php">All Events</a>
                            </li>
                            <li>
                                <a href="event.php?source=add_event">Add Event</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo4"><i class="fa fa-picture-o"></i> Gallery <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo4" class="collapse">
                            <li>
                                <a href="gallery.php">All Photos</a>
                            </li>
                            <li>
                                <a href="gallery.php?source=add_photo">Add Photos</a>
                            </li>
                        </ul>
                    </li>



                    <li class="">
                        <a href="notice.php"><i class="fa fa-file" aria-hidden="true"></i> Notices</a>
                    </li>
                     
                    <li class="">
                        <a href="complaint.php"><i class="fa fa-comment" aria-hidden="true"></i> Complaints</a>
                    </li>
                     
                     <li class="">
                        <a href="allbills.php"><i class="fa fa-files-o" aria-hidden="true"></i> All Bills</a>
                    </li>
                     
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>