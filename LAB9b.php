<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sort Student Records</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 20px; }
        table { margin: auto; border-collapse: collapse; width: 80%; }
        th, td { padding: 10px; border: 1px solid #ddd; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h1>Sorted Student Records</h1>
    <table>
        <tr><th>ID</th><th>Name</th><th>Grade</th></tr>
        <?php
        // Connect to MySQL
        $conn = new mysqli("localhost", "root", "1239", "students124");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query with sorting by name (change to grade if needed)
        $sql = "SELECT * FROM students124 ORDER BY name ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output each row
            while ($student = $result->fetch_assoc()) {
                echo "<tr><td>{$student['id']}</td><td>{$student['name']}</td><td>{$student['grade']}</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No records found</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
