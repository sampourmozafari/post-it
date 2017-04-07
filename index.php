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
      <div class="post_it_container">
        <div class="post_it">
          <?php

          $cmd = filter_input(INPUT_POST, 'cmd');
          $date = filter_input(INPUT_POST, 'date');
          $headline = filter_input(INPUT_POST, 'headline');
          $content = filter_input(INPUT_POST, 'content');
          $author = filter_input(INPUT_POST, 'author');

          if(empty($cmd)){
          ?>
          <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
	          <fieldset>
		          <input type="date" name="date" placeholder="Vælg dato"><br>
              <input type="text" name="author" placeholder="Tilføj forfatter"><br>
		          <input type="text" name="headline" placeholder="Overskrift"><br>
              <textarea name="content" placeholder="Skriv note"></textarea><br>
		          <input type="submit" name="cmd" value="Tilføj">
	          </fieldset>
          </form>
          <?php
          }

          else($cmd == 'Submit');{
            require_once('db_con.php');
            $sql = ("INSERT INTO postit (date, headline, content, author) VALUES (?, ?, ?, ?)");
            $stmt = $con->prepare($sql);
            $stmt->bind_param('ssss', $date, $headline, $content, $author);
			      $stmt->execute();

            $stmt->close();
            $con->close();
          }
          ?>
        </div>
      </div>
  </body>
</html>
