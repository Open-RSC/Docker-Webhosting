<?php
if (!defined('IN_SITE')) {
    die("You do not have permission to access this file.");
}

$connector = new Dbc();

if ($_POST['nm']) {
    $username = $_POST['nm'];
    $password = $_POST['pw'];

    $username = preg_replace("/[^A-Za-z0-9 ]/", " ", $username);
    $username = preg_replace('~[\x00\x0A\x0D\x1A\x22\x25\x27\x5C\x5F]~u', " ", $username);

    $user_result = $connector->gamequery("SELECT username FROM openrsc_players WHERE username='$username'");
    $num_users_row = mysqli_num_rows($user_result);

    if ($num_users_row != 0) {
        echo 0;
    } else {
        if (strlen($username) >= 12 || strlen($username) <= 4) {
        }
        if (strlen($password) <= 5) {
        }
        if (strlen($username) >= 12 || strlen($username) <= 4 || strlen($password) <= 5) {
        } else {
            $time = time();
            $gamepass = sha1($password);
            $gamename = explode('.', $username);
            $connector->gamequery("INSERT INTO `openrsc_curstats`(`playerID`) VALUES ('" . $user->data['user_id'] . "')");
            $connector->gamequery("INSERT INTO `openrsc_experience`(`playerID`) VALUES ('" . $user->data['user_id'] . "')");
            $connector->gamequery("INSERT INTO `openrsc_players`(`username`, `owner`, `pass`, `creation_date`, `creation_ip`) VALUES ('" . $username . "', '" . $user->data['user_id'] . "', '" . $gamepass . "', '" . $time . "', '" . $_SERVER['REMOTE_ADDR'] . "')");
            echo 1;
        }
    }
}
?>

<main class="main">
    <article>
        <div class="panel">
            <div class="flex-row">
                <h4>Create a new character</h4>
                <p>Fill in the blanks below to create a new hero!</p>
                <div id="create-form">
                    <div id="name-fails" style="display:none;">Username must be between 4 and 12 characters!</div>
                    <div id="pass-fails" style="display:none;">Password must be longer than 5 characters</div>
                    <div id="user-fails" style="display:none;">Username already taken!</div>
                    <div id="user-passes" style="display:none;">Character created successfully!</div>
                    <form method="post" action="" id="character-creation-form">
                        <label for="username">Username: </label><input type="text" name="username" class="name"
                                                                       id="username"/>
                        <label for="password">Password: </label><input type="password" name="password"
                                                                       class="password"
                                                                       id="password"/>
                        <input type="submit" value="Create" name="create" class="submit"/>
                    </form>
                </div>
            </div>
        </div>
    </article>
</main>
