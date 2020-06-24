
<!DOCTYPE html>
<html>
<head>
    <title>Nurse Info</title>
    <meta content="noindex, nofollow" name="robots">
    <!-- Include CSS File Here -->
    <link href="css/main.css?v1.0.2" rel="stylesheet">
</head>
<body>
<a href="/">Back</a>
<?php

if(isset($_POST['action'])){
    include 'db.php';

    if($_POST['action'] == 'ward'){
        $request = $link->query( "SELECT w.name 
                                    FROM nurse n
                                    LEFT JOIN nurse_ward nw ON nw.fid_nurse = n.id_nurse
                                    LEFT JOIN ward w ON nw.fid_ward = w.id_ward
                                    WHERE n.id_nurse = ".$_POST['nurse']);

        $x = '   <table id="info-table">' .
            '        <tr>' .
            '            <th>Ward Name</th>' .
            '        </tr>';
        while ($row = mysqli_fetch_assoc($request)){
            $x .= '        <tr>' .
                '            <th>'.$row['name'].'</th>'.
                '        </tr>';
        }

        $x .= '</table>';
        echo $x;
    }

    if($_POST['action'] == 'department'){
        $request = $link->query( "SELECT name 
                                    FROM nurse 
                                    WHERE department = ".$_POST['department']);

        $x = '   <table id="info-table">' .
            '        <tr>' .
            '            <th>Department Name</th>' .
            '        </tr>';
        while ($row = mysqli_fetch_assoc($request)){
            $x .= '        <tr>' .
                '            <th>'.$row['name'].'</th>'.
                '        </tr>';
        }

        $x .= '</table>';
        echo $x;
    }

    if($_POST['action'] == 'shift'){
        $request = $link->query( "SELECT n.name as nurse_name, w.name as ward_name, n.date
                                    FROM nurse n
                                    LEFT JOIN nurse_ward nw ON nw.fid_nurse = n.id_nurse
                                    LEFT JOIN ward w ON nw.fid_ward = w.id_ward
                                    WHERE n.shift = '".$_POST['shift']."'");

        $x  = '   <table id="info-table">' .
            '        <tr>' .
            '            <th>Nurse name</th>' .
            '            <th>Ward</th>' .
            '            <th>Date</th>' .
            '        </tr>';
        while ($row = mysqli_fetch_assoc($request)){
            $x .= '        <tr>' .
                    '            <th>'.$row['nurse_name'].'</th>';
                $x .='           <th>'.$row['ward_name'].'</th>';
                $x .='           <th>'.$row['date'].'</th>'.
                '           </tr>';
        }
        echo $x;
    }
}
?>
</body>
</html>
