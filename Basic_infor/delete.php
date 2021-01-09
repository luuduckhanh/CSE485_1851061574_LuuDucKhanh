<?php
require_once "../mysqli_connect.php";
$id=$_GET['id'];
echo $id;
$sql = "DELETE FROM u_Information WHERE id = $id;";
if($result=mysqli_query($dbcon,$sql))
{
    echo "xoa thanh cong";
}
else{
    echo "khong than cong";
}
header('location:Basic_infor.php');

?>