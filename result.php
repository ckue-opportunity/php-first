<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

<!-- HEADER -->
<?php 
    include "./includes/tools.php";
    include "./includes/header.php"; 
?>
<!-- END:HEADER -->

<div class="container my-4 text-start">
  <p class="mt-5">

      <?php prettyPrint($_POST); ?>

      Willkommen <?php echo $_POST["name"]; ?>!<br>
      Deine Email-Adresse lautet <?php echo $_POST["email"]; ?>.<br>
      Geht es dir heute gut: <?php echo $_POST["radio-mood"]; ?>.<br>

      Du hast folgende Farben gewählt: 
      <?php 
      /*
        Die ausgewählten Farbwerte herausfiltern und als einfache Liste 
        ausgeben.

        Für foreach siehe auch https://www.w3schools.com/php/php_looping_foreach.asp
        
        Wir verwenden die erweiterte Form von foreach ($_POST as $value) {},
        nämlich foreach ($_POST as $key => $value) {}.
      */
      $hasSelection = false;
      $redSelected = false;
      $whiteSelected = false;
      $otherSelected = false;

      foreach ($_POST as $key => $value) {
        if (str_contains($key, 'color-')) {
          if ($hasSelection) echo ", ";
          echo $value;
          $hasSelection = true;

          // Prüfe, ob eine richtige Farbe gewählt wurde.
          if ($value === 'rot') $redSelected = true;
          elseif ($value === 'weiss') $whiteSelected = true;
          else $otherSelected = true;
        }
      }

      if (!$redSelected || !$whiteSelected || $otherSelected) {
        echo " // Stimmt nicht - wo bist du zur Schule gangen?";
      }
      
      ?><br>
      

  </p>
</div>

<!-- FOOTER -->
<?php include "./includes/footer.php"; ?>
<!-- END:FOOTER -->
    
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>