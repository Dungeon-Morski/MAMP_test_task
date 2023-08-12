@extends('layouts.main')
@section('content')
    <div class="main_section  w-full">
        <div class="container">
            <div class="content_wrapper my-8">
                <form action="{{route('editUser', $user->id)}}"  method="post"
                      style="max-width: 500px">
                    @csrf

                    <div class="flex flex-col gap-4 items-center article_wrapper">

                        <div>
                            <label for="">Логин</label>
                            <input value="{{$user->login}}" name="login" type="text" required>
                        </div>
                        <div>
                            <label for="">Пароль</label>
                            <input value="{{$user->password}}" name="password" type="text" required>
                        </div>

                        <div>
                            <label for="">Статус</label>
                            <select name="status" required>
                                <option value="{{$user->status}}"
                                        selected>{{$user->status == 1 ? 'Активен' : 'Заблокирован'}}</option>
                                <option value="1">Активен</option>
                                <option value="0">Заблокирован</option>
                            </select>
                        </div>
                        <div>
                            <label for="">Роль</label>
                            <select name="isAdmin" required>
                                <option value="{{$user->isAdmin}}"
                                        selected> {{$user->isAdmin == 1 ? 'Админ' : 'Пользователь'}}</option>

                                <option value="1">Админ</option>
                                <option value="0">Пользователь</option>

                            </select>
                        </div>
                        <button type="submit">Редактировать</button>
                        <div style="align-self: flex-start">
                            <a href="{{route('users')}}">Назад ко всем пользователям</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

