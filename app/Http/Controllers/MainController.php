<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function about()
    {
        //「ヨヤクマについて」のviewを表示
        return view('main.about');
    }
    
    public function performance()
    {
        //「機能について」のviewを表示
        return view('main.performance');
    }
    
    public function create()
    {
        //「予約ページの作成」のviewを表示
        return view('main.create');
    }
    
    public function edit()
    {
        //「予約ページの編集」のviewを表示
        return view('main.edit');
    }
    
    public function createpage()
    {
        //「作成される予約ページ」のviewを表示
        return view('main.createpage');
    }
    
    public function operation()
    {
        //「予約ページの運用」のviewを表示
        return view('main.operation');
    }

    public function price()
    {
        //「料金」のviewを表示
        return view('main.price');
    }

    public function question()
    {
        //「よくある質問」のviewを表示
        return view('main.question');
    }
    
    public function legal_notice()
    {
        //「特定商取引法に基づく表示」のviewを表示
        return view('main.legal_notice');
    }
    
    public function privacy()
    {
        //「プライバシーポリシー」のviewを表示
        return view('main.privacy');
    }

    public function terms()
    {
        //「利用規約」のviewを表示
        return view('main.terms');
    }

}
