<?php include 'inc/head.php'; ?>
<div class="graphs">
    <?php if ($_SESSION['u'] == "Administrator"): ?>
        <h3 class="blank1">Add Employee to service</h3>
            <div class="tab-content">
            <div class="tab-pane active" id="horizontal-form">
                <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $_GET['id'] ?>">
                    <?php include 'scr/book.php' ?>

                    <div class="form-group">
                        <label for="checkbox" class="col-sm-2 control-label">Employee</label>
                        <div class="col-sm-8">
                            <?php
                            $emp = $db->prepare('SELECT * FROM users WHERE type = "Employee" ORDER BY name');
                            $emp->execute();
                            while ($e = $emp->fetch()) {
                                $ck = $db->prepare('SELECT * FROM employeeonservice WHERE uid = ? AND oid = ?');
                                $ck->execute(array($e['id'], $_GET['id']));
                                $c = $ck->fetch();
                                if(empty($c)){ ?>

                            <div class="checkbox-inline1"><label><input type="checkbox" name="<?php echo $e['name'] ?>" value="<?php echo $e['id'] ?>"> <?php echo $e['name'] ?></label></div>
                        <?php } } ?>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-7">
                            <button type="submit" name="addEmp" class="btn btn-primary btn-block">Add Employees</button>
                        </div>
                        <div class="col-sm-3 jlkdfj1">
                            <p class="help-block"></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($_SESSION['u'] == "Customer"): ?>
        <h3 class="blank1">Add Report</h3>
            <div class="tab-content">
            <div class="tab-pane active" id="horizontal-form">
                <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $_GET['id'] ?>">
                    <?php include 'scr/book.php' ?>

                    <div class="form-group">
                        <label for="checkbox" class="col-sm-2 control-label">Report</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" required name="rep"></textarea>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-7">
                            <button type="submit" name="makrep" class="btn btn-primary btn-block">Make the report</button>
                        </div>
                        <div class="col-sm-3 jlkdfj1">
                            <p class="help-block"></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?>

<?php include 'inc/foot.php'; ?>
