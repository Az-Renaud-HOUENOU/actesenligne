<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li><a class="has-arrow" href="{{ url('/student/dashboard') }}" aria-expanded="false">
                    <i class="la la-home"></i>
                    <span class="nav-text">Dashboard</span>
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