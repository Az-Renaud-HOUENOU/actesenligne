<?php

namespace App\Http\Controllers\Admin;

use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class StatistiqueController extends Controller
{
    public function index()
    {
        $admin = Auth::user();
        $notifications = $admin->unreadNotifications;
        // Récupérer le nombre de demandes par mois
        $demandesParMois = Demande::select(DB::raw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as total'))
            ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('YEAR(created_at)'), 'asc')
            ->orderBy(DB::raw('MONTH(created_at)'), 'asc')
            ->get();

        // Organiser les données pour l'affichage
        $data = [];
        foreach ($demandesParMois as $demande) {
            $year = $demande->year;
            $month = $demande->month;
            $total = $demande->total;
            $data[$year][$month] = $total;
        }

        // Passer les données à la vue
        return view('admin.layouts.statistique', ['demandesParMois' => $data, 'notifications' => $notifications]);
    }

    public function exportPdf()
    {
        // Récupérer les données comme dans la méthode précédente
        $demandesParMois = Demande::select(DB::raw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as total'))
            ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('YEAR(created_at)'), 'asc')
            ->orderBy(DB::raw('MONTH(created_at)'), 'asc')
            ->get();

        // Organiser les données pour l'affichage
        $data = [];
        foreach ($demandesParMois as $demande) {
            $year = $demande->year;
            $month = $demande->month;
            $total = $demande->total;
            $data[$year][$month] = $total;
        }

        // Passer les données à la vue
        $pdf = PDF::loadView('dashboard.export_pdf', ['demandesParMois' => $data]);

        // Télécharger le PDF
        return $pdf->download('statistiques.pdf');
    }
}
