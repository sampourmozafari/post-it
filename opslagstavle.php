<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP post-it</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Covered+By+Your+Grace" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand" rel="stylesheet">
  </head>
  <body>
    <?php
if( $_POST["name"] || $_POST["email"] || $_POST["contact"])
{
echo "Welcome: ". $_POST['name']. "<br />";
echo "Your Email is: ". $_POST["email"]. "<br />";
echo "Your Mobile No. is: ". $_POST["contact"];
}
?>
    ?>
  </body>
</html>
