function startRandomGame() {
    window.location.href = 'juego.php?random=true';
}

function startCustomGame() {
    const palabra = prompt("Ingrese una palabra para jugar:");
    if (palabra) {
        window.location.href = `juego.php?palabra=${palabra}`;
    }
}

/*--------------- LOGICA JUEGO ---------------*/
let palabraSecreta = '';
let puntaje = 0;
let letrasAdivinadas = [];

 
function obtenerPalabraAleatoria() {
    fetch('scripts/sm_dbConnection.php')
        .then(response => response.json())
        .then(data => {
            if (data.palabra) {
                palabraSecreta = data.palabra.toUpperCase();
                mostrarPalabra();
            } else {
                alert("Error: " + data.error);
            }
        })
        .catch(error => console.error("Error obteniendo la palabra:", error));
}

if (window.location.search.includes('random=true')) {
    obtenerPalabraAleatoria();
} else {
    palabraSecreta = params.get('palabra').toUpperCase();
    mostrarPalabra();
}

function mostrarPalabra() {
    const display = palabraSecreta.split('').map(letra => 
        letrasAdivinadas.includes(letra) ? letra : '_'
    ).join(' ');
    document.getElementById('letras').textContent = display;
}

function adivinarLetra() {
    const letra = document.getElementById('letra').value.toUpperCase();
    document.getElementById('letra').value = '';

    if (palabraSecreta.includes(letra) && !letrasAdivinadas.includes(letra)) {
        letrasAdivinadas.push(letra);
        mostrarPalabra();
        if (palabraSecreta.split('').every(letra => letrasAdivinadas.includes(letra))) {
            puntaje++;
            nuevaRonda();
        }
    }
}

function adivinarPalabra() {
    const palabra = prompt("Ingrese la palabra completa:").toUpperCase();
    if (palabra === palabraSecreta) {
        puntaje++;
        nuevaRonda();
    } else {
        finDelJuego();
    }
}

function nuevaRonda() {
    letrasAdivinadas = [];
    mostrarPalabra();
    document.getElementById('puntaje').textContent = puntaje;
}

function finDelJuego() {
    const nombre = prompt("Juego terminado. Ingrese su nombre (5 caracteres):");
    if (nombre) {
        fetch(`game.php?nombre=${nombre}&puntaje=${puntaje}`, { method: 'POST' })
            .then(() => window.location.href = 'sm_topScores.php');
    }
}

