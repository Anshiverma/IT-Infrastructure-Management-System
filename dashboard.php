<?php
session_start();
include("config.php");

if(!isset($_SESSION['admin'])){
    header("Location: index.php");
}

/* Fetch Statistics */
$total_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM assets");
$total_data = mysqli_fetch_assoc($total_query);
$total_assets = $total_data['total'];

$active_query = mysqli_query($conn, "SELECT COUNT(*) as active FROM assets WHERE status='Active'");
$active_data = mysqli_fetch_assoc($active_query);
$active_assets = $active_data['active'];

$inactive_query = mysqli_query($conn, "SELECT COUNT(*) as inactive FROM assets WHERE status='Inactive'");
$inactive_data = mysqli_fetch_assoc($inactive_query);
$inactive_assets = $inactive_data['inactive'];
?>

<!DOCTYPE html>
<html>
<head>
<title>IT Infrastructure Dashboard</title>

<style>

body{
    margin:0;
    font-family: 'Segoe UI', sans-serif;
    background:#f1f5f9;
}

/* Top Navbar */
.navbar{
    background:#1e293b;
    padding:15px 30px;
    text-align:right;
}

.navbar a{
    color:white;
    text-decoration:none;
    font-weight:bold;
    font-size:16px;
}

/* Main Section */
.container{
    text-align:center;
    padding:40px;
}

.title{
    font-size:28px;
    font-weight:bold;
    color:#1e293b;
}

.subtitle{
    margin-top:8px;
    color:#555;
    margin-bottom:40px;
}

/* Stats Section */
.stats{
    display:flex;
    justify-content:center;
    gap:30px;
    margin-bottom:40px;
    flex-wrap:wrap;
}

.stat-box{
    background:white;
    padding:25px;
    width:200px;
    border-radius:10px;
    box-shadow:0 4px 12px rgba(0,0,0,0.08);
}

.stat-box h2{
    margin:0;
    color:#2563eb;
}

.stat-box p{
    margin:5px 0 0;
    font-weight:bold;
    color:#444;
}

/* Cards */
.card-container{
    display:flex;
    justify-content:center;
    gap:30px;
    flex-wrap:wrap;
}

.card{
    background:white;
    width:230px;
    padding:30px;
    border-radius:10px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
    transition:0.3s;
}

.card:hover{
    transform:translateY(-5px);
}

.card h3{
    margin-bottom:20px;
    color:#333;
}

.btn{
    display:inline-block;
    padding:10px 20px;
    background:#2563eb;
    color:white;
    text-decoration:none;
    border-radius:6px;
    font-weight:bold;
}

.btn:hover{
    background:#1d4ed8;
}

</style>
</head>

<body>

<div class="navbar">
    <a href="logout.php">Logout</a>
</div>

<div class="container">

    <div class="title">
        IT Infrastructure Monitoring Dashboard
    </div>

    <div class="subtitle">
        Logged in as: <?php echo $_SESSION['admin']; ?>
    </div>

    <!-- Stats -->
    <div class="stats">
        <div class="stat-box">
            <h2><?php echo $total_assets; ?></h2>
            <p>Total Assets</p>
        </div>

        <div class="stat-box">
            <h2><?php echo $active_assets; ?></h2>
            <p>Active Assets</p>
        </div>

        <div class="stat-box">
            <h2><?php echo $inactive_assets; ?></h2>
            <p>Inactive Assets</p>
        </div>
    </div>

    <!-- Action Cards -->
    <div class="card-container">

        <div class="card">
            <h3>➕ Add New Asset</h3>
            <a class="btn" href="add_asset.php">Add Asset</a>
        </div>

        <div class="card">
            <h3>📋 View All Assets</h3>
            <a class="btn" href="assets.php">View Assets</a>
        </div>

        <div class="card">
            <h3>📊 Generate Report</h3>
            <a class="btn" href="report.php">Generate Report</a>
        </div>

        <div class="card">
            <h3>📥 Export to Excel</h3>
            <a class="btn" href="export_excel.php">Export Data</a>
        </div>

    </div>

</div>

</body>
</html>