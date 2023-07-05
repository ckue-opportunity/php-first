<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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

      <?php 
        /*
          Gib die ge-posteten Key-Value-Paare als Liste aus.
        */
        prettyPrint($_POST); 
      ?>

      Willkommen <?php echo $_POST["name"]; ?>!<br>
      Deine Email-Adresse lautet <?php echo $_POST["email"]; ?>.<br>
      Geht es dir heute gut: <?php echo $_POST["radio-mood"]; ?>.<br>

      Du hast folgende Farben gewählt: 
      <?php 
      /*
        Die ausgewählten Farbwerte herausfiltern und als einfache Liste 
        ausgeben. Es werden nur die Werte mit 'color-' im Schlüssel (Key) 
        erkannt. Die Liste wird durch Kommas getrennt.

        In der foreach-Schleife werden jeweils auch Farbwerte geprüft und
        die Variablen 'redSelected', 'whiteSelected', 'otherSelected' und
        'hasSelection' entsprechend auf true gesetzt. Ist die Auswahl falsch,
        dann wird ein kurzes Feedback ausgegeben.

        Für foreach siehe auch https://www.w3schools.com/php/php_looping_foreach.asp
        Wir verwenden die erweiterte Form von foreach ($_POST as $value) {},
        nämlich foreach ($_POST as $key => $value) {}.

        Für str_contains() siehe auch https://www.php.net/manual/en/function.str-contains.php
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

      echo "<br><br>";

      /*
        Zum gewählten Tier 'mammal' wird ein Feedback ausgegeben. Dazu verwenden wir
        switch() Verzweigungen.
      */
      $mammal = $_POST["mammal"];

      // "Rind", "Pferd", "Ziege", "Mensch" etc.
      switch($mammal) {
        case "Rind":
          echo "Du Rindvieh!";
          break;

        case "Pferd":
          echo "Du Pferd - falsch gesattelt!";
          break;

        case "Ziege":
          echo "Du Geissbock!";
          break;

        default: 
          echo "Ach, auch der Mensch ist ein Säugetier!";
      }

      echo "<br><br>";

      /*
        Im "comment"-Feld prüfen wir, ob gewisse Schimpfwörter wie
        "fuck" oder "arschloch" verwendet wurden und überschreiben
        jedes dieser Schimpfwörter mit "#%$@".

        Verwendete PHP Hilfsfunktionen: strlen(), strtolower(), str_replace()
      */
      if (strlen($_POST["comment"]) > 0) {
          // Variablen vorbereiten
          $comment = $_POST["comment"];
          $needles = array("fuck", "arschloch");
          $replace = "#%$@";
    
          // In Kleinbuchstaben verwandeln
          $comment = strtolower($comment); 
    
          // Schimpfworte ersetzen und den resultierenden Kommentar anzeigen.
          $comment = str_replace($needles, $replace, $comment);
          echo "Dein Kommentar: $comment";

          // Falls notwendig Warnung
          if (strlen($_POST["comment"]) > 20) {
            echo "<br>Der Kommentar ist zu lang.";
          }
          
      }
      ?><br>
      

  </p>
</div>

<!-- FOOTER -->
<?php include "./includes/footer.php"; ?>
<!-- END:FOOTER -->

</body>

</html>