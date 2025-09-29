<?php
include 'Sql/config.php';

if (isset($_POST['order_id']) && isset($_POST['action'])) {
    $order_id = intval($_POST['order_id']);
    $status = ($_POST['action'] === 'Delivered') ? 'Delivered' : 'Pending';

    $sql = "UPDATE ordered SET status = '$status' WHERE ID = $order_id";
    mysqli_query($conn, $sql);
}

header("Location: admin-dashboard.php");
exit;
