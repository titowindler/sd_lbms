<?php require('dbconn.php'); ?>
<?php require('sessions.php'); ?>
<?php


if(isset($_POST['loginSubmit'])){
	userLogin();
}


if(isset($_POST['changeUserPassword'])){
	changeUserPassword();
	}

if(isset($_POST['addBuyer'])){
	buyerAdd();
}

if(isset($_POST['addSeller'])){
	sellerAdd();
}

if(isset($_POST['addAdmin'])){
	adminAdd();
}

if(isset($_GET['delete_users'])){
	adminDelete();
}

// Creating A Admin Account
function adminDelete(){

	$id=$_GET['delete_users'];

	$conn=connect();
	$sql = "DELETE FROM users WHERE user_id = $id";
	$result = mysqli_query($conn,$sql);
	 if($result){
		header("location:../views/users_view.php");
	 }else{
	 	echo "ERROR!". mysqli_error($conn);
	 }
   }


// Creating A Admin Account
function adminAdd(){
	$user_name=$_POST['user_username'];
	$user_pass= 'password';
	$user_isActive= '1';
	$user_type= '1';

	$conn=connect();
	$sql = "INSERT INTO users (user_id,user_username,user_password,user_isActive,user_type)
	 VALUES (NULL,'$user_name','$user_pass',$user_isActive,'$user_type')";

	$result = mysqli_query($conn,$sql);

	 if($result){
		header("location:../views/users_view.php");
	 }else{
	 	echo "ERROR!". mysqli_error($conn);
	 }
   }

// Creating A Seller Account
function sellerAdd(){
	$user_name=$_POST['user_username'];
	$user_pass=$_POST['user_password'];
	$user_isActive= '1';
	$user_type= '2';

	$conn=connect();
	$sql = "INSERT INTO users (user_id,user_username,user_password,user_isActive,user_type)
	 VALUES (NULL,'$user_name','$user_pass',$user_isActive,'$user_type')";


	if(mysqli_query($conn,$sql)) {
		$last_id = mysqli_insert_id($conn);
		$userID = $last_id;
		$seller_fname = $_POST['user_firstname'];
		$seller_lname = $_POST['user_lastname'];
		$seller_gender = $_POST['user_gender'];
		$seller_city = $_POST['user_city'];
		$seller_email = '';
		$sellerBalance = 0;
		$sellerInventoryId = '';

		$sql2= "INSERT INTO seller (seller_id,userID,sellerFirstName,sellerLastName,sellerGender,city,sellerEmail,sellerBalance,inventoryID) VALUES (
		NULL,'$userID','$seller_fname','$seller_lname','$seller_gender','$seller_city','$seller_email','$seller_email','$sellerInventoryId')";

	 $result = mysqli_query($conn,$sql2);

	 if($result){
		header("location:../views/index.php");
	 }else{
	 	echo "ERROR!". mysqli_error($conn);
	 }
   }
}

// Creating A Buyer Account
function buyerAdd(){
	$user_name=$_POST['user_username'];
	$user_pass=$_POST['user_password'];
	$user_isActive= '1';
	$user_type= '3';

	$conn=connect();
	$sql = "INSERT INTO users (user_id,user_username,user_password,user_isActive,user_type)
	 VALUES (NULL,'$user_name','$user_pass',$user_isActive,'$user_type')";


	if(mysqli_query($conn,$sql)) {
		$last_id = mysqli_insert_id($conn);
		$userID = $last_id;
		$buyer_fname = $_POST['user_firstname'];
		$buyer_lname = $_POST['user_lastname'];
		$buyer_gender = $_POST['user_gender'];
		$buyer_city = $_POST['user_city'];
		$buyer_email = '';
		$buyerBalance = 0;
		$buyerPurchaseNo = '';

		$sql2= "INSERT INTO buyer (buyer_id,userID,buyerFirstName,buyerLastName,buyerGender,city,buyerEmail,buyerBalance,purchaseNo) VALUES (
		NULL,'$userID','$buyer_fname','$buyer_lname','$buyer_gender','$buyer_city','$buyer_email','$buyerBalance','$buyerPurchaseNo')";

	 $result = mysqli_query($conn,$sql2);

	 if($result){
		header("location:../views/index.php");
	 }else{
	 	echo "ERROR!". mysqli_error($conn);
	 }
   }
}


function changeUserPassword(){
	$conn = connect();
	$id = $_POST['user_id'];
	$current = md5($_POST['current_password']);
	$new = md5($_POST['new_password']);
	$comfirm = md5($_POST['comfirm_password']);

	if($new == $comfirm){
		$sql = "SELECT * FROM user WHERE user_id ='$id' AND user_password = '$current' ";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_row($result);

		if($row[0] == $id && $row[2] == $current){
			$sql = "UPDATE user SET user_password = '$new' WHERE user_id = '$id' ";
			$result = mysqli_query($conn,$sql);

			if($result){
				$str = "User Password Successfully Changed";
				header("Location:../views/userProfile.php?success=".$str);
			}else{
				echo "ERROR!". mysqli_error($conn);
			}

		}else{
			$str = "Wrong Current Password";
			header("Location:../views/userProfile.php?error=".$str);
		}
	}else{
		$str = "Password not match!";
		header("Location:../views/userProfile.php?error=".$str);
	}

} 


// Logging In A New User
function userLogin(){
	$username=$_POST['username'];
	$password=$_POST['password'];
	// $password= md5($_POST['user_password']);
	$secret = "secretAdmin";
	$conn=connect();
	$sql = "SELECT * FROM users WHERE user_username='$username' AND user_password='$password' LIMIT 1";
	$result= mysqli_query($conn,$sql);

	 if (mysqli_num_rows($result) > 0) {
    
	 	while($row = mysqli_fetch_assoc($result)) {
			setSession($row['user_id'],$row['user_username'],$row['user_type'],$row['user_isActive'],$secret);
			header('Location:../system/index.php');
	 	}
	 } else {
		$error =  "Incorrect Username and/or Password!";
	 	header('Location:../system/pages/examples/login.php?error='.$error);
	 }
	 	mysqli_close($conn);
}

?>
