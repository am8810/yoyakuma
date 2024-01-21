@extends('layouts.member_app')

@section('title', '予約ページ編集 / 管理画面 【予約管理ならヨヤクマ】')
@section('description', '予約ページの編集画面です。編集をしたい予約の「基本情報」「日時・定員数」をクリックして編集を行なってください。「表示」をクリックすると予約ページが表示され、「削除」をクリックすると予約ページが削除されます。')

@section('content')
<div class="member-body">
    <div class="l-container">
      <div id="pankuzu">
        <ol class="breadcrumb">
           <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fas fa-home"></i></a></li>
           <li class="breadcrumb-item active">予約ページ編集</li>
        </ol>
      </div>
    </div>

    <div class="m-container">
        <div class="member-top-body">
            <h1 class="mypage-title">予約ページ編集</h1>
            
            <p class="edit-p">「基本情報」「日時・定員数」をクリックして編集を行なってください。</p>
            
            <div class="update">
                <table>
                    <tbody>
                        <tr>
                            <td>※</td>
                            <td>更新日時は「基本情報」を更新した際の日時です。</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <!-- privateのキーが1だった場合、activeのクラスを追加 -->
                    <a href="#release" @if($private["private"] == 1) class="nav-link active" @else class="nav-link" @endif data-toggle="tab">公開中</a>
                </li>
                <li class="nav-item">
                    <!-- privateのキーが0だった場合、activeのクラスを追加 -->
                    <a href="#private" @if($private["private"] == 0) class="nav-link active" @else class="nav-link" @endif data-toggle="tab">非公開</a>
                </li>
            </ul>
            <div class="tab-content">
                <!-- privateのキーが1だった場合、showとactiveのクラスを追加 -->
                <div @if($private["private"] == 1) class="tab-pane fade show active" @else class="tab-pane fade" @endif id="release">
                    <!-- 一つも公開中の予約ページがない場合 -->
                    @if ($reservepages->isEmpty())
                        <div class="nothing">
                            <!-- イラストやメッセージを表示 -->
                            <p>公開中の予約ページがありません。</p>
                            <img src="{{ asset('img/nothing.svg')}}" alt="公開中の予約ページがありません。" class="img-fluid">
                        </div>
                    <!-- 一つでも公開中の予約ページがある場合 -->
                    @else
                        @foreach($reservepages as $reservepage)
                        <div id="reserve-edit" class="row">
                            <div class="col-sm-4">
                                @if ($reservepage->image)
                                <img src="{{ asset('storage/reservepages/'.$reservepage->image) }}" id="reservepage-image-preview" class="img-fluid">
                                @else
                                <img src="{{ asset('img/no-image.jpg')}}" id="reservepage-image-preview" class="img-fluid">
                                @endif
                                
                              </div>
                            <div class="col-sm-8">
                                <h3>{{ $reservepage->name }}</h3>
                                <a href="/reservepages/{{ $reservepage->id }}/edit" class="dashboard-edit-link">基本情報</a>
                                <a href="/reservepages/{{ $reservepage->id }}/edit_datetime" class="dashboard-edit-link">日時・定員数</a>
                                <a href="/reserve/{{ $reservepage->user->page_address }}/{{ $reservepage->id }}" class="dashboard-edit-link" target="_blank">表示 <i class="icon-another-window_w"></i></a>
                                <a href="/reservepages/{{ $reservepage->id }}" onclick="event.preventDefault(); reserve_delete({{ $reservepage->id }});" class="dashboard-delete-link">
                                    削除
                                </a>
        
                                <form id="reserve-delete-{{ $reservepage->id }}" action="/reservepages/{{ $reservepage->id }}" method="POST" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                                
                                <p>更新日時：{{ \Carbon\Carbon::parse($reservepage->updated_at)->format('Y年n月j日 H:i') }}</p>
        
                            </div>
                        </div>
                        <hr>
                        @endforeach
                        {{ $reservepages->links() }}
                    @endif
                </div>
                
                <!-- privateのキーが0だった場合、showとactiveのクラスを追加 -->
                <div @if($private["private"] == 0) class="tab-pane fade show active" @else class="tab-pane fade" @endif  id="private">
                    <!-- 一つも非公開の予約ページがない場合 -->
                    @if ($reservepage_private->isEmpty())
                        <div class="nothing">
                            <p>非公開の予約ページはありません。</p>
                            <img src="{{ asset('img/nothing.svg')}}" alt="非公開の予約ページはありません。" class="img-fluid">
                        </div>
                    <!-- 一つでも非公開の予約ページがある場合 -->
                    @else
                        @foreach($reservepage_private as $reservepage)
                        <div id="reserve-edit" class="row">
                            <div class="col-sm-4">
                                @if ($reservepage->image)
                                <img src="{{ asset('storage/reservepages/'.$reservepage->image) }}" id="reservepage-image-preview" class="img-fluid">
                                @else
                                <img src="{{ asset('img/no-image.jpg')}}" id="reservepage-image-preview" class="img-fluid">
                                @endif
                                
                              </div>
                            <div class="col-sm-8 private-note">
                                <h3>{{ $reservepage->name }}</h3>
                                <a href="/reservepages/{{ $reservepage->id }}/edit" class="dashboard-edit-link">基本情報</a>
                                <a href="/reservepages/{{ $reservepage->id }}/edit_datetime" class="dashboard-edit-link">日時・定員数</a>
                                <a href="/reserve/{{ $reservepage->user->page_address }}/{{ $reservepage->id }}" class="dashboard-edit-link" target="_blank">表示 <i class="icon-another-window_w"></i></a>
                                <a href="/reservepages/{{ $reservepage->id }}" onclick="event.preventDefault(); reserve_delete({{ $reservepage->id }});" class="dashboard-delete-link">
                                    削除
                                </a>
        
                                <form id="reserve-delete-{{ $reservepage->id }}" action="/reservepages/{{ $reservepage->id }}" method="POST" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                                
                                <p>更新日時：{{ \Carbon\Carbon::parse($reservepage->updated_at)->format('Y年n月j日 H:i') }}</p>
                                
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>※</td>
                                            <td>非公開の予約ページは、ログイン状態の管理者にしか表示されません。</td>
                                        </tr>
                                    </tbody>
                                </table>
        
                            </div>
                        </div>
                        <hr>
                        @endforeach
                        <!-- appendsメソッドでURLに$privateのクエリ文字列を追加 -->
                        {{ $reservepage_private->appends($private)->links() }}
                    @endif
                </div>
            </div>
    
    
            
            
            <div class="btn-orange center-btn">
                <a href="{{ url('reservepages/step1') }}" role="button"><i class="fas fa-plus"></i> 予約ページを作成</a>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
function reserve_delete(reservepage_id) {
    let result = confirm('削除しますか');
    if(result){
    document.getElementById('reserve-delete-'　+　reservepage_id).submit();
    }
}
</script>

@endsection