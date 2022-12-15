<!DOCTYPE html>
<html lang="en">

<?php
include_once "session.php";
include_once  "head.php";
?>

<body>
    <?php include_once  "nav.php"; ?>

    <div class="container">
        <div class="row align-items-center mb-3 mt-3">
            <div class="col-md-10">
                <!-- <div class="uk-grid-small uk-child-width-auto" uk-grid uk-countdown="date: 2022-12-20T10:40:21+00:00">
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
                </div> -->
            </div>
            <div class="col-md-2">
                <div class="uk-button uk-button-default" uk-toggle="target: #modal-close-default">Add Group</div>
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
                include_once "inc/db/connection.php";
                $query = 'select *,(select count(groupid) from group_user where groupid = `group`.id) as _count from `group`';
                $result = $conn->query($query);
                ?>
                <table class="uk-table uk-table-divider">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Upper limit</th>
                            <th>Count</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <tr>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["date"]; ?></td>
                                <td><?php echo $row["location"]; ?></td>
                                <td><?php echo $row["upperLimit"]; ?></td>
                                <td><?php echo $row["_count"]; ?></td>
                                <td>
                                    <a href="group-participants.php?groupid=<?php echo $row['id'] ?>" class="uk-icon-link uk-margin-small-right" uk-icon="info"></a>
                                    <!-- <a href="#" class="uk-icon-link uk-margin-small-right" uk-icon="file-edit"></a>
                                    <a href="#" class="uk-icon-link" uk-icon="trash"></a> -->
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>



    <div id="modal-close-default" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-padding-small">
            <button class="uk-modal-close-default" type="button" uk-close></button>
                <form action="pages/add-group.form.php" method="POST" id="add-group-form">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label for="groupName" class="control-label">Group name</label>
                            <input type="text" name="groupName" id="groupName" class="uk-input">
                        </div>
                        <div class="col-12 mb-2">
                            <label for="date" class="control-label">Date</label>
                            <input type="datetime" name="date" id="date" class="uk-input">
                        </div>
                        <div class="col-12 mb-2">
                            <label for="location" class="control-label">Location</label>
                            <input type="text" name="location" id="location" class="uk-input">
                        </div>
                        <div class="col-12 mb-2">
                            <label for="upperLimit" class="control-label">Gift upper limit</label>
                            <input type="text" name="upperLimit" id="upperLimit" class="uk-input">
                        </div>
                        <div class="col-12 mb-2">
                            <button class="uk-button uk-button-primary">Add</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>


    <div id="modal-add-participant" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-padding-small">
            <button class="uk-modal-close-default" type="button" uk-close></button>
                <form action="pages/add-group.form.php" method="POST" id="add-group-form">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label for="groupName" class="control-label">Name</label>
                            <input type="text" name="groupName" id="groupName" class="uk-input">
                        </div>
                        <div class="col-12 mb-2">
                            <label for="date" class="control-label">Phone number</label>
                            <input type="datetime" name="date" id="date" class="uk-input">
                        </div>
                        <div class="col-12 mb-2">
                            <label for="location" class="control-label">Email</label>
                            <input type="text" name="location" id="location" class="uk-input">
                        </div>
                        <div class="col-12 mb-2">
                            <button class="uk-button uk-button-primary">Add</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>

    
    <?php include "scripts.php"; ?>
    <script>
        $("#add-group-form").on("submit", function(e) {

            //e.preventDefault();
        })
        function showAddParticipantModal(id){
            UIkit.modal($("#modal-add-participant")).show();
        }
    </script>
</body>

</html>