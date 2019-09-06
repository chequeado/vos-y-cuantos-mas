<div id="logout-links">
    @if (Auth::check())
        <style>
            #logout-links{
                position: fixed;
                z-index: 100;
                top:0;
                right:0;
                background: #ccc;
                color: steelblue;
                border: 1px solid steelblue;
            }
        </style>
        <a href="/dashboard" class="btn"><i class="fa fa-cog"></i>  Administración</a>
        <a href="/logout" class="btn"><i class="fa fa-sign-out"></i>  Salir</a>
    @else
        <span></span>
    @endif
</div>
