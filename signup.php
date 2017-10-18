<?php
$log = true;
include 'inc/head.php'; ?>
<div class="graphs">
    <div class="sign-up">
        <h3>Register Here</h3>
        <p class="creating">Having hands on experience in cleaning company and home.</p>
        <h5>Personal Information</h5>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <?php include 'inc/log.php'; ?>
        <div class="sign-u">
            <div class="sign-up1">
                <h4>FullName*</h4>
            </div>
            <div class="sign-up2">
                    <input type="text" placeholder=" " name="fn" required=" "/>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="sign-u">
            <div class="sign-up1">
                <h4>Email Address*</h4>
            </div>
            <div class="sign-up2">
                    <input type="text" placeholder=" " name="em" required=" "/>
            </div>
            <div class="clearfix"> </div>

        </div>
        <div class="sign-u">
            <div class="sign-up1">
                <h4>Password*</h4>
            </div>
            <div class="sign-up2">
                    <input type="password" placeholder=" " name="ps"  required=" "/>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="sign-u">
            <div class="sign-up1">
                <h4>Confirm Password*</h4>
            </div>
            <div class="sign-up2">
                    <input type="password" placeholder=" " name="cn"  required=" "/>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="sub_home">
            <div class="sub_home_left">
                    <input type="submit" value="Register" name="reg">
            </div>
            <div class="sub_home_right">
                <p>Go Back to <a href="index.php">Login</a></p>
            </div>
            <div class="clearfix"> </div>
        </div>
    </form>

    </div>
</div>
<?php include 'inc/foot.php'; ?>
