<?php
if(isset($_POST['addEmp'])){

    $correct = true;

    $ut = 1;
    $fn = htmlspecialchars(trim($_POST['fn']));
    $em = strtolower(htmlspecialchars(trim($_POST['em'])));
    $ps = htmlspecialchars(trim($_POST['ps']));
    $cn = htmlspecialchars(trim($_POST['cn']));

    //check if the Full Name format is correct (letter within 2 and 5 char)
    if(!preg_match('/^[a-zA-Z ]{5,100}$/', $fn)) {
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Full Name Wrong Format!</strong> 5 - 100 letters & spaces only</div>';
    }

    //check if the email format is correct (letter within 2 and 5 char)
    if(!preg_match('/(^[a-zA-Z0-9_.+-]+)@([a-zA-Z_-]+).([a-zA-Z]){2,4}$/', $em)) {
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Email Wrong Format!</strong> must be in example@domain.extension format</div>';
    }

    if(strlen($ps) < 6 || strlen($ps) > 16){
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Password!</strong> 6 - 16 characters</div>';
    }

    if ($ps != $cn) {
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Confirm!</strong> password do not match</div>';
    }


    //check if the email does not exist
    $check = $db->prepare('SELECT COUNT(*) AS nbr FROM users WHERE email = ?');
    $check->execute(array($em));
    $result = $check->fetch();
    if($result['nbr'] > 0){
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Error</strong> Email already exist</div>';
    }

    //if all is alright ($correct === true) we insert the value
    if($correct){
        $stdadd = $db->prepare('INSERT INTO users (name, email, password, type) VALUES(?,?,?,"Employee")');
        if($stdadd->execute(array(ucwords($fn), $em, sha1($ps)))){
            echo '<div class="alert alert-success" role="alert"><strong>Success</strong> Employee Added!</div>';
        }
        else {
            echo '<div class="alert alert-danger" role="alert"><strong>Error</strong> Something went wrong</div>';
        }
    }
}
if(isset($_POST['editEmp'])){

    $correct = true;

    $ut = 1;
    $fn = htmlspecialchars(trim($_POST['fn']));
    $em = strtolower(htmlspecialchars(trim($_POST['em'])));

    //check if the Full Name format is correct (letter within 2 and 5 char)
    if(!preg_match('/^[a-zA-Z ]{5,100}$/', $fn)) {
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Full Name Wrong Format!</strong> 5 - 100 letters & spaces only</div>';
    }

    //check if the email format is correct (letter within 2 and 5 char)
    if(!preg_match('/(^[a-zA-Z0-9_.+-]+)@([a-zA-Z_-]+).([a-zA-Z]){2,4}$/', $em)) {
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Email Wrong Format!</strong> must be in example@domain.extension format</div>';
    }

    //check if the email does not exist
    $check = $db->prepare('SELECT COUNT(*) AS nbr FROM users WHERE email = ? AND id != ?');
    $check->execute(array($em, $_GET['id']));
    $result = $check->fetch();
    if($result['nbr'] > 0){
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Error</strong> Email already exist</div>';
    }

    //if all is alright ($correct === true) we insert the value
    if($correct){
        $stdadd = $db->prepare('UPDATE users SET name = ? , email = ? WHERE id = ?');
        if($stdadd->execute(array(ucwords($fn), $em, $_GET['id']))){
            echo '<div class="alert alert-success" role="alert"><strong>Success</strong> Employee Added!</div>';
        }
        else {
            echo '<div class="alert alert-danger" role="alert"><strong>Error</strong> Something went wrong</div>';
        }
    }
}

if(isset($_POST['editUser'])){

    $correct = true;

    $ut = 1;
    $fn = htmlspecialchars(trim($_POST['fn']));
    $em = strtolower(htmlspecialchars(trim($_POST['em'])));


    //check if the Full Name format is correct (letter within 2 and 5 char)
    if(!preg_match('/^[a-zA-Z ]{5,100}$/', $fn)) {
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Full Name Wrong Format!</strong> 5 - 100 letters & spaces only</div>';
    }

    //check if the email format is correct (letter within 2 and 5 char)
    if(!preg_match('/(^[a-zA-Z0-9_.+-]+)@([a-zA-Z_-]+).([a-zA-Z]){2,4}$/', $em)) {
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Email Wrong Format!</strong> must be in example@domain.extension format</div>';
    }




    //check if the email does not exist
    $check = $db->prepare('SELECT COUNT(*) AS nbr FROM users WHERE email = ? AND id != ?');
    $check->execute(array($em, $_SESSION['id']));
    $result = $check->fetch();
    if($result['nbr'] > 0){
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Error</strong> Email already exist</div>';
    }

    //if all is alright ($correct === true) we insert the value
    if($correct){
        $stdadd = $db->prepare('UPDATE users SET name = ?, email = ? where id = ?');
        if($stdadd->execute(array(ucwords($fn), $em, $_SESSION['id']))){
            $se = $db->prepare('SELECT * FROM users WHERE id = ?');
            $se->execute(array($_SESSION['id']));
            $s = $se->fetch();
            $_SESSION['n'] = $s['name'];
            $_SESSION['e'] = $s['email'];
            echo '<div class="alert alert-success" role="alert"><strong>Success</strong> Update Done!</div>';
        }
        else {
            echo '<div class="alert alert-danger" role="alert"><strong>Error</strong> Something went wrong</div>';
        }
    }

    if(isset($_POST['ps']) && isset($_POST['cn']) && !empty($_POST['ps']) && !empty($_POST['cn'])){
        $pw = htmlspecialchars(trim($_POST['ps']));
        $cn = htmlspecialchars(trim($_POST['cn']));

        if(strlen($pw) < 6 || strlen($pw) > 16){
            $correct = false;
            echo '<div class="alert alert-danger" role="alert"><strong>Password!</strong> 6 - 16 characters</div>';
        }

        if ($pw != $cn) {
            $correct = false;
            echo '<div class="alert alert-danger" role="alert"><strong>Confirm!</strong> password do not match</div>';
        }
        if($correct){
            $stdadd = $db->prepare('UPDATE users SET password = ? where id = ?');
            $stdadd->execute(array(sha1($pw), $_SESSION['id']));
        }
    }
}
