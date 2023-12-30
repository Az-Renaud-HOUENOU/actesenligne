<aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="/" class="logo-wrapper" title="Home">
                <span class="sr-only">Acceuil</span>
                <span class="icon logo" aria-hidden="true"></span>
                <div class="logo-text">
                    <span class="logo-title">ActesEnLigne</span>
                    <span class="logo-subtitle">Tableau de bord . Admin</span>
                </div>

            </a>
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
        </div>
        <div class="sidebar-body">
            <ul class="sidebar-body-menu">
                <li>
                    <a class="active" href="/dashboard"><span class="icon home" aria-hidden="true"></span>Tableau de bord</a>
                </li>
                <li>
                    <a class="show-cat-btn" href="##">
                        <span class="icon document" aria-hidden="true"></span>Demandes
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Ouvrir liste</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="posts.html">Toutes les demandes</a>
                        </li>
                        <li>
                            <a href="new-post.html">Demandes en attente</a>
                        </li>
                        <li>
                            <a href="new-post.html">Demandes validées</a>
                        </li>
                        <li>
                            <a href="new-post.html">Demandes rejetées</a>
                        </li>
                        <li>
                            <a href="new-post.html">Demandes traitées</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="comments.html">
                        <span class="icon message" aria-hidden="true"></span>
                        Comments
                    </a>
                    <span class="msg-counter">7</span>
                </li>
            </ul>
            <span class="system-menu__title">systeme</span>
            <ul class="sidebar-body-menu">
                <li>
                    <a href="appearance.html"><span class="icon edit" aria-hidden="true"></span>Appearance</a>
                </li>
                <li>
                    <a class="show-cat-btn" href="##">
                        <span class="icon user-3" aria-hidden="true"></span>Utlisateurs
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Ouvrir liste</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="users-01.html">Utilisateurs</a>
                        </li>
                        <li>
                            <a href="users-02.html">Roles</a>
                        </li>
                        <li>
                            <a href="users-02.html">Permissions</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="##"><span class="icon setting" aria-hidden="true"></span>Settings</a>
                </li>
            </ul>
            <span class="system-menu__title">statistique</span>
            <ul class="sidebar-body-menu">
                <li>
                    <a href="appearance.html"><span class="icon edit" aria-hidden="true"></span>Statistiques</a>
                </li>
                <li>
                    <a href="##"><span class="icon setting" aria-hidden="true"></span>Exporter pdf</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-footer">
        <a href="##" class="sidebar-user">
            <span class="sidebar-user-img">
                <picture><source srcset="{{asset('admin/img/avatar/avatar-illustrated-01.webp')}}" type="image/webp"><img src="{{asset('admin/img/avatar/avatar-illustrated-01.png')}}" alt="User name"></picture>
            </span>
            <div class="sidebar-user-info">
                <span class="sidebar-user__title">Nafisa Sh.</span>
                <span class="sidebar-user__subtitle">Support manager</span>
            </div>
        </a>
    </div>
</aside>