
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

<div class="container my-4">
  <h2>Trova hotel con il parcheggio</h1>
  <form action="" method="GET">
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="parkingCheckbox" name="parking" value="1">
      <label class="form-check-label" for="parkingCheckbox">Mostra solo hotel con il parcheggio</label>
    </div>
    <button type="submit" class="btn btn-primary">Filter</button>
  </form>
</div>

<div class="container">
  <h1 class="text-center">Hotel List</h1>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Parking</th>
        <th>Vote</th>
        <th>Distance to Center</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $filteredHotels = $hotels;
      if(isset($_GET['parking']) && $_GET['parking'] == 1) {
          $filteredHotels = array_filter($hotels, function($hotel) {
              return $hotel['parking'] == true;
          });
      }
      foreach ($filteredHotels as $hotel) { ?>
        <tr>
          <td><?php echo $hotel['name']; ?></td>
          <td><?php echo $hotel['description']; ?></td>
          <td><?php echo $hotel['parking'] ? 'Yes' : 'No'; ?></td>
          <td><?php echo $hotel['vote']; ?></td>
          <td><?php echo $hotel['distance_to_center']; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>
