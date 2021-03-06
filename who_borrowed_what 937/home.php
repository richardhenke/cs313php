<?php 
// Bring in the View of the MVC pattern
if (!isset($_SESSION['loggedin'])) {
//header( 'Location: http://www.yoursite.com/new_page.html' ) 
   header('Location: index.php');
}
?>
<!DOCTYPE html>
<!-- This is the View in the MVC pattern -->
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Who Borrowed What | Home</title>
   <link rel="stylesheet" type="text/css" href="css/who_bowwored_what.css" media="screen" >
</head>
<body>

</div>

<header class='main_nav'>
   <div id='logo'>Logo</div>
   <div id='personalized_welcome'><?php personalizedWelcome();?></div>
</header>

<main>
   <div class='side_nav'> 
      <ul>
         <li><a href='?name=nt'>New Transation</a></li>
         <li>Borrowed History</li>
         <li>Lent History</li>
      </ul>
   </div>

   <div class='main_content'>
      <?php
      if (!empty($_GET) && $_GET['name'] == "nt") {
         include "modules/newTransaction.php";
      } else if (!empty($_POST['upload'])) {
         if (!empty($_FILES['fileToUpload']['name'])) {
            $message = imageUpload(isset($_POST));
            echo "<p>$message</p>";
            $item_picture = "pictures/items/" . basename($_FILES["fileToUpload"]["name"]);
            // Place the model INSERT function here and pass item_picture in 
            createTransaction($item_picture);
            include "modules/transactionsView.php";
         } else {
            echo "You didn't select a file to upload.";
         }
         
      } else {
         include "modules/transactionsView.php";
      }
      ?>
   </div>

</div>
</main>

<footer>
   <p>Footer</p>
   <p><?php echo 'Last Updated: ' . date('j F, Y', getlastmod()); ?></p>
</footer>

</body>
</html>