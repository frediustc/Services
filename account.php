<?php include 'inc/head.php'; ?>
<div class="graphs">
    <h3 class="blank1">Account</h3>
        <div class="tab-content">
        <div class="tab-pane active" id="horizontal-form">
            <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <?php include 'scr/addEmp.php';
                $emp = $db->prepare('SELECT * FROM users WHERE id = ?');
                $emp->execute(array($_SESSION['id']));
                $e = $emp->fetch();
                 ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">FullName</label>
                    <div class="col-sm-7">
                        <input type="text" name="fn" required class="form-control1" value="<?php echo $e['name'] ?>">
                    </div>
                    <div class="col-sm-3 jlkdfj1">
                        <p class="help-block">(5 - 100 letters and spaces only)</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-7">
                        <input type="email" name="em" required class="form-control1" value="<?php echo $e['email'] ?>">
                    </div>
                    <div class="col-sm-3 jlkdfj1">
                        <p class="help-block">(EX: example@domain.com)</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-7">
                        <input type="password" name="ps" class="form-control1">
                    </div>
                    <div class="col-sm-3 jlkdfj1">
                        <p class="help-block">(6 - 16 characters)</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Confirm Password</label>
                    <div class="col-sm-7">
                        <input type="password" name="cn" class="form-control1">
                    </div>
                    <div class="col-sm-3 jlkdfj1">
                        <p class="help-block">(same as password)</p>
                    </div>
                </div>
                <div class="form-group text-center">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-7">
                        <button type="submit" name="editUser" class="btn btn-primary btn-block">Add Employee</button>
                    </div>
                    <div class="col-sm-3 jlkdfj1">
                        <p class="help-block"></p>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php include 'inc/foot.php'; ?>
