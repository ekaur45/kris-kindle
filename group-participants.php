<!DOCTYPE html>
<html lang="en">

<?php
include_once "session.php";
include_once  "head.php";
include_once "inc/db/connection.php";
$query1 = "select * from `group` where id = " . $_GET["groupid"];
$result = $conn->query($query1);
$rows1 = $result->fetch_assoc();
?>
<script>
    var groupid = '<?php echo $_GET["groupid"] ?>';
</script>

<body>
    <?php include_once  "nav.php"; ?>

    <div class="container">
        <div class="row align-items-center mb-3 mt-3">
            <div class="col-md-2">
                <a href="groups.php" class="uk-icon-button" uk-icon="arrow-left"></a>
            </div>
            <div class="col-md-6">
                <div class="uk-grid-small uk-child-width-auto" uk-grid uk-countdown="date: <?php echo $rows1["date"] ?>">
                    <div>
                        <div class="uk-countdown-number uk-countdown-days"></div>
                        <div class="uk-countdown-label uk-margin-small uk-text-center uk-visible@s">Days</div>
                    </div>
                    <div class="uk-countdown-separator">:</div>
                    <div>
                        <div class="uk-countdown-number uk-countdown-hours"></div>
                        <div class="uk-countdown-label uk-margin-small uk-text-center uk-visible@s">Hours</div>
                    </div>
                    <div class="uk-countdown-separator">:</div>
                    <div>
                        <div class="uk-countdown-number uk-countdown-minutes"></div>
                        <div class="uk-countdown-label uk-margin-small uk-text-center uk-visible@s">Minutes</div>
                    </div>
                    <div class="uk-countdown-separator">:</div>
                    <div>
                        <div class="uk-countdown-number uk-countdown-seconds"></div>
                        <div class="uk-countdown-label uk-margin-small uk-text-center uk-visible@s">Seconds</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 justify-content-end d-flex">
                <div class="uk-button uk-button-default" onclick="drawEvent()">Draw</div>
                <div class="uk-button uk-button-default ml-3" uk-toggle="target: #modal-add-participant">Add Paticipant</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <hr class="uk-divider-icon">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php

                $query = 'select * from `group_user` where groupid = ' . $_GET["groupid"] . ';';
                $result = $conn->query($query);
                ?>
                <table class="uk-table uk-table-divider">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <tr>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["phone"]; ?></td>
                                <td><?php echo $row["email"]; ?></td>
                                <td>
                                    <a href="#" onclick="onUpdateUser(<?php echo $row['id']; ?>)" class="uk-icon-link uk-margin-small-right" uk-icon="file-edit"></a>
                                    <a href="#" onclick="onDeleteClick(<?php echo $row['id']; ?>)" class="uk-icon-link" uk-icon="trash"></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div id="modal-add-participant" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-padding-small">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <form action="pages/add-participants.form.php" method="POST" id="add-group-form">
                <input type="hidden" name="groupid" value="<?php echo $_GET['groupid']; ?>">
                <div class="row">
                    <div class="col-12 mb-2">
                        <label for="name" class="control-label">Name</label>
                        <input type="text" name="name" id="name" class="uk-input">
                    </div>
                    <div class="col-12 mb-2">
                        <label for="number" class="control-label">Phone number</label>
                        <input type="text" name="number" id="number" class="uk-input">
                    </div>
                    <div class="col-12 mb-2">
                        <label for="email" class="control-label">Email</label>
                        <input type="text" name="email" id="email" class="uk-input">
                    </div>
                    <div class="col-12 mb-2">
                        <button class="uk-button uk-button-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="modal-update-participant" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-padding-small">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <form action="pages/update-participants.form.php" method="POST" id="add-group-form">
                <input type="hidden" name="groupid" value="<?php echo $_GET['groupid']; ?>">
                <input type="hidden" name="update-id" id="update-id" value="">
                <div class="row">
                    <div class="col-12 mb-2">
                        <label for="update-name" class="control-label">Name</label>
                        <input type="text" name="update-name" id="update-name" class="uk-input">
                    </div>
                    <div class="col-12 mb-2">
                        <label for="update-number" class="control-label">Phone number</label>
                        <input type="text" name="update-number" id="update-number" class="uk-input">
                    </div>
                    <div class="col-12 mb-2">
                        <label for="update-email" class="control-label">Email</label>
                        <input type="text" name="update-email" id="update-email" class="uk-input">
                    </div>
                    <div class="col-12 mb-2">
                        <button class="uk-button uk-button-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="modal-drawn-participant" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-padding-small">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <input type="hidden" name="groupid" value="<?php echo $_GET['groupid']; ?>">
            <div class="row mt-4">
                <div class="col-md-12">
                    <table class="table">
                        <tr>
                            <th>Sender</th>
                            <th>Reciever</th>
                        </tr>
                        <tbody id="drawn">

                        </tbody>
                    </table>
                </div>
                <div class="col-12 mb-2">
                    <button class="uk-button uk-button-primary" onclick="saveToDb()">Save</button>
                </div>
            </div>
        </div>
    </div>


    <?php include "scripts.php"; ?>
    <script>
        function showAddParticipantModal(id) {
            UIkit.modal($("#modal-add-participant")).show();
        }

        function shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
            return array;
        }

        function unique(e) {
            let parts = [...shuffleArray([...e])];
            for (let i = 0; i < parts.length; i++) {
                const el = parts[i];
                if (el.name == e[i].name) {
                    return unique(e);
                }
            }
            return parts;
        }

        function drawEvent() {
            var url = "pages/draw.php?groupid=" + groupid;
            $.ajax({
                url,
                method: "GET",
                success: function(e) {
                    let parts = unique(e);
                    $("#drawn").html('');
                    parts.forEach((item, ndx) => {
                        $("#drawn").append("<tr><td>" + item.name + "</td><td>" + e[ndx].name + "</td><tr>");
                    })
                    localStorage.setItem("senders", JSON.stringify(parts))
                    localStorage.setItem("recievers", JSON.stringify(e))
                    UIkit.modal($("#modal-drawn-participant")).show();
                }
            })
        }

        function saveToDb() {
            UIkit.modal($("#modal-drawn-participant")).hide();
        }

        function onDeleteClick(userGroupId) {
            if(confirm("Do you really want to delete?"))
            {
                deleteUser(userGroupId);
            }
            // UIkit.modal.confirm("Do you really want to delete?").show().then(x => {
               
            // }, rejected => {}).catch(x => {})
        }
        function deleteUser(id){
            var url = "pages/delete-user.php?groupid=" + id;
                $.ajax({
                    url,
                    method: "GET",
                    success: function(e) {
                        window.location.reload();
                    }
                })
        }
        function onUpdateUser(id){
            $.ajax({
                url:"pages/get-group-user.php?id="+id,
                method:"GET",
                success:function(e){
                    debugger
                    $("#update-id").val(e[0].id);
                    $("#update-name").val(e[0].name);
                    $("#update-number").val(e[0].phone);
                    $("#update-email").val(e[0].email);
                    UIkit.modal($("#modal-update-participant")).show();
                }
            })
        }
    </script>
</body>

</html>