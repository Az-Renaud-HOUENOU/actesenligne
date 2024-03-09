<div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Menu Principal</li>
                    <li><a href="{{route('dashboard')}}" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Tableau de bord</span></a>
                    </li>
                    <li class="nav-label">Administration</li>
                    <li><a href="{{route('actes.index')}}" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Acte académique</span></a>
                    </li>
                    <li><a href="{{route('demandes')}}" aria-expanded="false"><i
                                class="icon icon-single-copy-06"></i><span class="nav-text">Demandes</span></a>
                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-chart-bar-33"></i><span class="nav-text">Statistiques</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('statistique.demande') }}">Statistiques</a></li>
                        </ul>
                    </li>
                    @if(Auth::user()->fonction === 'Super Administrateur')
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                    class="icon icon-single-04"></i><span class="nav-text">Utilisateurs</span></a>
                            <ul aria-expanded="false">
                                <li><a href="{{route('users.index')}}">Utilisateurs</a></li>
                                <li><a href="{{route('roles.index')}}">Rôles</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
</div>
