@extends('layouts.app')

@section('title', '予約ページの編集 【予約管理ならヨヤクマ】')
@section('description', '作成された予約ページは、後から設定を変更することが可能です。設定方法は「予約ページの作成」と同様で、編集画面から変更を行うと設定が反映されます。')

@section('content')

    <div class="page-title">
        <h1>予約ページの編集</h1>
    </div>  
    
    <div class="top-gray-stripe">
        <div class="l-container">
            <div id="pankuzu">
        	  <ol class="breadcrumb">
        		  <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
        		  <li class="breadcrumb-item"><a href="{{ url('/') }}/performance">機能について</a></li>
          		  <li class="breadcrumb-item active">予約ページの編集</li>
        	  </ol>
        	</div>
    	</div>
    
        <section class="under-performance s-container">
            <img src="{{ asset('img/edit-image.png')}}" alt="予約ページ編集　イメージ">
            <p>作成された予約ページは、後から設定を変更することが可能です。設定方法は「予約ページの作成」と同様で、編集画面から変更を行うと設定が反映されます。</p>
        </section>
        
        <section class="m-container">
            <div class="explanation">
                <div class="orange-line"></div>
                <h2>予約ページの編集</h2>
                <p>予約ページの編集画面は、作成されている予約ページが一覧で表示されます。以下が「予約ページ編集」画面になります。</p>
                
                <div class="scroll-image">
                    <img class="img-fluid" src="{{ asset('img/edit-image-01.jpg')}}" alt="予約ページ編集">
                </div>
                
                <p>各予約ページに対してタイトルとイメージ画像が反映され、「基本情報」「日時・定員数」「表示 <i class="icon-another-window_black"></i>」「削除」の項目があります。<br>
                予約ページの編集を行いたい場合は、「基本情報」もしくは「日時・定員数」をクリックしてください。</p>
                
                <img class="img-fluid p-arrow first-arrow" src="{{ asset('img/performance-arrow.svg')}}" alt="矢印">
                
                <article>
                    <h3>基本情報の編集</h3>
                    <div class="orange-dotted"></div>
                    <p>「基本情報」をクリックすると、予約ページ基本情報の編集画面になります。</p>
                    
                    <div class="scroll-image">
                        <img class="img-fluid" src="{{ asset('img/edit-image-02.jpg')}}" alt="基本情報の編集">
                    </div>
                    
                    <p>現在設定されている内容が各項目に設定されており、編集をしたい項目の内容を変更して「更新」をクリックすると、変更が予約ページに反映されます。</p>

                </article>
                
                <article>
                    <h3>日時・定員数の編集</h3>
                    <div class="orange-dotted"></div>
                    <p>「日時・定員数」をクリックすると、日時・定員数の編集画面になり、現在設定されている日時に対してカレンダーに色が付いています。</p>
               
                    <div class="scroll-image">
                        <img class="img-fluid" src="{{ asset('img/edit-image-03.jpg')}}" alt="日時・定員数の編集">
                    </div>
                
                    <img class="img-fluid s-arrow" src="{{ asset('img/arrow.svg')}}" alt="矢印">
    
                    <div class="edit-conts">
                        <h4>❶ 既に設定がされたカレンダーを編集</h4>
                        <div class="row setting">
                            <div class="col-sm-6">
                                <img class="img-fluid" src="{{ asset('img/edit-image-04.jpg')}}" alt="❶ 既に設定がされたカレンダーを編集">
                            </div>
                            <div class="col-sm-6">
                                <p>既に設定がされている色の付いたカレンダーをクリックすると、「日にち」「時間」「定員数」が表示されます。<br>
                                「定員数」は予約がされるごとに、予約人数分減っていきます。<strong>「定員数」が0になっている場合は、定員に達している状態となり、予約ページでは予約が行われない状態となります。</strong><br>
                                予約を再開したい場合は、定員数を入力して「登録」をクリックすると予約ページに反映され、予約可能な状態になります。<br>
                                「削除」をクリックすると、その日時の設定が削除されます。</p>
                            </div>
                        </div>
                    </div>
                
                    <div class="edit-conts">
                        <h4 class="aratani">❷ 新たに日時・定員数を追加</h4>
                        <div class="row setting">
                            <div class="col-sm-6">
                                <img class="img-fluid capture" src="{{ asset('img/edit-image-05.jpg')}}" alt="❷ 新たに日時・定員数を追加<">
                            </div>
                            <div class="col-sm-6">
                                <p>新たに日時・定員数を追加したい場合は、予約ページ作成時と同様に、カレンダーを<strong>直接クリック</strong>すると設定が行えます。</p>
                            </div>
                        </div>
                    </div>

                    <img class="img-fluid s-arrow" src="{{ asset('img/arrow.svg')}}" alt="矢印">
                
                    <div class="row setting">
                        <div class="col-sm-6">
                            <img class="img-fluid" src="{{ asset('img/create-image-04.jpg')}}" alt="日程・定員数　設定2">
                        </div>
                        <div class="col-sm-6">
                            <p class="pa-adjustment-2">日時・定員数の選択画面が表示されます。<br>
                            日にちと時間は、カレンダーをクリックした日時が設定されており、手動で変更することもできます。<br>
                            この日時に予約可能な人数を定員数として入力してください。</p>
                        </div>
                    </div>

                    <img class="img-fluid s-arrow" src="{{ asset('img/arrow.svg')}}" alt="矢印">

                    <div class="row setting">
                        <div class="col-sm-6">
                            <img class="img-fluid" src="{{ asset('img/create-image-05.jpg')}}" alt="日程・定員数　設定3">
                        </div>
                        <div class="col-sm-6">
                            <p>繰り返し設定で、同じ設定を毎日か毎週で繰り返して設定することも可能です。</p>
                            
                            <div class="repetition">
                                <table>
                                  <tbody>
                                      <tr class="red">
                                          <td>※</td>
                                          <td>繰り返し期間は1年先までになります。<br>
                                          1年先以降の設定は、先の日にちのカレンダーを別途選択して行ってください。</td>
                                      </tr>
                                      <tr>
                                          <td>※</td>
                                          <td>繰り返し設定は、日程・定員数の新規作成時のみ表示され、既に設定されているものをクリックしても表示されません。</td>
                                      </tr>
                                  </tbody>
                                </table>
                                
                                <p>設定が完了したら「登録」をクリックすると、カレンダーに設定が反映されます。</p>
                            </div>
                        </div>
                    </div>
                
                    <img class="img-fluid s-arrow" src="{{ asset('img/arrow.svg')}}" alt="矢印">

                    <div class="row setting">
                        <div class="col-sm-6">
                            <img class="img-fluid capture" src="{{ asset('img/edit-image-13.jpg')}}" alt="日程・定員数　設定4">
                        </div>
                        <div class="col-sm-6">
                            <p>カレンダーに設定した日時が反映され、色が付きます。<br>
                            設定した日時を個別で編集・削除することも可能です。</p>
                        </div>
                    </div>

                    <img class="img-fluid p-arrow comp-a" src="{{ asset('img/performance-arrow.svg')}}" alt="矢印">
                
                    <div class="arrow-p-e">
                        <p>「日時・定員数」の編集画面では、<strong>「登録」「削除」をクリックした時点で、予約ページに編集内容が反映されます。</strong><br>
                        ※「更新」ボタンは存在しません。</p>
                    </div> 
                
                </article>

                <article>
                    <h3>日時・定員数を全て削除</h3>
                    <div class="orange-dotted"></div>
                    <p>日時・定員数の設定は個別で削除が可能ですが、全ての設定を一括で削除することも可能です。</p>
               
                    <div class="row setting">
                        <div class="col-sm-6">
                            <img class="img-fluid capture" src="{{ asset('img/edit-image-06.jpg')}}" alt="日時・定員数を全て削除-1">
                        </div>
                        <div class="col-sm-6">
                            <p>カレンダー上部にある「全て削除」をクリックすると、以下の表示がされます。</p>
                        </div>
                    </div>
                
                    <img class="img-fluid s-arrow" src="{{ asset('img/arrow.svg')}}" alt="矢印">

                    <div class="row setting">
                        <div class="col-sm-6">
                            <img class="img-fluid" src="{{ asset('img/edit-image-07.jpg')}}" alt="日時・定員数を全て削除-2">
                        </div>
                        <div class="col-sm-6">
                            <p>「本当に全て削除しますか？」という表示がされるので、「全て削除」をクリックすると、全ての設定が削除されます。</p>
                            
                            <div class="repetition">
                                <table>
                                  <tbody>
                                      <tr>
                                          <td>※</td>
                                          <td>一度削除すると日時・定員数は全て削除され、復旧はできません。</td>
                                      </tr>
                                  </tbody>
                                </table>
                            </div>
    
                        </div>
                    </div>
                </article>

            </div>
        </section>
        
        
        <section class="m-container edit-s-2">
            <div class="explanation">
                <div class="orange-line"></div>
                <h2 class="edit-s-2-t">予約ページの表示と削除</h2>
                <p>予約ページ編集画面から、予約ページの表示と削除も行えます。</p>
                
                <article>
                    <h3>予約ページの表示</h3>
                    <div class="orange-dotted-2"></div>
                    
                    <div class="row setting">
                        <div class="col-sm-6">
                            <img class="img-fluid capture" src="{{ asset('img/edit-image-08.jpg')}}" alt="予約ページの表示">
                        </div>
                        <div class="col-sm-6">
                            <p>各予約ページの項目にある「表示 <i class="icon-another-window_black"></i>」をクリックすると、作成した予約ページが表示されます。</p>
                        </div>
                    </div>
                    
                    <div class="edit-conts edit-m">
                        <h4>❶ 作成した予約ページ一覧の表示方法</h4>
                        <div class="row setting">
                            <div class="col-sm-6">
                                <img class="img-fluid capture" src="{{ asset('img/edit-image-09.jpg')}}" alt="❶ 作成した予約ページ一覧の表示方法">
                            </div>
                            <div class="col-sm-6">
                                <p>作成した予約ページの一覧を表示したい場合は、管理画面のメニューにある「マイページ」をクリックすると、「予約ページ表示 <i class="icon-another-window_black"></i>」が表示されるので、こちらをクリックします。</p>
                            </div>
                        </div>
                    </div>
                    
                    <img class="img-fluid s-arrow" src="{{ asset('img/arrow.svg')}}" alt="矢印">

                    <div class="row setting edit-m-2">
                        <div class="col-sm-6">
                            <img class="img-fluid capture" src="{{ asset('img/edit-image-10.jpg')}}" alt="❶ 作成した予約ページ一覧の表示方法-2">
                        </div>
                        <div class="col-sm-6">
                            <p>作成した予約ページが一覧で表示されます。</p>
                        </div>
                    </div>
                    
                    <h3>予約ページの削除</h3>
                    <div class="orange-dotted-2"></div>
                    
                    <div class="row setting">
                        <div class="col-sm-6">
                            <img class="img-fluid capture" src="{{ asset('img/edit-image-11.jpg')}}" alt="予約ページの削除">
                        </div>
                        <div class="col-sm-6">
                            <p>各予約ページの項目にある「削除」をクリックすると、「削除しますか」というアラート表示がされるので、「OK」をクリックすると予約ページが削除されます。</p>
                            
                            <div class="repetition">
                                <table>
                                  <tbody>
                                      <tr>
                                          <td>※</td>
                                          <td>一度削除すると、復旧はできません。</td>
                                      </tr>
                                      <tr>
                                          <td>※</td>
                                          <td>予約ページを削除した場合、予約情報、顧客情報も全て削除されます。</td>
                                      </tr>
                                  </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </article>

            </div>
        </section>
        
        
        <section class="m-container edit-s-2">
            <div class="explanation">
                <div class="orange-line"></div>
                <h2 class="edit-s-3-t">公開中、非公開のタブ切り替え</h2>

                <article>
                    <div class="row setting">
                        <div class="col-sm-6">
                            <img class="img-fluid capture edit-s-3-img" src="{{ asset('img/edit-image-12.jpg')}}" alt="公開中、非公開のタブ切り替え">
                        </div>
                        <div class="col-sm-6 edit-last-m">
                            <p>「予約ページ編集」画面で表示されている予約ページは、「公開中」か「非公開」で表示を切り替えることができます。</p>
                            
                            <div class="repetition">
                                <table>
                                  <tbody>
                                      <tr>
                                          <td>※</td>
                                          <td>公開状態は誰にでも閲覧可能な状態となり、非公開状態はログイン状態の管理者のみが閲覧可能で、一般ユーザーからは閲覧不可能となります。</td>
                                      </tr>
                                      <tr>
                                          <td>※</td>
                                          <td>予約ページを公開状態にするには有料会員登録が必要です。詳しくは<a href="{{ url('/') }}/price#paid">コチラ</a>をご覧ください。</td>
                                      </tr>
                                  </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    
                </article>

            </div>
        </section>


    </div>

    
@endsection
