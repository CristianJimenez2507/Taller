<?php
 
require_once "cliente.php";
$clientes = cliente::mostrar();
 
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <title>Document</title>
 
 
    </head>
 
    <body>
 
      <table  id="myTable" class="table table-bordered">
          <thead>
          <tr>
 
              <th>NOMBRE</th>
              <th>APELLIDO</th>
              <th>CELULAR</th>
              <th>EMAIL</th>
              <th>CONTRASEÑA</th>
          </tr>
          </thead>
          <tbody>
        <?php foreach ($clientes as $item): ?>
          <tr>
          <th> <?php echo $item['nombre']; ?> </th>
          <th> <?php echo $item['apellido']; ?> </th>
            <th> <?php echo $item['celular']; ?> </th>
            <th> <?php echo $item['email']; ?> </th>
            <th> <?php echo $item['contraseña']; ?> </th>
          </th>
          </tr>
        <?php endforeach; ?>
          </tbody>
        </table>
 
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script>
          $(document).ready(function() {
              $('#myTable').DataTable(
               );
          } );
          </script>
    </body>
 
</html>