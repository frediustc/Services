<?php include 'inc/head.php'; ?>
<div class="graphs">
    <p><a href="makeBook.php" class="btn btn-success">Make Booking</a></p> <br>
    <h3 class="blank1">View Bookings</h3>

     <div class="xs tabls">
        <div class="panel panel-success" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
            <div class="panel-heading">
                <h2>Bookings List</h2>
                <div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
            </div>
            <div class="panel-body no-padding" style="display: block;">
                <table class="table table-striped">
                    <thead>
                        <tr class="warning">
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Quantity</th>
                            <th>Date</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $q = '';
                        switch ($_SESSION['u']) {
                            case "Administrator":
                                $emp = $db->prepare('SELECT orders.*,users.* FROM orders INNER JOIN users ON users.id = orders.uid WHERE status = "0" ORDER BY orders.service_date');
                                $emp->execute();
                                break;
                            case "Customer":
                                $emp = $db->prepare('SELECT orders.*,users.* FROM orders INNER JOIN users ON users.id = orders.uid WHERE status = "0" AND uid = ? ORDER BY orders.service_date');
                                $emp->execute(array($_SESSION['id']));
                                break;
                            default:
                                $emp = $db->prepare('SELECT orders.*,users.* FROM orders INNER JOIN users ON users.id = orders.uid WHERE status = "0" ORDER BY orders.service_date');
                                $emp->execute();
                                break;
                        }

                        while ($e = $emp->fetch()) { ?>
                        <tr>
                            <!-- <?php print_r($e) ?> -->
                            <td><?php echo $e['name'] ?></td>
                            <td><?php echo $e['email'] ?></td>
                            <td><?php echo $e['location'] ?></td>
                            <td><?php echo $e[4] ?></td>
                            <td><?php echo $e['qty'] ?></td>
                            <td><?php echo $e['service_date'] ?></td>
                            <td>
                                <?php if ($_SESSION['u'] == 'Administrator'): ?>
                                    <a href="scr/book.php?id=<?php echo $e[0] ?>&ac" class="btn btn-success"><span class="fa fa-check"></span></a>
                                <?php endif; ?>
                                <a href="scr/book.php?id=<?php echo $e[0] ?>&de" class="btn text-danger"><span class="fa fa-trash-o"></span></a>
                            </td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/foot.php'; ?>
