<?php
    $url = $_SERVER['REQUEST_URI'];    
    $url = explode('/', $url);
    $crtlName = $url[2];
    $methodName = $url[3];
    // echo $crtlName;
?>

<div class="app-main">
    <div class="app-sidebar sidebar-shadow">
        <div class="app-header__logo">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>

        <div class="scrollbar-sidebar">
            <div class="app-sidebar__inner">

                <div class="profilePicture">
                    <a href="<?php echo BASE_URL;?>/Profile/home"> 

                    <?php 
                        if (!isset($_SESSION['profileImage'])) { ?>
                                <img width="100%" src="<?php echo BASE_URL; ?>/images/profile/<?php echo $_SESSION['userData']['profile_pic']; ?>" alt="profile picture">   
                            <?php                         
                            
                        }else{ ?>
                                <img width="100%" src="<?php echo BASE_URL; ?>/images/profile/<?php echo $_SESSION['profileImage']; ?>" alt="profile picture">
                            <?php
                        }
                    ?>
                        <!-- <img src="https://cdn.iconscout.com/icon/free/png-256/boy-avatar-4-1129037.png" alt=""> -->
                    </a>                    
                </div>
                <div class="text-center mb-4 mt-3">                    
                    <h4> 
                        <b> 
                            <?php 
                                if (!isset($_SESSION['userName'])) { ?>
                                        <?php $user = $_SESSION['userData']; echo $user['name']; ?> 
                                    <?php                         
                                    
                                }else{ ?>
                                    <?php echo $_SESSION['userName']; ?>
                                    <?php
                                }
                            ?>                    
                        </b> <br>
                    </h4>
                    <h6>
                        <i> <?php $user = $_SESSION['userData']; echo $user['role_name']; ?> </i> 
                    </h6>                    
                </div>

                <ul class="vertical-nav-menu">
                    <li class="app-sidebar__heading"> Dashboard </li>
                    <li>
                        <a href="<?php echo BASE_URL;?>/Dashboard/home" class="<?php if ($crtlName=="Dashboard") {echo "mm-active"; } else  {echo "no-active";}?>">
                            <i class="metismenu-icon fas fa-chart-bar"></i>                            
                            Store Analysis
                        </a>
                    </li>

                    <li class="app-sidebar__heading"> Categories </li>

                    <li class="<?php if ($methodName =="update" || $methodName =="view") {echo "mm-active"; } else  {echo "no-active";}?>">
                        <a href="#">
                            <i class="metismenu-icon fa fa-plus-circle"></i>
                                Add Section
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="<?php echo BASE_URL;?>/Category/view" class="<?php if ($crtlName=="Category" || $methodName =="catEdit") {echo "mm-active"; } else  {echo "no-active";}?>">
                                    <i class="fa fa-cart-plus"> Product </i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL;?>/Area/view" class="<?php if ($crtlName=="Area") {echo "mm-active"; } else  {echo "no-active";}?>">
                                    <i class="fa fa-map-signs"> Market </i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL;?>/Outlet/view" class="<?php if ($crtlName=="Outlet") {echo "mm-active"; } else  {echo "no-active";}?>">
                                    <i class="fa fa-database"> Outlet </i>                                    
                                </a>
                            </li>                            
                        </ul>
                    </li>

                    <li>
                        <a href="<?php echo BASE_URL;?>/Store/home" class="<?php if ($crtlName=="Store") {echo "mm-active"; } else  {echo "no-active";}?>">
                            <i class="metismenu-icon fas fa-store"></i>
                            Store 
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo BASE_URL;?>/Sales/home" class="<?php if ($crtlName=="Sales") {echo "mm-active"; } else  {echo "no-active";}?>">
                            <i class="metismenu-icon pe-7s-note"></i>
                            Sell
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo BASE_URL;?>/Damage/home" class="<?php if ($crtlName=="Damage") {echo "mm-active"; } else  {echo "no-active";}?>">
                            <i class="metismenu-icon fa fa-bug"></i>
                            Return/Damage
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo BASE_URL;?>/Account/home" class="<?php if ($crtlName=="Account") {echo "mm-active"; } else  {echo "no-active";}?>">
                            <i class="metismenu-icon fas fa-chart-line"></i>
                            Report
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo BASE_URL;?>/Index/users" class="<?php if ($methodName =="users" || $methodName =="edit") {echo "mm-active"; } else  {echo "no-active";}?>">
                            <i class="metismenu-icon fas fa-user-circle"></i>
                            Users
                        </a>
                    </li>
                </ul>
                
            </div>
        </div>


        <!-- for scroll sidebar -->
        <div class="scroll-area-sm">
            <div class="scrollbar-container">
                <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">

                </ul>
            </div>
        </div>

    </div>
    <div class="app-main__outer">
        <div class="app-main__inner">
