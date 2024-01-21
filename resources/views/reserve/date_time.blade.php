@extends('layouts.reservepage_app')

@section('title', '日時・人数の選択 【予約管理ならヨヤクマ】')
@section('description', '予約希望の「日にち」「時間」「予約人数」を選択してください。「日にち」を選択してから「時間」を選択し、「時間」を選択してから「予約人数」を選択してください。非表示の時間帯は、設定外か既に予約が定員に達しています。')

@section('content')
<div class="r-page-body">
    <div class="reserve-form">
    	<div class="reservestep">
    	    <img src="{{ asset('img/reservestep-1.svg')}}" class="img-fluid" alt="日時・人数の選択">
    	</div>

        <form id="form" method="POST" name="form1" action="/reserve/{{ $page_address }}/{{ $reservepage->id }}/date_time/customer">
            {{ csrf_field() }}
            <div class="do_reserve">
                <label>予約対象</label>
                <div class="boxContainer reserve_subject">
                    <div class="box">
                        @if ($reservepage->image)
                        <img src="{{ asset('storage/reservepages/'.$reservepage->image) }}" id="reservepage-image-preview" class="img-fluid">
                        @else
                        <img src="{{ asset('img/no-image.jpg')}}" id="reservepage-image-preview" class="img-fluid">
                        @endif
            	    </div>
            	    <div class="box">
                	    <h4>{{ $reservepage->name }}</h4>
                	    <p class="price-0">                                
                            @if($reservepage->price =='予約時に価格は算定されません')
                            <small>※ 予約時に価格は算定されません</small>
                            @elseif($reservepage->price =='0')無料
                            @else
                            {{ number_format($reservepage->price) }}<small>円（税込）</small>
                            @endif
                        </p>
            	    </div>
        	    </div>
            </div>
            
            <div class="do_reserve do_date">    
                <label for="date"><span class="step">STEP.1</span> 日にち</label>
                <input id='date' name="do_date" class="fieldset__input js__datepicker form-doreserve contact-textbox" type="text" placeholder="選択してください" onchange="timestep()"></br></br>
            </div>
            
            <div class="do_reserve">
                <label for="calendar_time"><span class="step">STEP.2</span> 時間</label>
                <select id="calendar_time" name="calendar_id" class="form-doreserve contact-textbox" type="text" placeholder="選択してください" onchange="do_capacitystep()">
                    <option value="">選択してください</option>
                    <option value="1"></option>
                </select>
            </div>

            <div class="do_reserve">
                <label for="do_capacity"><span class="step">STEP.3</span> 予約人数</label>
                <select id="do_capacity" name="do_capacity" class="form-doreserve contact-textbox">
                    <option value>選択してください</option>
                    <option value="1">1人</option>
                    <option value="2">2人</option>
                    <option value="3">3人</option>
                    <option value="4">4人</option>
                    <option value="5">5人</option>
                    <option value="6">6人</option>
                    <option value="7">7人</option>
                    <option value="8">8人</option>
                    <option value="9">9人</option>
                    <option value="10">10人</option>
                    <option value="11">11人</option>
                    <option value="12">12人</option>
                    <option value="13">13人</option>
                    <option value="14">14人</option>
                    <option value="15">15人</option>
                    <option value="16">16人</option>
                    <option value="17">17人</option>
                    <option value="18">18人</option>
                    <option value="19">19人</option>
                    <option value="20">20人</option>
                    <option value="21">21人</option>
                    <option value="22">22人</option>
                    <option value="23">23人</option>
                    <option value="24">24人</option>
                    <option value="25">25人</option>
                    <option value="26">26人</option>
                    <option value="27">27人</option>
                    <option value="28">28人</option>
                    <option value="29">29人</option>
                    <option value="30">30人</option>
                    <option value="31">31人</option>
                    <option value="32">32人</option>
                    <option value="33">33人</option>
                    <option value="34">34人</option>
                    <option value="35">35人</option>
                    <option value="36">36人</option>
                    <option value="37">37人</option>
                    <option value="38">38人</option>
                    <option value="39">39人</option>
                    <option value="40">40人</option>
                    <option value="41">41人</option>
                    <option value="42">42人</option>
                    <option value="43">43人</option>
                    <option value="44">44人</option>
                    <option value="45">45人</option>
                    <option value="46">46人</option>
                    <option value="47">47人</option>
                    <option value="48">48人</option>
                    <option value="49">49人</option>
                    <option value="50">50人</option>
                </select>
            </div>

            <div class="end-line"></div>
            
            <div class="date_time_form">
                <table>
                    <tbody>
                        <tr class="d-t-f_strong">
                            <td>※</td>
                            <td>「日にち」を選択してから「時間」を選択し、「時間」を選択してから「予約人数」を選択してください。</td>
                        </tr>
                        <tr>
                            <td>※</td>
                            <td>非表示の時間帯は、設定外か既に予約が定員に達しています。</td>
                        </tr>
                        <tr>
                            <td>※</td>
                            <td>予約人数は、選択している日時に予約可能な人数が表示されます。</td>
                        </tr>
                        <tr>
                            <td>※</td>
                            <td>1回の予約で予約可能な人数は、最大20人までとなります。20人を超える予約をされる場合は、複数回に分けて予約を行ってください。</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="step-btn">
                <a id="submit" href="javascript:form1.submit()" role="button">次へ <i class="fas fa-angle-right"></i></a>
            </div>
            
            <input type="hidden" id="reservepage_id" value={{ $reservepage->id }}>

        </form>

    </div>
</div>
<script type="text/javascript">
$(function(){
    $('#date').pickadate({
      disable: @json($calendar_array)
    })
});
</script>

@endsection
