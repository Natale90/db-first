<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>db First</title>
  </head>
  <body>

    <!-- Pagina con la lista delle stanze,
    un click porta al dettaglio della
    stanza -->

    <?php
      //identifico il detailsbase
      $servername = "localhost";
      $username = "root";
      $password = "root";
      $dbname = "dbhotel";

      // stabilisco una connessione
      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn && $conn->connect_error) {
        echo "Connection failed: " . $conn->connect_error;
      }

      //creo la query
      $sql = "SELECT * FROM stanze";

      //eseguo la query attraverso l'oggetto connection chiamo la funzione query alla quale passo la variabile sql
      $result = $conn->query($sql);

      //stampo il risultato della mia query
      if ($result && $result -> num_rows > 0) {

        while($row = $result -> fetch_assoc()) {

          echo '<a href="details.php?stanza=' . $row['id'] . '">' . 'stanza N°' . ' ' . $row['room_number'] . '<a>' . '<br>';
        }

      } else {

        echo 'error';
      }

      //chiudo la connessione stabilita a riga 18
      $conn->close();

    ?>

  </body>
</html>
