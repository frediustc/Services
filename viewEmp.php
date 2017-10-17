<?php include 'inc/head.php'; ?>
<div class="graphs">
    <h3 class="blank1">View Employee</h3>
     <div class="xs tabls">
        <div class="panel panel-info" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
            <div class="panel-heading">
                <h2>Employee List</h2>
                <div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
            </div>
            <div class="panel-body no-padding" style="display: block;">
                <table class="table table-striped">
                    <thead>
                        <tr class="warning">
                            <th>#</th>
                            <th>FullName</th>
                            <th>Email</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $emp = $db->prepare('SELECT * FROM users WHERE type = "Employee" ORDER BY name');
                        $emp->execute();
                        while ($e = $emp->fetch()) { ?>
                        <tr>
                            <td><?php echo $e['id'] ?></td>
                            <td><?php echo $e['name'] ?></td>
                            <td><?php echo $e['email'] ?></td>
                            <td>
                                <a href="delEmp.php?id=<?php echo $e['id'] ?>" class="btn btn-danger"><span class="fa fa-trash-o"></span></a>
                                <a href="editEmp.php?id=<?php echo $e['id'] ?>" class="btn btn-info"><span class="fa fa-pencil"></span></a>
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
