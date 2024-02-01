@extends('layouts.member_app')

@section('title', '基本情報 / 管理画面 【予約管理ならヨヤクマ】')
@section('description', 'ヨヤクマ会員の基本情報ページです。「会員情報の編集」「有料会員登録」「パスワード変更」「ログアウト」の各ページへとリンクします。')

@section('content')
<div class="member-body">
    <div class="l-container">
    	 <div id="pankuzu">
    	  <ol class="breadcrumb">
    		  <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fas fa-home"></i></a></li>
    		  <li class="breadcrumb-item active">基本情報</li>
    	  </ol>
    	</div>
    </div>
    
    <div class="s-container member-top-body">
        <h1 class="mypage-title">基本情報</h1>


        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="row user-w">
                    <div class="col-sm-2 d-flex align-items-center user-icon">
                        <img src="{{ asset('img/user-icon-1.jpg')}}">
                    </div>
                    <div class="col-sm-9 d-flex align-items-center ml-2 mt-3 member-conts">
                        <div class="d-flex flex-column">
                            <label for="user-name"><a href="{{route('mypage.edit')}}">会員情報の編集</a></label>
                            <p>アカウント情報の編集</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center member-link">
                    <a href="{{route('mypage.edit')}}">
                        <i class="fas fa-chevron-right fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>

        <hr>

        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="row user-w">
                    <div class="col-sm-2 d-flex align-items-center user-icon">
                        <img src="{{ asset('img/user-icon-3.jpg')}}">
                    </div>
                    <div class="col-sm-9 d-flex align-items-center ml-2 mt-3 member-conts">
                        <div class="d-flex flex-column">
                            <label for="user-name"><a href="{{route('mypage.membership')}}">有料会員登録</a></label>
                            <p>有料会員登録を行うことで、予約ページを公開状態にできます。<br>※無料会員のままでは、予約ページは非公開状態になります。</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center member-link">
                    <a href="{{route('mypage.membership')}}">
                        <i class="fas fa-chevron-right fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <hr>
 
         <div class="container">
             <div class="d-flex justify-content-between">
                 <div class="row user-w">
                     <div class="col-sm-2 d-flex align-items-center user-icon">
                        <img src="{{ asset('img/user-icon-4.jpg')}}">
                     </div>
                     <div class="col-sm-9 d-flex align-items-center ml-2 mt-3 member-conts">
                         <div class="d-flex flex-column">
                             <label for="user-name"><a href="{{ route('mypage.edit_password') }}">パスワード変更</a></label>
                             <p>パスワードを変更します</p>
                         </div>
                     </div>
                 </div>
                 <div class="d-flex align-items-center member-link">
                     <a href="{{ route('mypage.edit_password') }}">
                         <i class="fas fa-chevron-right fa-2x"></i>
                     </a>
                 </div>
             </div>
         </div>

        <hr>

        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="row user-w">
                    <div class="col-sm-2 d-flex align-items-center user-icon">
                        <img src="{{ asset('img/user-icon-5.jpg')}}">
                    </div>
                    <div class="col-sm-9 d-flex align-items-center ml-2 mt-3 member-conts">
                        <div class="d-flex flex-column">
                            <label for="user-name"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a></label>
                            <p>ログアウトします</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center member-link">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-chevron-right fa-2x"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

        <hr>
    </div>
</div>
@endsection