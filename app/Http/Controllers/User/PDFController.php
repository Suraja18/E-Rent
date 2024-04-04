<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Forums;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF(string $slug)
    {
        $data = ['forum' => Forums::where('slug', $slug)->first()];
        $pdf = Pdf::loadView('Users.PDF.forum-detail', $data);
        return $pdf->download($slug.'.pdf');
    }
}
