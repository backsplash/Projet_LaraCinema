<ul class="nav navbar-nav navbar-right">

<li class="dropdown menu-merge">
    <div class="navbar-btn btn-group">
        <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle">
            <span class="fa fa-heart-o fs14 va-m"></span>
            <span class="badge badge-danger">{{ count(session('likes', [])) }}</span>
        </button>
        <div class="dropdown-menu dropdown-persist w350 animated animated-shorter fadeIn" role="menu">
            <div class="panel mbn">
                <div class="panel-menu">
                    <span class="panel-icon"><i class="fa fa-movie-o"></i></span>
                    <span class="panel-title fw600"> Films favoris</span>
                    <button class="btn btn-default light btn-xs pull-right" type="button"><i class="fa fa-refresh"></i></button>
                </div>
                <div class="panel-body panel-scroller scroller-navbar scroller-overlay scroller-pn pn">
                    <ol class="timeline-list">
                        @forelse(session('likes', []) as $like)
                        <li class="timeline-item">
                            <div class="timeline-icon bg-dark light">
                                <span class="fa fa-tags"></span>
                            </div>
                            <div class="timeline-desc">
                                <b>{{ \App\Http\Models\Movies::find($like)->title}}</b>

                            </div>

                        </li>
                        @empty
                        <div class="alert alert-danger">Aucun film ajouté</div>
                        @endforelse
                    </ol>

                </div>
                <div class="panel-footer text-center p7">
                    
                    <a href="{{ route('movies_forget', [ 'action' => 'forget']) }}" class="btn btn-xs btn-danger">Vider</a>
                </div>
            </div>
        </div>
    </div>
</li>

    <li class="dropdown menu-merge">
        <div class="navbar-btn btn-group">
            <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle">
                <span class="fa fa-star-o fs14 va-m"></span>
                <span class="badge badge-danger">{{ count(session('favoris', [])) }}</span>
            </button>
            <div class="dropdown-menu dropdown-persist w350 animated animated-shorter fadeIn" role="menu">
                <div class="panel mbn">
                    <div class="panel-menu">
                        <span class="panel-icon"><i class="fa fa-movie-o"></i></span>
                        <span class="panel-title fw600"> Commentaires favoris</span>
                        <button class="btn btn-default light btn-xs pull-right" type="button"><i class="fa fa-refresh"></i></button>
                    </div>
                    <div class="panel-body panel-scroller scroller-navbar scroller-overlay scroller-pn pn">
                        <ol class="timeline-list">
                            @forelse(session('favoris', []) as $favoris)
                            <li class="timeline-item">
                                <div class="timeline-icon bg-dark light">
                                    <span class="fa fa-tags"></span>
                                </div>
                                <div class="timeline-desc">
                                    <b>{{ \App\Http\Models\Comments::find($favoris)->movies->title}}</b>
                                    {{ \App\Http\Models\Comments::find($favoris)->content}}
                                    <small class="text-primary">{{ \App\Http\Models\Comments::find($favoris)->user->username}}</small>

                                </div>

                            </li>
                            @empty
                            <div class="alert alert-danger">Aucun commentaire ajouté</div>
                            @endforelse
                        </ol>

                    </div>
                    <div class="panel-footer text-center p7">

                        <a href="{{ route('comments_forget', [ 'action' => 'forget']) }}" class="btn btn-xs btn-danger">Vider</a>
                    </div>
                </div>
            </div>
        </div>
    </li>

<li class="dropdown menu-merge">
    <div class="navbar-btn btn-group">
        <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle">
            <span class="flag-xs flag-fr"></span>
            <!-- <span class="caret"></span> -->
        </button>
        <ul class="dropdown-menu pv5 animated animated-short flipInX" role="menu">
            <li>
                <a href="javascript:void(0);">
                    <span class="flag-xs flag-in mr10"></span> Hindu </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <span class="flag-xs flag-tr mr10"></span> Turkish </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <span class="flag-xs flag-es mr10"></span> Spanish </a>
            </li>
        </ul>
    </div>
</li>
<li class="menu-divider hidden-xs">
    <i class="fa fa-circle"></i>
</li>
<li class="dropdown menu-merge">
    <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown">
        <img src="{{ Auth::user()->photo}}" alt="avatar" class="mw30 br64">
        <span class="hidden-xs pl15">{{ Auth::user()->firstname}} {{ substr(Auth::user()->lastname, 0, 1)}}.</span>
        <span class="caret caret-tp hidden-xs"></span>
    </a>
    <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
        <li class="dropdown-header clearfix">
            <div class="pull-left ml10">
                <select id="user-status">
                    <optgroup label="Current Status:">
                        <option value="1-1">Away</option>
                        <option value="1-2">Offline</option>
                        <option value="1-3" selected="selected">Online</option>
                    </optgroup>
                </select>
            </div>

            <div class="pull-right mr10">
                <select id="user-role">
                    <optgroup label="Logged in As:">
                        <option value="1-1">Client</option>
                        <option value="1-2">Editor</option>
                        <option value="1-3" selected="selected">Admin</option>
                    </optgroup>
                </select>
            </div>
        </li>
        <li class="list-group-item">
            <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-envelope"></span> Messages
                <span class="label label-warning">2</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-user"></span> Friends
                <span class="label label-warning">6</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-bell"></span> Notifications </a>
        </li>
        <li class="list-group-item">
            <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-gear"></span> Settings </a>
        </li>
        <li class="dropdown-footer">
            <a href="{{ url('auth/logout')}}" class="">
                <span class="fa fa-power-off pr5"></span> Logout </a>
        </li>
    </ul>
</li>
</ul>