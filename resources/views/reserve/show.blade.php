@extends('layouts.reservepage_app')

@section('content')
<div class="r-page-body">
    <div class="m-container">
        <div class="member-top-body">
            @if ($reservepage != null)
            <div class="r-page-conts">
                <h1>{{ $reservepage->name }}</h1>
                    @if ($reservepage->image)
                    <img src="{{ asset('storage/reservepages/'.$reservepage->image) }}" id="reservepage-image-preview" class="img-fluid">
                    @else
                    <img src="{{ asset('img/no-image.jpg')}}" id="reservepage-image-preview" class="img-fluid">
                    @endif
    
                <div class="r-page-pa">
                    
                    <p>{!!nl2br($reservepage->description)!!}</p>
                
                    <h2>
                        @if($reservepage->price =='-1')
                        <small>※ 予約時に価格は算定されません</small>
                        @elseif($reservepage->price =='0')無料
                        @else
                        {{ number_format($reservepage->price) }}<small>円（税込）</small></h4>
                        @endif
                    </h2>
            
                    <div class="r-page-border"></div>
                    
                    <h3>予約に関しての注意事項</h3>
                    <h4>日時・人数の変更について</h4>
                    <p>{!!nl2br($reservepage->date_change)!!}</p>
                    
                    <h4>キャンセルについて</h4>
                    <p>{!!nl2br($reservepage->cancel)!!}</p>
                    
                    <div class="r-page-border-2"></div>
                    <form method="post" name="form1" action="/reserve/{{ $page_address }}/{{ $reservepage->id }}/date_time">
                        {{ csrf_field() }}
                        @if($can_reserve_flg == false)
                        <div class="reached">
                            <table>
                                <tr>
                                    <td>※</td>
                                    <td>コチラの予約は定員に達しました。</td>
                                </tr>
                            </table>
                        </div>
                        @else
                        <a href="javascript:form1.submit()" role="button">予約する <i class="fas fa-angle-right"></i></a>
                        @endif
                    </form>
                
                </div>
            </div>
            @else
            <section class="not-found">
                <h3>NOT FOUND</h3>
                <h2>※ ページが存在しません。</h2>
                <p>お探しのページは見つかりませんでした。</p>
                
                <div class="reseveback-btn">
                    <a href="{{ url('/') }}" role="button">ヨヤクマサイト <i class="fas fa-angle-right"></i></a>
                </div>
            </section>
            @endif
        </div>
    </div>
</div>
@endsection
