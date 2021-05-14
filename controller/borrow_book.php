<?php require('dbconn.php'); ?>
<?php require('sessions.php'); ?>
<?php


if(isset($_POST['borrowBook'])){
	borrowBook();
}

if(isset($_GET['approve'])){
	approveBorrowBook();
}

// Creating A Admin Account
function approveBorrowBook(){

	$id= $_GET['approve'];

	$conn=connect();
	$sql = "UPDATE borrowed_books SET `borrowed_status` = 1 
	WHERE `borrowed_id` = '$id' ";
	$result = mysqli_query($conn,$sql);


	 if($result){
		header("location:../system/view_librarian/manage_borrowed_books.php");
	 }else{
	 	echo "ERROR!". mysqli_error($conn);
	 }
   }


// Creating A Admin Account
function borrowBook(){
	
   $conn=connect();

   $bookID = $_POST['bookID'];
	
   $borrower_name = $_POST['borrower_name'];

   $borrower_position = $_POST['borrower_position'];

   $borrowed_date = $_POST['borrowed_date'];

   $return_date = $_POST['return_date'];

	$sql = "INSERT INTO borrowed_books (borrowed_id,book_id,borrower_name,borrower_position,borrowed_date,return_date,borrowed_status)
	 VALUES (NULL,'$bookID','$borrower_name','$borrower_position','$borrowed_date','$return_date','0')";

	$result = mysqli_query($conn,$sql);

	 if($result){
		header("location:../borrowed_books_approval.php");
	 }else{
	 	echo "ERROR!". mysqli_error($conn);
	 }
   }




?>
