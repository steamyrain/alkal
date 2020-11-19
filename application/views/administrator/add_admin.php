<html>
    <head>
        <title>add admin</title>
    </head>
    <body>
        <form method='post'>
            <?php if( config_item('csrf_protection') === TRUE) { ?>

                <?php
                    $csrf = array(
                        'name' => $this->security->get_csrf_token_name(),
                        'hash' => $this->security->get_csrf_hash()
                    );
                ?>

                <input type="hidden" name="<?= $csrf['name'] ;?>" value="<?= $csrf['hash'] ;?>" />

            <?php } ?>
                <input type="hidden" name="role" value="admin" />
                <input type="hidden" name="verified" value=1 />
                <input type="hidden" name="jobId" value=1 />
                <span>
                <label>username : </label>
                <input type="text" name="username"/>
                </span>
                <br>
                <span>
                <label>password : </label>
                <input type="password" name="password"/>
                </span>
                <br>
                <span>
                <label>nama depan : </label>
                <input type="text" name="first_name"/>
                </span>
                <br>
                <span>
                <label>nama belakang : </label>
                <input type="text" name="last_name"/>
                </span>
                <br>
                <span>
                <label>Jenis kelamin : </label>
                <input type="radio" name="gender" value="L">
                <label>L</label>
                <input type="radio" name="gender" value="P">
                <label>P</label>
                </span>
                <br>
                <button type="submit" name="submit">Add</button>
        </form>
    </body>
</html>
