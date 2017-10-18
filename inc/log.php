<?php
if(isset($_POST['login'])){
    $correct = true;

    $ut = 1;
    $em = strtolower(htmlspecialchars(trim($_POST['em'])));
    $ps = htmlspecialchars(trim($_POST['ps']));

    //check if the email does not exist
    $users = $db->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
    $users->execute(array($em, sha1($ps)));
    $user = $users->fetch();
    if(!empty($user)){
        $_SESSION['id'] = $user['id'];
        $_SESSION['u'] = $user['type'];
        $_SESSION['n'] = $user['name'];
        $_SESSION['e'] = $user['email'];
        header('location: account.php');
    }
    else {
        echo '<div class="alert alert-danger" role="alert"><strong>Error!</strong> data do not match</div>';
    }
}

if(isset($_POST['reg'])){

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
        $stdadd = $db->prepare('INSERT INTO users (name, email, password, type) VALUES(?,?,?,"Customer")');
        if($stdadd->execute(array(ucwords($fn), $em, sha1($ps)))){
            echo '<div class="alert alert-success" role="alert"><strong>Success</strong> Employee Added!</div>';

            $users = $db->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
            $users->execute(array($em, sha1($ps)));
            $user = $users->fetch();
            $_SESSION['id'] = $user['id'];
            $_SESSION['u'] = $user['type'];
            $_SESSION['n'] = $user['name'];
            $_SESSION['e'] = $user['email'];

            header('location: account.php');

        }
        else {
            echo '<div class="alert alert-danger" role="alert"><strong>Error</strong> Something went wrong</div>';
        }
    }
}
