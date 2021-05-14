<?php require('dbconn.php'); ?>
<?php require('sessions.php'); ?>
<?php


if(isset($_POST['addBook'])){
	addBook();
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
function addbook(){
	
   $conn=connect();
	
   $book_name = $_POST['book_name'];

   $author_name = $_POST['author_name'];

   $book_category = $_POST['book_category'];

   $book_description = $_POST['book_description'];

   $number = "1";

   $filename = '';
	//check if file uploaded exists and there are no errors during upload
	if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
		if($_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/jpeg") {
			if($_FILES['image']['type'] < 10000000){
	//define the new location and name of the photo (images/1001_mypic.png)
			$filename = "../img/" .$number."_".$_FILES['image']['name'];
	//tell PHP to move the file from where and to where
			move_uploaded_file($_FILES['image']['tmp_name'], $filename);	
			}
	   	 }
	  }

	$sql = "INSERT INTO book (book_id,book_name,author_name,book_category,book_description,book_image)
	 VALUES (NULL,'$book_name','$author_name','$book_category','$book_description','$filename')";

	$result = mysqli_query($conn,$sql);

	 if($result){
		header("location:../system/view_librarian/manage_books.php");
	 }else{
	 	echo "ERROR!". mysqli_error($conn);
	 }
   }




?>
