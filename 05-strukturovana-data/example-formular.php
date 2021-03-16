<?php
  if (!empty($_POST)){
    $errors=[];
    if (trim(@$_POST['jmeno'])==''){
      $errors[]='Musíte zadat své jméno!';
    }
    if (trim(@$_POST['email'])=='' || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
      $errors[]='Musíte zadat platný e-mail!';
    }
    if (empty($errors)){
      $fileData=$_POST['jmeno'].': '.$_POST['email'];
      file_put_contents(__DIR__.'/data.txt',$fileData,FILE_APPEND);
      header('Location: example-formular.php');
      exit();
    }
  }
?><!DOCTYPE html>
<html lang="cs">
  <head>
    <title>Ukázkový formulář</title>
    <meta charset="UTF-8"/>
  </head>
  <body>
    <h1>Ukázkový formulář</h1>
    <form method="post">
      <?php if (!empty($errors)){
        echo join('<br />',$errors);
      }?>
      <label for="jmeno">Jméno:</label>
      <input type="text" id="jmeno" name="jmeno" value="<?php echo htmlspecialchars($_POST['jmeno']);?>" required/>
      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email']);?>" required/>
      <button type="submit">Odeslat...</button>
    </form>

  </body>
</html>