<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];

    $file = fopen("transactions.txt", "a");
    fwrite($file, "$date\t$description\t$amount\n");
    fclose($file);

    header("Location: index.html");
    exit();
}
?>
