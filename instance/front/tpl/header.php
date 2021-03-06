<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <title>Make An Offer App | <?php print _cg("page_title"); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <!-- The styles -->
        <link id="bs-css" href="<?php print _MEDIA_URL ?>css/bootstrap-cerulean.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-bottom: 40px;
            }
            .sidebar-nav {
                padding: 9px 0;
            }
        </style>
        <link href="<?php print _MEDIA_URL ?>css/bootstrap-responsive.css" rel="stylesheet">
        <link href="<?php print _MEDIA_URL ?>css/charisma-app.css" rel="stylesheet">
        <link href="<?php print _MEDIA_URL ?>css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
        <link href='<?php print _MEDIA_URL ?>css/fullcalendar.css' rel='stylesheet'>
        <link href='<?php print _MEDIA_URL ?>css/fullcalendar.print.css' rel='stylesheet'  media='print'>
        <link href='<?php print _MEDIA_URL ?>css/chosen.css' rel='stylesheet'>
        <link href='<?php print _MEDIA_URL ?>css/uniform.default.css' rel='stylesheet'>
        <link href='<?php print _MEDIA_URL ?>css/colorbox.css' rel='stylesheet'>
        <link href='<?php print _MEDIA_URL ?>css/jquery.cleditor.css' rel='stylesheet'>
        <link href='<?php print _MEDIA_URL ?>css/jquery.noty.css' rel='stylesheet'>
        <link href='<?php print _MEDIA_URL ?>css/noty_theme_default.css' rel='stylesheet'>
        <link href='<?php print _MEDIA_URL ?>css/elfinder.min.css' rel='stylesheet'>
        <link href='<?php print _MEDIA_URL ?>css/elfinder.theme.css' rel='stylesheet'>
        <link href='<?php print _MEDIA_URL ?>css/jquery.iphone.toggle.css' rel='stylesheet'>
        <link href='<?php print _MEDIA_URL ?>css/opa-icons.css' rel='stylesheet'>
        <link href='<?php print _MEDIA_URL ?>css/uploadify.css' rel='stylesheet'>
        <link href='<?php print _MEDIA_URL ?>css/style.css' rel='stylesheet'>



        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- The fav icon -->
        <link rel="shortcut icon" href="<?php print _MEDIA_URL ?>img/favicon.ico">

        <?php if (_cg('url') == "home"): ?>
            <?php include "chartLibScript.php"; ?>
        <?php endif; ?>

    </head>

    <body>
        <?php
        include "widgetOffWarning.php";
        ?>
        <?php if (!isset($no_visible_elements) || !$no_visible_elements) { ?>
            <!-- topbar starts -->
            <div id="navigation" class="navbar">

                <div class="container-fluid">

                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand"  href="<?php print _U ?>home">Make An Offer App</a>
                    <a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a>
                    <ul class='main-nav'>
                        <li class='active'>
                            <a href="<?php print _U ?>home">
                                <i class="icon-home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a class="pro_link" href="http://makeanofferapp.com/pricing/" target="_blank">
                                <i class="icon-home"></i>
                                <span>Go For </span><span style="color: orange; font-weight: bold"> PRO </span><span> Version</span>
                            </a>
                        </li>
                    </ul>
                    <?php
                    $mob_current_page = 'class="mob_current"';
                    ?>
                    <ul class="mob-nav pull-left">
                        <li <?php if ($_SERVER['REQUEST_URI'] == "/manage_app/home") print $mob_current_page; ?> >
                            <a href="<?php print _U ?>home" rel="tooltip" data-placement="bottom" title="Dashboard">
                                <i class="icon-dashboard"></i>
                            </a>
                        </li>
                        <li <?php if ($_SERVER['REQUEST_URI'] == "/manage_app/apidetails") print $mob_current_page; ?> >
                            <a href="<?php print _U ?>apidetails" rel="tooltip" data-placement="bottom" title="API">
                                <i class="icon-link"></i>
                            </a>
                        </li>
                        <li <?php if ($_SERVER['REQUEST_URI'] == "/manage_app/products") print $mob_current_page; ?>>
                            <a href="<?php print _U ?>products" rel="tooltip" data-placement="bottom" title="Import Products">
                                <i class="icon-tag"></i>
                            </a>
                        </li>
                        <!--<li <?php if ($_SERVER['REQUEST_URI'] == "/manage_app/customizations") print $mob_current_page; ?>>
                            <a href="<?php print _U ?>customizations" rel="tooltip" data-placement="bottom" title="Customisation">
                                <i class="icon-wrench"></i>
                            </a>
                        </li>-->
                    </ul>
                    <!-- user dropdown starts -->
                              <div  class=" pull-right">
                    
                    <div class="btn-group pull-right" >
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user"></i><span class="hidden-phone"> My Account</span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">

                            <?php if (isset($_SESSION['user']['user_type']) && (($_SESSION['user']['user_type'] == 'admin') or ($_SESSION['user']['user_type'] == 'customer'))) { ?>
                                                                                                                                                                                                                                        <!--    <li><a href="<?php l('profile') ?>">Profile</a></li>
                                                                                                                                                                                                                                                <li class="divider"></li>-->
                                <li><a href="<?php print _U ?>profile"><i class="icon-adjust"></i> Profile</a></li>
                                <li><a href="<?php print _U ?>?logout=1"><i class="icon-signout"></i> Logout</a></li>
                            <?php } else { ?>
                                <li><a href="<?php l('login') ?>"><i class="icon-signin"></i> Login</a></li>                                    
                            <?php } ?>
                        </ul>
                    </div>
                        <div class="btn-group pull-right" style="padding-top: 10px">
                            <span class="hidden-phone" >Hi, <?php print $_SESSION['user']['c_first_name'];?></span>
                    </div>
                    </div>
                    <!-- user dropdown ends -->


                </div>

            </div>
            <!-- topbar ends -->
        <?php } ?>
        <div id="content" class="container-fluid" >

            <?php if ((!isset($no_visible_elements) || !$no_visible_elements) ) { ?>
                <div id="left">
                    <form action="#" method="GET" class='search-form'>
                        <div class="search-pane">
                            <input type="text" name="search" placeholder="Search here...">
                            <button type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                    <div class="subnav">

                        <ul>



                            <?php if (!isset($_SESSION['user']['user_type'])) { ?>
                                <li class="mainNavParent nav-header hidden-tablet pointer" ><a href="<?php print _U ?>">Login</a></li>
                            <?php } ?>
                            <?php if (isset($_SESSION['user']['user_type']) && ($_SESSION['user']['user_type'] == 'customer')) { ?>
                                <?php
                                $current_class = " current";
                                ?>

								<?php if($_SESSION['user']['c_affiliate_user']):?>
									<li class="mainNav<?php if ($_SERVER['REQUEST_URI'] == "/mao_alpha/home") print $current_class; ?>"><i class="icon-dashboard"></i><a href="<?php print _U ?>fromBC"><span class="hidden-tablet">Tracked Users</span></a></li>
								<?php else:?>
								
								
                                <li class="mainNav<?php if ($_SERVER['REQUEST_URI'] == "/mao_alpha/home") print $current_class; ?>"><i class="icon-dashboard"></i><a href="<?php print _U ?>home"><span class="hidden-tablet">Dashboard</span></a></li>
                                <li class="mainNav<?php if ($_SERVER['REQUEST_URI'] == "/mao_alpha/apidetails") print $current_class; ?>"><i class="icon-link"></i><a class="ajax-link" href="<?php print _U ?>apidetails"><span class="hidden-tablet">API Detail</span></a></li>
                                <li class="mainNav<?php if ($_SERVER['REQUEST_URI'] == "/mao_alpha/import") print $current_class; ?>"><i class="icon-link"></i><a class="ajax-link" href="<?php print _U ?>import"><span class="hidden-tablet">Import</span></a></li>
                                <!--<li class="mainNav<?php if ($_SERVER['REQUEST_URI'] == "/mao_alpha/import") print $current_class; ?>"><i class="icon-link"></i><a class="ajax-link" href="<?php print _U ?>import_product?autoStart=1#"><span class="hidden-tablet">Import</span></a></li>-->
                                <li class="mainNav<?php if ($_SERVER['REQUEST_URI'] == "/mao_alpha/customizations") print $current_class; ?>"><i class="icon-wrench"></i><a class="ajax-link" href="<?php print _U ?>customizations"><span class="hidden-tablet">Customization</span></a></li>
                                <li class="mainNav<?php if ($_SERVER['REQUEST_URI'] == "/mao_alpha/category") print $current_class; ?>"><i class="icon-flag "></i><a class="ajax-link" href="<?php print _U ?>category"><span class="hidden-tablet">Category</span></a></li>
                                <li class="mainNav<?php if ($_SERVER['REQUEST_URI'] == "/mao_alpha/products") print $current_class; ?>"><i class="icon-tag"></i><a class="ajax-link" href="<?php print _U ?>products"><span class="hidden-tablet">Products</span></a></li>
                                <li class="mainNav<?php if ($_SERVER['REQUEST_URI'] == "/mao_alpha/get_code") print $current_class; ?>"><i class="icon-code"></i><a class="ajax-link" href="<?php print _U ?>get_code"><span class="hidden-tablet">Embed Code</span></a></li>
                                <li class="mainNav "><i class="icon-ticket"></i><span class="hidden-tablet"><a target="_blank" href="http://support.makeanofferapp.com/support/home">Contact Support</a></span></li>
                                <li class="mainNav<?php if ($_SERVER['REQUEST_URI'] == "/mao_alpha/onoff") print $current_class; ?>"><i class="icon-off"></i><span class="hidden-tablet"><a href="<?php print _U ?>onoff" style="color:#FF6600">Turn Off MaO</a></span></li>
                            <?php endif;?>
							<?php } ?>


                        </ul>
                    </div>

                </div>

                <noscript>
                <div class="alert alert-block span10">
                    <h4 class="alert-heading">Warning!</h4>
                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
                </div>
                </noscript>

                <div id="main">
                    <div class="container-fluid">
                        
						<?php if(!$_SESSION['user']['c_affiliate_user']):?>
						<div class="page-header">
                            <div class="pull-left">
                                <div class="image pull-left">
                                    <img src="<?php print _MEDIA_URL ?>img/MaOLogo_boy.png" width="70%">
                                </div>
                                <?php if ($_SERVER['REQUEST_URI'] == "/mao_alpha/home") $Heading = "Home"; ?>
                                <?php if ($_SERVER['REQUEST_URI'] == "/mao_alpha/apidetails") $Heading = "Set Up Server Information"; ?>
                                <?php if ($_SERVER['REQUEST_URI'] == "/mao_alpha/products") $Heading = "Import Products "; ?>
                                <?php if ($_SERVER['REQUEST_URI'] == "/mao_alpha/customizations") $Heading = "Button Customization"; ?>
                                <h1 class="pull-left"> <?php echo $Heading; ?></h1>
                            </div>
                            <div class="pull-right">
								
                                <ul class="stats" >
                                    <li class="blue">
                                        <i class="icon-phone-sign"></i>
                                        <div class="details">
                                            <span class="big">(877) 583-1187</span>
                                            <span>Support</span>
                                        </div>
                                    </li>
                                    <li class='orange'>
                                        <i class="icon-calendar"></i>
                                        <div class="details">
                                            <span class="big"><?php
                            date_default_timezone_set('America/Chicago');
                            $date = date('m/d/Y h:i:s a', time());
                            echo date('F jS, Y');
                                ?></span>
                                            <span><?php echo date('l h:i '); ?></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
						<?php else:?>
						<div style="margin-top:20px">
						</div>
						<?php endif;?>
						
						
                        <!-- content starts -->
                    <?php } ?>


