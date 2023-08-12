@extends('layouts.main')
@section('content')
    <div class="main_section  w-full">
        <div class="container">
            <div class="content_wrapper mt-8">
                <form action="{{route('editArticleCategory', $category->id)}}" method="post" style="max-width: 500px">
                    @csrf

                    <div class="flex flex-col gap-4">
                        <div class="flex flex-col gap-1">
                            <label for="">Название</label>
                            <input value="{{$category->title}}" name="title" type="text" required>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="">Порядок</label>
                            <input value="{{$category->sort_order}}" name="sort_order" type="number" required>
                        </div>

                        <button type="submit">Редактировать</button>
                        <div>
                            <a href="{{route('articleCategories')}}">Назад ко всем категориям</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

