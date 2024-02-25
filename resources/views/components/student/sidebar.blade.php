<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Menu Principal</li>
            <li>
                <a class="" href="{{ url('/student/dashboard') }}" aria-expanded="false">
                    <i class="la la-home"></i>
                    <span class="nav-text">Tableau de bord</span>
                </a>  
            </li>

            <li><a class="ai-icon" href="#" aria-expanded="false">
                    <i class="la la-calendar"></i>
                    <span class="nav-text">Mes Actes</span>
                </a>
            </li>

            <li>
                <a class="ai-icon" href="#" aria-expanded="false">
                    <i class="la la-calendar"></i>
                    <span class="nav-text">Mes demandes</span>
                </a>
            </li>

            <li>
                <a class="ai-icon" href="{{ route('student.suivie.index') }}" aria-expanded="false">
                    <i class="la la-calendar"></i>
                    <span class="nav-text">Statut d'une demande</span>
                </a>
            </li>
        </ul>
    </div>
</div>