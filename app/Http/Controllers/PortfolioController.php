<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortfolioController extends Controller
{
    public function index()
    {
        // Membaca data dari file JSON
        $jsonPath = public_path('data/portfolio.json');
        $portfolioData = json_decode(File::get($jsonPath), true);

        return view('portfolio.index', compact('portfolioData'));
    }
}
