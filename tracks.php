<?php

require './vendor/autoload.php';

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

function getTrackList() {
  $pdo = (new SQLiteConnection())->connect();
  $genre = htmlspecialchars($_GET["genre"]);

    $stmt = $pdo->query('SELECT tracks.Name as Name, tracks.UnitPrice as UnitPrice, tracks.Composer as Artist, albums.Title as Album, genres.Name as Genre FROM tracks, albums, genres WHERE ' . (is_null($genre) ? ('genres.Name = "' . $genre . '" AND') : '') . ' tracks.AlbumID = albums.AlbumId AND tracks.GenreId = genres.GenreId ');


    $tracks = [];
    while ($track = $stmt->fetchObject()) {
        $tracks[] = $track;
    }

    return $tracks;
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
            <a href="/"><span class="icon is-small">
              <i class="material-icons">arrow_back</i>
            </span></a>
          </div>
          <div class="level-item">
            <h2 class="title">Tracks</h2>
          </div>
        </div>
        <div class="level-right">
          <?php if ($_GET["genre"]) echo '<span class="tag is-medium is-dark">' . htmlspecialchars($_GET["genre"]) . '</span>' ?>
        </div>
      </nav>



      <hr />
      <div class="table-container">
        <table class="table is-striped is-hoverable is-fullwidth">
          <tr>
            <th>Track</th>
            <th>Artist</th>
            <th>Album</th>
            <th>Genre</th>
            <th>Price</th>
          </tr>

          <?php
            foreach (getTrackList() as &$track) {
                echo '<tr><td><b>' . $track->Name . '</b></td><td>' . $track->Artist . '</td><td>' . $track->Album . '</td><td><span class="tag is-dark">' . $track->Genre. '</span><td>' . $track->UnitPrice . '</td></td></tr>';
            }
          ?>
        </table>
      </div>
    </div>
  </section>
</body>
