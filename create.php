<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $karakter_favorit = $_POST["karakter_favorit"];
    $usia_karakter = $_POST["usia_karakter"];
    $devilfruit = $_POST["devilfruit"];
    $asal_krew = $_POST["asal_krew"];
    $nilai_bounty = $_POST["nilai_bounty"];

    $sql = "INSERT INTO nakama (karakter_favorit, usia_karakter, devilfruit, asal_krew, nilai_bounty) VALUES ('$karakter_favorit', $usia_karakter, '$devilfruit', '$asal_krew', $nilai_bounty)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('Location: read.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} 

$conn->close();
?>

<!-- create_form.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #1f618d;
        }
    </style>
</head>

<body>
    <form action="create.php" method="post">
        <h2>Create New Record</h2>
        <label for="karakter_favorit">Karakter Favorit:</label>
        <input type="text" name="karakter_favorit" required>

        <label for="usia_karakter">Usia Karakter:</label>
        <input type="number" name="usia_karakter" required>

        <label for="devilfruit">Devilfruit:</label>
        <input type="text" name="devilfruit" required>

        <label for="asal_krew">Asal Krew:</label>
        <input type="text" name="asal_krew" required>

        <label for="nilai_bounty">Nilai Bounty:</label>
        <input type="number" name="nilai_bounty" required>

        <input type="submit" value="Create Record">
    </form>
</body>

</html>
