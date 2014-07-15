<body class="login-background">

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12 center login-header">
                <!-- <h2 style="color:#2980B9">Welcome to Makeanoffer App</h2> -->
                <a href="http://makeanofferapp.com" title="MakeAnOffer.com" data-rel="tooltip"> <img src="<?php print _MEDIA_URL ?>img/MaOLogo.png"></a>
            </div><!--/span-->
        </div><!--/row-->

        <div class="row-fluid">
            <div class="well span7 center login-box">
                <div class="center">
                    <p class="lead"><i class="icon-user icon-light icon-1x"></i> Need new <span>MaO</span> password?</p>
                </div>
                <?php if ($error or $greetings): ?>
                    <div class="row-fluid ">
                        <?php include 'messages.php'; ?>
                    </div>
                <?php else: ?>
                    <div class="center">
                        <div class="alert alert-info">Please enter your email address. You will receive a link to create a new password via email.</div>
                    </div>
                <?php endif; ?>

                <form class="form-horizontal" style="margin:0" action="" method="post">
                    <fieldset>
                        <div class="span12 center input_login" title="Username" data-rel="tooltip">
                           <!-- <span class="add-on"><i class="icon-user"></i></span> -->
                            <input style="height:40px" autofocus placeholder="Registered E-mail" class="input-large span12" name="user_email" id="username" type="email" value="" required  />
                        </div>
                        <div class="clearfix"></div>
                        <div class="row-fluid">
                            <div class="span12 login-links">

                                <div class="section">
                                    <button style="float:none" class="btn-block btn-custom" name="btnLogin" type="submit">Get New Password</button>
                                </div>
                            </div>
                        </div><!--/row-->
                    </fieldset>

                </form>

            </div><!--/span-->
        </div><!--/row-->

    </div><!--/container-fluid-->
