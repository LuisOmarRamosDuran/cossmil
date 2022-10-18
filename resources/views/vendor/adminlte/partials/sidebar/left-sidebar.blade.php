<aside class="main-sidebar h-100 {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

  {{-- Sidebar menu --}}
    <div class="container-fluid bg-primary"> 
        <div class="row">
            <div class="col">
                <h6 style="font-size:0.8rem">Nombre Completo</h6>
                <h6  style="font-size:0.8rem" > {{ auth()->user()->nombre. " " . auth()->user()->ap_paterno. " " . auth()->user()->ap_materno }} </h6>
                <h6 style="font-size:0.8rem">Fuerza</h6>
                <h6  style="font-size:0.8rem" > {{ auth()->user()->fuerza}} </h6>
                <h6 style="font-size:0.8rem">Fecha de Nacimiento</h6>
                <h6  style="font-size:0.8rem" > {{ auth()->user()->fecha_nacimiento}} </h6>
                <h6 style="font-size:0.8rem">Grado</h6>
                <h6  style="font-size:0.8rem" > {{ auth()->user()->grado}} </h6>
                <h6 style="font-size:0.8rem" >Matricula</h6>
                <h6  style="font-size:0.8rem" > {{ auth()->user()->matricula}} </h6>
                <h6 style="font-size:0.8rem">Carnet de Identidad</h6>
                <h6  style="font-size:0.8rem" > {{ auth()->user()->ci}} </h6>


            </div>
            <div class="col">
                {{-- {{ assets(/asssets/img/imgUser/ivan.png) }} --}}
                 <img src="{{ asset(auth()->user()->foto)  }}" style="width:90%; height:30%;" />
            </div>
        </div>
        
    </div>
    <hr style="
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(47, 69, 56, 1);" />
    <div class="sidebar" style="background-color: rgba(26, 69, 56, 1) ;">
        <nav class="pt-2"></nav>

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>
                {{-- Configured sidebar links --}}
                @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item')
            </ul>
        </nav>
    </div>

</aside>
