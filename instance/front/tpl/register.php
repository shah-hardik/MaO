<body class="login-background">

    <div class="container-fluid">
        <div class="row-fluid">
            <div class=" center ">
                <!-- <h2 style="color:#2980B9">Welcome to Makeanoffer App</h2> -->
                <a href="http://makeanofferapp.com" title="MakeAnOffer.com" data-rel="tooltip"> <img src="<?php print _MEDIA_URL ?>img/MaOLogo.png"></a>
            </div><!--/span-->
        </div><!--/row-->

        <div class="row-fluid">
            <div class="well span6   center ">
                <h2 style="color:#2980B9">  Already registered?  <a href="http://application.makeanofferapp.com/" style="color:red;text-decoration: underline"> Log In</a>

</h2> 
                <h1 class="alert alert-info" style="color: #ffc14a">Now, Lets create your profile!</h1>
                <?php if ($error): ?>
                    <div class="alert alert-error">
                        <strong>Error!</strong>&nbsp;&nbsp;<?php print $error; ?>
                    </div>
                <?php else: ?>


                <?php endif; ?>


                <form class="form-horizontal" style="margin:0" action="" method="post">
                    <fieldset>
                        <div class="clearfix"></div>
                        <label class="input-large span4" style="height:40px;color: #000000;margin-top: 25px"><b>First Name</b></label>
                        <div class="span12 center input_login" style="margin-top: 10px" title="First Name" data-rel="tooltip">

                            <input style="height:40px"  placeholder="First Name" class="input-large span8" name="fname" id="fname" type="text" value="" required  />
                        </div>
                        <div class="clearfix"></div>

                        <label class="input-large span4" style="height:40px;color: #000000;margin-top: 17px"><b>Last Name</b></label>
                        <div class="span12 center input_login" style="" title="Last Name" data-rel="tooltip">

                            <input style="height:40px" autocomplete = "off"  placeholder="Last Name" class="input-large  span8" name=lname" id="lname" type="text" value="" required  />
                        </div>
                       
                        <div class="clearfix"></div>
                        <label class="input-large span4" style="height:40px;color: #000000;margin-top: 17px"><b>Password</b></label>

                        <div class="span12 center input_login" title="Password" data-rel="tooltip">

                            <input style="height:40px" autocomplete = "off" placeholder=" Password "  class="input-large span8"  onblur ="checkPassword();"  name="_password" id="_password" type="password" value=""  required/>
                        </div>
                        <div id="error_pass" style="display: none;color: crimson "> Please Enter Password!...</div><br>

                        <div class="clearfix"></div>
                        <label class="input-large span4" style="height:40px;color: #000000;margin-top: 17px"><b>Confirm Password</b></label>

                        <div class="span12 center input_login" title="Confirm Password" data-rel="tooltip">

                            <input style="height:40px" placeholder="Confirm Password"   onblur ="checkConfirmPassword();" class="input-large span8" name="c_password" id="c_password" type="password" value=""  required/>
                        </div>
                        <div id="error_cpass" style="display: none;color: crimson "> Please Enter Confirm  Password!...</div>
                        <div id="error" style="display: none;color: crimson "> Please Enter Both Password Same!...</div>
                        <div class="clearfix"></div>
                        <label class="input-large span4" style="height:40px;color: #000000;margin-top: 17px"><b>Email</b></label>

                        <div class="span12 center input_login" title="Email" data-rel="tooltip">

                            <input style="height:40px" placeholder="Email" class="input-large span8" name="email" id="email" type="email" value="<?php print $_REQUEST['email']?>"  required/>
                        </div>

                        <div class="clearfix"></div>

                        <!--                        <div class="clearfix"></div>
                                                <label class="input-large span4" style="height:40px;color: #000000;margin-top: 17px"><b>Select Gender</b></label>
                        
                                                <div class="span12 center input_login" title="Gender" data-rel="tooltip">
                                                    <select style="height:40px" placeholder="Gender" class="input-large span8" name="gender" id="gender" required >
                                                        <option value="">Select Gender</option>
                                                        <option value="male">Male</option>
                        
                                                        <option value="female">Female</option>
                        
                                                    </select>
                        
                                                </div>
                                                <div class="clearfix"></div>
                                                <label class="input-large span4" style="height:40px;color: #000000;margin-top: 17px"><b>Birth Date</b></label>
                        
                                                <div class="span12 center input_login" title="Birth Date" data-rel="tooltip">
                        
                                                    <input style="height:40px" placeholder="Birth Date" class="input-large span8" name="birthdate" id="birthdate" type="number" value=""  />
                                                </div>
                                                <div class="clearfix"></div>
                                                <label class="input-large span4" style="height:40px;color: #000000;margin-top: 17px"><b>Contact Number</b></label>
                        
                                                <div class="span12 center input_login" title="Contact Number" data-rel="tooltip">
                        
                                                    <input style="height:40px" placeholder="Contact Number" class="input-large span8" name="contact_number" id="contact_number" type="number" value=""  />
                                                </div>
                                                <div class="clearfix"></div>-->
                        <div class="row-fluid">
                            <div class="span12 center login-links">

                                <div class="center">
                                    <button type="submit"  name="btnLogin" class="btn-success btn-large ">Create Profile</button>&nbsp;&nbsp;
                                       <button type="reset"  name="btnLogin" class="btn-success btn-large ">Reset</button>
                                </div>
                            </div>
                        </div><!--/row-->
                    </fieldset>

                </form>


            </div>


        </div><!--/container-fluid-->
        <!--
        <!doctype html>
        <html lang="en">
            <head>
                <meta charset="utf-8">
        
                Page Title
                <title>Bigcommerce Offer App - Make An Offer App</title>
        
                Device Width Check
                <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
        
                Meta Keywords and Description
                <meta name="keywords" content="Bigcommerce Offer App - Make An Offer App">
                <meta name="description" content="Do you want to Make An Offer in Bigcommerce stores? Now you can make offer to different stores using MaO App.">
        
                Favicon
                <link rel="shortcut icon" href="images/favicon.ico" title="Favicon" />
        
                Fixes for Internet Explorer CSS3 and HTML5
                [if gte IE 9]>
                <style type="text/css">
                        .gradient { filter: none!important;}
                </style>
                <![endif]
        
                [if lt IE 9]>
                <script>
                  'article aside footer header nav section time'.replace(/\w+/g,function(n){document.createElement(n)})
                </script>
                <![endif]
        
                Main CSS
                <link rel="stylesheet" href="css/styles.css" media="screen, projection">
                <link href='http://fonts.googleapis.com/css?family=Lato:900|Merriweather:400,700' rel='stylesheet' type='text/css'>
        
                <style type="text/css">
        
                    #contactForm{padding-left:28px;}
                    #contactForm form{font-weight:bold;}
                    #contactForm form input{margin-bottom: 10px;
                                            padding: 6px;}
                    #contactForm form textarea{}
        
                </style>
                <script  type="text/javascript">
                    function checkPassword()
                    {
                        $("#error_pass").hide();
                        $("#error_cpass").hide();
                        $("#error").hide();
        
                        if ($("#password").val() == '')
                        {
                            $("#error_pass").show();
        
                        }
                        if ($("#c_password").val() == '')
                        {
                            $("#error_cpass").show();
        
                        }
                        if ($("#password").val() != '' && $("#c_password").val() != '') {
                            $("#error_pass").hide();
                            $("#error_cpass").hide();
        
                            if ($("#c_password").val() != $("#password").val())
                            {
                                $("#error").show();
                            }
                        }
        
                    }
                    function samePassword()
                    {
                        $("#error_pass").hide();
                        $("#error_cpass").hide();
                        $("#error").hide();
                        
                        if ($("#password").val() != '' && $("#c_password").val() != '') {
                            $("#error_pass").hide();
                            $("#error_cpass").hide();
        
                            if ($("#c_password").val() != $("#password").val())
                            {
                                $("#error").show();
                            }
                        }
        
                    }
        
                </script>
            </head>
            <body class="inpage">
                Start of Landing Page Header
                <header>
                    <nav id="navigation_elements">
                        <div class="row">
                            Start of Main Navigation
                            <div id="main_nav">
                                <div class="menu-new-main-menu-container"><ul class="menu l_tinynav1" id="menu-new-main-menu">
                                        <li class="menu-item menu-item-type-post_type menu-item-object-page page_item page-item-61 current_page_item menu-item-5856" id="menu-item-5856"><a href="/index.html">Home</a></li>
                                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5857" id="menu-item-5857"><a href="/app-features.html">App Features</a></li>
                                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5858" id="menu-item-5858"><a href="/pricing.html">Pricing</a></li>
                                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5859" id="menu-item-5859"><a href="/faq.html">F.A.Q.</a></li>
                                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5860" id="menu-item-5860"><a href="/about-us.html">About Us</a></li>
                                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5861 current-menu-item" id="menu-item-5861"><a href="/contact-us.html">Contact Us</a></li>
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6293" id="menu-item-6293"><a href="mailto:support@codetaxi.com">Support</a></li>
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5877" id="menu-item-5877"><a href="http://application.makeanofferapp.com">Login</a></li>
                                    </ul><select id="tinynav1" class="tinynav tinynav1"><option value="http://makeanofferapp.com/" selected="selected">Home</option><option value="http://makeanofferapp.com/app-features/">App Features</option><option value="http://makeanofferapp.com/pricing/">Pricing</option><option value="http://makeanofferapp.com/faq/">F.A.Q.</option><option value="http://makeanofferapp.com/about-us/">About Us</option><option>Contact Us</option><option value="mailto:support@codetaxi.com">Support</option><option value="http://application.makeanofferapp.com">Login</option></select></div>        </div>End of Main Navigation
                        </div>
                    </nav>
                    <div class="row land">
        
                        Start of Header Logo
                        <div id="logo" class="eight columns">
                            <hgroup>
                                <h1><img src="images/logo.png" alt="Make AN Offer App" title="MaO App For Bigcommerce" height="" width=""></h1>
                            </hgroup>
                        </div>
                        End of Header Logo
        
                        Start of Phone
                        End of Phone
                    </div>
                </header>
                End of Landing Page Header
        
                Start of Product Banner
                <section class="banner_media_full page_banner" role="banner" id="banner">
                    <div class="row">
                        <div id="banner_full">
                            <h1>Fill Below Registration Form!......</h1>	</div>
                    </div>
                </section>
                End of Product Banner
        
                Start of Main Content
                <article role="main">
        
        
        
                    <div id="contactForm" style="alignment-adjust:central">
        
                        <form action="registration.php" method="post" >
                            First Name:<br>
                            <input type="text" name="fname" placeholder="First Name" value="" required><br>
                            Last Name:<br>
                            <input type="text" name="lname" placeholder="last Name" value="" required><br>
                            E-mail:<br>
                            <input type="email" name="email" value="" placeholder="E-mail" required><br>
                            Password<br>
                            <input type="password"  id="password" name="password" value=""  onblur ="samePassword();"  placeholder="Password" required>
                            <div id="error_pass" style="display: none;color: crimson "> Please Enter Password!...</div><br>
        
                            Confirm Password<br>
                            <input type="password"  id="c_password"  name="c_password" value="" onblur ="checkPassword();"  placeholder="Confirm Password" required> 
                            <div id="error_cpass" style="display: none;color: crimson "> Please Enter Confirm  Password!...</div>
                            <div id="error" style="display: none;color: crimson "> Please Enter Both Password Same!...</div><br><br>
                           
        
        
                            Gender<br>
                            <input type="radio" name="gender" value="Male"/>Male  </br>
                            <input type="radio" name="gender" value="Female"/>Female<br>
                            Contact No<br>
                            <input type="text" name="contact" placeholder="Contact No" value="" required><br>
                            Address:<br>
                            <input type="text" name="address" value="" placeholder="Address" required><br>
                            Town:<br>
                            <input type="text" name="city" value="" placeholder="Town" required><br>
                            State:<br>
                            <input type="text" name="state" value="" placeholder="State" required><br>
                            Country:<br>
                            <input type="text" name="contry" value="" placeholder="Contry" required><br>
                            Pincode:<br>
                            <input type="text" name="pincode" value="" placeholder="Pincode" required><br>
                            Comment:<br>
                            <textarea name="comment" placeholder="Comment"></textarea>
                          
        
                            <input id="fsubmit" type="submit" value="Send">
                            <input type="reset" value="Reset">
                        </form>
                    </div>
        
        
                </article>
                End of Main Content
        
                Start of Landing Page Footer
                <div class="row">
                    <footer role="contentinfo">
                        <div id="page_footer">
        
        
                            Start Social Elements
                            <aside id="social_elements">
                                <ul>
                                    <li><a href="#" class="facebook" title="Facebook"><span>Facebook</span></a></li>
                                    <li><a href="#" class="googleplus" title="Google+"><span>Google+</span></a></li>
                                    <li><a href="#" class="twitter" title="Twitter"><span>Twitter</span></a></li>
                                    <li><a href="#" class="stumbleupon" title="StumbleUpon"><span>StumbleUpon</span></a></li>
                                    <li><a href="#" class="feedback" title="Feedback"><span>Feedback</span></a></li>
                                </ul>
                            </aside>
                            End Social Elements
        
                            <p>
                                &copy; Make An Offer App a Division of CodeTaxi, LLC. All Rights Reserved. <a href="http://makeanofferapp.com/?page_id=6000">Terms of Service | <a href="http://makeanofferapp.com/?page_id=6008">Terms of Use</a> | <a href="http://makeanofferapp.com/?page_id=6015">Privacy Policy<br /><br/>
                                        <span id="siteseal"><script type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=N5Js8Vm4WmtkY6lWTHXn99HfsbClSYRjmY31aPPJ3YUTppbF0F"></script></span></p>
        
        
                                        </div>
                                        </footer>
                                        </div>
                                        End of Landing Page Footer
        
                                        <a href="#" class="scrollup">Scroll up</a>
                                         Included JS Files (Compressed) 
                                        <script src="js/foundation.min.js"></script>
                                        <script src="js/phrases.js"></script>
                                        <script src="js/site.min.js"></script>
                                        <script type = "text/javascript" src ="jquery-1.10.2.js" >
        
                                        </script>
        
                                        < /body>
                                        < /html>-->

