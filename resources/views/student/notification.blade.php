<!-- Dans votre vue student.notifications.blade.php -->
<h1>Toutes les notifications</h1>

<ul>
    @foreach ($notifications as $notification)
        <li>
            {{ $notification['type_acte_demande'] }}
            <!-- Afficher d'autres données de notification au besoin -->
        </li>
    @endforeach
</ul>
