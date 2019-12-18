<?php

require 'vendor/autoload.php';

use App\SQLiteConnection;



function getGenreList() {
  $pdo = (new SQLiteConnection())->connect();

    $stmt = $pdo->query('SELECT GenreId, Name ' . 'FROM genres');

    $genres = [];
    while ($genre = $stmt->fetchObject()) {
        $genres[] = $genre;
    }

    return $genres;
}

?>

<head>
  <link rel="stylesheet" type="text/css" href="./styles/bulma.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body>
  <section class="section">
    <div class="container">
      <nav class="level">
        <div class="level-left">
          <div class="level-item">
            <h2 class="title">Genres</h2>
          </div>
        </div>
        <div class="level-right">

        </div>
      </nav>
      <hr />
      <div class="tags are-medium">
          <?php
            foreach (getGenreList() as &$genre) {
                echo '<a href="tracks.php?genre=' . $genre->Name . '" class="tag is-dark">' . $genre->Name. '</a>';
            }
          ?>
      </div>
    </div>
  </section>
</body>
