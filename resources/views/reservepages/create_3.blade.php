@extends('layouts.member_app')

@section('title', '予約ページ作成完了 / 管理画面 【予約管理ならヨヤクマ】')
@section('description', '予約ページ作成が完了しました！ボタンから予約ページを確認することができます。ホームページやSNS等に予約ページのURLをリンクして、予約を開始しましょう！')

@section('content')

<div class="member-body">
    <div class="l-container">
      <div id="pankuzu">
        <ol class="breadcrumb">
           <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fas fa-home"></i></a></li>
           <li class="breadcrumb-item"><a href="{{ url('reservepages/step1') }}">予約ページ作成（基本情報）</a></li>
           <li class="breadcrumb-item active">日時・定員数</li>
           <li class="breadcrumb-item active">完了</li>
        </ol>
      </div>
    </div>

	<div class="container">
		<div class="member-top-body reserve_create">
		    <h1 class="create_title createcomp-title">予約ページ作成 完了</h1>
		
		    <div class="create-border-1"></div>
		
			<div class="flow">
			    <img class="d-none d-sm-block" src="{{ asset('img/flow-3.svg')}}" alt="予約ページ作成の流れ（完了）">
			    <img class="d-block d-sm-none" src="{{ asset('img/flow-3-s.svg')}}" alt="予約ページ作成の流れ（完了）">
			</div>
			
			<div class="created-reservepage">
				
			    <img src="{{ asset('img/created.svg')}}" alt="予約ページ作成 完了">
			    
	            @if (!$user->member_flag)
				<p>予約ページ作成が完了しました！<br>
				以下のボタンから予約ページを確認することができます。</p>
				<div class="none-m-note">
					<table>
						<tbody>
							<tr>
								<td>※</td>
								<td>無料会員のまま作成する予約ページは「非公開状態」となり、<strong>ログイン状態の管理者にのみ表示され、一般ユーザーには表示されません。</strong> 有料会員登録は<a href="{{route('mypage.membership')}}">コチラ</a>から行えます。</td>
							</tr>
						</tbody>
					</table>
				</div>
		        @else
				<p>予約ページ作成が完了しました！<br>
				以下のボタンから予約ページを確認することができます。<br>
				ホームページやSNS等に予約ページのURLをリンクして、予約を開始しましょう！</p>
		        @endif

				<div class="to-reservepage-l">
					<a href="/reserve/{{ $reservepage->user->page_address }}/{{ $reservepage->id }}" role="button" target="_blank">予約ページの確認 <i class="icon-another-window_w"></i></a>
				</div>
				
				<div class="to-top-l">
					<a href="{{ url('home') }}" role="button">トップページへ戻る <i class="fas fa-angle-right"></i></a>
				</div>
		
			</div>
		</div>
	</div>
</div>
@endsection



