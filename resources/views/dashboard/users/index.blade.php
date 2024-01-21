@extends('layouts.dashboard')

@section('content')
<div class="w-75">

    <h1>顧客一覧</h1>
    
    <div class="w-75">
        <form method="GET" action="{{ route('dashboard.users.index') }}">
            <div class="d-flex flex-inline form-group">
                <div class="d-flex align-items-center">
                    ページアドレス/ID・担当者名など
                </div>
                <textarea id="search-products" name="keyword" class="form-controll ml-2 w-50">{{$keyword}}</textarea>
            </div>
            <button type="submit" class="btn samazon-submit-button">検索</button>
        </form>
    </div>

    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">ページアドレス/ID</th>
                <th scope="col">担当者名</th>
                <th scope="col">メールアドレス</th>
                <th scope="col">電話番号</th>
                <th scope="col">企業名・屋号名・団体名</th>
                <th scope="col">業種</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->page_address }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->store_name }}</td>
                <td>@if($user->industry == 1)レストラン・居酒屋・カフェ
                    @elseif($user->industry == 2)医療・健康・介護
                    @elseif($user->industry == 3)美容院・まつげ・ネイル
                    @elseif($user->industry == 4)リラク・マッサージ・エステ
                    @elseif($user->industry == 5)ヨガ・ピラティス
                    @elseif($user->industry == 6)フィットネス
                    @elseif($user->industry == 7)イベント
                    @elseif($user->industry == 8)旅行・観光
                    @elseif($user->industry == 9)レジャー・スポーツ
                    @elseif($user->industry == 10)貸しスペース・貸し会議室
                    @elseif($user->industry == 11)スクール・教室
                    @elseif($user->industry == 12)サークル・コミュニティ
                    @elseif($user->industry == 13)弁護士・税理士・士業
                    @elseif($user->industry == 14)セミナー
                    @elseif($user->industry == 15)カウンセリング
                    @elseif($user->industry == 16)占い
                    @elseif($user->industry == 17)ショップ
                    @elseif($user->industry == 18)その他
                    @endif
                </td>
                <td>
                    @if ($user->deleted_flag)
                    <form action="/dashboard/users/{{ $user->id }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn dashboard-delete-link">復帰</button>
                    </form>
                    @else
                    <form action="/dashboard/users/{{ $user->id }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn dashboard-delete-link">削除</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
</div>
@endsection