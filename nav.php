<?php 
//session_start();
?>
<?php $project = "/kris-kindle"; ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?php echo $project; ?>/">Kris Kindle</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                
            <?php if(isset($_SESSION["username"])&&$_SESSION["username"] == "admin"):?>
                <li class="nav-item">
                    <a class="dropdown-item" href="<?php echo $project; ?>/groups.php">Groups</a>
                </li>
                <li class="nav-item"><a class="dropdown-item" href="<?php echo $project; ?>/participants.php">Paricipants</a></li>
                <?php else:?>
                <?php endif;?>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="pages/logout.form.php">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </div>
    </div>
</nav>