<style>
  .bg-dark-red {
    background-color: #4f1009 ; /* HEX code for dark red */
  }
</style>
<ul class="navbar-nav bg-dark-red sidebar sidebar-dark accordion toggled"   id="accordionSidebar">
  
  <!-- Sidebar - Brand -->
  @if(Auth::check() && Auth::user()->typeUser=="user")
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('products') }}">
  @else
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.index') }}">
  @endif


    
    <div class="sidebar-brand-icon ">
      <img src="{{ asset('image/1212.png') }}" alt="MARRAKECH" width="60" height="60">  
    </div>
    <div class="sidebar-brand-text text-gray-300  mx-3">
      Prefetch Marrakech 
    </div>
  </a>
  
  <hr class="sidebar-divider my-0">
  
  
  
  @if(Auth::check() && Auth::user()->typeUser=="user")
  <li class="nav-item">
    <a class="nav-link" href="{{ route('products') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Courrier</span></a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="/profile">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Profile</span></a>
  </li>
 {{-- admin=============================================================== --}}
  @else
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.index') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/profile">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Profile</span></a>
  </li>
  <li class="nav-item">
    <form action="{{ route('admin.index') }}" method="POST">
        @csrf
        <input type="hidden" value="annex" name="var">
        <button type="submit" class="btn btn-link nav-link">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Annexes</span>
        </button>
    </form>
</li>
  <li class="nav-item">
    <form action="{{ route('admin.index') }}" method="POST">
        @csrf
        <input type="hidden" value="type" name="var">
        <button type="submit" class="btn btn-link nav-link">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Types</span>
        </button>
    </form>
</li>
  <li class="nav-item">
    <form action="{{ route('admin.index') }}" method="POST">
        @csrf
        <input type="hidden" value="theme" name="var">
        <button type="submit" class="btn btn-link nav-link">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Themes</span>
        </button>
    </form>
</li>
  <li class="nav-item">
    <form action="{{ route('admin.index') }}" method="POST">
        @csrf
        <input type="hidden" value="typeEX" name="var">
        <button type="submit" class="btn btn-link nav-link">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Type Expiditeurs</span>
        </button>
    </form>
</li>
  
  @endif

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
  
  
</ul>