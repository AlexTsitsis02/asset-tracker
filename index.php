<?php include "db.php"; ?>

<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Asset Tracker</title>
</head>
<body>

<h1>Simple Asset Tracker</h1>

<form action="add.php" method="POST" class="form-box">
    <input type="text" name="name" placeholder="Asset name" required>
    <input type="text" name="location" placeholder="Location" required>

    <select name="status">
        <option value="Available">Available</option>
        <option value="In Use">In Use</option>
        <option value="Missing">Missing</option>
    </select>

    <button type="submit">Add Asset</button>
</form>

<h2>All Assets</h2>

<table>
    <tr>
        <th>Name</th>
        <th>Location</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>

    <?php
    $result = $conn->query("SELECT * FROM assets ORDER BY id DESC");

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['location']}</td>
                <td>{$row['status']}</td>
                <td>
                    <form action='update.php' method='POST'>
                        <input type='hidden' name='id' value='{$row['id']}'>
                        <select name='status'>
                            <option value='Available'>Available</option>
                            <option value='In Use'>In Use</option>
                            <option value='Missing'>Missing</option>
                        </select>
                        <button>Update</button>
                    </form>
                </td>
              </tr>";
    }
    ?>
</table>

</body>
</html>
