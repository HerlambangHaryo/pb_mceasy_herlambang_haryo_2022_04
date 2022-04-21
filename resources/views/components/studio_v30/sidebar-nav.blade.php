<!-- BEGIN #sidebar -->
<div id="sidebar" class="app-sidebar">
    <!-- BEGIN scrollbar -->
    <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
        <!-- BEGIN menu -->
        <div class="menu">
            <div class="menu-header">Nav</div>
            

            <div class="menu-item @if($title == 'Dashboard') active @endif">
                <a href="{{ route('Dashboard.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fas fa-home"></i>
                    </span>
                    <span class="menu-text">Dashboard</span>
                </a>
            </div>
            <div class="menu-item @if($title == 'Countries') active @endif">
                <a href="{{ route('Countries.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fas fa-globe"></i>
                    </span>
                    <span class="menu-text">Countries</span>
                </a>
            </div>
            <div class="menu-item @if($title == 'Earth') active @endif">
                <a href="{{ route('Earth.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fa-solid fa-earth-europe"></i>
                    </span>
                    <span class="menu-text">Earth</span>
                </a>
            </div>

            <div class="menu-item @if($title == 'Maps') active @endif">
                <a href="{{ route('Maps.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fa-solid fa-map-location-dot"></i>
                    </span>
                    <span class="menu-text">Maps</span>
                </a>
            </div>

            <div class="menu-item @if($title == 'Prefixtures') active @endif">
                <a href="{{ route('Prefixtures.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fa-solid fa-binoculars"></i>
                    </span>
                    <span class="menu-text">Look</span>
                </a>
            </div>

            <div class="menu-item @if($title == 'Scroll') active @endif">
                <a href="{{ route('Scroll.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fa-solid fa-scroll"></i>
                    </span>
                    <span class="menu-text">Scroll</span>
                </a>
            </div>

            <div class="menu-item @if($title == 'Sandtime') active @endif">
                <a href="{{ route('Sandtime.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fa-regular fa-hourglass"></i>
                    </span>
                    <span class="menu-text">Sandtime</span>
                </a>
            </div>

            <div class="menu-item @if($title == 'Endfixtures') active @endif">
                <a href="{{ route('Endfixtures.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fa-solid fa-anchor"></i>
                    </span>
                    <span class="menu-text">Anchor</span>
                </a>
            </div>

            <div class="menu-item @if($title == 'Treasure') active @endif">
                <a href="{{ route('Treasure.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fa-solid fa-gem"></i>
                    </span>
                    <span class="menu-text">Treasure</span>
                </a>
            </div>

            <div class="menu-item @if($title == 'Pirates') active @endif">
                <a href="{{ route('Pirates.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fa-solid fa-skull-crossbones"></i>
                    </span>
                    <span class="menu-text">Pirates</span>
                </a>
            </div>

            <div class="menu-item @if($title == 'Prediction') active @endif">
                <a href="{{ route('Prediction.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fa-solid fa-newspaper"></i>
                    </span>
                    <span class="menu-text">Prediction</span>
                </a>
            </div>


        </div>
        <!-- END menu -->
    </div>
    <!-- END scrollbar -->
    
    <!-- BEGIN mobile-sidebar-backdrop -->
    <button class="app-sidebar-mobile-backdrop" data-dismiss="sidebar-mobile"></button>
    <!-- END mobile-sidebar-backdrop -->
</div>
<!-- END #sidebar -->