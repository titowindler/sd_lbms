<?php 

    require("controller/dbconn.php");

    $conn = connect();

    $book_id = $_GET['book']; 

?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Library System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
     --><!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

       <header>
         <div class="header-area ">
            <div class="header-top_area">
               <div class="container">
                  <!-- <div class="row">
                     <div class="col-xl-6 col-md-6 ">
                         <div class="social_media_links">
                             <a href="#">
                                 <i class="fa fa-facebook"></i>
                             </a> 
                         </div>
                     </div>
                     <div class="col-xl-6 col-md-6">
                         <div class="short_contact_list">
                             <ul>
                                 <li><a href="#"> <i class="fa fa-envelope"></i> mabolochristianacademyschool@gmail.com</a></li>
                                 <li><a href="#"> <i class="fa fa-phone"></i> 232-3892</a></li>
                             </ul>
                         </div>
                     </div>
                     </div> -->
               </div>
            </div>
            <div id="sticky-header" class="main-header-area">
               <div class="container">
                  <div class="row align-items-center">
                     <div class="col-xl-6 col-lg-6">
                        <div class="logo">
                           <a href="index.php">
                              <h4><strong>Library System</strong></h4>
                           </a>
                        </div>
                     </div>
                     <div class="col-xl-6 col-lg-6">
                        <div class="main-menu d-none d-lg-block">
                           <nav>
                              <ul id="navigation">
                                 <li><a  href="index.php">Home</a></li>
                              <!--    <li><a  href="#">About Us</a></li>
                                 <li><a  href="#">Contact Us</a></li>
                               -->   
                                 <li><a  href="search_book.php">Search Books</a></li>
                                 <li><a  href="borrowed_books_approval.php">Borrowed Books Approval</a></li>
                                 <li>
                                    <div class="btn btn-danger btn-md d-none d-lg-block">
                                       <a href="system/pages/examples/login.php" class="text-white">Login</a>
                                    </div>
                                 </li>
                              </ul>
                              <!--                                    <ul id="navigation">
                                 <li><a  href="index.php">Home</a></li>
                                 <li><a href="#about">About <i class="ti-angle-down"></i></a>
                                     <ul class="submenu">
                                         <li><a href="about.php">School History</a></li>
                                         <li><a class="active" href="pvmgo.php">Mission, Vision, Goals & Objectives</a></li>
                                         <li><a href="board-of-trustees.php">Board of Trustees</a></li>
                                     </ul>
                                 </li>
                                 
                                 <li><a href="#">School Program <i class="ti-angle-down"></i></a>
                                     <ul class="submenu">
                                         <li><a href="school-programs.php">Program</a></li>
                                         <li><a href="activities.php">School Activities</a></li>
                                     </ul>
                                 </li>
                                 
                                 <li><a href="#">Enrollment <i class="ti-angle-down"></i></a>
                                     <ul class="submenu">
                                         <li><a href="procedure.php">Enrolling In School</a></li>
                                         <li><a href="enroll.php">Online Enrollment</a></li>
                                         <li><a href="pricing.php">Tuition Fees</a></li>
                                     </ul>
                                 </li>
                                 
                                 <li><a  href="online-class.php">Online Class</a></li>
                                 </ul>
                                 -->
                           </nav>
                        </div>
                     </div>
                     <!--  <div class="col-xl-2 col-lg-3 d-none d-lg-block">
                        <div class="Appointment">
                            <div class="btn btn-danger btn-md d-none d-lg-block">
                                <a href="#enroll.php" class="text-white">Login</a>
                            </div>
                        </div>
                        </div>
                        --> 
                     <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>

    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg_2 bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Fill Up Information Here!!</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->

    <!-- expert_doctors_area_start -->
    <div class="expert_doctors_area doctor_page">
        <div class="container">
            <div class="row">
            
            <form action="controller/borrow_book.php" method="POST"> 

            <input type="hidden" value="<?php echo $book_id ?>" name="bookID">
            
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                     <label>Borrower Name</label>
                        <input type="text" class="form-control" name="borrower_name" required placeholder="Borrower Name">
                   </div>
                 </div>
              </div>

               <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                     <label>Borrower Position</label>
                        <select class="form-control" name="borrower_position">
                          <option value="Student">Student</option>
                          <option value="Faculty">Faculty</option>
                        </select>
                   </div>
                 </div>
              </div>

             <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                     <label>Borrowed Date</label>
                        <input type="date" class="form-control" name="borrowed_date" min="<?php echo date('Y-m-d')?>" required>
                   </div>
                 </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                     <label>Return Date</label>
                        <input type="date" class="form-control" min="<?php echo date('Y-m-d')?>" name="return_date" required >
                   </div>
                 </div>
              </div>



               <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <button type="submit" class="btn btn-success" name="borrowBook">SUBMIT</button>
                    <a href="search_book.php" class="btn btn-danger">BACK</a>
                   </div>
                 </div>
              </div>


            </form>


              
            </div>
        </div>
    </div>
    <!-- expert_doctors_area_end -->

   



  
<!-- footer end  -->
    <!-- link that opens popup -->



    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>
    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }

        });
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    </script>
</body>

</html>