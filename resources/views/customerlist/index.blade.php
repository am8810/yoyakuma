@extends('layouts.member_app')

@section('title', '顧客一覧 / 管理画面 【予約管理ならヨヤクマ】')
@section('description', '予約をされた顧客の「予約予定日」「予約対象」「お名前」「フリガナ」「電話番号」「メールアドレス」が一覧で表示されます。過去の予約予定日の顧客を表示したい場合は、「過去の顧客」をチェックして「検索」をクリックしてください。')

@section('content')
<div class="member-body">
    <section class="l-container">
    	 <div id="pankuzu">
    	  <ol class="breadcrumb">
    		  <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fas fa-home"></i></a></li>
    		  <li class="breadcrumb-item active">顧客一覧</li>
    	  </ol>
    	</div>
    </section>

    <section class="customer-container">
        <div id="customer-list" class="member-top-body">
            <h1 class="mypage-title">顧客一覧</h1>
            
            <div class="boxContainer">
                <form action="customerlist">
                    <div class="customer-keyword">
                        <div class="box">
                            <p>キーワード検索</p>
                        </div>
                        <div class="box">
                             <input name="keyword" value="{{$search}}"></input>
                        </div>
                        <div class="box">
                            <button type="submit" class="btn customer-keyword-button">検索</button>
                        </div>
                    </div>
                    
                    <div class="box past-w">
                        <input type="checkbox" name="past_flg" value="true" {{$past_flg ? 'checked="checked"' : '' }} class="past-check"><span class="past-customer">過去の顧客</span>
                        <div class="past">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>※</td>
                                        <td>過去の予約予定日の顧客を表示したい場合は、「過去の顧客」をチェックして<br class="hidden-past-xl">「検索」をクリックしてください。</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
            @if ($doreserves->isEmpty())
                <div class="nothing nothing-line">
                    <!-- イラストやメッセージを表示 -->
                    <p>顧客はまだいません。</p>
                    <img src="{{ asset('img/nothing.svg')}}" alt="顧客はまだいません。" class="img-fluid">
                </div>
            @else
                <div class="table-responsive-xl customer-t">
                    <table class="table table-hover text-nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">予約予定日</th>
                                <th class="reservename-m" scope="col">予約対象</th>
                                <th scope="col">お名前</th>
                                <th scope="col">お名前（フリガナ）</th>
                                <th scope="col">電話番号</th>
                                <th scope="col">メールアドレス</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($doreserves as $doreserve)
                                <tr>
                                    <td>{{ $doreserve->do_date }}</td>
                                    <td>
                                        <?php
                                            $content =  $doreserve->reservepage()->get()[0]->name ;
                                            echo mb_strimwidth( strip_tags( $content ), 0, 20, '…', 'UTF-8' );                                    
                                        ?>
                                    </td>
                                    <td>{{ $doreserve->customer_name }}</td>
                                    <td>{{ $doreserve->customer_furigana }}</td>
                                    <td>{{ $doreserve->customer_phone }}</td>
                                    <td>{{ $doreserve->customer_email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        
                {{ $doreserves->links() }}
            @endif
        </div>
    </section>
</div>
@endsection

