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

<div class="container my-4 text-center">

<p class="text-center mt-5">
    <?php
        $title = "Mein Titel";
        echo "<strong>" . $title . "</strong>";
    ?>
</p>

<?php
    /*
        echo mit "" verwenden, damit Variablennamen ersetzt werden.
        $title existiert bereits. Sie wird im vorangehenden php-Tag
        deklariert und gesetzt.
    */
    echo "<p class='text-center mt-5'>
       <strong>$title</strong>
    </p>";
?>

<!-- FORMULAR -->
<form action="result.php" method="post">
<label for="name">Name:</label>
    <input type="text" id="name" name="name"><br>
    <label for="email">Email:</label>
    <input type="text" id="email" name="email"><br>

    <p>Geht es dir heute gut?</p>
    <input type="radio" id="ja" name="radio-mood" value="ja">
    <label for="ja">Ja</label><br>
    <input type="radio" id="nein" name="radio-mood" value="nein">
    <label for="nein">Nein</label><br><br>

    <p>Welche Farben hat die Schweizer Fahne?</p>
    <input type="checkbox" id="color1" name="color-red" value="rot">
    <label for="color1">Rot</label><br>
    <input type="checkbox" id="color2" name="color-yellow" value="gelb">
    <label for="color2">Gelb</label><br>
    <input type="checkbox" id="color3" name="color-blue" value="blau">
    <label for="color3">Blau</label><br>
    <input type="checkbox" id="color4" name="color-white" value="weiss">
    <label for="color4">Weiss</label><br><br>
    
    <p>Welches ist dein Lieblingstier?</p>
    <select class="form-select" id="inputGroupSelect01" name="mammal">
      <option selected>Auswählen...</option>

      <?php
        // Generiere die Tiernamen mit Hilfe einer while-Schleife.
        $mammals = array("Rind", "Pferd", "Ziege", "Mensch");
        $i = 0;
        $length = count($mammals);

        while ($i < $length) {
          $m = $mammals[$i];
          /*
            Ich könnte folgendes verwenden:
            echo '<option value="' . $m . '">' . $m . '</option>';
            
            Es ist aber kürzer und einfacher im String Template Format
            mit Double-Quotes. Preis: Ich muss innerhalb der "" mit 
            Single-Quotes arbeiten.
          */
          echo "<option value='$m'>$m</option>";

          $i = $i + 1; // Kurzform: $i++;
        }
      ?>
    </select>

    <br><br>

    <label for="name">Kommentar - bitte ohne Schimpfwörter, maximal 20 Buchstaben:</label>
    <input type="text" id="comment" name="comment"><br>

    <br><br>

    <input type="submit" value="Abschicken">
</form>
<!-- END:FORMULAR -->

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