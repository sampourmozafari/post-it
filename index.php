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
      <ul>
        <li><a href="index.php">Tilføj post-it</a></li>
        <li><a href="opslagstavle.php">Opslagstavle</a></li>
      </ul>
      <div class="post_it_container">
        <div class="post_it">
          <?php

          require_once('db_con.php');

          $cmd = filter_input(INPUT_POST, 'cmd');
          $date = filter_input(INPUT_POST, 'date');
          $headline = filter_input(INPUT_POST, 'headline');
          $content = filter_input(INPUT_POST, 'content');
          $author = filter_input(INPUT_POST, 'author');

          if($headline){
            $sql = ("INSERT INTO postit (date, headline, content, author) VALUES (?, ?, ?, ?)");
            $stmt = $con->prepare($sql);
            $stmt->bind_param('ssss', $date, $headline, $content, $author);
            $stmt->execute();

            echo "Din note er tilføjet";

            $stmt->close();
            $con->close();
          }
          ?>
          <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
	          <fieldset>
		          <input type="date" name="date" placeholder="Vælg dato" required><br>
              <input type="text" name="author" placeholder="Tilføj forfatter" required maxlength="2 char"><br>
		          <input type="text" name="headline" placeholder="Overskrift" required maxlength="35 char"><br>
              <textarea name="content" placeholder="Skriv note" required maxlength="255 char"></textarea><br>
		          <input type="submit" name="cmd" value="Tilføj">
	          </fieldset>
          </form>
        </div>
      </div>
  </body>
</html>
