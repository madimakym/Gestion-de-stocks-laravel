 <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="#">MENU</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor01">
                  <ul class="navbar-nav mr-auto">
                    <li class="{{ Request::is('pizza') ? 'active' : '' }}">
                      <a class="nav-link" href="{{ route('pizza.index') }}">PIZZA <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="{{ Request::is('salades') ? 'active' : '' }}">
                      <a class="nav-link" href="{{ route('salades.index') }}">SALADES</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">DESSERTS</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">ENTRÉES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">BOISSONS</a>
                    </li>
                  </ul>
                </div>
            </div>
        </nav>