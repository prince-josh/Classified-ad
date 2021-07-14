<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="exam.php" method="post" enctype = "multipart/form-data">
        <input type="text" name="account_title" id="" placeholder = "account title"> <br>
        <input type="text" name="opening_balance" id="" placeholder = "opening balance"> <br>
        <input type="text" name="mobile_number" id="" placeholder = "mobile number"> <br>
        <input type="file" name="photo" id="">
        <input type="submit" value="submit" name="submit">
    </form>

<?
    if (isset($_POST['submit'])) {
        $at = $_POST["account_title"];
        $ob = $_POST["opening_balance"];
        $mn = $_POST["mobile_number"];

        $pn = $_FILES["photo"]['name'];
        $tn = $_FILES["photo"]["tmp_name"];

        move_uploaded_file($tn, "images/$pn");
    }
?>
    <table>
    <tr>
        <th>Account Title</th>
        <th>Opening Balance</th>
        <th>Mobile Number</th>
        <th>Photo</th>
    </tr>
    <tr>
        <td><?php echo $at ;?></td>
        <td><?php echo $ob ;?></td>
        <td><?php echo $mn ;?></td>
        <td><img src="image/<?php echo $pn ;?>" alt=""></td>
    </tr>
    </table>
</body>
</html>