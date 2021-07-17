<?php
    // method 1 with postgress databases
    // $dbhost = 'localhost';
    // $dbname='cyf_ecommerce';
    // $dbuser = 'postgres';
    // $dbpass = 'migracode';
 
    // $dbconn = pg_connect("host=$dbhost dbname=$dbname user=$dbuser password=$dbpass")
    //     or die('Could not connect: ' . pg_last_error());

    // $query = 'SELECT * FROM todo';
    // $result = pg_query($query) or die('Error message: ' . pg_last_error());

    // while ($rows = pg_fetch_row($result)) {
    //     var_dump($rows);
    // }

    // pg_free_result($result);
    // pg_close($dbconn);


    // method 2
    // Create Connection
    $conn = mysqli_connect('localhost', 'root', 'root', 'todo_list');

    // Check Connection
    if(mysqli_connect_errno()){
        // Connection Failed
        echo 'Failed to connect to MySQL'. mysqli_connect_errno();
    }
    // Create Query
    $query = 'SELECT * FROM `todolist`'

    // Get Result
    $result = mysqli_query($conn, $query);
    // $result = $conn->query($query);

    // Fetch Data
    $lists = mysqli_fetch_all($result, MYSQLI_ASSOC);
    var_dump($lists)
    // Free the result
    mysqli_free_result($result);
    // Close Connection
    mysqli_close($conn);

// $servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "todo_list";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);

//  } 

// $sql = "SELECT * FROM todolist";
// $result = $conn->query($sql);
// var_dump($result);
// if ($result->num_rows > 0) {
//     // output data of each row
//     while($rows = $result->fetch_assoc()) {
//         // var_dump($rows);
//     }
// } else {
//     echo "0 results";
// }
//  $conn->close();

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
    <div >
    <form action="post" class="card">
        <div class="items">
        <div>
            <?php foreach((object)$result as $row):   ?>
            <input type="checkbox" id="checkbox" name="checkbox" value="checkbox">
            <h2><?php echo $row;  ?></h2>
            <h3><?php echo $row;  ?></h3>
            <?php endforeach ?>
        </div>
         <div>
            <button>Edit</button>
        </div>
        </div>
        
    </form>
    <div class="add-btn">
        <button >Add Task</button>
    </div>

    <div class="add-div" >
        <form method="GET" action="index.php" >
        <h3>Title:</h3>
        <input type="text" name="title" placeholder="Title" /> 
        <h3>Description:</h3>
        <input type="text" name="description" placeholder="Description" /> 
        <button type="submit">Submit</button>
        </form>
    </div>
</div>
</body>
</html>