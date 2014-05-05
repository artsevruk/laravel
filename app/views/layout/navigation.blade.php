
    <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::route('home') }}">Project name</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="{{ URL::route('home') }}">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              @if(Auth::check())
              <li><a href="{{ URL::route ('account-sing-out') }}">Sing out</a></li>
              <li><a href="{{ URL::route ('account-change-password') }}">Change password</a></li>
              <li><a href="{{ URL::route('profile-user') }}">Profile</a></li>

              @else
              <li><a href="{{ URL::route ('account-sing-in') }}">Sing in</a></li>
              <li><a href="{{ URL::route ('account-create') }}">Create account</a></li>
              <li><a href="{{ URL::route ('account-forgot-password') }}">Forgot password</a></li>
              @endif
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>