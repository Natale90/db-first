<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


    <h3> <?php echo "<a href='index.php'>". 'Home' . "</a>" ?> <a href="#"></a> </h3>


    <?php

      $stanza = $_GET['stanza'];


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
      $sql = "SELECT * FROM stanze WHERE stanze.id = " . $stanza;

      //eseguo la query attraverso l'oggetto connection chiamo la funzione query alla quale passo la variabile sql
      $result = $conn->query($sql);

      //stampo il risultato della mia query
      if ($result && $result -> num_rows > 0) {

        while($row = $result -> fetch_assoc()) {

          echo
          'piano' . ' '
          . $row['floor'] . '<br>'
          . 'numero letti' . ' '
          . $row['beds'] . '<br>';
        }

      } else {

        echo 'error';
      }

      //chiudo la connessione stabilita a riga 18
      $conn->close();

    ?>
  </body>
</html>
