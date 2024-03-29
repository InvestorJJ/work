<?php
// Assuming you have a database connection established

// Retrieve tasks from the database
// Change the query according to your database schema and table names
$query = "SELECT * FROM tasks";
$result = mysqli_query($connection, $query);

// Create an array to store task data
$tasks = array();

// Check if there are any tasks
if (mysqli_num_rows($result) > 0) {
    // Loop through the tasks and add them to the array
    while ($row = mysqli_fetch_assoc($result)) {
        $task = array(
            "id" => $row['id'],
            "text" => $row['title'],
            "start_date" => $row['start_date'],
            "end_date" => $row['end_date'],
            "progress" => $row['progress'],
            // Add other task properties as needed
        );
        
        array_push($tasks, $task);
    }
}

// Close the database connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.css">
    <script src="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.js"></script>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }
        
        #gantt_chart {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <div id="gantt_chart"></div>

    <script>
        // Initialize Gantt chart
        gantt.init("gantt_chart");
        
        // Configure Gantt chart properties and display tasks
        gantt.config.xml_date = "%Y-%m-%d";
        gantt.config.scale_unit = "day";
        gantt.config.step = 1;
        gantt.config.date_scale = "%d %M";
        gantt.config.grid_width = 400;
        gantt.config.grid_resize = true;
        gantt.config.drag_move = false;
        gantt.config.drag_resize = false;
        gantt.config.drag_progress = false;
        gantt.config.drag_links = false;
        gantt.config.lightbox.sections = [
            { name: "description", height: 38, map_to: "text", type: "textarea", focus: true },
            { name: "time", height: 72, type: "duration", map_to: "auto" }
        ];

        gantt.parse(<?php echo json_encode($tasks); ?>);
    </script>
</body>
</html>