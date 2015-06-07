<div class="navbar navbar-default navbar-fixed-top" id="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#links">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <img src="/128x128.png" class="img-circle img-responsive col-lg-2 col-md-2 c col-sm-1 col-xs-2">
                DevelopersHangout
            </a>
        </div>
        <div class="collapse navbar-collapse" id="links">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="/sponsor" class="navbar-link">
                        <i class="glyphicon glyphicon-heart"></i>&nbsp;Sponsor</a>
                </li>
                @if(Auth::guest())
                    <li>
                        <a href="/auth/login" class="navbar-link">
                            <i class="glyphicon glyphicon-open"></i>&nbsp;Manage Subscription
                        </a>
                    </li>
                @else
                    <li>
                        <a href="/profile" class="navbar-link">
                            <i class="glyphicon glyphicon-log-out"></i>&nbsp;Manage Subscription
                        </a>
                    </li>
                    <li>
                        <a href="/auth/logout" class="navbar-link">
                            <i class="glyphicon glyphicon-log-out"></i>&nbsp;Logout
                        </a>
                    </li>
                @endif
                <li>
                    <a href="http://developershangout.io" class="navbar-link">
                        <i class="glyphicon glyphicon-star-empty"></i>&nbsp;ThePodcast</a>
                </li>
            </ul>
        </div>
    </div>
</div>