<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Menu Principal</li>
            <li><a class="" href="{{ url('/student/dashboard') }}" aria-expanded="false">
                    <i class="la la-home"></i>
                    <span class="nav-text">Tableau de bord</span>
                </a>
                
            </li>
            <li><a class="ai-icon" href="#" aria-expanded="false">
                    <i class="la la-calendar"></i>
                    <span class="nav-text">Actes</span>
                </a>
            </li>

           
        <li><a class="ai-icon" href=" {{ route('student.demande.index') }}" aria-expanded="false">
            <i class="la la-calendar"></i>
            <span class="nav-text">Demande</span>

        </a>
    </li>

    <li><a class="ai-icon" href="{{ route('student.suivie.index') }}" aria-expanded="false">
        <i class="la la-calendar"></i>
        <span class="nav-text">Suivi</span>
    </a>
    </li>


    <li><a class="ai-icon" href="#" aria-expanded="false">
        <i class="la la-calendar"></i>
        <span class="nav-text">ATTESTATION DE DIPLOME</span>
    </a>
    </li>

        </ul>
    </div>
</div>