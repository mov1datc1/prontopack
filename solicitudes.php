
<!-- Formulario de Solicitud de Material (Diseño pro, 2 columnas) -->
<!DOCTYPE html>
<html lang='es'>
<head>
  <meta charset='UTF-8'>
  <title>Solicitud de Material</title>
  <link rel='stylesheet' href='assets/css/style.css'>
</head>
<body>
  <div class='container'>
    <h1>Solicitud de Material</h1>
    <form class='form-grid'>
      <div><label>SKU:</label><input type='text'></div>
      <div><label>Descripción:</label><input type='text'></div>
      <div><label>Cantidad:</label><input type='number'></div>
      <div><label>Unidad de Medida:</label><select><option>Pieza</option><option>Paquete</option><option>Caja</option></select></div>
      <div><label>Persona que Solicita:</label><input type='text'></div>
      <div><label>Área que Solicita:</label><input type='text'></div>
      <div><label>Email:</label><input type='email'></div>
      <div><label>Sitio de Entrega:</label><input type='text'></div>
      <div><label>Tipo de Entrega:</label><select><option>Físico</option><option>Escaneado</option></select></div>
      <div class='full'><label>Observaciones:</label><textarea></textarea></div>
      <div class='full'><button type='submit'>Enviar Solicitud</button></div>
    </form>
  </div>
</body>
</html>
