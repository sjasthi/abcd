<html>
    <style type="text/css">
        h1 {
            font-size: 10;
            color: black;
        }
    </style>

    <?php
    /* User registers as a new artist, need to check if already artist */

    $user_id = $db->
    $description = $db->escape_string($_POST['description']);
    $profile_picture = $db->escape_string($_POST['profile_picture']);
    $country = $db->escape_string($_POST['country']);
    $facebook = $db->escape_string($_POST['facebook']);
    $instagram = $db->escape_string($_POST['instagram']);
    $twitter = $db->escape_string($_POST['twitter']);
    $whatsapp = $db->escape_string($_POST['whatsapp']);
    $example_work = $db->escape_string($_POST['example_work']);
    $art_site = $db->escape_string($_POST['art_site']);
    $other = $db->escape_string($_POST['other']);
    $approval_status = 'pending';

    //insert user info into DB
    $sql = "INSERT INTO artists (user_id, description, country, profile_picture, facebook, twitter, instagram, whatsapp, art_site, other, example_work, approval_status)
            VALUES ('$user_id', '$description', '$country', '$profile_picture', '$facebook', '$twitter', '$instagram', '$whatsapp', '$art_site', '$other', '$example_work', '$approval_status)";

    if (mysqli_query($db, $sql)) {
        echo "<h1> Request Successfully Submitted! </h1>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    // header("location: index.php");
    ?>
</html>