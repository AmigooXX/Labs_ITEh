
<!DOCTYPE html>
<html>
<head>
    <title>Nurse Info</title>
    <meta content="noindex, nofollow" name="robots">
    <!-- Include CSS File Here -->
    <link href="css/main.css?v1.0.2" rel="stylesheet">
</head>
<body>
<?php include 'db.php'; ?>

<div class="tab">
    <button class="tablinks active" onclick="openTab(event, 'tab1')">Show</button>
    <button class="tablinks" onclick="openTab(event, 'tab2')">New Nurse</button>
    <button class="tablinks" onclick="openTab(event, 'tab3')">New Ward</button>
    <button class="tablinks" onclick="openTab(event, 'tab4')">Nurse To Ward</button>
</div>

<div id="tab1" class="tabcontent" style="display: block;">
        <div id="first" class="form-control">
            <form action="handler.php" method="post">
                <label>Nurse:</label>
                <select name="nurse" id="nurse" class="data-selector">
                    <option value="0">Nothing selected</option>
                    <?php while ($row = mysqli_fetch_assoc($nurses)):?>
                        <option value="<?= $row['id_nurse']; ?>"><?= $row['name']; ?></option>
                    <?php endwhile;?>
                </select>
                <input type="hidden" name="action" value="ward">
                <input type="submit" value="Search">
            </form>
            <form action="handler.php" method="post">
                <label>Department:</label>
                <select name="department" id="department" class="data-selector">
                    <option value="0">Nothing selected</option>
                    <?php while ($row = mysqli_fetch_assoc($department)):?>
                        <option value="<?= $row['department']; ?>"><?= $row['department']; ?></option>
                    <?php endwhile;?>
                </select>
                <input type="hidden" name="action" value="department">
                <input type="submit" value="Search">
            </form>
            <form action="handler.php" method="post">
                <label>Nurse shift:</label>
                <select name="shift" id="shift" class="data-selector">
                    <option value="0">Nothing selected</option>
                    <?php while ($row = mysqli_fetch_assoc($shift)):?>
                        <option value="<?= $row['shift']; ?>"><?= $row['shift']; ?></option>
                    <?php endwhile;?>
                </select>
                <input type="hidden" name="action" value="shift">
                <input type="submit" value="Search">
            </form>
        </div>
</div>

<div id="tab2" class="tabcontent">
    <form action="save_nurse.php" method="POST">
        <div id="second" class="form-control">
            <label>Name:</label>
            <input id="name" placeholder="Name" name="name" type="text">
            <label>Date:</label>
            <input type="date" name="date" id="date">
            <label>Department:</label>
            <input id="department" name="department" placeholder="Department" type="text">
            <label>Shift:</label>
            <input id="shift" name="shift" placeholder="Shift" type="text">
            <input id="submit" type="submit" value="Submit">
        </div>
    </form>
</div>

<div id="tab3" class="tabcontent">
    <form action="save_ward.php" method="POST">
        <div id="third" class="form-control">
            <label>Name:</label>
            <input id="name" placeholder="Name" name="name" type="text">
            <input id="submit" type="submit" value="Submit">
        </div>
    </form>
</div>


<div id="tab4" class="tabcontent">
    <form action="nurse_to_ward.php" method="POST">
        <div id="fourth" class="form-control">
            <label>Nurse:</label>
            <select name="nurse" id="nurse" class="data-selector">
                <option value="0">Nothing selected</option>
                <?php $nurses->data_seek(0); while ($row = mysqli_fetch_assoc($nurses)):?>
                    <option value="<?= $row['id_nurse']; ?>"><?= $row['name']; ?></option>
                <?php endwhile;?>
            </select>
            <label>Ward:</label>
            <select name="ward" id="ward" class="data-selector">
                <option value="0">Nothing selected</option>
                <?php while ($row = mysqli_fetch_assoc($wards)):?>
                    <option value="<?= $row['id_ward']; ?>"><?= $row['name']; ?></option>
                <?php endwhile;?>
            </select>
            <input id="submit" type="submit" value="Submit">
        </div>
    </form>
</div>

<script>
    function openTab(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>
</body>
</html>