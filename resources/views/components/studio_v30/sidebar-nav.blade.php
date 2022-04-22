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

            <div class="menu-item @if($title == 'Employees') active @endif">
                <a href="{{ route('Employees.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fa-solid fa-user-group"></i>
                    </span>
                    <span class="menu-text">Employee</span>
                </a>
            </div> 

            <div class="menu-divider"></div>

            <div class="menu-header">Paid Leave</div>

            <div class="menu-item @if($title == 'Paidleave') active @endif">
                <a href="{{ route('Paidleave.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fa-regular fa-paper-plane"></i>
                    </span>
                    <span class="menu-text">Paid Leave</span>
                </a>
            </div> 
            <div class="menu-item @if($title == 'Paidleavereasons') active @endif">
                <a href="{{ route('Paidleavereasons.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fa-regular fa-file-lines"></i>
                    </span>
                    <span class="menu-text">Reason</span>
                </a>
            </div> 


            <div class="menu-divider"></div>

            <div class="menu-header">Additional</div>

            <div class="menu-item @if($title == 'Jobtitle') active @endif">
                <a href="{{ route('Jobtitle.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fa-regular fa-file-lines"></i>
                    </span>
                    <span class="menu-text">Jobtitle</span>
                </a>
            </div> 

            <div class="menu-divider"></div>

            <div class="menu-header">Soal</div>
            <div class="menu-item @if($title == 'Soal') active @endif">
                <a href="{{ route('Soal.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fa-regular fa-file-lines"></i>
                    </span>
                    <span class="menu-text">Soal</span>
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