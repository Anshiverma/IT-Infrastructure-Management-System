<?php
include("config.php");
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: index.php");
}

/* Delete Function */
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM assets WHERE id=$id");
    header("Location: assets.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Asset List</title>

<style>
body{
    font-family:'Segoe UI', sans-serif;
    background:#f1f5f9;
    margin:0;
}

.container{
    width:90%;
    margin:40px auto;
}

h2{
    text-align:center;
    margin-bottom:30px;
}

.top-bar{
    display:flex;
    justify-content:space-between;
    margin-bottom:20px;
}

.btn{
    padding:8px 15px;
    background:#2563eb;
    color:white;
    text-decoration:none;
    border-radius:5px;
    font-weight:bold;
}

.btn-danger{
    background:#dc2626;
}

.btn-warning{
    background:#f59e0b;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

th, td{
    padding:12px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

th{
    background:#1e293b;
    color:white;
}

.status-active{
    background:#16a34a;
    color:white;
    padding:4px 10px;
    border-radius:5px;
}

.status-inactive{
    background:#dc2626;
    color:white;
    padding:4px 10px;
    border-radius:5px;
}
</style>
</head>

<body>

<div class="container">

<h2>Asset List</h2>

<div class="top-bar">
    <a class="btn" href="dashboard.php">⬅ Back to Dashboard</a>
    <a class="btn" href="add_asset.php">➕ Add New Asset</a>
</div>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Type</th>
    <th>Location</th>
    <th>Purchase Date</th>
    <th>Status</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM assets");

while($row = mysqli_fetch_assoc($result)){
?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['asset_name']; ?></td>
    <td><?php echo $row['asset_type']; ?></td>
    <td><?php echo $row['location']; ?></td>
    <td><?php echo $row['purchase_date']; ?></td>

    <td>
        <?php if($row['status']=="Active"){ ?>
            <span class="status-active">Active</span>
        <?php } else { ?>
            <span class="status-inactive">Inactive</span>
        <?php } ?>
    </td>

    <td>
        <a class="btn btn-warning" href="edit_asset.php?id=<?php echo $row['id']; ?>">Edit</a>
    </td>

    <td>
        <a class="btn btn-danger" href="assets.php?delete=<?php echo $row['id']; ?>" 
        onclick="return confirm('Are you sure you want to delete this asset?')">Delete</a>
    </td>
</tr>

<?php } ?>

</table>

</div>

</body>
</html>