<?php
session_start();

$database = mysqli_connect("localhost", "root", "");
mysqli_select_db($database, "filmovi");

if($_REQUEST['id']){
    $id= $_REQUEST['id'];
    $sql = "SELECT * FROM slike WHERE id=$id";
    $query = mysqli_query($database,$sql);
}
mysqli_close($database)


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

                <?php foreach($query as $q){?>
               
                    <h1><?php echo $q['ime_filma']; ?></h1>
                    
                <?php } ?>
    
</body>
</html>