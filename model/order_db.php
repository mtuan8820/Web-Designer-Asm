<?php
    function add_order($table_id, $product_id, $quantity, $price, $status='request') {
        //add order to database
        require('model\db.php');
        mysqli_query($con, "INSERT INTO bills (table_id, product_id, quantity, price, status)
                            VALUES ($table_id, $product_id, $quantity, $price, '$status')");
    }

    function pay_bill($tableId) {
        include('model\db.php');
        mysqli_query($con, "UPDATE bills 
                            SET status='paid'
                            WHERE table_id=$tableId");
    }

    function cancel_bill_db($billId) {
        include('model\db.php');
        mysqli_query($con, "UPDATE bills 
                            SET status='canceled'
                            WHERE id=$billId");
    }

    function cancel_order($tableId) {
        //delete order to database
        include('model\db.php');
        mysqli_query($con, "UPDATE bills 
                            SET status='canceled'
                            WHERE table_id=$tableId AND status='request'");
    }

    function updateOrder() {
        //update order's information to database
        require('db.php');
    }

    function get_history($customerId) {
        require('db.php');
        
    }
?>