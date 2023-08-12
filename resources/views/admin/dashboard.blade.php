@extends('layouts.main')
@section('content')
    <div class="main_section  w-full">
        <div class="container">
            <div class="content_wrapper mt-8">
                <p style="font-size: 22px">Добро пожаловать {{Auth::user()->login}}</p>
                <ul class="mt-6">
                    <li><a href="{{route('users')}}">Пользователи</a></li>
                    <li><a href="{{route('articleCategories')}}">Категории статей</a></li>
                    <li><a href="{{route('articles')}}">Статьи</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

