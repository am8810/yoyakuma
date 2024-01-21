<nav class="r-header-pa bottom-gray">
    <div class="header-container">
        <div class="boxContainer">

            <img src="{{ asset('img/reservepage-logo.jpg')}}" class="box none-box">

            <p class="box none-box">提供者：{{ $user != null ? $user->store_name : '不明' }}</p>
        </div>
    </div>
</nav>