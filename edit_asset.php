<?php
include("config.php");

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM assets WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])) {
    $name = $_POST['asset_name'];
    $type = $_POST['asset_type'];
    $location = $_POST['location'];
    $date = $_POST['purchase_date'];
    $status = $_POST['status'];

    mysqli_query($conn, "UPDATE assets SET 
        asset_name='$name',
        asset_type='$type',
        location='$location',
        purchase_date='$date',
        status='$status'
        WHERE id=$id");

    header("Location: assets.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Asset</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<h3 class="text-center mb-4">Edit Asset</h3>

<form method="POST" class="card p-4 shadow-sm">

<div class="row">
<div class="col-md-6 mb-3">
<label class="form-label">Name</label>
<input type="text" name="asset_name" 
value="<?php echo $row['asset_name']; ?>" 
class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Type</label>
<input type="text" name="asset_type" 
value="<?php echo $row['asset_type']; ?>" 
class="form-control" required>
</div>
</div>

<div class="row">
<div class="col-md-6 mb-3">
<label class="form-label">Location</label>
<input type="text" name="location" 
value="<?php echo $row['location']; ?>" 
class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Purchase Date</label>
<input type="date" name="purchase_date" 
value="<?php echo $row['purchase_date']; ?>" 
class="form-control" required>
</div>
</div>

<div class="mb-3">
<label class="form-label">Status</label>
<select name="status" class="form-select">
<option value="Active" <?php if($row['status']=="Active") echo "selected"; ?>>Active</option>
<option value="Inactive" <?php if($row['status']=="Inactive") echo "selected"; ?>>Inactive</option>
</select>
</div>

<div class="d-flex justify-content-between">
<a href="assets.php" class="btn btn-secondary">Back</a>
<button name="update" class="btn btn-success">Update Asset</button>
</div>

</form>

</div>

</body>
</html>