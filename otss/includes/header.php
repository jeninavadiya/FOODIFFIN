<div class="container">
        </div>
            <div class="menu-bar">
            <div class="container">
                <div class="top-menu">
                    <ul>
                        <a href="index.php"> <img src="/images/logo.png"  height="150" width="250"  alt="logo"> </a>

                        <li class="active"><a href="index.php">Home</a></li>|
                        <li><a href="about-us.php">about</a></li>|
                        <li><a href="contact-us.php">contact</a></li>|
                        
                        <?php if (strlen($_SESSION['otssuid']!=0)) {?> <li><a href="my-order.php">My Order</a></li>|<?php } ?>
                        <?php if (strlen($_SESSION['otssuid']==0)) {?><li><a href="admin/login.php">admin</a></li><?php } ?>|
                        <?php if (strlen($_SESSION['otssuid']==0)) {?>
                        <li><a href="login.php">Login</a>  </li> |
                        <li><a href="register.php">Register</a> </li> |
                        <?php } ?>
                        <?php if (strlen($_SESSION['otssuid']!=0)) {?>
                            <li><a href="myprofile.php">My Profile</a>  </li> |
                            <li><a href="change-password.php">Setting</a> </li> |
                            <li><a href="logout.php">Logout</a> </li> |<?php } ?>
                        <div class="clearfix"></div>
                    </ul>
                </div>
                
               

                <div class="clearfix"></div>
            </div>
        </div>