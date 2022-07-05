<?php
ob_start();

/* Main page with two forms: sign up and log in */
$page_title = 'Project ABCD > Artist Register';
require 'db_configuration.php';
include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Artist Registration Form</title>
  <?php include 'css/css.html'; ?>
</head>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')

{
    if (isset($_POST['registerArtist'])) { //user logging in

        require 'registerArtist.php';
}
// Want to add instance of artist already being logged in
//     elseif (isset($_POST['register'])) { //user registering

//         require 'registerArtist.php';

//     }
}
?>
<body>
  <div class="form">

      <ul class="tab-group">
        <li class= "tab active align = right"><a href="#register">New Artist</a></li>
        
      </ul>

      <div class="tab-content">

        <div id="register">
          <h1>Register as an artist affiliate</h1>
          <h2>Please submit this form if you would like to be able to use the images on this website to create products to sell! We will create an artist profile on the site and link to your pages for people to view.</h2>

          <form action="artistForm.php" method="post" autocomplete="off">

            <div class="field-wrap">
              <label>
                Artist Description: <span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='description' />
            </div>

            <div class="field-wrap">
              <label>
                Profile Picture:<span class="req">*</span>
              </label>
              <input type="file" required autocomplete="off" name="profile_picture" id="profile_picture" />
            </div>
          

          <div class="field-wrap">
            <label>
              Country:<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" name='country' />
          </div>
          
          <div class="field-wrap">
            <label>
              Facebook:
            </label>
            <input type="url" autocomplete="off" name='facebook'/>
          </div>
          
          <div class="field-wrap">
            <label>
              Instagram:
            </label>
            <input type="url" autocomplete="off" name='instagram'/>
          </div>
          
          <div class="field-wrap">
            <label>
              Twitter:
            </label>
            <input type="url" autocomplete="off" name='twitter'/>
          </div>
          
          <div class="field-wrap">
            <label>
              WhatsApp:
            </label>
            <input type="url" autocomplete="off" name='whatsapp'/>
          </div>
          
          <div class="field-wrap">
            <label>
              Art Site:
            </label>
            <input type="url" autocomplete="off" name='art_site'/>
          </div>
          
          <div class="field-wrap">
            <label>
              Other:
            </label>
            <input type="url" autocomplete="off" name='other'/>
          </div>
          

          <button class="button button-block" name="submit">Submit</button> 
          
          </form>

        </div>

      </div><!-- tab-content -->

</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="js/loginForm.js"></script>
</body>
</html>


<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
?>

