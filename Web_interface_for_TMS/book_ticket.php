<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = trim($_POST['id']);
    $time = trim($_POST['time']);
    $date = trim($_POST['date']);
    $from = trim($_POST['from']);
    $to = trim($_POST['to']);
    $seat_no = trim($_POST['seat_no']);
    $price = trim($_POST['price']);
    $ticket_type = trim($_POST['ticket_type']);
    $ticket_status = trim($_POST['ticket_status']);

    try {
        // Insert into Ticket table
        $sql = "INSERT INTO Ticket (ID, Time, Date, [From], [To], Seat_No, Price)
                VALUES (:id, :time, :date, :fromP, :toP, :seat_no, :price)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':fromP', $from);
        $stmt->bindParam(':toP', $to);
        $stmt->bindParam(':seat_no', $seat_no);
        $stmt->bindParam(':price', $price);
        $stmt->execute();

        // Insert into Ticket_Status
        $sql2 = "INSERT INTO Ticket_Status (ID, Active, Canceled)
                 VALUES (:id, :active, :canceled)";
        $stmt2 = $conn->prepare($sql2);
        $active = ($ticket_status == 1) ? 1 : 0;
        $canceled = ($ticket_status == 2) ? 1 : 0;
        $stmt2->bindParam(':id', $id);
        $stmt2->bindParam(':active', $active);
        $stmt2->bindParam(':canceled', $canceled);
        $stmt2->execute();

        // Insert into Ticket_Type
        $sql3 = "INSERT INTO Ticket_Type (ID, VIP, Normal)
                 VALUES (:id, :vip, :normal)";
        $stmt3 = $conn->prepare($sql3);
        $vip = ($ticket_type == 1) ? 1 : 0;
        $normal = ($ticket_type == 2) ? 1 : 0;
        $stmt3->bindParam(':id', $id);
        $stmt3->bindParam(':vip', $vip);
        $stmt3->bindParam(':normal', $normal);
        $stmt3->execute();

        echo "<script>alert('✅ Ticket booked successfully!'); window.location.href='ticket.php';</script>";
    } catch (PDOException $e) {
        echo "<script>alert('❌ Error booking ticket: " . addslashes($e->getMessage()) . "');</script>";
    }
}
?>
