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
                            <th>Quantity</th>
                            <th>Date</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $emp = $db->prepare('SELECT * FROM users WHERE type = "Customers" ORDER BY name');
                        $emp->execute();
                        while ($e = $emp->fetch()) { ?>
                        <tr>
                            <td><?php echo $e['name'] ?></td>
                            <td><?php echo $e['email'] ?></td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/foot.php'; ?>
