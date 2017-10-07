<?php
function login_check()
{
    
    if(is_user_logged_in())
    {
        // Logined
        
    }
    else
    {
        // Not login
        ?>
        <div class="modal fade" data-backdrop="static" id="User-login" data-open="" role="dialog">
            <div class="close-nav inverse" data-dismiss="modal">
			    <span></span><span></span>
			</div>
            <div class="modal-dialog">
        
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <ul class="nav nav-tabs">
                            <li class="active" data-toggle="tab" href="#login">Login</li>
                            <li data-toggle="tab" href="#register">Register</li>
                            <li data-toggle="tab" href="#forgot-password">Forgot Password</li>
                        </ul>
        
                        <div class="tab-content">
                            <div id="login" class="tab-pane fade in active">
                                <h3 class="heading">Login</h3>
                                
                                <form name="loginform" class="rk-form" id="loginform" action="<?php echo site_url(); ?>/wp-login.php" method="post">

                                    <div class="form-group">
                                        <input type="text" name="log" id="user_login" class="input form-control" value="" placeholder="Username or Email Address" size="20">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="pwd" id="user_pass" class="input form-control" value="" placeholder="Password" size="20">
                                    </div>
                                
                                    <div class="form-group">
                                        <label>
                                            <input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember Me</label>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="wp-submit" id="wp-submit" class="btn btn-move btn-large"><span>Log In</span><i class="fa fa-sign-in"></i></button>
                                        <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                                    </div>
                                
                                </form>
                                
                            </div>
                            <div id="register" class="tab-pane fade">
                                <h3 class="heading">Register</h3>
                                <form class="rk-form">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Username" name="uname">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="pword">
                                    </div>
                                    <button class="call btn btn-move btn-large" ><span>Register</span><i class="fa fa-user-plus"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
        
            </div>
        </div>
        <?php
        
    }
}

function fixedNavigation()
{
    ?>
    <div class="fixed-nav">
        <div class="container">
            <div class="nav-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <!--div class="left"> 
                <?php
                    if(is_user_logged_in())
                    {
                        global $current_user;
                        
                        $firstLetter = strtolower(substr($current_user->user_email,0,1));
                        echo '<img class="img-responsive" src="'.get_avatar_url( $current_user->user_email, 100, get_template_directory_uri().'/images/'.$firstLetter.'.png' ).'" />';
                    }
                    else
                    {
                        ?>
                            <a href="#User-login" data-toggle="modal" data-tab-open="#login">Login</a>
                            <a href="#User-login" data-toggle="modal" data-tab-open="#register">Register</a>
                        <?php
                    }
                ?>
            </div-->
        </div>
    </div>
    <?php
}