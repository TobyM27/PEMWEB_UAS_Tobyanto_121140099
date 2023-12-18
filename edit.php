<?php
include "config.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT * FROM nakama WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // You can use the data to pre-fill a form for editing
        $karakter_favorit = $row["karakter_favorit"];
        $usia_karakter = $row["usia_karakter"];
        $devilfruit = $row["devilfruit"];
        $asal_krew = $row["asal_krew"];
        $nilai_bounty = $row["nilai_bounty"];
    } else {
        echo "Record not found";
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>

<!-- HTML Form for Editing -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
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
    <form action="update.php" method="post">
        <h2>Edit Record</h2>
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label for="karakter_favorit">Karakter Favorit:</label>
        <input type="text" name="karakter_favorit" value="<?php echo $karakter_favorit; ?>" required>

        <label for="usia_karakter">Usia Karakter:</label>
        <input type="text" name="usia_karakter" value="<?php echo $usia_karakter; ?>" required>

        <label for="devilfruit">Devilfruit:</label>
        <input type="text" name="devilfruit" value="<?php echo $devilfruit; ?>" required>

        <label for="asal_krew">Asal Krew:</label>
        <input type="text" name="asal_krew" value="<?php echo $asal_krew; ?>" required>

        <label for="nilai_bounty">Nilai Bounty:</label>
        <input type="text" name="nilai_bounty" value="<?php echo $nilai_bounty; ?>" required>

        <input type="submit" value="Update">
    </form>
</body>

</html>


