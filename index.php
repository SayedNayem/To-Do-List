<?php include("config.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container mt-5">
        <h1>To-Do List</h1>
        <div class="row">
            <div class="col-md-8">

                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="taskInput" placeholder="Add a new task">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" id="addTask">ADD TASK</button>
                    </div>
                </div>

                
                <div class="favorite-block">
                    <h3>Favorites</h3>
                    <ul class="list-group" id="favoritesList">
                        
                    </ul>
                </div>

                ->
                <div class="inbox-block">
                    <h3>Inbox</h3>
                    <ul class="list-group" id="inboxList">
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
   

    <!-- PHP code to add tasks to the database -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $task_name = $_POST["task"];
        $sql = "INSERT INTO tasks (task_name) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $task_name);

        if ($stmt->execute()) {
            header("Location: index.php"); // Redirect back to the to-do list page
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
    ?>

    <!-- ... (rest of your HTML code) ... -->
</body>
</html>