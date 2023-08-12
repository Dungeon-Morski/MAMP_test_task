@extends('layouts.main')
@section('content')
    <div class="main_section  w-full">
        <div class="container">
            <div class="content_wrapper my-8">
                <form action="{{route('editArticle', $article->id)}}" enctype="multipart/form-data" method="post"
                      style="max-width: 500px">
                    @csrf

                    <div class="flex flex-col gap-4 items-center article_wrapper">
                        <div>
                            <img style="max-width: 300px" src="{{asset('images/'.$article->image)}}"
                                 alt="article-image">
                        </div>

                        <input class="imageField" value="{{$article->image}}" name="image" type="file">
                        @error('image')
                        <style>
                            .imageField {
                                border:1px solid red;
                            }
                        </style>
                        <div style="color:red" class="">{{$message}}</div>
                        @enderror

                        <div>
                            <label for="">Название</label>
                            <input value="{{$article->title}}" name="title" type="text" required>
                        </div>
                        <div>
                            <label for="">Слуг</label>
                            <input value="{{$article->slug}}" name="slug" type="text" required>
                        </div>

                        <div>
                            <label for="">Категория</label>
                            <select name="category_id" required>
                                <option value="{{$article->category_id}}" selected> {{$article->category->title}}</option>

                                @foreach($categories as $category)
                                    @if($category->id != $article->category_id)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endif

                                @endforeach

                            </select>
                        </div>

                        <div>
                            <label for="">Статус</label>
                            <select name="status" required>
                                <option value="{{$article->status}}" selected>{{$article->status == 1 ? 'Включен' : 'Выключен'}}</option>
                                <option value="1">Включен</option>
                                <option value="0">Отключен</option>
                            </select>
                        </div>
                        <div>
                            <labe>Контент</labe>
                            <textarea name="content" required>{{$article->content}}</textarea>
                        </div>
                        <div>
                            <label for="">Порядок</label>
                            <input name="sort_order" value="{{$article->sort_order}}" type="number" required>
                        </div>
                        <button type="submit">Редактировать</button>
                        <div style="align-self: flex-start">
                            <a href="{{route('articles')}}">Назад ко всем статьям</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

