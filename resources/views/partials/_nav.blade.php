<nav class="navbar navbar-default">

    <div class="container-fluid">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">



            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>

            </button>
            <a class="navbar-brand" href="/1zadLar1/public/">Prijatelji</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a class="{{ Request::is('/') ? "active" : "" }}" href="/1zadLar1/public/">Home</a></li>
                <li><a class="{{ Request::is('user') ? "active" : "" }}" href="/1zadLar1/public/user">Korisnik</a></li>
                <li><a class="{{ Request::is('lokacija') ? "active" : "" }}" href="/1zadLar1/public/lokacija">Lokacija</a></li>
                <li><a class="{{ Request::is('prijatelji') ? "active" : "" }}" href="/1zadLar1/public/prijatelji">Prijatelji</a></li>
                <li><a class="{{ Request::is('pretplatnik') ? "active" : "" }}" href="/1zadLar1/public/pretplatnik">Pretplate</a></li>

            </ul>



            {{-- Desni dropdown, ZAKOMENTIRAN ISPOD--}}
            {{--<ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>--}}
            {{-- Desni dropdown, ZAKOMENTIRAN GORE--}}
        </div><!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>