<?php
if(isset($_POST['bookNow']))
{
    function changedateformat($in)
    {
        $in = trim(htmlspecialchars($in));
        $d = explode('/', $in);
        return $d[2] . '-' . $d[0] . '-' . $d[1] ;
    }
    $dt = changedateformat(trim(htmlspecialchars($_POST['dt'])));
    $qt = trim(htmlspecialchars($_POST['qt']));
    $lt = trim(htmlspecialchars($_POST['lt']));

    $i = $db->prepare('INSERT INTO orders(uid, qty, service_date	, type, location, made, status) VALUES(?, ?, ?, ?, ?, NOW(), "0")');
    if($i->execute(array($_SESSION['id'], $qt, $dt, $_POST['tp'], $lt)))
    {
        echo '<p class="alert bg-success">Booking successfully done</p>';
    }
    else {
        echo '<p class="alert alert-danger">Error</p>';
    }

}
if(isset($_POST['makrep']))
{
    $r = trim(htmlspecialchars($_POST['rep']));

    $i = $db->prepare('UPDATE orders SET reports = ? WHERE id = ?');
    if($i->execute(array($r, $_GET['id'])))
    {
        echo '<p class="alert bg-success">Report successfully done</p>';
    }
    else {
        echo '<p class="alert alert-danger">Error</p>';
    }

}

if(isset($_POST['addEmp']))
{
    if(count($_POST) > 1){
        foreach ($_POST as $key => $value) {
            if(!empty($value)){
                $u = $db->prepare('INSERT INTO employeeonservice (oid, uid) VALUES(?,?)');
                $u->execute(array($_GET['id'], $value));
            }
        }
        echo '<p class="alert bg-success">Employees added</p>';

    }else {
        echo '<p class="alert alert-danger">Check at least one Employee</p>';
    }
}

if(isset($_GET['ac']))
{
    require '../inc/db.php';
    $u = $db->prepare('UPDATE orders SET status = "1" WHERE id = ?');
    $u->execute(array($_GET['id']));
    header('location: ../Orders.php');

}

if(isset($_GET['de']))
{
    require '../inc/db.php';
    $u = $db->prepare('DELETE FROM orders WHERE id = ?');
    $u->execute(array($_GET['id']));
    header('location: ../Orders.php');
}
