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
      <div class="divider"></div>
      <li><a href="opslagstavle.php">Opslagstavlen</a></li>
    </ul>
    <div class="post_it_opslag_container">
      <?php
        require_once('db_con.php');

        $cmd = filter_input(INPUT_POST, 'cmd');
        $date = filter_input(INPUT_POST, 'date');
        $headline = filter_input(INPUT_POST, 'headline');
        $content = filter_input(INPUT_POST, 'content');
        $author = filter_input(INPUT_POST, 'author');

        $sql = ("SELECT id, date, headline, content, author FROM postit");
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($id, $date1, $headline1, $content1, $author1);

        while ($stmt->fetch()) {
          echo $date1, $headline1, $content1, $author1;
        }

        $stmt->close();
        $con->close();
      ?>
    </div>
  </body>
</html>
