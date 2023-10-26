
<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

?>

<?php


// all'invio della pagina l'elenco degli hotel rimane completo 
$filteredHotels = $hotels;

// condizione per filtrare l'array quando gli hotel hanno il parcheggio 

if (isset($_GET['parking']) && $_GET['parking'] == 1) {
  $filteredHotels = array_filter($filteredHotels, function ($hotel) {
    return $hotel['parking'] == true;
  });
}
// condizione per filtrare l'array quando gli hotel NON hanno il parcheggio 
if (isset($_GET['NoParking']) && $_GET['NoParking'] == 2) {
  $filteredHotels = array_filter($filteredHotels, function ($hotel) {
    return $hotel['parking'] == false;
  });
}

// condizione per filtrare l'array a base del voto scelto dall'utente 
// **** viene prima acceratato che il voto sia tra 1 e 5 

if (isset($_GET['vote']) && $_GET['vote'] >= 1 && $_GET['vote'] <= 5) {
  $filteredHotels = array_filter($filteredHotels, function ($hotel) {
    return $hotel['vote'] >= $_GET['vote'];
  });
}

// Se non vengono specificati parametri GET, viene mostrato l'elenco completo degli hotel
if (empty($_GET)) {
  $filteredHotels = $hotels;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- link BOOTSTRAP  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
  </head>


  <body>
    <!-- la sezione relativa al filter degli hotel a base del parcheggio e del voto  -->
    <div class="container mt-5 p-5">
        <form action="" method="GET">
          <div class="mb-3 form-check">
            <!-- input per selezionare hotel CON il parcheggio   -->
            <input type="checkbox" class="form-check-input" id="parkingCheckbox" name="parking" value="1">
            <label class="form-check-label" for="parkingCheckbox">Mostra solo hotel con il parcheggio</label>
          </div>
          <!-- input per selezionare hotel SENZA il parcheggio   -->
          <div class="mt-3 form-check">
            <input type="checkbox" class="form-check-input" id="NoParkingCheckbox" name="NoParking" value="2">
            <label class="form-check-label" for="NoParkingCheckbox">Mostra hotel senza il parcheggio</label>
          </div>

          <!-- input per selezionare il voto minimo  -->
          <div class="mb-3 mt-4">
            <label for="voteInput" class="form-label">Voto minimo:</label>
            <input type="number" class="form-control" id="voteInput" name="vote" min="1" max="5">
          </div>
          <button type="submit" class="btn btn-success">Filtra</button>
        </form>
    </div>


    <!-- tabella con i dati degli hotel  -->
    <div class="container border border-1 ">
      <h2 class="text-center fw-bold text-primary">Lista degli hotel</h2>
      <table class="table text-center">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Descrizione</th>
            <th>Parcheggio</th>
            <th>Voto</th>
            <th>Distanza dal centro</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($filteredHotels as $hotel): ?>
            <tr>
              <td><?php echo $hotel['name']; ?></td>
              <td><?php echo $hotel['description']; ?></td>
              <td><?php echo $hotel['parking'] ? 'SI' : 'NO'; ?></td>
              <td><?php echo $hotel['vote']; ?></td>
              <td><?php echo $hotel['distance_to_center']; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </body>
</html>
