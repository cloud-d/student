<!DOCTYPE html>
<html>
<head>
    <title>Add Teacher</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Add the Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <a href="index.php" class="btn btn-primary">
        Teacher List
    </a>
    <br><br>
    <h2>Add Teacher</h2>
    <form action="add_teacher.php" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="class">Class:</label>
            <input type="text" class="form-control" id="class" name="class" required>
        </div>
        <div class="form-group">
            <label for="states">States:</label>
            <input type="text" class="form-control" id="states" name="states" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Teacher</button>
    </form>
</div>

<!-- Add the Bootstrap JS and jQuery scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
