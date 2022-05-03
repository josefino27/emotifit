<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>EmotiFit</h3>
            <strong>EF</strong>
        </div>

        <ul class="list-unstyled components">
            <li class="active">
                <a href="{{url('/home')}}">
                    <i class="fas fa-home"></i>
                    Home
                </a>
            </li>
            <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-copy"></i>
                    Ejercicios
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Por Categoria</a>
                    </li>
                    <li>
                        <a href="#">Por Musculo</a>
                    </li>
                    <li>
                        <a href="#">Por Equipamiento</a>
                    </li>
                </ul>
                <a href="#rutinaSubmenu" data-toggle="collapse" 
                aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-copy"></i>
                    Rutina
                </a>
                <ul class="collapse list-unstyled" id="rutinaSubmenu">
                    <li>
                        <a href="#">crear rutina</a>
                    </li>
                </ul>
                
                <a href="#serviceSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-copy"></i>
                    Servicios
                </a>
                <ul class="collapse list-unstyled" id="serviceSubmenu">
                    <li>
                        <a href="#">Clases</a>
                    </li>
                    <li>
                        <a href="{{url('/reservas')}}">Reservas</a>
                    </li>
                    
                </ul>
            </li>
            <li>
            <a href="#nutricionSubmenu" data-toggle="collapse" 
                aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-copy"></i>
                    Nutricion
                </a>
                <ul class="collapse list-unstyled" id="nutricionSubmenu">
                    <li>
                        <a href="#">Agregar Lista de Mercado</a>
                    </li>
                    <li>
                        <a href="#">consulta IMC</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-image"></i>
                    Productos
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-paper-plane"></i>
                    Contacto
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
    });
});
</script>