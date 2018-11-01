<?php
if (!defined('IN_PHPBB')) {
    die("You do not have permission to access this file.");
}
if ($user->data['is_registered']) {
    $phpbb_user_id = $user->data['user_id'];

    $connector = new Dbc();
    $characters_result = $connector->gamequery("SELECT * FROM openrsc_players WHERE owner=$phpbb_user_id");
    ?>
    <div class="main">
        <div class="content">
            <div class="navbar" style="height: 5px; width: 100%;">
                <headerbar>
                    <headerbar-sides><br /><br /><br /><br /></headerbar-sides>
                </headerbar>
            </div>
            <article>
                <div class="panel" style="height: 700px;">
                    <div style="margin-left: 80px; margin-right: 80px; margin-top: 45px; margin-bottom: 45px; color: lightgrey;">
                        <h4>Account Management</h4>
                        <p>Manage your player accounts, view their statistics, and change up your gear!</p>
                        <a id="inline" href="#create" class="button">Create Hero</a>
                        <?php if (mysqli_num_rows($characters_result) > 0) { ?>
                            <div id="sm-list">
                                <ul>
                                    <?php
                                    $i = 0;
                                    while ($row = $connector->fetchArray($characters_result)) {
                                        ?>
                                        <a href="#"
                                           onClick="loadContent('<?php echo $row['username']; ?>','<?php echo $row['owner']; ?>','<?php echo $row['combat']; ?>','<?php echo $row['online']; ?>');">
                                            <li id="toggle"><?php echo $row['username']; ?></li>
                                        </a>
                                        <?php
                                        if ($i == 0) {
                                            $username = $row['username'];
                                            $owner = $row['owner'];
                                            $combat = $row['combat'];
                                            $online = $row['online'];
                                        }
                                        $i++;
                                    }
                                    ?>
                                </ul>
                            </div>
                            <script type="text/javascript" language="JavaScript">
                                $(document).ready(function () {
                                    $.post("/inc/account.php", {
                                        username: '<?php echo $username; ?>',
                                        owner: '<?php echo $owner; ?>',
                                        combat: '<?php echo $combat; ?>',
                                        online: '<?php echo $online; ?>'
                                    }, function (data) {
                                        $("#character-details").html(data).show();
                                        $("a#inline").fancybox({
                                            'hideOnContentClick': false,
                                            'overlayColor': '#000000',
                                            'padding': 0,
                                        });
                                    });
                                });
                            </script>
                            <div id="character-details">
                            </div>
                        <?php } ?>
                    </div>
                    <br/>
                </div>
            </article>
        </div>
    </div>
    <div style="display:none">
        <div id="create">
            <h4>Create a new character</h4>
            <p>Fill in the blanks below to create a new hero!</p>
            <div id="create-form">
                <div id="name-fails" style="display:none;">Username must be between 4 and 12 characters!</div>
                <div id="pass-fails" style="display:none;">Password must be longer than 5 characters</div>
                <div id="user-fails" style="display:none;">Username already taken!</div>
                <div id="user-passes" style="display:none;">Character created successfully!</div>
                <form method="post" action="" id="character-creation-form">
                    <label for="username">Username: </label><input type="text" name="username" class="name" id="name"/>
                    <label for="password">Password: </label><input type="password" name="password" class="password"
                                                                   id="password"/>
                    <input type="submit" value="Create" name="create" class="submit"/>
                </form>
            </div>
        </div>
    </div>
    <?php
}
?>
