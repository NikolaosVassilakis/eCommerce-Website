<?php
include 'dbh.inc.php';

$update=false;
$id="";
$name="";
$detail="";
$price="";
$photo="";
$category="";

if(isset($_POST['add'])){
    $name=$_POST['name'];
    $detail=$_POST['detail'];
    $price=$_POST['price'];
    $category=$_POST['category'];
    $photo=$_FILES['image']['name'];

    $upload="../products/".$photo;
    move_uploaded_file($_FILES['image']['tmp_name'],$upload);
    $upload="products/".$photo;

    $query="INSERT INTO crud(name,detail,price,photo,category)VALUES(?,?,?,?,?)";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("sssss",$name,$detail,$price,$upload,$category);
    $stmt->execute();


    header('location: ../admin.php');
    $_SESSION['response']="Successfully Inserted to the database!";
    $_SESSION['res_type']="success";
}
if(isset($_GET['delete'])){
    $id=$_GET['delete'];

    $sql="SELECT photo FROM crud WHERE id=?";
    $stmt2=$conn->prepare($sql);
    $stmt2->bind_param("i",$id);
    $stmt2->execute();
    $result2=$stmt2->get_result();
    $row=$result2->fetch_assoc();

    $imagepath=$row['photo'];
    unlink("../".$imagepath);

    $query="DELETE FROM crud WHERE id=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("i",$id);
    $stmt->execute();

    header('location: ../admin.php');
    $_SESSION['response']="Successfully Deleted!";
    $_SESSION['res_type']="danger";
}

if(isset($_GET['edit'])){
    $id=$_GET['edit'];

    $query="SELECT * FROM crud WHERE id=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->fetch_assoc();

    $id=$row['id'];
    $name=$row['name'];
    $detail=$row['detail'];
    $price=$row['price'];
    $photo=$row['photo'];
    $category=$row['category'];

    $update=true;
}

if(isset($_POST['update'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $detail=$_POST['detail'];
    $price=$_POST['price'];
    $oldimage=$_POST['oldimage'];
    $category=$_POST['category'];

    if(isset($_FILES['image']['name'])&&($_FILES['image']['name']!="")){
        $newimage="../products/".$_FILES['image']['name'];
        unlink("../".$oldimage);
        move_uploaded_file($_FILES['image']['tmp_name'], $newimage);
        
        $newimage="products/".$_FILES['image']['name'];
    }
    else{
        $newimage=$oldimage;
    }
    $query="UPDATE crud SET name=?,detail=?,price=?,photo=?,category=? WHERE id=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("sssssi",$name,$detail,$price,$newimage,$category,$id);
    $stmt->execute();



    $_SESSION['response']="Updated Successfully";
    $_SESSION['res_type']="primary";
    header('location: ../admin.php');
}
?>