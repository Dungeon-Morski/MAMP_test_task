@extends('layouts.main')
@section('content')
    <div class="main_section  w-full">
        <div class="container">
            <div class="content_wrapper my-8">
                <div>
                    <button class="createBtn" style="border: 1px solid black; border-radius: 5px; padding: 5px">
                        Создать категорию
                    </button>
                </div>
                <ul class="mt-6">
                    @foreach($articleCategories as $articleCategory)

                        <li>
                            <p>Название: {{$articleCategory->title}}</p>
                            <p>Порядок: {{$articleCategory->sort_order}}</p>
                            <div class="my-4">
                                <a style="border: 1px solid black; padding: 5px; border-radius: 5px;"
                                   href="{{route('showArticleCategory', $articleCategory->id)}}">Редактировать</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="depositOverlayBlock hidden">
            <div class="overlay">
            </div>
            <div class="modal_content">
                <form action="{{route('createCategories')}}" method="post">
                    @csrf
                    <div>
                        <label for="">Название</label>
                        <input type="text" name="title" required>
                    </div>

                    <div>
                        <label for="">Статус</label>
                        <select name="status">
                            <option value="1">Активен</option>
                            <option value="0">Заблокирован</option>
                        </select>
                    </div>
                    <div>

                        <label for="">Порядок</label>
                        <input type="text" name="sort_order" placeholder="sort order" required>
                    </div>
                    <button type="submit" class="deposit-btn">Создать</button>
                </form>
            </div>
        </div>
    </div>
@endsection

