<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "cfs";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT id, nombre, apellido, correo, direccion FROM clientes ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Lista de Clientes</title>
<style>
  body {
    background: #121212;
    color: #fff;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 30px 15px;
  }
  h1 {
    color: #ffcc00;
    text-align: center;
    margin-bottom: 25px;
    text-transform: uppercase;
    letter-spacing: 2px;
  }
  table {
    width: 100%;
    max-width: 900px;
    margin: 0 auto 30px;
    border-collapse: collapse;
    box-shadow: 0 0 20px rgba(255,204,0,0.4);
  }
  th, td {
    border: 1px solid #444;
    padding: 12px 18px;
    text-align: left;
  }
  th {
    background-color: #222;
    color: #ffcc00;
    text-transform: uppercase;
    letter-spacing: 1px;
  }
  tr:nth-child(even) {
    background-color: #1a1a1a;
  }
  tr:hover {
    background-color: #333;
  }
  .btn-volver {
    display: block;
    width: 200px;
    margin: 0 auto;
    padding: 12px 0;
    text-align: center;
    background-color: transparent;
    border: 2px solid #ffcc00;
    color: #ffcc00;
    text-decoration: none;
    border-radius: 10px;
    font-weight: 600;
    transition: background-color 0.3s ease, color 0.3s ease;
  }
  .btn-volver:hover {
    background-color: #ffcc00;
    color: #000;
  }
  @media (max-width: 600px) {
    table, thead, tbody, th, td, tr {
      display: block;
    }
    th {
      display: none;
    }
    tr {
      margin-bottom: 15px;
      border: 1px solid #444;
      border-radius: 10px;
      padding: 10px;
    }
    td {
      padding-left: 50%;
      position: relative;
      text-align: right;
      border: none;
      border-bottom: 1px solid #444;
    }
    td::before {
      content: attr(data-label);
      position: absolute;
      left: 15px;
      width: 45%;
      padding-left: 15px;
      font-weight: 700;
      text-align: left;
      color: #ffcc00;
    }
  }
</style>
</head>
<body>

<h1>Clientes Registrados</h1>

<?php if ($result && $result->num_rows > 0): ?>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Dirección</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td data-label="ID"><?= htmlspecialchars($row['id']) ?></td>
        <td data-label="Nombre"><?= htmlspecialchars($row['nombre']) ?></td>
        <td data-label="Apellido"><?= htmlspecialchars($row['apellido']) ?></td>
        <td data-label="Correo"><?= htmlspecialchars($row['correo']) ?></td>
        <td data-label="Dirección"><?= htmlspecialchars($row['direccion']) ?></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
<?php else: ?>
  <p style="text-align:center; color:#ffcc00;">No hay clientes registrados.</p>
<?php endif; ?>

<a href="finalizar.html" class="btn-volver">← Volver a Finalizar Compra</a>

</body>
</html>

<?php $conn->close(); ?>
