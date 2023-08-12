@extends('layouts.main')
@section('content')
    <div class="main_section  w-full">
        <div class="container">
            <div class="content_wrapper my-8">
                <div>
                    <button class="createBtn" style="border: 1px solid black; border-radius: 5px; padding: 5px">
                        Создать статью
                    </button>
                </div>

                @foreach($articles as $article)

                    <div class="flex flex-column gap-6 mt-6">
                        <div class="article_card">
                            <p>ID: <span>{{$article->id}}</span></p>
                            <p>Название: <span>{{$article->title}}</span></p>
                            <p>Слаг: <span>{{$article->slug}}</span></p>
                            <p>Категория: <span>{{$article->category->title}}</span></p>
                            <p>Фото:
                            @if(!empty($article->image))
                                <div style="">
                                    <img style="max-height: 250px" src="{{asset('images/'.$article->image)}}"
                                         alt="article-image">
                                </div>
                            @else
                                <span>нет</span>
                                @endif
                                </p>
                                <p>Контент: <span>{{$article->content}}</span></p>
                                <p>Статус: <span>{{$article->status}}</span></p>
                                <p>Порядок сортировки: <span>{{$article->sort_order}}</span></p>
                                <div class="mt-6">
                                    <a class="editArticleBtn"
                                       href="{{route('showArticle',$article->id)}}">Редактировать</a>
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
                <form action="{{route('createArticle')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col gap-2">
                        <div>
                            <label for="">Название</label>
                            <input type="text" name="title">
                        </div>
                        <div>
                            <label for="">Слуг</label>
                            <input type="text" name="slug">
                        </div>
                        <div>
                            <label for="">Категория</label>
                            <select name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Фото</label>
                            <input type="file" name="image">
                        </div>
                        <div class="flex flex-col">

                            <label for="">Контент</label>
                            <textarea name="content"></textarea>
                        </div>
                        <div>

                            <label for="">Порядок</label>
                            <input type="text" name="sort_order">
                        </div>
                        <div>
                            <label for="">Статус</label>
                            <select name="status">
                                <option value="1">Активен</option>
                                <option value="0">Заблокирован</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="deposit-btn">Создать</button>
                </form>
            </div>
        </div>
    </div>
@endsection

