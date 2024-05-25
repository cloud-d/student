<?php
// Check if the teacher ID is provided
if (isset($_GET['id'])) {
    $teacherId = $_GET['id'];

    // Connect to the SQLite database
    $db = new SQLite3('database.db');

    // Prepare and execute the SQL query to delete the teacher with the given ID
    $stmt = $db->prepare('DELETE FROM teachers WHERE id = :id');
    $stmt->bindParam(':id', $teacherId, SQLITE3_INTEGER);

    if ($stmt->execute()) {
        // Teacher deleted successfully
        echo '<script>alert("Teacher deleted successfully."); window.location.href = "index.php";</script>';
    } else {
        // Error occurred while deleting the teacher
        echo '<script>alert("Error: Unable to delete teacher."); window.location.href = "index.php";</script>';
    }

    // Close the database connection
    $db->close();
} else {
    // Redirect back to index.php if the teacher ID is not provided
    header('Location: index.php');
    exit();
}
?>
