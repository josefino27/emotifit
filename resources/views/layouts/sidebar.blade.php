<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>EmotiFit</h3>
            <strong>EF</strong>
        </div>

        <ul class="list-unstyled components">
            <li class="{{'home'==request()->path()?'active':''}}">
                <a href="{{url('/home')}}">
                    <i class="fas fa-home"></i>
                    <b>Home</b>
                </a>
            </li>

            @can('users')
            <li class="{{'home'==Request::is('users*')?'active':''}}">
                <a href="{{url('users')}}">
                    <i class="fas fa-users"></i>
                    <b>Usuarios</b>
                </a>
            </li>
            @endcan

            @can('roles')
            <li class="{{'permisos'==Request::is('role*')?'active':''}}">
                <a href="{{route('role.index')}}">
                    <i class="fas fa-user-cog"></i>
                    <b>Roles y Permisos</b>
                </a>
            </li>
            @endcan
            <li class="{{'emocion'==Request::is('emocion*')?'active':''}}">
                <a href="{{route('emocion.index')}}">
                    <i class="fas fa-heartbeat"></i>
                    <b>Emocion</b>
                </a>

            </li>
            <li class="{{'userxemocion'==Request::is('userxemocion*')?'active':''}}">
                <a href="{{route('userxemocion.index')}}">
                    <i class="fas fa-heartbeat"></i>
                    <b>UserxEmocion</b>
                </a>

            </li>
            <li class="{{'emocionxusuarios'==Request::is('emocionxusuarios*')?'active':''}}">
                <a href="{{route('emocionxusuarios.index')}}">
                    <i class="fas fa-heartbeat"></i>
                    <b>emocionxusuario</b>
                </a>

            </li>

            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-dumbbell"></i>
                    <b>Ejercicios</b>
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Por Categoria</a>
                    </li>
                    <li>
                        <a href="{{ route('musculos.create') }}">Por Musculo</a>
                    </li>
                    <li>
                        <a href="#">Por Equipamiento</a>
                    </li>
                    <li>
                        <a href="{{route('ejercicios.index')}}">Por Emocion</a>
                    </li>
                </ul>

            <li class="{{'rutinas'==Request::is('rutinas')?'active':''}}">
                <a href="{{route('rutinas.index')}}">
                    <i class="fas fa-book"></i>
                    <b>Rutina</b>
                </a>

            </li>

            <li class="{{'rutinasEjercicios'==Request::is('rutinasEjercicios')?'active':''}}">
                <a href="{{route('rutinasEjercicios.index')}}">
                    <i class="fas fa-address-book"></i>
                    <b>Rutina Ejercicios</b>
                </a>

            </li>
            @can('users')
            <li class="{{'rutinas'==Request::is('musculos*')?'active':''}}">
                <a href="{{route('musculos.index')}}">
                    <i class="fas fa-child"></i>
                    <b>Musculos</b>
                </a>

            </li>
            @endcan

            <li class="{{'clases'==Request::is('clases*')?'active':''}}">

                <a href="{{route('clases.index')}}">
                    <i class="fas fa-video"></i>
                    <b>Clases</b>
                </a>
            </li>
            <li class="{{'reservas'==Request::is('reservas*')?'active':''}}">

                <a href="{{route('reservas.index')}}">
                    <i class="fas fa-save"></i>
                    <b>Reservas</b>
                </a>
            </li>


            </li>
            <li class="{{'reservas'==Request::is('nutricion*')?'active':''}}">
                <a href="{{route('nutricion.index')}}">
                    <i class="fas fa-utensils"></i>
                    <b>Nutricion</b>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-people-carry"></i>
                    <b>Productos</b>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-paper-plane"></i>
                    <b>Contacto</b>
                </a>
            </li>
        </ul>

    </nav>

    <!-- Page Content  -->
    <!-- <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Sidebar</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>
            </div>
        </nav>
    </div> -->
</div>
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
    integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
    });
});
</script>