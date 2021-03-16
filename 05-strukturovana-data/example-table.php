<!DOCTYPE html>
<html lang="cs">
  <head>
    <title>Ukázkové generování tabulky</title>
    <meta charset="UTF-8"/>
    <style>
      td{
        width: 50px;
        height: 50px;
        border: 1px solid black;
      }
    </style>
  </head>
  <body>
    <h1>Ukázkové generování tabulky</h1>
    <?php
      $pocetRadku=5;
      $pocetSloupcu=6;

      echo '<table>';
      $i=1;
      for($r=0;$r<$pocetRadku;$r++){
        echo '<tr>';
        for ($s=0;$s<$pocetSloupcu;$s++){
          echo '<td>'.$i.'</td>';
          $i++;
        }
        echo '</tr>';
      }
      echo '</table>';

    ?>

  </body>
</html>