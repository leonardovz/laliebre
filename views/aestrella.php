<?php include_once ('administrador/templates/header.php');?>
<style>
        table{ 
            border: 1px solid black;
            border-collapse: collapse;
        }
        td{
            border: 1px solid black;
            height: 30px;
            width: 30px;
        }
        
    </style>
<!-- <body class="hold-transition login-page"> -->
<body class="hold-transition skin-black-light login-page layout-top-nav">

<div class="wrapper">
  <header class="main-header">
      <a href="<?php echo $ruta;?>" class="logo">
          <span class="logo-mini text-dark"><b>H</b>M</span>
          <span class="logo-lg"><b>HELLO</b>MARKET</span>
      </a>
      <nav class="navbar navbar-static-top">
          

          <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                  <li class="dropdown messages-menu">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-cart-arrow-down"></i>
                      <span class="label label-success" id="cantidad">0</span>
                      </a>
                      <ul class="dropdown-menu">
                      <li class="header">Carrito</li>
                      <li>
                          <ul class="menu" id="items">
                          </ul>
                      </li>
                      <li class="footer"><a href="<?php echo $ruta;?>carrito">Ver mi Carrito</a></li>
                      </ul>
                  </li>
              </ul>
          </div>
      </nav>
  </header>
  <div class="conteiner">
    <div class="login-logo">
      <a href="<?php echo $ruta;?>"><b>HELLO</b>MARKET</a>
    </div>
    <!-- /.login-logo -->
    <!-- <div class="row"> -->
     <div class="col-md-12">

    <!-- <label for="lado">Casillas Por lado</label><input type="number" id="lado"> <input id="generar" type="button" value="Generar">
    <br>
    <br> -->

    <div class="col-md-2"></div>
    <div class="col-md-8">
             <h3 style="color: #000; "> Desarrollo e implementación algoritmo de pasillos</h3>

        <table id="tabla">

        </table>    
        <br>
        <input id="calcular" class="btn btn-primary" type="button" value="Encontrar la Ruta más corta">

    </div>
    <div class="col-md-2"></div>
    <div class="col-md-12">
        
    </div>
    
    <br>
    <br>
    <br>
    <p id="peso"></p>
    
      <!-- .social-auth-links -->
    <!-- </div> -->
    <!-- /.login-box-body -->
  </div>
</div>
    
    <?php include_once ('administrador/templates/footer.php');?>
    <script>
        window.onload = function() {
            var inicio = []; // arreglo que se utiliza para guardar la posicion de inicio
            var final = []; // arreglo que se utiliza para guardar la posicion final
            var mapa = new Array(); // matriz que se utiliza para guardar el mapa
            var abierta = []; // lista abierta
            var cerrada = []; // lista cerrada
            var nodoActual = []; // variable para guardar el nodo actual
            var g = new Array(); // matriz para guardar las g de las casillas
            var h = new Array(); // matriz para guardar las h de las casillas
            var f = new Array(); // matriz para guardar las f de las casillas
            var padre = new Array(); // matriz para guardar los padres de las casillas


            var linea = 10; // valor de los desplazamientos en linea
            var diagonal = 14; // valor de los desplazamientos en diagonal
            cargar();
            function cargar() { // capturar el evento de click en generar
                if (inicio.length) { // si ya se habia creado un laberinto se tiene que recargar para no generar conflictos
                    location.reload();
                }

                var lado = 15; // obtiene el valor de los lados
                if (lado > 0) {
                    var tabla = document.getElementById('tabla');
                    tabla.innerHTML = "";
                    var i = 0,
                        u = 0;
                    for (i = 0; i < lado; i++) { // for que sirve para insertar filas en las matrices
                        mapa[i] = new Array();
                        g[i] = new Array();
                        h[i] = new Array();
                        f[i] = new Array();
                        padre[i] = new Array();
                        var fila = tabla.insertRow(i);
                        for (u = 0; u < lado; u++) { // for que sirve para incertar columnas en las matrices
                            fila.insertCell(u);
                            mapa[i][u] = 0;
                            g[i][u] = 0;
                            h[i][u] = 0;
                            f[i][u] = 0;
                            padre[i][u] = 0;
                        }
                    }
                } else {
                    alert("El numero ingresado debe ser mayor a 0"); // alerta de error en los lados de la tabla
                }
            }
            document.getElementById('tabla').onclick = function(e) { // captura el evento de click dentro de las casillas
                var fila = e.target.parentNode.rowIndex; // obtiene las filas
                var col = e.target.cellIndex; // obtiene las columnas
                if (inicio[0] === undefined) {
                    e.target.style.backgroundColor = "green"; // si no existe ningun inicio
                    mapa[fila][col] = "I"; //coloca en la matriz mapa como "I" y marca la casilla verde
                    inicio[0] = fila; // se iguala esa casila al arreglo inicio
                    inicio[1] = col;
                } else if (mapa[fila][col] === "I") { // si a la casilla de inicio ya esta colocado y se le vuelve a dar click lo elimina
                    e.target.style.backgroundColor = "white";
                    inicio[0] = undefined; // tambien reestablece el arreglo
                    inicio[1] = undefined;
                    mapa[fila][col] = 0;
                } else if (inicio[0] !== undefined) { // si ya existe un inicio 
                    if (mapa[fila][col] === "M") { // si ya existe una casilla final y se le vuelve a dar click lo elimina
                        final[0] = undefined; // tambien reestablece el arreglo
                        final[1] = undefined;
                        mapa[fila][col] = 0;
                        e.target.style.backgroundColor = "white";
                    } else if (final[0] === undefined && mapa[fila][col] === 1) { // si la casilla ya esta de color negro y se le velve a dar click y no existe ningun final se coloca como final
                        mapa[fila][col] = "M"; // se guarda en esa posicion una "M" en la matriz mapa
                        e.target.style.backgroundColor = "red"; // la casilla se pinta roja
                        final[0] = fila; // se guaarda la posicion en el arreglo fina;
                        final[1] = col;
                    } else {
                        if (mapa[fila][col] === 1) { // si la casilla es negra y se le da click la vuelve a hacer blanca
                            e.target.style.backgroundColor = "white";
                            mapa[fila][col] = 0; // coloca nuevamente como 0 en la matriz mapa
                        } else {
                            e.target.style.backgroundColor = "black"; // si la casilla es blanca y se le da click la vuelve negra
                            mapa[fila][col] = 1; // coloca nuevamente como 1 en la matriz mapa
                        }
                    }
                }
            }

            document.getElementById('calcular').onclick = function() { // captura el evento del boton generar
                if (cerrada.length) { // si ya se habia jugado se reinicia para no generar conflictos
                    location.reload();
                }
                if (inicio[0] === undefined || final[0] === undefined) { // si no existe una casilla inicial y final marca error
                    alert("Seleccione un inicio y final");
                } else {
                    abierta.push(inicio[0] + " " + inicio[1]); // ingresa a la lista abierta el nodo inicial
                    f[inicio[0]][inicio[1]] = getH(inicio[0], inicio[1]); // se optiene la f de la casilla inicial
                    aEstrella(); // se manda a llamar al metodo A*
                }

            }

            function aEstrella() { // metodo A*
                var nodo = []; // varable que se utiliza para guardar el nodo que se esta validando
                var fila; // guarda la fila del nodo
                var col; // guarda la columna del nodo
                var u = -1; // variable usada para controlar cual f de la lista abierta es menos y guardar su posicion
                var bandera = true; // bandera para saber cuando se encontro el nodo final
                while (abierta.length > 0) { // mientras la lista este vacia
                    var F = -1; // variable temporal para guardar la f del nodo que se esta verificando
                    for (var i = 0; i < abierta.length; i++) { // for que sire para recorrer la lista abierta
                        fila = getFila(abierta[i]); // se optiene la fila y columna del nodo de la lista abierta
                        col = getCol(abierta[i]);
                        if (f[fila][col] < F && mapa[fila][col] !== 1 || F === -1 && mapa[fila][col] !== -1) { // si el nodo tiene una menor f se guarda su ubicacion, su fila y su columna
                            F = f[fila][col];
                            u = i;
                            nodo[0] = fila;
                            nodo[1] = col;
                        }
                    }
                    abierta.splice(u, 1); // elimina el nodo de la lista abierta
                    cerrada.push(nodo[0] + " " + nodo[1]); // ingresa el nodo a la lista cerrada
                    f[nodo[0]][nodo[1]] = -1; // elimina ese nodo de la matriz donde se guarda la f para que no sea tomado en cuenta 
                    if (nodo[0] == final[0] && nodo[1] == final[1]) { // si el nodo tomado es el final activa la bandera
                        bandera = false;
                        break;
                    }
                    if (bandera) { // si la bandera no es activada llama al metodo vecinos y  vuelve a empezar el cliclo
                        vecinos(nodo[0], nodo[1]);
                    }
                }
                if (!abierta.length && bandera) { // si la lista abierta esta vacia y no encuentra el nodo final marca error
                    alert("No hay solucion");
                } else { // si se encontro el nodo final llama al metodo que muestra el camino en la matriz
                    setCamino();
                }
            }


            /* Este es el metodo que hace practicamnete todo*/
            function vecinos(fila, col) { // recibe la fila y la columna del nodo con menor f
                var gTemporal; // se crea una variable de g temporal
                var hTemporal; // se crea una variable de h temporal
                var fTemporal; // se crea una variable de f temporal
                if (fila - 1 >= 0 && col - 1 >= 0) { // evitar desbordamiento arriba, izquierda
                    if (mapa[fila - 1][col - 1] !== 1) { // se verifica que no haya un obstaculo arriba a la izquierda
                        gTemporal = g[fila - 1][col - 1] + diagonal; // se guarda g a la varible temporal mas el costo
                        hTemporal = getH(fila - 1, col + 1); // se guarda h a la varibale temporal 
                        fTemporal = (gTemporal) + (hTemporal); // se suma ambos valores en la variable temporal
                        if (fTemporal < f[fila - 1][col - 1] && f[fila - 1][col - 1] !== -1 || f[fila - 1][col - 1] === 0) { // si f es menor  y el nodo no esta en la lista cerrada entra
                            g[fila - 1][col - 1] = g[fila][col] + diagonal; // se iguala en la matriz g 
                            h[fila - 1][col - 1] = getH(fila - 1, col - 1); // se iguala en la matriz h 
                            getF(fila - 1, col - 1); // se iguala en la matriz f
                            abierta.push((fila - 1) + " " + (col - 1)); // se ingresa el nodo a la lista abierta
                            padre[fila - 1][col - 1] = fila + " " + col; // se guarda quien es el padre del nodo vecino
                        }
                    }
                }
                // los siguentes if tienen la misma funcionalidad que el de arriba pero para la diferente posicion de los vecinos
                if (fila - 1 >= 0 && col + 1 < mapa.length) { // evitar desbordamiento a la izquierda abajo
                    if (mapa[fila - 1][col + 1] !== 1) {
                        gTemporal = g[fila][col] + diagonal;
                        hTemporal = getH(fila - 1, col + 1);
                        fTemporal = (gTemporal) + (hTemporal);
                        if (fTemporal <= f[fila - 1][col + 1] && f[fila - 1][col + 1] !== -1 || f[fila - 1][col + 1] === 0) {
                            g[fila - 1][col + 1] = g[fila][col] + diagonal;
                            h[fila - 1][col + 1] = getH(fila - 1, col + 1);
                            getF(fila - 1, col + 1);
                            abierta.push((fila - 1) + " " + (col + 1));
                            padre[fila - 1][col + 1] = fila + " " + col;
                        }
                    }
                }
                if (fila + 1 < mapa.length && col - 1 >= 0) { // evita desbordamiento a la derecha
                    if (mapa[fila + 1][col - 1] !== 1) {
                        gTemporal = g[fila][col] + diagonal;
                        hTemporal = getH(fila + 1, col - 1);
                        fTemporal = (gTemporal) + (hTemporal);
                        if (fTemporal <= f[fila + 1][col - 1] && f[fila + 1][col - 1] !== -1 || f[fila + 1][col - 1] === 0) {
                            g[fila + 1][col - 1] = g[fila][col] + diagonal;
                            h[fila + 1][col - 1] = getH(fila + 1, col - 1);
                            getF(fila + 1, col - 1);
                            abierta.push((fila + 1) + " " + (col - 1));
                            padre[fila + 1][col - 1] = fila + " " + col;
                        }
                    }
                }
                if (fila + 1 < mapa.length && col + 1 < mapa.length) { // evita desbordamiento a la derecha abajo
                    if (mapa[fila + 1][col + 1] !== 1) {
                        gTemporal = g[fila][col] + diagonal;
                        hTemporal = getH(fila + 1, col + 1);
                        fTemporal = (gTemporal) + (hTemporal);
                        if (fTemporal <= f[fila + 1][col + 1] && f[fila + 1][col + 1] !== -1 || f[fila + 1][col + 1] === 0) {
                            g[fila + 1][col + 1] = g[fila][col] + diagonal;
                            h[fila + 1][col + 1] = getH(fila + 1, col + 1);
                            getF(fila + 1, col + 1);
                            abierta.push((fila + 1) + " " + (col + 1));
                            padre[fila + 1][col + 1] = fila + " " + col;
                        }
                    }
                }
                if (fila - 1 >= 0) { // evita desbordamiento a la izquierda
                    if (mapa[fila - 1][col] !== 1) {
                        gTemporal = g[fila][col] + linea;
                        hTemporal = getH(fila - 1, col);
                        fTemporal = (gTemporal) + (hTemporal);
                        if (fTemporal <= f[fila - 1][col] && f[fila - 1][col] !== -1 || f[fila - 1][col] === 0) {
                            g[fila - 1][col] = g[fila][col] + linea;
                            h[fila - 1][col] = getH(fila - 1, col);
                            getF(fila - 1, col);
                            abierta.push((fila - 1) + " " + (col));
                            padre[fila - 1][col] = fila + " " + col;
                        }
                    }
                }
                if (col - 1 >= 0) { // evita desbordamiento hacia arriba
                    if (mapa[fila][col - 1] !== 1) {
                        gTemporal = g[fila][col] + linea;
                        hTemporal = getH(fila, col - 1);
                        fTemporal = (gTemporal) + (hTemporal);
                        if (fTemporal <= f[fila][col - 1] && f[fila][col - 1] !== -1 || f[fila][col - 1] === 0) {
                            g[fila][col - 1] = g[fila][col] + linea;
                            h[fila][col - 1] = getH(fila, col - 1);
                            getF(fila, col - 1);
                            abierta.push((fila) + " " + (col - 1));
                            padre[fila][col - 1] = fila + " " + col;
                        }
                    }
                }
                if (col + 1 < mapa.length) { // evita desbordamiento hacia abajo
                    if (mapa[fila][col + 1] !== 1) {
                        gTemporal = g[fila][col] + linea;
                        hTemporal = getH(fila, col + 1);
                        fTemporal = (gTemporal) + (hTemporal);
                        if (fTemporal <= f[fila][col + 1] && f[fila][col + 1] !== -1 || f[fila][col + 1] === 0) {
                            g[fila][col + 1] = g[fila][col] + linea;
                            h[fila][col + 1] = getH(fila, col + 1);
                            getF(fila, col + 1);
                            abierta.push((fila) + " " + (col + 1));
                            padre[fila][col + 1] = fila + " " + col;
                        }
                    }
                }
                if (fila + 1 < mapa.length) { // evita desbordamiento a la derecha
                    if (mapa[fila + 1][col] !== 1) {
                        gTemporal = g[fila][col] + linea;
                        hTemporal = getH(fila + 1, col);
                        fTemporal = (gTemporal) + (hTemporal);
                        if (fTemporal <= f[fila + 1][col] && f[fila + 1][col] !== -1 || f[fila + 1][col] === 0) {
                            g[fila + 1][col] = g[fila][col] + linea;
                            h[fila + 1][col] = getH(fila + 1, col);
                            getF(fila + 1, col);
                            abierta.push((fila + 1) + " " + (col));
                            padre[fila + 1][col] = fila + " " + col;
                        }
                    }
                }
            }

            function setCamino() {
                var flag = true; // utiliza una bandera para que siga buscando hasta que encuentre el inicio
                var fila = getFila(padre[final[0]][final[1]]); // se obtiene la fila del padre del nodo final en la matriz de padres
                var col = getCol(padre[final[0]][final[1]]); // se obtiene la columna del padre del nodo final
                if (fila == inicio[0] && col == inicio[1]) { // si el padre es el inicio entonses termina 
                    flag = false;
                }
                while (flag) { // mientras no encuentre el inico seguira buscando el camino hacia atras
                    document.getElementById('tabla').rows[fila].cells[col].style.backgroundColor = "#3333ff"; // se optiene la casilla de la tabla mediante coordenadas del nodo padre y las pinta de un color
                    var fila2 = getFila(padre[fila][col]); // se vuelve a tomar la fila padre del nodo padre y asi sucesivamente
                    var col2 = getCol(padre[fila][col]); // igual con las columnas
                    fila = fila2; // se usan estas variables para no perder las referencias hasta que termine de evaluar el if siguiente
                    col = col2;
                    if (fila == inicio[0] && col == inicio[1]) { // si el nodo padre es el nodo inicio entonses activa la bandera
                        flag = false;
                    }
                }
                console.log(g); // imprime el costo total de movimientos en consola
                document.getElementById('peso').innerHTML = '<button type="button" class="btn btn-primary">'+"Gfinal=" + g[final[0]][final[1]] + '</button>'; // imprime el costo total de movimientos

            }

            function getH(fila, col) { // metodo utilizado para obtener el costo del nodo a el nodo final  (g)
                var x;
                x = Math.abs(fila - final[0]); // varor absoluto de la difrencia
                x += Math.abs(col - final[1]); // varor absoluto de la difrencia
                x = x * linea; // se multiplica por el costo del desplazamiento 
                return x;


            }


            function getF(fila, col) { // metodo que guarda en l matriz f la suma de la matriz g y h en su respectivo nodo
                f[fila][col] = g[fila][col] + h[fila][col];
            }

            function getFila(vector) { // metodo qe convierte de un arreglo a un entero la fila en la que se encuentra el nodo
                vector = vector.toString();
                var fila = vector.split(" ");
                fila = parseInt(fila[0]);
                return fila;
            }

            function getCol(vector) { // metodo qe convierte de un arreglo a un entero la columna en la que se encuentra el nodo
                vector = vector.toString();
                var col = vector.split(" ");
                col = parseInt(col[1]);
                return col;
            }
        };

    </script>
</body>

</html>

