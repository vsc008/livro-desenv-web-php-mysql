<!DOCTYPE html>
<html>

<head>
  <title>Gerenciador de Contatos</title>
  <link rel="stylesheet" href="contatos.css" type="text/css" />
</head>

<body>
  <h1>Gerenciador de Contatos</h1>
  
  <?php include('formulario.php'); ?>

  <?php if ($exibir_tabela) : ?>
    <?php include('tabela.php'); ?>
  <?php endif; ?>

</body>

</html>