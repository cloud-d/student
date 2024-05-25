<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connect to the SQLite database
    $db = new SQLite3('database.db');

    // Retrieve form data
    $name = $_POST['name'];
    $class = $_POST['class'];
    $states = $_POST['states'];

    // Prepare and execute the SQL query to insert the new teacher
    $stmt = $db->prepare('INSERT INTO teachers (name, class, states) VALUES (:name, :class, :states)');
    $stmt->bindParam(':name', $name, SQLITE3_TEXT);
    $stmt->bindParam(':class', $class, SQLITE3_TEXT);
    $stmt->bindParam(':states', $states, SQLITE3_TEXT);

    if ($stmt->execute()) {
        // Teacher added successfully
        echo '<script>alert("Teacher added successfully."); window.location.href = "index.php";</script>';
    } else {
        // Error occurred while adding the teacher
        echo '<script>alert("Error: Unable to add teacher."); window.location.href = "index.php";</script>';
    }

    // Close the database connection
    $db->close();
} else {
    // Redirect to the form if the request method is not POST
    header('Location: index.php');
    exit();
}
?>
