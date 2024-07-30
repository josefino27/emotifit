    var contador = document.getElementById("contador").innerHTML;

    var btnSiguiente = document.getElementById("siguiente");
    var btnAnterior = document.getElementById("anterior");
    var intervalo;

    function actualizarContador() {
        document.getElementById("contador").innerText = contador;
    }

    function iniciar() {
        intervalo = setInterval(function () {
            contador--;
            actualizarContador();

            if (contador <= 0) {
                clearInterval(intervalo); // Detiene el intervalo cuando el contador llega a 0
                // Puedes agregar más lógica aquí al llegar a 0
                contador = document.getElementById("contador").innerHTML;
                actualizarContador();
                btnSiguiente.removeAttribute("disabled");
                btnAnterior.removeAttribute("disabled");
                //btnSiguiente.onclick(); // no esta funcionando
            }
        }, 1000); // Actualiza cada segundo
    }

    var ini = document.getElementById("iniciar");
    ini.addEventListener("click", (event) => {
        ini.setAttribute("disabled", "disabled");
        para.removeAttribute("disabled");
        pause.removeAttribute("disabled");
        btnAnterior.setAttribute("disabled", "disabled");
        btnSiguiente.setAttribute("disabled", "disabled");
        contador = document.getElementById("contador").innerHTML;
        iniciar();
    });
    var pause = document.getElementById("pausar");
    pause.addEventListener("click", (event) => {
        pausar();
        ini.removeAttribute("disabled");
        para.setAttribute("disabled", "disabled");
    });

    var para = document.getElementById("parar");
    para.addEventListener("click", (event) => {
        parar();
        ini.removeAttribute("disabled");
        pause.setAttribute("disabled", "disabled");
        btnAnterior.removeAttribute("disabled");
        btnSiguiente.removeAttribute("disabled");
    });

    function pausar() {
        clearInterval(intervalo);
    }

    function reanudar() {
        iniciar();
    }

    function parar() {
        clearInterval(intervalo);
        contador = document.getElementById("contador").innerHTML;
        Livewire.emit("actualizarContador");
        actualizarContador();
    }

