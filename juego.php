<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Ahorcado - Juego</title>
    <link rel="stylesheet" href="css/sm_styles.css">
</head>
<body>
    <h1>Juego del Ahorcado</h1>
    <p id="palabra">Palabra: <span id="letras"></span></p>
    <p>Puntos: <span id="puntaje">0</span></p>
    <input type="text" id="letra" maxlength="1" placeholder="Ingrese una letra">
    <button onclick="adivinarLetra()">Adivinar Letra</button>
    <button onclick="adivinarPalabra()">Adivinar Palabra Completa</button>
    <div id="mensaje"></div>
     
    <script src="scripts/sm_scripts.js"></script>
</body>
</html>