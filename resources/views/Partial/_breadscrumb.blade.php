@section('breadscrumb')
<header id="topbar" class="alt">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">
                <a href="dashboard.html">@section('famille') @show</a>
            </li>
            <li class="crumb-icon">
                <a href="dashboard.html">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-link">
                <a href="index.html">Home</a>
            </li>
            <li class="crumb-trail">@section('famille') @show</li>
        </ol>
    </div>
</header>
@show
