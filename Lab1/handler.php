<?php

if(isset($_POST['action'])){
    include 'db.php';

    if($_POST['action'] == 'ward'){
        $request = $link->query( "SELECT w.name 
                                    FROM nurse n
                                    LEFT JOIN nurse_ward nw ON nw.fid_nurse = n.id_nurse
                                    LEFT JOIN ward w ON nw.fid_ward = w.id_ward
                                    WHERE n.id_nurse = ".$_POST['id_nurse']);

        $result = [];
        while ($row = mysqli_fetch_assoc($request)){
            array_push($result, $row['name']) ;
        }
    }

    if($_POST['action'] == 'department'){
        $request = $link->query( "SELECT name 
                                    FROM nurse 
                                    WHERE department = ".$_POST['department']);

        $result = [];
        while ($row = mysqli_fetch_assoc($request)){
            array_push($result, $row['name']) ;
        }
    }

    if($_POST['action'] == 'shift'){
        $request = $link->query( "SELECT n.name as nurse_name, w.name as ward_name, n.date
                                    FROM nurse n
                                    LEFT JOIN nurse_ward nw ON nw.fid_nurse = n.id_nurse
                                    LEFT JOIN ward w ON nw.fid_ward = w.id_ward
                                    WHERE n.shift = '".$_POST['shift']."'");

        $result = [];
        while ($row = mysqli_fetch_assoc($request)){
            array_push($result, [$row['ward_name'], $row['date'], $row['nurse_name']]) ;
        }
    }


    echo json_encode($result);
}