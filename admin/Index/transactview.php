<?php
include 'include/header.php';
include 'include/sidebar.php';
include 'include/top-header.php';
?>

<div class="container-fluid body-area mt-5">
  <div class="row mt-2">
    <div class="col-md-12 col-sm-12">
      <h5 class="pt-4"><a href="./index.php" style="text-decoration: none; font-weight: bold;">Home</a></h5>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 col-sm-12 view-area mt-2 p-1">
      <div class="card">
        <div class="card-header">
          <h4 class="text-center">View Transactions</h4>
        </div>

        <div class="card-body">
          <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Transaction Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include 'Sql/config.php';

              $sql = "SELECT * FROM transactions ORDER BY transaction_date DESC";
              $result = mysqli_query($conn, $sql);

              if ($result && mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                      // Ensure every cell exists, even if empty
                      $id = $row['ID'] ?? '';
                      $user_name = htmlspecialchars($row['user_name'] ?? '');
                      $email = htmlspecialchars($row['email'] ?? '');
                      $product_name = htmlspecialchars($row['product_name'] ?? '');
                      $quantity = $row['quantity'] ?? '';
                      $total_price = number_format($row['total_price'] ?? 0, 2);
                      $transaction_date = $row['transaction_date'] ?? '';
                      $status = $row['status'] ?? '';
              ?>
              <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $user_name; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $product_name; ?></td>
                <td><?php echo $quantity; ?></td>
                <td>$<?php echo $total_price; ?></td>
                <td><?php echo $transaction_date; ?></td>
                <td>
                  <?php 
                    if ($status === 'completed') {
                        echo '<span class="badge badge-success">Completed</span>';
                    } elseif ($status === 'pending') {
                        echo '<span class="badge badge-warning">Pending</span>';
                    } else {
                        echo '<span class="badge badge-secondary">'.htmlspecialchars($status).'</span>';
                    }
                  ?>
                </td>
                <td>
                  <a href="edit_transaction.php?id=<?php echo $id; ?>" class="badge badge-primary">Edit</a>
                  <a href="Sql/t_delete.php?id=<?php echo $id; ?>" class="badge badge-danger">Delete</a>
                </td>
              </tr>
              <?php
                  }
              } else {
                  echo '<tr><td colspan="9" class="text-center">No transactions found</td></tr>';
              }

              mysqli_close($conn);
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include 'include/footer.php';
?>
