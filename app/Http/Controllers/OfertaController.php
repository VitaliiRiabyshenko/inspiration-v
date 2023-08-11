<?php

namespace App\Http\Controllers;

use App\Models\Ofertas;
use App\Models\MetaTags;
use Illuminate\Http\Request;

class OfertaController extends Controller
{
    private $route = 'oferta';

    public function index()
    {
        $ofertas = Ofertas::withTranslation()->translatedIn(app()->getLocale())->get();

        foreach ($ofertas as $oferta) {
            $description = $oferta->description;
            $title = $oferta->title;
            $text = $oferta->text;
        }

        $meta = MetaTags::withTranslation()->translatedIn(app()->getLocale())->where('route', $this->route)->first();

        return view('rules.oferta', compact('description', 'title', 'text', 'meta'));
    }
}
