<?php
if (isset($_GET['id'])) {
    // Connect to the SQLite database
    $db = new SQLite3('database.db');

    $id = $_GET['id'];

    // Prepare and execute the SQL query to fetch the teacher by their ID
    $stmt = $db->prepare('SELECT * FROM teachers WHERE id = :id');
    $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
    $result = $stmt->execute();

    // Check if the teacher with the provided ID exists
    if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        // Teacher exists, display the edit form
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process form submission and update teacher data
            $name = $_POST['name'];
            $class = $_POST['class'];
            $states = $_POST['states'];

            // Prepare and execute the SQL query to update teacher data
            $stmt = $db->prepare('UPDATE teachers SET name = :name, class = :class, states = :states WHERE id = :id');
            $stmt->bindParam(':name', $name, SQLITE3_TEXT);
            $stmt->bindParam(':class', $class, SQLITE3_TEXT);
            $stmt->bindParam(':states', $states, SQLITE3_TEXT);
            $stmt->bindParam(':id', $id, SQLITE3_INTEGER);

            if ($stmt->execute()) {
                // Teacher data updated successfully
                echo '<script>alert("Teacher data updated successfully."); window.location.href = "index.php";</script>';
                exit;
            } else {
                // Error occurred while updating teacher data
                echo '<script>alert("Error: Unable to update teacher data.");</script>';
            }
        }
    } else {
        // Teacher with the provided ID doesn't exist
        echo '<script>alert("Error: Teacher ID not found."); window.location.href = "index.php";</script>';
    }

    // Close the database connection
    $db->close();
} else {
    // No ID provided
    echo '<script>alert("Error: Teacher ID not provided."); window.location.href = "index.php";</script>';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Teacher</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Add the Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
<a href="index.php" class="btn btn-primary">Back</a>
<br><br>
    <h2>Edit Teacher</h2>
    <form method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
        </div>
        <div class="form-group">
            <label for="class">Class:</label>
            <input type="text" class="form-control" id="class" name="class" value="<?php echo htmlspecialchars($row['class']); ?>" required>
        </div>
        <div class="form-group">
            <label for="states">States:</label>
            <input type="text" class="form-control" id="states" name="states" value="<?php echo htmlspecialchars($row['states']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Teacher</button>
    </form>
</div>

<!-- Add the Bootstrap JS and jQuery scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
