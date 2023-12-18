<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nakama Characters</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            /* background-color: #f4f4f4; */
            background-image: linear-gradient(
                130deg,
                rgba(255,179,0, 0.8),
                rgba(0,185,255, 0.7)
                ),
            url(Assets/wallpaperAsset.jpeg);
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            color: #1f618d;
        }

        .action-column a {
            margin-right: 5px;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            font-size: 14px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .btn-primary {
            background-color: #3498db;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #1f618d;
        }

        .btn-warning {
            background-color: #f39c12;
            color: #fff;
        }

        .btn-warning:hover {
            background-color: #d35400;
        }

        .btn-danger {
            background-color: #e74c3c;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        .btn-success {
            background-color: #2ecc71;
            color: #fff;
        }

        .btn-success:hover {
            background-color: #27ae60;
        }
    </style>
</head>
<body>

    <h1>Nakama Characters</h1>

    <?php
    include "config.php";

    $sql = "SELECT * FROM nakama";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Karakter Favorit</th>
                    <th>Usia Karakter</th>
                    <th>Devilfruit</th>
                    <th>Asal Krew</th>
                    <th>Nilai Bounty</th>
                    <th>Action</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["karakter_favorit"] . "</td>
                    <td>" . $row["usia_karakter"] . "</td>
                    <td>" . $row["devilfruit"] . "</td>
                    <td>" . $row["asal_krew"] . "</td>
                    <td>" . $row["nilai_bounty"] . "</td>
                    <td class='action-column'>
                        <a class='btn btn-primary' href='edit.php?id=" . $row["id"] . "'>Edit</a>
                        <a class='btn btn-danger' href='hapus.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>
                    </td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>

    <div style="text-align: center; margin-top: 20px;">
        <a class="btn btn-success" href="create.php">Create</a>
    </div>

</body>
</html>
