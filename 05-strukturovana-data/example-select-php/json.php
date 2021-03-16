<?php
  $data = @file_get_contents(__DIR__.'/../example-objednavka/objednavka.json');
  if (!$data){
    exit('Soubor se nepovedlo načíst!');
  }
?><!DOCTYPE html>
<html lang="cs">
  <head>
    <title>Ukázkové zobrazení objednávky z JSONu</title>
    <meta charset="UTF-8"/>
  </head>
  <body>
    <?php
      $dataArr = json_decode($data, true);
      echo '<h1>Objednávka '.htmlspecialchars(@$dataArr['cisloObjednavky']).'</h1>';
      if (!empty($dataArr['polozky'])){
        echo '<table>
                <tr>
                  <th>Název</th>
                  <th>Počet</th>
                  <th>Cena</th>
                </tr>';
        foreach ($dataArr['polozky'] as $polozka){
          echo '<tr>
                  <td>'.htmlspecialchars(@$polozka['nazev']).'</td>
                  <td>'.htmlspecialchars(@$polozka['pocet']).'</td>
                  <td>'.htmlspecialchars(@$polozka['cena'].' '.@$polozka['mena']).'</td>
                </tr>';
        }
        echo '</table>';
      }
    ?>

  </body>
</html>