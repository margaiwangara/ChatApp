<?php

    //include signup script
    include_once 'signup.php';
    //include layout script
    include_once 'layout.php';
?>

<title>Registration</title>
<div class="container">
    <div class="jumbotron">
        <div class="row">
            <div>
                <h4 class="text-center" style="font-family:cambria;font-weight: bold;">
                    Welcome to the ChatApp. Send messages to your friends and colleagues anytime anywhere. Chat, Chat and Chat and later on so much more
                </h4>
            </div>
            <hr>
            <div class="col-md-6">
                <div class="login-area">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3><strong class="text-center">Log In</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" novalidate>
                            <div class="form-group">
                                <input type="text" name="user_identifier" id="user-identifier" placeholder="Username or Email" class="form-control" value="<?php if(isset($_POST['user_identifier'])) echo $_POST['username']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="login-password" placeholder="Password" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary form-control" id="login-submit" type="submit">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3><strong class="text-center">Sign Up</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  method="post">
                            <div class="form-group">
                                <input type="text" name="username" id="signup-username" class="form-control" placeholder="Username" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="signup-email" class="form-control" placeholder="Email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="signup-password" placeholder="Password" class="form-control">
                                </div>
                            <div class="form-group">
                                <input type="password" name="confirm_password" id="confirm-password" class="form-control" placeholder="Confirm Password">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="signup_submit" class="btn btn-primary form-control" id="signup-submit">Sign Up</button>
                            </div>
                        </form>
                        <div>
                            <?php echo $msg;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>