<!DOCTYPE html>
<html lang="en">

<?php
include_once  "head.php";
?>

<body>


    <div class="uk-container">
        <div class="uk-child-width-expand@s uk-text-center" uk-grid>
            <div>
                <div class=""></div>
            </div>
            <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-header uk-padding-small">
                        <h4>Login</h4>
                    </div>
                    <form action="pages/login.form.php" method="POST">
                        <div class="uk-card-body uk-padding-small">

                            <div class="uk-margin">
                                <input class="uk-input" type="text" name="username" placeholder="Username" aria-label="Input">
                            </div>
                            <div class="uk-margin">
                                <input class="uk-input" type="password" name="password" placeholder="Password" aria-label="Input">
                            </div>
                        </div>
                        <div class="uk-card-footer uk-padding-small">
                            <button class="uk-button uk-button-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
            <div>
                <div class=""></div>
            </div>
        </div>
    </div>

    <?php
    include "scripts.php";
    ?>

</body>

</html>