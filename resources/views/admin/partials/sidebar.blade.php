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

                    <li><a href="#" aria-expanded="false"><i
                                class="icon icon-single-copy-06"></i><span class="nav-text">Demandes</span></a>
                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-chart-bar-33"></i><span class="nav-text">Statistiques</span></a>
                        <ul aria-expanded="false">
                            <li><a href="#">Statistiques</a></li>
                            <li><a href="#">Exporter pdf</a></li>
                        </ul>
                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Utilisateurs</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('utilisateurs')}}">Utilisateurs</a></li>
                            <li><a href="#">Rôles</a></li>
                            <li><a href="#">Permissions</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
</div>