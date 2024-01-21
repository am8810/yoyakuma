<div id="re-top">
  <a href="#" class="re-topB">
      <img src="{{ asset('img/smoothscroll.svg')}}" alt="スムーススクロール">
  </a>
</div>

<footer>
    <div class="container r-footer-pa">
        <div class="boxContainer reserve_footer">
            <div class="box none-s-box">
                <img src="{{asset('img/reservepage-logo.jpg')}}">
            </div>  
            <p><a href="{{ url('terms_reserve') }}" target="_blank" class="box none-s-box">利用規約 <i class="icon-another-window_g"></i></a></p>
            <p class="r-footer-p"><a href="{{ url('privacy_reserve') }}" target="_blank" class="box none-s-box">プライバシーポリシー <i class="icon-another-window_g"></i></a></p>
        </div>
    </div>
</footer>



<!-- pickadate -->
<script src="{{ secure_asset('js/pickadate/picker.js') }}" defer></script>
<script src="{{ secure_asset('js/pickadate/picker.date.js') }}" defer></script>
<script src="{{ secure_asset('js/pickadate/legacy.js') }}" defer></script>
<script src="{{ secure_asset('js/pickadate/lang-ja.js') }}" defer></script>
<script src="{{ secure_asset('js/pickadate/main.js') }}" defer></script>

<!-- smoothscroll -->
<script src="{{ secure_asset('js/smoothscroll.js') }}" defer></script>



