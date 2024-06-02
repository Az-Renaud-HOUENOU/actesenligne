<div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Rechercher" aria-label="Rechercher">
                                    </form>
                                </div>
                            </div>
                        </div>
                  @auth
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-bell"></i>
                                    <div class="pulse-css"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="list-unstyled">
                                        @foreach ($notifications as $notification)
                                            <li class="media dropdown-item">
                                                <span class="success"><i class="ti-user"></i></span>
                                                <div class="media-body">
                                                    <a href="#">
                                                        <p><strong>{{ $notification->etudiant }}</strong> a effectué une demande de <strong>{{ $notification->type_acte_demande }}</strong>.</p>
                                                    </a>
                                                </div>
                                                @if (!is_null($notification->heure_demande))
                                                    <span class="notify-time">{{ $notification->heure_demande->format('h:i a') }}</span>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                    <a class="all-notification" href="#">Voir toutes les notifications <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('admin.profil')}}" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="https://mail.google.com/mail/u/0/#inbox" target="_blank" class="dropdown-item">
                                        <i class="icon-envelope-open"></i>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Se deconnecter 
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                          </form>
                                        </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="profile_info">
                      <span>Bienvenu,</span>
                      <h4>{{Auth::user()->name}}</h4>
                    </div>
                  @endauth
                </nav>
            </div>
        </div>
