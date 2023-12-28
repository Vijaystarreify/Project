<aside class="aside is-placed-left is-expanded">
  <div class="aside-tools">
    <div>
      Admin 
    </div>
  </div>
  <div class="menu is-menu-main">
    <ul class="menu-list">
      <li class="--set-active-index-html">
        <a href="{{route('dashboard')}}">
        <span class="icon"><i class="mdi mdi-view-dashboard"></i></span>
          <span class="menu-item-label">Dashboard</span>
        </a>
      </li>
    </ul>	
	<ul class="menu-list">
      <li class="--set-active-index-html">
      <a href="{{route('movies-list')}}">
        <span class="icon"><i class="mdi mdi-movie"></i></span>
            <span class="menu-item-label">Movie</span>
        </a>
      </li>
    </ul>

    <ul class="menu-list">
            <li class="--set-active-index-html">
                <a href="{{ route('theaters-list') }}">
                <span class="icon"><i class="mdi mdi-home"></i></span>
                    <span class="menu-item-label">Theaters</span>
                </a>
            </li>
        </ul>

        <ul class="menu-list">
            <li class="--set-active-index-html">
                <a href="">
                <span class="icon"><i class="mdi mdi-plus-circle"></i></span>
                    <span class="menu-item-label">Add Show </span>
                </a>
            </li>
        </ul>

        <ul class="menu-list">
            <li class="--set-active-index-html">
                <a href="">
                <span class="icon"><i class="mdi mdi-calendar"></i></span>

                    <span class="menu-item-label">Today Show </span>
                </a>
            </li>
        </ul>

        <ul class="menu-list">
            <li class="--set-active-index-html">
                <a href="">
                <span class="icon"><i class="mdi mdi-ticket"></i></span>
                    <span class="menu-item-label">Today Booking </span>
                </a>
            </li>
        </ul>

        <ul class="menu-list">
            <li class="--set-active-index-html">
                <a href="">
                <span class="icon"><i class="mdi mdi-eye"></i></span>
                    <span class="menu-item-label">View Show</span>
                </a>
            </li>
        </ul>
  </div>
</aside>
