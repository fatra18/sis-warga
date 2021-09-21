       <!-- Sidebar -->
       <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" >
          
            <div class="sidebar-brand-text mx-2 text-gray-900" style="font-size:19px;">SI Village</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item  {{ (request()->is('home')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt text-gray-900"></i>
                <span class="text-gray-900">Dashboard</span></a>
        </li>

        <!-- Nav Item - Pages Penduduk Menu -->
        <li class="nav-item 
                {{ (request()->is('resident')) ? 'active' : '' }} 
                {{ (request()->is('resident/create')) ? 'active' : '' }}
                {{ (request()->is('resident/edit')) ? 'active' : '' }}
                ">
            <a  href="{{ route('resident') }}"
                class="nav-link collapsed" 
                data-toggle="collapse" 
                data-target="#collapseTwo"
                aria-expanded="true" 
                aria-controls="collapseTwo" 
                {{ (request()->is('resident')) ? 'active' : '' }} 
               >
                <i class="fas fa-address-card text-gray-900"></i>
                <span class="text-gray-900">Data Penduduk</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('resident') }}">List Data Penduduk</a>
                    <a class="collapse-item" href="{{ route('residents-create') }}">Create Data Penduduk</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Pages Kartu Keluarga Menu -->
        <li 
            class="nav-item 
            {{ (request()->is('family-card')) ? 'active' : '' }}
            {{ (request()->is('family-card/create')) ? 'active' : '' }}
            {{ (request()->is('family-card/edit')) ? 'active' : '' }}
            {{ (request()->is('member-card')) ? 'active' : '' }}
            {{ (request()->is('member/create')) ? 'active' : '' }}
            {{ (request()->is('member/edit')) ? 'active' : '' }}
            ">
            <a  class="nav-link collapsed" 
                data-toggle="collapse" 
                data-target="#collapseThree"
                aria-expanded="true" 
                aria-controls="collapseTwo"
                href="{{ route('family-card') }}"
                >
                <i class="fas fa-id-card text-gray-900"></i>
                <span class="text-gray-900">Kartu Keluarga</span>
            </a>
            <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('family-card') }}">List Data Kartu Keluarga</a>
                    <a class="collapse-item" href="{{ route('family-card-create') }}">Create Data Kartu Keluarga</a>
                </div>
            </div>
            
        </li>
        
        <!-- Nav Item - Pages Pindah Menu -->
        <li 
            class="nav-item 
            {{ (request()->is('move')) ? 'active' : '' }}
            {{ (request()->is('move/create')) ? 'active' : '' }}
            {{ (request()->is('move/edit')) ? 'active' : '' }}
            ">
            <a  class="nav-link collapsed" data-toggle="collapse" 
                data-target="#collapseFour"
                aria-expanded="true" 
                aria-controls="collapseTwo"
                href="{{ route('move') }}">
                <i class="fas fa-home text-gray-900"></i>
                <span class="text-gray-900">Data Pindah</span>
            </a>
            <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('move') }}">List Data Pindah</a>
                    <a class="collapse-item" href="{{ route('move-create') }}">Create Data Pindah</a>
                </div>
            </div>
        </li>
        
        <!-- Nav Item - Pages Pendatang Menu -->
        <li 
            class="nav-item 
            {{ (request()->is('cormer')) ? 'active' : '' }}
            {{ (request()->is('cormer/create')) ? 'active' : '' }}
            {{ (request()->is('cormer/edit')) ? 'active' : '' }}
            ">
            <a  
                class="nav-link collapsed" data-toggle="collapse" 
                data-target="#collapseFive"
                aria-expanded="true" 
                aria-controls="collapseFive"
                href="{{ route('cormer') }}"> 
                <i class="fas fa-truck text-gray-900"></i>
                <span class="text-gray-900">Data Pendatang</span>
            </a>
            <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('cormer') }}">List Data Pendatang</a>
                    <a class="collapse-item" href="{{ route('cormer-create') }}">Create Data Pendatang</a>
                </div>
            </div>
        </li>
        
        <!-- Nav Item - Pages Lahir Menu -->
        <li 
            class="nav-item ml-1 
            {{ (request()->is('born')) ? 'active' : '' }}
            {{ (request()->is('born/create')) ? 'active' : '' }}
            {{ (request()->is('born/edit')) ? 'active' : '' }}
            ">
            <a  class="nav-link collapsed" data-toggle="collapse" 
                data-target="#collapseSix"
                aria-expanded="true" 
                aria-controls="collapseFive"
                href="{{ route('born') }}">
                <i class="fas fa-child text-gray-900"></i>
                <span class="text-gray-900">Data Lahir</span>
            </a>
            <div id="collapseSix" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('born') }}">List Data Lahir</a>
                    <a class="collapse-item" href="{{ route('born-create') }}">Create Data Lahir</a>
                </div>
            </div>
            
        </li>
        
        <!-- Nav Item - Pages Meninggal Menu -->
        <li 
            
            class="nav-item ml-1
            {{ (request()->is('die')) ? 'active' : '' }}
            {{ (request()->is('die/create')) ? 'active' : '' }}
            {{ (request()->is('die/edit')) ? 'active' : '' }}
            ">
            <a  
                class="nav-link collapsed" data-toggle="collapse" 
                data-target="#collapseSeven"
                aria-expanded="true" 
                aria-controls="collapseSeven"
                href="{{ route('death') }}">
                <i class="fas fa-book-dead text-gray-900"></i>
                <span class="text-gray-900">Data Meninggal</span>
            </a>
            <div id="collapseSeven" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('death') }}">List Data Meninggal</a>
                    <a class="collapse-item" href="{{ route('death-create') }}">Create Data Lahir</a>
                </div>
            </div>
        </li>
        
        <!-- Nav Item - Pages User Menu -->
        <li 
            class="nav-item ml-1
            {{ (request()->is('user*')) ? 'active' : '' }}
            {{ (request()->is('user/create')) ? 'active' : '' }}
            {{ (request()->is('user/edit')) ? 'active' : '' }}
            ">
            <a  
                class="nav-link collapsed" data-toggle="collapse" 
                data-target="#collapseEight"
                aria-expanded="true" 
                aria-controls="collapseEight"
                href="{{ route('user') }}">
                <i class="fas fa-user-alt text-gray-900"></i>
                <span class="text-gray-900">User</span>
            </a>
            <div id="collapseEight" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('user') }}">List Data User</a>
                    <a class="collapse-item" href="{{ route('user-create') }}">Create Data User </a>
                </div>
            </div>
           
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        
    </ul>
    <!-- End of Sidebar -->
