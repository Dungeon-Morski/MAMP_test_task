@extends('layouts.main')
@section('content')
    <div class="main_section  w-full">
        <div class="container">
            <div class="content_wrapper my-8">

                <div>
                    <button class="createBtn" style="border: 1px solid black; border-radius: 5px; padding: 5px">Создать пользователя</button>
                </div>
                @foreach($users as $user)

                    <div class="flex flex-column gap-6 mt-6">
                        <div class="article_card">
                            <p>ID: <span>{{$user->id}}</span></p>
                            <p>Логин: <span>{{$user->login}}</span></p>
                            <p>Пароль: <span>{{$user->password}}</span></p>
                            <p>Статус: <span>{{$user->status == 1 ? 'Активен' : 'Заблокирован'}}</span></p>
                            <p>Админ? <span>{{$user->isAdmin == 1 ? 'Да' : 'Нет'}}</span></p>

                            <div class="mt-6">
                                <a class="editArticleBtn" href="{{route('showUser',$user->id)}}">Редактировать</a>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
        <div class="depositOverlayBlock hidden">
            <div class="overlay">
            </div>
            <div class="modal_content">
                <form action="{{route('createUser')}}" method="post">
                    @csrf
                    <div>
                        <label for="">Логин</label>
                        <input type="text" name="login" placeholder="Ivan1993" required>
                    </div>
                    <div>
                        <label for="">Пароль</label>
                        <input type="text" name="password" placeholder="I#4n19223Js" required>
                    </div>
                    <div>
                        <label for="">Статус</label>
                        <select name="status">
                            <option value="1">Активен</option>
                            <option value="0">Заблокирован</option>
                        </select>
                    </div>
                    <div>
                        <label for="">Роль</label>
                        <select name="isAdmin">
                            <option value="1">Админ</option>
                            <option value="0">Пользователь</option>
                        </select>
                    </div>
                    <button type="submit" class="deposit-btn">Создать</button>
                </form>
            </div>
        </div>

    </div>
@endsection

