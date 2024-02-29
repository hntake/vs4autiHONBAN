<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Design;
use App\Models\Artist;
use App\Models\News;
use App\Models\Thread;



class SitemapController extends Controller
{
    public function index() {
        $designs = Design::get();
        $artists = Artist::get();
        $threads = Thread::get();
        $news = News::get();

        return response()->view('sitemap', [
            'designs' => $designs,
            'artists' => $artists,
            'threads' => $threads,
            'newses' => $news,
        ])->header('Content-Type', 'text/xml');
    }}
