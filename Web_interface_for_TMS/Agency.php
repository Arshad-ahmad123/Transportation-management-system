<?php
session_start();
include 'db_connect.php';

// --- Handle Edit Form Submission ---
if (isset($_POST['edit_submit'])) {
    $agency_id = trim($_POST['agency_id']);
    $name = trim($_POST['name']);
    $address = trim($_POST['address']);
    $description = trim($_POST['description']);

    try {
        $sql = "UPDATE Agency
                SET Name = ?, Address = ?, Description = ?
                WHERE Agency_ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $address, $description, $agency_id]);

        echo "<script>
                alert('✅ Agency updated successfully!');
                window.location.href = 'Agency.php';
              </script>";
        exit;
    } catch (PDOException $e) {
        echo "<script>
                alert('❌ Error updating agency: " . addslashes($e->getMessage()) . "');
                window.location.href = 'Agency.php';
              </script>";
        exit;
    }
}

// --- If Edit button clicked, fetch agency info ---
$edit_agency = null;
if (isset($_GET['edit_id'])) {
    $edit_id = trim($_GET['edit_id']);
    $stmt = $conn->prepare("SELECT * FROM Agency WHERE Agency_ID = ?");
    $stmt->execute([$edit_id]);
    $edit_agency = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Transportation_Management_System_Agency_tab</title>
<link rel="stylesheet" href="style.css">
<script>
    function showSection(sectionId) {
        document.getElementById("insertSection").style.display = "none";
        document.getElementById("editSection").style.display = "none";
        document.getElementById(sectionId).style.display = "block";
    }
</script>
</head>
<body>
<nav class="navigation_bar">
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="company.php">Company</a></li>
        <li><a href="Agency.php">Agency</a></li>
        <li><a href="employee.php">Employees</a></li>
        <li><a href="ticket.php">Ticket</a></li>
        <li><a href="bus.php">Buses</a></li>
        <li><a href="Passenger.php">Passengers</a></li>
        <li><a href="about.php">About us</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <form action="Agency.php" method="get" class="Search">
        <input type="search" name="q" class="Search_inp" placeholder="Search Here" value="<?php echo isset($_GET['q']) ? htmlspecialchars($_GET['q']) : ''; ?>">
        <button type="submit"><img src="images/search.svg" alt=""></button>
    </form>
</nav>

<div class="outer_div">
    <div class="Agencylist_div">
        <h1>Agencies List</h1>
        <table id="Table_show">
            <thead>
                <tr>
                    <th>Agency ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Description</th>
                    <th>Company ID</th>
                    <th colspan="2">Manage Agency</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    $query = "SELECT * FROM Agency";

                    // --- Active SQL Server-compatible search ---
                    if (isset($_GET['q']) && !empty(trim($_GET['q']))) {
                        $search = '%' . trim($_GET['q']) . '%';
                        $stmt = $conn->prepare("SELECT * FROM Agency WHERE Agency_ID LIKE ? OR Name LIKE ?");
                        $stmt->execute([$search, $search]);
                    } else {
                        $stmt = $conn->query($query);
                    }

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>{$row['Agency_ID']}</td>";
                        echo "<td>{$row['Name']}</td>";
                        echo "<td>{$row['Address']}</td>";
                        echo "<td>{$row['Description']}</td>";
                        echo "<td>{$row['Com_ID']}</td>";
                        echo "<td><a onclick=\"showSection('editSection')\" class='action-btn' href='Agency.php?edit_id=" . trim($row['Agency_ID']) . "'>Edit</a></td>";
                        echo "<td><a class='action-btn delete-btn' href='delete_agency.php?id=" . trim($row['Agency_ID']) . "'
                                  onclick=\"return confirm('Are you sure you want to delete this agency?');\">Delete</a></td>";
                        echo "</tr>";
                    }
                } catch (PDOException $e) {
                    echo "<tr><td colspan='7'>Error: {$e->getMessage()}</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="insert_div">
        <!-- INSERT AGENCY -->
        <section id="insertSection" class="form-box" style="<?php echo $edit_agency ? 'display:none;' : 'display:block;'; ?>">
            <h1>Insert Agency</h1>
            <form action="insert_agency.php" method="post">
                <label>Agency ID</label><br>
                <input type="text" name="agency_id" maxlength="10" required><br>

                <label>Name</label><br>
                <input type="text" name="name" required><br>

                <label>Address</label><br>
                <input type="text" name="address"><br>

                <label>Description</label><br>
                <input type="text" name="description"><br>

                <label>Company ID</label><br>
                <input type="text" name="com_id" maxlength="10" required><br>

                <input type="submit" class="submit" value="Save">
            </form>
        </section>

        <!-- EDIT AGENCY -->
        <section id="editSection" class="form-box" style="<?php echo $edit_agency ? 'display:block;' : 'display:none;'; ?>">
            <?php if ($edit_agency): ?>
                <h1>Edit Agency</h1>
                <form method="POST" action="Agency.php">
                    <a href="Agency.php" style="position:absolute; right: 5%; top: -40%;">❌</a>
                    <label>Agency ID</label><br>
                    <input type="text" name="agency_id" value="<?php echo htmlspecialchars($edit_agency['Agency_ID']); ?>" readonly><br>

                    <label>Name</label><br>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($edit_agency['Name']); ?>" required><br>

                    <label>Address</label><br>
                    <input type="text" name="address" value="<?php echo htmlspecialchars($edit_agency['Address']); ?>" required><br>

                    <label>Description</label><br>
                    <input type="text" name="description" value="<?php echo htmlspecialchars($edit_agency['Description']); ?>"><br>

                    <input type="submit" name="edit_submit"  class="submit" value="Update">
                </form>
            <?php endif; ?>
        </section>
        <br><br>
    </div>
</div>
  <footer>
    <p>&copy; 2025 Transportation Management System | All Rights Reserved</p>
  </footer>
</body>
</html>
