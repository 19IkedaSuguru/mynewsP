{{-- プロフィールのedit --}}
@extends('layouts.profile')
@section('title','Ｍｙ　プロフィールの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Ｍｙ　プロフィール編集</h2>
                <form action="{{ action('Admin\NewsController@update') }}" method="post" enctype="multipart/form-data">
                   @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                            　　<li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    {{-- 氏名(name)、性別(gender)、趣味(hobby)、自己紹介欄(introduction)の入力フォームを作る --}}
                    {{-- 氏名(name) --}}
                    <div class="form-group row">
                        <label class="col-md-2" for="name">名前</label>
                        <div class="col-md-10">
                            <input type=“text” class=“form-control” name=“name”>
                        </div>
                    </div>
                    {{-- 性別(gender) --}}
                    <div class="form-group row">
                        <label class="col-md-2" for="gender">性別</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="gender">
                        </div>
                    </div>
                    {{-- 趣味(hobby) --}}
                    <div class="form-group row">
                        <label class="col-md-2" for="hobby">趣味</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="hobby">
                        </div>
                    </div>
                    {{-- 自己紹介欄(introduction) --}}
                   
                    <div class="form-group row">
                        <div class="col-md-10">
                    <input type="hidden" name="user_id" value="{{ $user_id }}">
                            {{ csrf_field()  }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection