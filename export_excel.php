<?php
include("config.php");

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=asset_report.xls");

$result = mysqli_query($conn,"SELECT * FROM assets");

echo "ID\tName\tType\tLocation\tStatus\n";

while($row = mysqli_fetch_assoc($result)){
echo $row['id']."\t".$row['asset_name']."\t".$row['asset_type']."\t".$row['location']."\t".$row['status']."\n";
}
?>