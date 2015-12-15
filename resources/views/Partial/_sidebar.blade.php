<!-- Start: Sidebar -->
<aside id="sidebar_left" class="nano nano-light affix">

<!-- Start: Sidebar Left Content -->
<div class="sidebar-left-content nano-content">

<!-- Start: Sidebar Header -->
<header class="sidebar-header">

    <!-- Sidebar Widget - Author -->
    <div class="sidebar-widget author-widget">
        <div class="media">
            <a class="media-left" href="#">
                <img src="{{ Auth::user()->photo}}" class="img-responsive">
            </a>
            <div class="media-body">
                <div class="media-links">
                    <a href="#" class="sidebar-menu-toggle">User Menu -</a> <a href="{{ url('auth/logout')}}">Logout</a>
                </div>
                <div class="media-author">{{ Auth::user()->firstname}} {{ Auth::user()->lastname}}</div>
            </div>
        </div>
    </div>

    <!-- Sidebar Widget - Menu (slidedown) -->
    <div class="sidebar-widget menu-widget">
        <div class="row text-center mbn">
            <div class="col-xs-4">
                <a href="dashboard.html" class="text-primary" data-toggle="tooltip" data-placement="top" title="Dashboard">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </div>
            <div class="col-xs-4">
                <a href="pages_messages.html" class="text-info" data-toggle="tooltip" data-placement="top" title="Messages">
                    <span class="glyphicon glyphicon-inbox"></span>
                </a>
            </div>
            <div class="col-xs-4">
                <a href="pages_profile.html" class="text-alert" data-toggle="tooltip" data-placement="top" title="Tasks">
                    <span class="glyphicon glyphicon-bell"></span>
                </a>
            </div>
            <div class="col-xs-4">
                <a href="pages_timeline.html" class="text-system" data-toggle="tooltip" data-placement="top" title="Activity">
                    <span class="fa fa-desktop"></span>
                </a>
            </div>
            <div class="col-xs-4">
                <a href="pages_profile.html" class="text-danger" data-toggle="tooltip" data-placement="top" title="Settings">
                    <span class="fa fa-gears"></span>
                </a>
            </div>
            <div class="col-xs-4">
                <a href="pages_gallery.html" class="text-warning" data-toggle="tooltip" data-placement="top" title="Cron Jobs">
                    <span class="fa fa-flask"></span>
                </a>
            </div>
        </div>
    </div>

    <!-- Sidebar Widget - Search (hidden) -->
    <div class="sidebar-widget search-widget hidden">
        <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-search"></i>
              </span>
            <input type="text" id="sidebar-search" class="form-control" placeholder="Search...">
        </div>
    </div>

</header>
<!-- End: Sidebar Header -->

<!-- Start: Sidebar Menu -->
<ul class="nav sidebar-menu">
<li class="sidebar-label pt20">Menu</li>
<!--<li>-->
<!--    <a href="">-->
<!--        <span class="fa fa-calendar"></span>-->
<!--        <span class="sidebar-title">Calendar</span>-->
<!--              <span class="sidebar-title-tray">-->
<!--                <span class="label label-xs bg-primary">New</span>-->
<!--              </span>-->
<!--    </a>-->
<!--</li>-->
    <li @if( \Request::route()->getName() == 'home_page') class="active" @endif>
    <a href="{{ route('home_page')}}">
        <span class="fa fa-home"></span>
        <span class="sidebar-title">Dashboard</span>

    </a>
    </li>

    <li @if( \Request::route()->getName() == 'movies_index') class="active" @endif>
        <a href="{{ route('movies_index')}}">
            <span class="fa fa-film"></span>
            <span class="sidebar-title">Gestion des films</span>

        </a>
    </li>
    <li @if( \Request::route()->getName() == 'cinemas_index') class="active" @endif>
    <a href="{{ route('cinemas_index')}}">
        <span class="fa fa-caret-square-o-right"></span>
        <span class="sidebar-title">Gestion des cinémas</span>

    </a>
    </li>
    <li @if( \Request::route()->getName() == 'actors_index') class="active" @endif>
        <a href="{{ route('actors_index')}}">
            <span class="fa fa-star"></span>
            <span class="sidebar-title">Gestion des acteurs</span>

        </a>
    </li>
    <li @if( \Request::route()->getName() == 'directors_index') class="active" @endif>
        <a href="{{ route('directors_index')}}">
            <span class="fa fa-bullhorn"></span>
            <span class="sidebar-title">Gestion des réalisateurs</span>

        </a>
    </li>
    <li @if( \Request::route()->getName() == 'categories_index') class="active" @endif>
        <a href="{{ route('categories_index')}}">
            <span class="fa fa-tag"></span>
            <span class="sidebar-title">Gestion des catégories</span>

        </a>
    </li>
    <li @if( \Request::route()->getName() == 'comments_index') class="active" @endif>
        <a href="{{ route('comments_index')}}">
            <span class="fa fa-comment-o"></span>
            <span class="sidebar-title">Gestion des commentaires</span>

        </a>
    </li>
<li @if( \Request::route()->getName() == 'administrators_index') class="active" @endif>
    <a href="{{ route('administrators_index')}}">
        <span class="fa fa-user"></span>
        <span class="sidebar-title">Gestion des administrateurs</span>

    </a>
</li>

</ul>
<!-- End: Sidebar Menu -->

<!-- Start: Sidebar Collapse Button -->
<div class="sidebar-toggle-mini">
    <a href="#">
        <span class="fa fa-sign-out"></span>
    </a>
</div>
<!-- End: Sidebar Collapse Button -->

</div>
<!-- End: Sidebar Left Content -->

</aside>
<!-- End: Sidebar Left -->