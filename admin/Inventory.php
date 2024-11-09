<?php

include '../includes/session.php';
// $conn = conn(); // Ensure you establish a connection


// // Insert a new sale
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     // Data from form
//     $sale_date = $_POST['sale_date'];
//     $customer_name = $_POST['customer_name'];
//     $customer_contact = $_POST['customer_contact'];
//     $medication = $_POST['medication'];
//     $quantity = $_POST['quantity'];
//     $price = $_POST['price'];

//     // Insert into table_sales
//     $sql_sale = "INSERT INTO table_sales (sale_date, customer_name, customer_contact) 
//                  VALUES ('$sale_date', '$customer_name', '$customer_contact')";
//     if ($conn->query($sql_sale) === TRUE) {
//         $sale_id = $conn->insert_id; // Get the last inserted sale ID

//         // Insert into sales_items
//         $sql_item = "INSERT INTO sales_items (sale_id, medication, quantity, price) 
//                      VALUES ($sale_id, '$medication', $quantity, $price)";
//         if ($conn->query($sql_item) === TRUE) {
//             echo "Sale and item added successfully!";
//         } else {
//             echo "Error adding item: " . $conn->error;
//         }
//     } else {
//         echo "Error adding sale: " . $conn->error;
//     }
// }

// $conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Dashboard - SB Admin</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">


    <?php include '../includes/shared/header.php' ;?>
    <!-- Top Navigation Code -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include '../includes/admin//sidebar.php' ;?>
            <!-- Sidebar Code -->
        </div>
        <div id="layoutSidenav_content">
            <main>
                <!-- Add content here -->
                <form method="POST">
                    Sale Date: <input type="date" name="sale_date" required><br>
                    Customer Name: <input type="text" name="customer_name" required><br>
                    Customer Contact: <input type="text" name="customer_contact" required><br>
                    Medication: <input type="text" name="medication" required><br>
                    Quantity: <input type="number" name="quantity" required><br>
                    Price: <input type="number" name="price" step="0.01" required><br>
                    <input type="submit" value="Add Sale">
                </form>
            </main><?php include '../includes/shared/footer.php' ;?>
        </div>
    </div>
    </div><?php include '../includes/scripts.php' ;?>
</body>

</html>