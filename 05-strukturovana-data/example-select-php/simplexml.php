<?php
  $xml = @simplexml_load_file(__DIR__.'/../example-objednavka/objednavka.xml');
  if (!$xml || !($xml instanceof SimpleXMLElement)){
    exit('Soubor se nepovedlo načíst!');
  }
?><!DOCTYPE html>
<html lang="cs">
  <head>
    <title>Ukázkové zobrazení objednávky z XML</title>
    <meta charset="UTF-8"/>
  </head>
  <body>
    <?php
      echo '<h1>Objednávka '.htmlspecialchars((string)$xml->cisloObjednavky).'</h1>';
      if (count($xml->polozka)>0){
        echo '<table>
                <tr>
                  <th>Název</th>
                  <th>Počet</th>
                  <th>Cena</th>
                </tr>';
        foreach ($xml->polozka as $polozka){
          $polozkaCena=(string)$polozka->cena;//načtení textu z uzlu cena
          $polozkaCena.=' ';
          $polozkaCena.=(string)$polozka->cena['mena'];//načtení hodnoty atributu mena
          echo '<tr>
                  <td>'.htmlspecialchars((string)$polozka->nazev).'</td>
                  <td>'.htmlspecialchars((string)$polozka->pocet).'</td>
                  <td>'.htmlspecialchars($polozkaCena).'</td>
                </tr>';
        }
        echo '</table>';
      }
    ?>

  </body>
</html>