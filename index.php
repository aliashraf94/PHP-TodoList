<?php
//  Setting up databases variables
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "todo_list";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

 }

$sql = "SELECT * FROM todolist";
$result = $conn->query($sql);
// var_dump($result);
if ($result->num_rows > 0) {
    // output data of each row
    while($rows = $result->fetch_assoc()) {
        // var_dump($rows);
    }
} else {
    echo "0 results";
}

 $conn->close();

?>

<?php 
//  Setting up databases variables
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "todo_list";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

 }

 if(isset($_POST['submit']))
{	 
	 $title = $_POST['title'];
	 $description = $_POST['description'];
	 $sql = "INSERT INTO `todolist`(`title`, `description`) VALUES ('$title','$description')";
	 if (mysqli_query($conn, $sql)) {
		// echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>To Do List</title>
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body>
        <h1 class="heading" >To Do List</h1>

        <div class="add-div" >
            <form method="POST" action="index.php" >
            <h3>Title:</h3>
            <input type="text" name="title" placeholder="Title" /> 
            <h3>Description:</h3>
            <input class="placeholder" type="text" name="description" placeholder="Description" />
            <!-- <input type="submit" name="submit" value="Add New" ></input> -->
            <button class="add-task" type="submit" name="submit" >Add Task</button>
            </form>
        </div>

    <div >
            <?php foreach((object)$result as $row):   ?>
    <form action="post" class="card">
        <div class="items">
        <div>
            <input type="checkbox" id="checkbox" name="checkbox" value="checkbox">
            <h2><?php echo $row['id']. '.';  ?></h2> </br>
            <h2><?php echo $row['title'];  ?></h2>
            <h3><?php echo $row['description'];  ?></h3>
        </div>
         <div>
            <!-- <button>Edit</button> -->
        </div>
        </div>
        
    </form>
            <?php endforeach ?>
    <div class="add-btn">
        <!-- <button >Add Task</button> -->
    </div>

</div>
</body>
</html>