
        <nav class="navbar navbar-expand-lg navbar-dark" role="navigation" style="table-layout: fixed; background: aquamarine !important;">
            <div class="">
                <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar" style="color:black;">
                    ☰
                </button>
                <div class="collapse navbar-collapse" id="exCollapsingNavbar">
                    <ul class="nav navbar-nav"  id="info">
                        <li class="nav-data nav-link"> <i>info@hospital-plus.com</i> </li>
                        <li class="nav-data nav-link"> <i>060/233-0000</i></li>
                    </ul>
                    <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                        <li class="px-3 py-2">
                            <div class="form-group" style="margin-bottom: 0;color:black;">
                                @if (Route::has('login'))
                                    <div class="top-right links">
                                        @auth
                                            <a href="{{ url('/home') }}">Glavna stranica</a>
                                        @else
                                        <a href="{{ route('login') }}"><button type="button" class="btn btn-primary" id="login" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Login</button></a>                         

                                        @endauth
                                    </div>
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
