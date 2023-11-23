<?php
 
require_once "mecanico.php";
$mecanicos = mecanico::mostrarmecanico();
 
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
              <th>ESPECIALIZACION</th>
              <th>CONTRASEÑA</th>
          </tr>
          </thead>
          <tbody>
        <?php foreach ($mecanicos as $item): ?>
          <tr>
          <th> <?php echo $item['nombre']; ?> </th>
          <th> <?php echo $item['apellido']; ?> </th>
            <th> <?php echo $item['especializacion']; ?> </th>
            <th> <?php echo $item['contrasenia']; ?> </th>
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