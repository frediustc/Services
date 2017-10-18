<?php include 'inc/head.php'; ?>
<div class="graphs">
    <h3 class="blank1">Make Booking</h3>
        <div class="tab-content">
        <div class="tab-pane active" id="horizontal-form">
            <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <?php include 'scr/book.php' ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Employee required</label>
                    <div class="col-sm-7">
                        <input type="number" name="qt" required class="form-control1">
                    </div>
                    <div class="col-sm-3 jlkdfj1">
                        <p class="help-block">(numbers only : <mark>25Ghc per Employee</mark>)</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Date</label>
                    <div class="col-sm-7">
                        <input type="text" name="dt" required class="form-control1" id="datepicker">
                    </div>
                    <div class="col-sm-3 jlkdfj1">
                        <p class="help-block">(Format: mm/dd/yy)</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Type</label>
                    <div class="col-sm-7">
                        <select class="form-control1" name="tp" required>
                            <option value="Home">Home</option>
                            <option value="Office">Office</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Location</label>
                    <div class="col-sm-7">
                        <input type="text" name="lt" required class="form-control1">
                    </div>
                    <div class="col-sm-3 jlkdfj1">
                        <p class="help-block">(100 characters max)</p>
                    </div>
                </div>
                <div class="form-group text-center">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-7">
                        <button type="submit" name="bookNow" class="btn btn-primary btn-block">Book Now</button>
                    </div>
                    <div class="col-sm-3 jlkdfj1">
                        <p class="help-block"></p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="bs-example" data-example-id="form-validation-states">

<?php include 'inc/foot.php'; ?>
