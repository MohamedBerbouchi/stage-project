<div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="javascript:;" class="simple-text" href="{{route('home')}}">
            <img src="{{ asset('assets/img/IKS.jpg') }}" class="rounded" alt="" width="40px;">  
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item  @if(request()->is('home*') or request()->is('/') ) active @endif" class="side-bar-link">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Statistiques</p>
                </a>
            </li>
            <li class="nav-item     @if(request()->is('defaut*')) active @endif">
                <a class="nav-link " href="{{route('defaut.create')}}">
                    <i class="nc-icon nc-icon nc-paper-2"></i>
                    <p>defauts  </p> 
                        
                </a>
            </li>
            <li class="nav-item    @if(request()->is('reclamation*')) active @endif">
                <a class="nav-link  " href="{{route('reclamation.create')}}">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>Reclamation</p>
                </a>
            </li>
            <li class="nav-item   @if(request()->is('reponse*')) active @endif  ">
                <a class="nav-link" href="{{route('reclamation.reponse')}}">
                    <i class="nc-icon nc-send"></i>
                    <p>Reponse</p>
                </a>
            </li>
            <li class="nav-item   @if(request()->is('gestion*')) active @endif  ">
                <a class="nav-link" href="{{route('gestion')}}">
                    <i class="nc-icon nc-attach-87"></i>
                    <p>gestion</p>
                </a>
            </li>

            <li class="nav-item   active-pro mt-4">
                <a class="nav-link  " href="{{route('logout')}}">
                    <i class="nc-icon nc-button-power"></i>
                    se deconnecter
                </a>
            </li>
        </ul>
    </div>
</div>
 