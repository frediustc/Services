<?php
$log = true;
include 'inc/head.php'; ?>
<div class="graphs">
    <div class="sign-in-form">
        <div class="sign-in-form-top">
            <p><span>Sign In to</span> <a href="#">Your Account</a></p>
        </div>
        <div class="signin">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <?php include 'inc/log.php'; ?>
            <div class="log-input">
                <div class="log-input-left">
                   <input type="text" class="user" required name="em" placeholder="Email"/>
                </div>
                <span class="checkbox2">
                     <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i></label>
                </span>
                <div class="clearfix"> </div>
            </div>
            <div class="log-input">
                <div class="log-input-left">
                   <input type="password" class="lock" required name="ps" placeholder="Password"/>
                </div>
                <span class="checkbox2">
                     <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i></label>
                </span>
                <div class="clearfix"> </div>
            </div>
            <input type="submit" value="Login to your account" name="login">
        </form>
        </div>
        <div class="new_people">
            <h4>For New People</h4>
            <p>Having hands on experience in cleaning company and home.</p>
            <a href="signup.php">Register Now!</a>
        </div>
    </div>
</div>
<?php include 'inc/foot.php'; ?>
