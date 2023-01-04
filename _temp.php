$hasSelection = false;

      foreach ($_POST as $key => $value) {
        if ($hasSelection) echo ", ";

        if (str_contains($key, 'color-')) {
          $hasSelection = true;
          echo "$value";
        }
      }

      // Ruslan: Am Schluss bitte noch einen Punkt!
      echo ".";

      // $_POST ausgeben.
      prettyPrint($_POST);