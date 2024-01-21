@extends('layouts.reservepage_app')

@section('title', 'お客様情報 【予約管理ならヨヤクマ】')
@section('description', '予約をされる方の「お名前」「お名前（フリガナ）」「電話番号」「メールアドレス」を入力してください。メールアドレスの入力が無い場合、予約完了メールが送信されません。予めご了承ください。')

@section('content')
<div class="r-page-body">
    <div class="reserve-form">
    	<div class="reservestep">
    	    <img src="{{ asset('img/reservestep-2.svg')}}" class="img-fluid" alt="お客様情報">
    	</div>

        <form method="POST" name="form1" action="/reserve/{{ $page_address }}/{{ $reservepage->id }}/date_time/customer/confirmation">
            
            <div class="do_reserve">
                <label for="customer_name">お名前 <span class="req-mark">必須</span></label>
                <input type="text" id="customer_name" name="customer_name" class="form-doreserve" placeholder="お名前を入力してください">
            </div>
            
            <div class="do_reserve">
                <label for="customer_furigana">お名前（フリガナ）</label>
                <input type="text" id="customer_furigana" name="customer_furigana" class="form-doreserve" placeholder="フリガナを入力してください">
            </div>
            
            <div class="do_reserve">    
                <label for="customer_phone">電話番号 <span class="req-mark">必須</span></label>
                <input type="text" id="customer_phone" name="customer_phone" placeholder="080-0000-0000" class="form-doreserve">
            </div>
                
            <div class="do_reserve">    
                <label for="customer_email">メールアドレス</label>
                <input type="email" id="customer_email" name="customer_email" value="{{ old('do_email') }}" required autocomplete="do_email" placeholder="○○○@△△△.com" class="form-doreserve">
            </div>
            
            <div class="end-line"></div>
            
            <div class="date_time_form">
                <table>
                    <tbody>
                        <tr class="d-t-f_strong">
                            <td>※</td>
                            <td>メールアドレスの入力が無い場合、予約完了メールが送信されません。<br>予めご了承ください。</td>
                        </tr>
                    </tbody>
                </table>
            </div>
    
            <div class="step-btn">
                {{ csrf_field() }}
                <a id="submit" href="javascript:form1.submit()" role="button">内容確認へ進む <i class="fas fa-angle-right"></i></a>
            </div>
            
            <div class="back-btn">
                <a href="javascript:void(0);" onclick="history.back();" role="button">戻る <i class="fas fa-angle-right"></i></a>
            </div>

        </form>

    </div>
</div>
@endsection
