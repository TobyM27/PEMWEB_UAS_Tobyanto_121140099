<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $karakter_favorit = $_POST["karakter_favorit"];
    $usia_karakter = $_POST["usia_karakter"];
    $devilfruit = $_POST["devilfruit"];
    $asal_krew = $_POST["asal_krew"];
    $nilai_bounty = $_POST["nilai_bounty"];

    $sql = "UPDATE nakama SET karakter_favorit='$karakter_favorit', usia_karakter=$usia_karakter, devilfruit='$devilfruit', asal_krew='$asal_krew', nilai_bounty=$nilai_bounty WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header('Location: read.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
