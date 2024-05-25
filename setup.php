<?php
// Connect to the SQLite database
$db = new SQLite3('database.db');

// Check if the "teachers" table exists
$tableExists = $db->querySingle("SELECT 1 FROM sqlite_master WHERE type='table' AND name='teachers'");

// If the "teachers" table does not exist, create it
if (!$tableExists) {
    $db->exec("CREATE TABLE teachers (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        class TEXT NOT NULL,
        states TEXT NOT NULL
    )");
}
?>
