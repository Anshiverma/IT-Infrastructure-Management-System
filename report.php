<?php
include("config.php");
$result = mysqli_query($conn,"SELECT * FROM assets");
?>

<!DOCTYPE html>
<html>
<head>
<title>Asset Report</title>

<style>

body{
    margin:0;
    font-family:'Segoe UI', sans-serif;
    background:#f4f6f9;
}

/* Title */
h2{
    text-align:center;
    margin:40px 0 20px 0;
    color:#1e293b;
    font-size:28px;
}

/* Report Card */
.report-container{
    width:85%;
    margin:0 auto 50px auto;
    background:white;
    padding:40px;
    border-radius:12px;
    box-shadow:0 8px 25px rgba(0,0,0,0.08);
}

/* Table Styling */
table{
    width:100%;
    border-collapse:collapse;
    font-size:15px;
}

th{
    background:#1e293b;
    color:white;
    padding:12px;
    text-align:left;
}

td{
    padding:12px;
    border-bottom:1px solid #e5e7eb;
}

tr:hover{
    background:#f1f5f9;
}

/* Status Badge */
.status-active{
    background:#dcfce7;
    color:#166534;
    padding:5px 10px;
    border-radius:20px;
    font-size:13px;
    font-weight:600;
}

.status-inactive{
    background:#fee2e2;
    color:#991b1b;
    padding:5px 10px;
    border-radius:20px;
    font-size:13px;
    font-weight:600;
}

</style>
</head>

<body>

<h2>Asset Report</h2>

<div class="report-container">

<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Type</th>
<th>Location</th>
<th>Status</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['asset_name']; ?></td>
<td><?php echo $row['asset_type']; ?></td>
<td><?php echo $row['location']; ?></td>

<td>
<?php 
if($row['status'] == "Active"){
    echo "<span class='status-active'>Active</span>";
}else{
    echo "<span class='status-inactive'>Inactive</span>";
}
?>
</td>

</tr>
<?php } ?>

</table>

</div>

</body>
</html>