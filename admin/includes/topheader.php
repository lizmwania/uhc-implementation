<?php 

include_once '../config/core.php';

?>
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo"><span>UHC<span>NEWS</span></span><i class="mdi mdi-layers"></i></a>
                    <!-- Image logo -->
                    <!--<a href="index.html" class="logo">-->
                        <!--<span>-->
                            <!--<img src="assets/images/logo.png" alt="" height="30">-->
                        <!--</span>-->
                        <!--<i>-->
                            <!--<img src="assets/images/logo_sm.png" alt="" height="28">-->
                        <!--</i>-->
                    <!--</a>-->
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">

                        <!-- Navbar-left -->
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <button class="button-menu-mobile open-left waves-effect">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
                     
                    
                        </ul>

                        <!-- Right(Notification) -->
                        

                                <ul class="nav navbar-nav navbar-right">
                <li>   
                    
                <a href="#" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" role="button" aria-expanded="false">
                                  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        &nbsp;&nbsp;<?php echo $_SESSION['firstname']; ?>
                        &nbsp;&nbsp;<span class="caret"></span>
                    </a>
                    
                    <ul class="dropdown-menu" role="menu">
                        <!-- log out user -->
                        <li><a href="<?php echo $home_url; ?>/objects/logout.php">Logout</a></li>
                    </ul>
                    
                </li>
            </ul> <!-- end navbar-right -->

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>