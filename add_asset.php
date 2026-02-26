<?php
include("config.php");
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: index.php");
}

$success = "";

if(isset($_POST['submit'])){
    $name = $_POST['asset_name'];
    $type = $_POST['asset_type'];
    $location = $_POST['location'];
    $date = $_POST['purchase_date'];
    $status = $_POST['status'];

    mysqli_query($conn,"INSERT INTO assets(asset_name,asset_type,location,purchase_date,status)
    VALUES('$name','$type','$location','$date','$status')");

    $success = "Asset Added Successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Asset</title>

<style>

body{
    margin:0;
    font-family:'Segoe UI', sans-serif;
    background:#f4f6f9;
}

/* Navbar */
.navbar{
    background:#1e293b;
    padding:18px 40px;
    color:white;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

.navbar a{
    color:white;
    text-decoration:none;
    font-weight:600;
    margin-left:15px;
}

.navbar a:hover{
    color:#38bdf8;
}

/* Container */
.container{
    width:85%;
    margin:50px auto;
}

/* Card */
.card{
    background:white;
    padding:50px;
    border-radius:14px;
    box-shadow:0 8px 30px rgba(0,0,0,0.08);
}

/* Heading */
h2{
    text-align:center;
    margin-bottom:40px;
    color:#1e293b;
    font-size:28px;
    letter-spacing:1px;
}

/* Form Layout */
.form-row{
    display:flex;
    gap:40px;   /* more gap between Asset Name & Type */
    margin-bottom:30px;
}

.form-group{
    flex:1;
}

label{
    display:block;
    margin-bottom:8px;
    font-weight:600;
    color:#475569;
    font-size:14px;
}

input, select{
    width:100%;
    padding:12px;
    border:1px solid #d1d5db;
    border-radius:8px;
    font-size:14px;
    transition:0.3s;
    background:#f9fafb;
}

input:focus, select:focus{
    border-color:#2563eb;
    background:white;
    box-shadow:0 0 0 3px rgba(37,99,235,0.1);
    outline:none;
}

/* Button */
.btn{
    padding:14px;
    border:none;
    border-radius:8px;
    font-weight:600;
    cursor:pointer;
    font-size:15px;
    transition:0.3s;
}

.btn-primary{
    background:#2563eb;
    color:white;
    width:100%;
}

.btn-primary:hover{
    background:#1d4ed8;
    transform:translateY(-2px);
}

/* Success Message */
.success{
    background:#ecfdf5;
    color:#065f46;
    padding:12px;
    border-radius:8px;
    margin-bottom:25px;
    text-align:center;
    font-weight:600;
    border:1px solid #10b981;
}

</style>
</head>

<body>

<div class="navbar">
    <div><strong>IT Infrastructure System</strong></div>
    <div>
        <a href="dashboard.php">Dashboard</a> |
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="container">

<div class="card">

<h2>➕ Add New Asset</h2>

<?php if($success != ""){ ?>
    <div class="success"><?php echo $success; ?></div>
<?php } ?>

<form method="POST">

    <div class="form-row">
        <div class="form-group">
            <label>Asset Name</label>
            <input type="text" name="asset_name" required>
        </div>

        <div class="form-group">
            <label>Asset Type</label>
            <input type="text" name="asset_type" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label>Location</label>
            <input type="text" name="location" required>
        </div>

        <div class="form-group">
            <label>Purchase Date</label>
            <input type="date" name="purchase_date" required>
        </div>
    </div>

    <div class="form-group" style="margin-bottom:20px;">
        <label>Status</label>
        <select name="status">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select>
    </div>

    <button class="btn btn-primary" name="submit">Add Asset</button>

</form>

</div>

</div>

</body>
</html>