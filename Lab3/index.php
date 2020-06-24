<?php require 'connection.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>3 лабораторная - 3 вариант</title>
    <script src="jquery-3.5.0.min.js"></script>
    <script src="ajax.js"></script>
</head>
<body>



    <?php require 'select-forms/nurse.php'; ?>
    <form id="Form1">
        <p><b>Перечень палат, в которых дежурит выбранная медсестра</b></p>
        <select name="nurse" id="select1">
            <?php foreach($nurseNames as $nurseName){
                echo '<option value="'.$nurseName.'">'.$nurseName.'</option>';
            }?>
        </select>
        <p>
            <input type="button" value="Выбрать" onclick="get1();">
            <input type="button" value="Данные из LocalStorage" onclick="getLocal1(this);">
            <input type="button" value="Очистить" onclick="$('#result1').html('')">
        </p>
    </form>
    <ul id="result1"></ul>



    <?php require 'select-forms/choose.php'; ?>
    <form id="Form2">
        <p><b>Медсестры, дежурившие в указанном отделении;</b></p>
        <select name="ward" id="select2">
            <?php foreach($departments as $department){
                echo '<option value="'.$department.'">'.$department.'</option>';
            }?>
        </select>
        <p>
            <input type="button" value="Выбрать" onclick="get2();">
            <input type="button" value="Данные из LocalStorage" onclick="getLocal2(this);">
            <input type="button" value="Очистить" onclick="$('#result2').html('')">
        </p>
    </form>
    <ol id="result2"></ol>



    <?php require 'select-forms/shifts.php'; ?>
    <form id="Form3">
        <p><b>дежурства (в любых палатах) в указанную смену.</b></p>
        <select name="department" id="select3">
            <?php foreach($departments as $department){
                echo '<option value="'.$department.'">'.$department.'</option>';
            }?>
        </select>
        <select name="shift" id="select4">
            <?php foreach($shifts as $shift){
                echo '<option value="'.$shift.'">'.$shift.'</option>';
            }?>
        </select>
        <p>
            <input type="button" value="Выбрать" onclick="get3();">
            <input type="button" value="Данные из LocalStorage" onclick="getLocal3(this);">
            <input type="button" value="Очистить" onclick="$('#result3').html('')">
        </p>
    </form>
    <table>
        <thead>
            <tr>
                <th>Смена</th>
                <th>Дата</th>
                <th>Медсестры</th>
                <th>Отделение</th>
                <th>Номера палат</th>
            </tr>
        </thead>
        <tbody id="result3">
            
        </tbody>
    </table>



</body>
</html>