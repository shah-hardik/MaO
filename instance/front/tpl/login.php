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

        <?php if ($error): ?>
            <div class="alert alert-error">
                <strong>Error!</strong>&nbsp;&nbsp;<?php print $error; ?>
            </div>
        <?php else: ?>
            <div class="center">
              <p class="lead"><i class="icon-user icon-light icon-1x"></i> Sign in to your <span>MaO</span> account</p>
            </div>
            <div class="center">
                <div class="alert alert-info">Please login with your Email and Password.</div>
            </div>
        <?php endif; ?>


        <form class="form-horizontal" style="margin:0" action="<?php print l('login'); ?>" method="post">
            <fieldset>
                <div class="span12 center input_login" title="Username" data-rel="tooltip">
                   <!-- <span class="add-on"><i class="icon-user"></i></span> -->
                    <input style="height:40px"  autocomplete = "off"  placeholder="E-mail Address/Username" class="input-large span12" name="username" id="username" type="text" value="" required  />
                </div>
                <div class="clearfix"></div>

                <div class="span12 center input_login" title="Password" data-rel="tooltip">
                  <!--  <span class="add-on"><i class="icon-lock"></i></span> -->
                    <input style="height:40px"  autocomplete = "off"  placeholder="Password" class="input-large span12" name="password" id="password" type="password" value=""  required/>
                </div>

                <div class="clearfix"></div>
                <div class="row-fluid">
                    <div class="span12 login-links">
                                 <div class="span6 forgot_pass">
                                        <div class="span9"><a href="<?php print _U ?>forgot_password">Forgot password!</a> &rarr;</div>
                                 </div>
                                <div class="span6 section">
                                    <i class="icon-unlock-alt icon-light icon-2x" style="color:#35B5EB; position: relative; top: 10px;"></i>       <button type="submit"  name="btnLogin" class="btn-custom">Sign Me In</button>
                                </div>
                    </div>
                </div><!--/row-->
            </fieldset>

        </form>

    </div><!--/span-->

    <div class="row-fluid">
    <div class="span12 center need_account"><a href="http://application.makeanofferapp.com/register?email=">Need Account? Sign up</a></div>
    </div>




</div><!--/row-->

</div><!--/container-fluid-->
