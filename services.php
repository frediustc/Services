<?php include 'inc/head.php'; ?>
<div class="graphs">
    <h3 class="blank1">View Orders</h3>
     <div class="xs tabls">
        <div class="panel panel-success" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
            <div class="panel-heading">
                <h2>Orders List</h2>
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
                            <th>Employees</th>
                            <th>Date</th>
                            <th>Reports</th>
                            <th>Opt</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        switch ($_SESSION['u']) {
                            case "Administrator":
                                $serv = $db->prepare('SELECT orders.id, users.name, users.email, orders.location, orders.qty, orders.type, orders.service_date, orders.reports FROM orders INNER JOIN users ON users.id = orders.uid WHERE status = "1" ORDER BY orders.service_date');
                                $serv->execute();
                                break;
                            case "Employee":
                                $serv = $db->prepare('SELECT orders.id, users.name, users.email, orders.location, orders.qty, orders.type, orders.service_date, orders.reports FROM employeeonservice INNER JOIN users ON users.id = employeeonservice.uid INNER JOIN orders ON orders.id = employeeonservice.oid WHERE employeeonservice.uid = ?');
                                $serv->execute(array($_SESSION['id']));
                                break;
                            case "Customer":
                                $serv = $db->prepare('SELECT orders.id, users.name, users.email, orders.location, orders.qty, orders.type, orders.service_date, orders.reports FROM orders INNER JOIN users ON users.id = orders.uid WHERE status = "1" AND uid = ? ORDER BY orders.service_date');
                                $serv->execute(array($_SESSION['id']));
                                break;
                        }
                        while ($e = $serv->fetch()) { ?>
                        <tr>
                            <td><?php echo $e['name'] ?></td>
                            <td><?php echo $e['email'] ?></td>
                            <td><?php echo $e['location'] ?></td>
                            <td><?php echo $e['type'] ?></td>
                            <td>
                                <?php
                                $ck = $db->prepare('SELECT users.name FROM employeeonservice INNER JOIN users ON users.id = employeeonservice.uid WHERE oid = ?');
                                $ck->execute(array($e['id']));
                                while ($c = $ck->fetch()) { ?>
                                    <span><?php echo $c['name'] ?></span>,
                                <?php } ?>
                                (<?php echo (int)$e['qty'] ?>)</td>
                            <td><?php echo $e['service_date'] ?></td>
                            <td>
                                <?php echo strlen($e['reports']) > 0 ? $e['reports'] : 'No'  ?>
                            </td>
                            <td><a href="editServ.php?id=<?php echo $e['id'] ?>" class="btn text-info"><span class="fa fa-pencil"></span></a></td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/foot.php'; ?>
