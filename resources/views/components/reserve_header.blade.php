<nav class="r-header-pa bottom-gray">
    <div class="header-container">
        <div class="boxContainer">

            @if ($reservepage && $reservepage->logo) <!-- 予約ページが公開・非公開どちらでも対応 -->
            <img src="{{ asset('storage/reservepages/'.$reservepage->logo) }}" class="box none-box" alt="ロゴマーク">
            @else
            <img src="{{ asset('img/reservepage-logo.jpg')}}" class="box none-box" alt="予約管理はヨヤクマ">
            @endif
            
            <p class="box none-box">提供者：{{ $reservepage && $user ? $user->store_name : '不明' }}</p>
        </div>
    </div>
</nav>