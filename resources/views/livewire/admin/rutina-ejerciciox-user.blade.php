<div>
    @if ($rutinaEjerciciosT->count())
        <div class="card mt-3">
            <button type="button" class="btn-close" aria-label="Close" wire:click="cancelarRutina">
            </button>
            <h5 class="text-center mt-3">Rutina {{ $rutinaEjerciciosT[$time]->nombre_rutina }}</h5>
            <div class="card-body">

                <div class="card mb-3 text-center">
                    <div class="card-img-top mt-3">
                        <img src="{{ asset('storage') . '/' . $rutinaEjerciciosT[$time]->imagen_ejercicio }}"
                            alt="{{ $rutinaEjerciciosT[$time]->nombre_ejercicio }}" width="300" {{ $ocultar }}>
                    </div>
                    <h5 class="card-title" {{ $ocultar }}>{{ $rutinaEjerciciosT[$time]->nombre_ejercicio }}</h5>
                    <p class="card-text" {{ $ocultar }}>{{ $rutinaEjerciciosT[$time]->descripcion }}</p>
                    @if ($rutinaEjerciciosT[$time]->tipo === 'tiempo')
                        <div id="timer" {{ $ocultar }}>
                            <span id="contador">{{ $valorInicial = $rutinaEjerciciosT[$time]->duracion_segundos }}
                            </span>
                            Segundos {{ $contador }}
                        </div>
                        @if ($rutinaEjerciciosT[$time]->duracion_segundos > 0)
                            <!-- En tu vista Blade -->
                            <div style="text-align: center" {{ $ocultar }}>
                                <button class="btn btn-primary ms-auto mb-3 mt-3" id="iniciar"><i
                                        class="fas fa-solid fa-play"></i></button>
                                <button class="btn btn-primary ms-auto mb-3 mt-3" id="pausar"><i
                                        class="fas fa-pause"></i></button>
                                {{-- <button class="btn btn-primary ms-auto mb-3 mt-3" id="parar"><i
                                        class="fas fa-stop"></i></button> --}}
                            </div>
                            <div style="text-align: center mt-3">
                                @if ($finaliza)
                                    <form id="crear" method="POST"
                                        action="{{ route('rutinaEjercicioxUser.store') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control text-center"
                                                        name="id_rutina" value="{{ $id_rutina }}" readonly>
                                                    <input type="text" class="form-control text-center"
                                                        name="id_user" value="{{ $id_user }}" readonly>
                                                    <input type="date" class="form-control text-center"
                                                        name="fecha" value="{{ $fecha }}" readonly>
                                                    <input type="time" class="form-control text-center"
                                                        name="comienza" value="{{ $comienza }}" readonly>
                                                    <input type="time" class="form-control text-center"
                                                        name="termina" value="{{ date('H:i:s') }}" readonly>
                                                </div>
                                            </div>
                                            <div>
                                                <button class="btn btn-primary ms-auto m-3" form="crear">
                                                    Finalizar
                                                </button>
                                    </form>
                                @else
                                    <button wire:click="{{ $time > 0 ? 'anterior' : '' }}"
                                        class="btn btn-primary ms-auto" id="anterior"><i
                                            class="fas fa-step-backward"></i></button>
                                    <button
                                        wire:click="{{ $time + 1 < count($rutinaEjerciciosT) ? 'siguiente' : 'finaliza' }}"
                                        class="btn btn-primary ms-auto" id="siguiente"><i
                                            class="fas fa-step-forward"></i></button>
                                @endif
                            </div>
                            <script>
                                var contador = document.getElementById("contador").innerHTML;

                                var btnSiguiente = document.getElementById("siguiente");
                                var btnAnterior = document.getElementById("anterior");
                                var intervalo;

                                function actualizarContador() {
                                    document.getElementById("contador").innerText = contador;
                                }

                                function iniciar() {
                                    intervalo = setInterval(function() {
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
                                    // para.removeAttribute("disabled");
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
                                    // para.setAttribute("disabled", "disabled");
                                });

                                // var para = document.getElementById("parar");
                                // para.addEventListener("click", (event) => {
                                //     parar();
                                //     ini.removeAttribute("disabled");
                                //     pause.setAttribute("disabled", "disabled");
                                //     btnAnterior.removeAttribute("disabled");
                                //     btnSiguiente.removeAttribute("disabled");
                                // });

                                function pausar() {
                                    clearInterval(intervalo);
                                }

                                function reanudar() {
                                    iniciar();
                                }

                                // function parar() {
                                //     clearInterval(intervalo);
                                //     contador = document.getElementById("contador").innerHTML;
                                //     Livewire.emit("actualizarContador");
                                //     actualizarContador();
                                // }
                            </script>
                        @endif
                    @else
                        <span>
                            {{ $rutinaEjerciciosT[$time]->repeticiones }}
                            {{ $rutinaEjerciciosT[$time]->tipo }}
                        </span>
                        <div style="text-align: center">
                            @if ($finaliza)
                                <form id="crear" method="POST" action="{{ route('rutinaEjercicioxUser.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control text-center" name="id_rutina"
                                                    value="{{ $id_rutina }}" readonly>
                                                <input type="text" class="form-control text-center" name="id_user"
                                                    value="{{ $id_user }}" readonly>
                                                <input type="date" class="form-control text-center" name="fecha"
                                                    value="{{ $fecha }}" readonly>
                                                <input type="time" class="form-control text-center" name="comienza"
                                                    value="{{ $comienza }}" readonly>
                                                <input type="time" class="form-control text-center" name="termina"
                                                    value="{{ date('H:i:s') }}" readonly>
                                            </div>
                                        </div>
                                        <div>
                                            <button class="btn btn-primary ms-auto m-3" form="crear">
                                                Finalizar
                                            </button>
                                </form>
                            @else
                                <button wire:click="{{ $time > 0 ? 'anterior' : 'finaliza' }}"
                                    class="btn btn-primary ms-auto"><i class="fas fa-step-backward"></i></button>
                                <button
                                    wire:click="{{ $time + 1 < count($rutinaEjerciciosT) ? 'siguiente' : 'finaliza' }}"
                                    class="btn btn-primary ms-auto"><i class="fas fa-step-forward"></i></button>
                            @endif

                        </div>
                    @endif
                </div>
                <div class="card-footer text-muted" {{ $ocultar }}>
                    Ejercicio {{ $time + 1 }} de {{ count($rutinaEjerciciosT) }}
                </div>
            </div>
        </div>
    @endif
</div>
