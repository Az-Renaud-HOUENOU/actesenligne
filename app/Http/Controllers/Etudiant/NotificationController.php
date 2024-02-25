<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        // Récupérer les notifications de l'utilisateur depuis la session
        $notifications = session('etudiant_notifications', []);

        return view('student.notification', ['notifications' => $notifications]);
    }
}
