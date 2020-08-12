<?php 
$conn = mysqli_connect('localhost', 'Hitoshi', 'ssjHitoshi', 'dbTodo');
$posts = mysqli_query($conn, "SELECT * FROM dbpost");

$sql = "SELECT * FROM 'dbpost'"; 
$result = mysqli_query($conn, $sql);

if(isset($_POST['submit'])) {
    $input = $_POST['input'];
    mysqli_query($conn, "INSERT INTO dbpost (input) VALUES ('$input')");
    header('location: index.php');


} 

if(isset($_GET['del_task'])) {
    $id = $_GET['del_task'];
    mysqli_query($conn, "DELETE FROM dbpost WHERE id=$id");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <header>
    <?php
    if(!$conn) {
   echo 'Connection error: ' + mysqli_connect_error();
} 
   ?>
    <h1>PHP Todolist</h1>
    <h3><b> Database Edition</b></h3>
    </header>
<form method="POST">
    <label>Enter something...</label> 
    <input type="text" name="input"> 
    <button id="btn" name="submit">Submit</button>
</form>

<?php while ($row = mysqli_fetch_array($posts)) {  ?>
<div class="result-post">
<?php echo $row['input']; ?> 
<a href="index.php?del_task=<?php echo $row['id']; ?>"><i class="material-icons clear">clear</i></a>
</div>
<?php } ?>


</body>
</html> 
