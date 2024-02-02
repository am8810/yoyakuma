@extends('layouts.reservepagelist_app')

@section('title', '予約ページ一覧 【予約管理ならヨヤクマ】')
@section('description', '予約管理システム、ヨヤクマで作成した予約ページ一覧です。予約のタイトル、説明、予約価格、イメージ写真がそれぞれ表示され、クリックすると各予約ページへと遷移します。')

@section('content')
<div class="r-page-body">
    <div class="container">
        <div class="member-top-body">
            @if ($reservepages->where('release', 0)->isNotEmpty())
            <!-- $reservepagesにreleaseが0のものが存在する場合の表示 -->
                <div class="r-list-conts">
                <h1>予約一覧</h1>
    
                <div class="r-page-pa r-list">
                    @foreach($reservepages as $reservepage) 
                    <div class="r-list-m">
                        <a href="/reserve/{{ $page_address }}/{{ $reservepage->id }}">
                            <div class="row">
                                <div class="col-lg-4 r-list-img">
                                @if ($reservepage->image)
                                <img src="{{ asset('storage/reservepages/'.$reservepage->image) }}" id="reservepage-image-preview" class="img-fluid">
                                @else
                                <img src="{{ asset('img/no-image.jpg')}}" id="reservepage-image-preview" class="img-fluid">
                                @endif
                                </div>
                                
                                <div class="col-lg-8 r-list-p">
                                    <h3>{{ $reservepage->name }}</h3>
                                    <p>
                                        <?php
                                        $content =  $reservepage->description ;
                                        echo mb_strimwidth( strip_tags( $content ), 0, 120, '…', 'UTF-8' );                                    
                                        ?>
                                    </p>
                                    <h4>
                                    @if($reservepage->price =='-1')
                                    <small>※ 予約時に価格は算定されません</small>
                                    @elseif($reservepage->price =='0')無料
                                    @else
                                    {{ number_format($reservepage->price) }}<small>円（税込）</small></h4>
                                    @endif

                                </div>
            
                            </div>
                        </a>
                        
                        
                        <div class="border-list"></div>
                    
                    </div>
                    @endforeach
    
                {{ $reservepages->links() }}
    
                </div>
            </div>
    
            @else
            <!-- $reservepagesが空、またはreleaseが0のものが存在しない場合の表示 -->
            <div class="r-list-conts">
                <h1>予約一覧</h1>
                <div class="nothing-2">
                    <p>公開中の予約ページがありません。</p>
                    <img src="{{ asset('img/nothing.svg')}}" alt="公開中の予約ページがありません。" class="img-fluid">
                </div>
            </div>
            @endif
        </div> 
    </div>
</div>
@endsection
