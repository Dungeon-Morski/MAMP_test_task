<?php

namespace App\Http\Controllers\Admin;

use App\Actions\CreateArticleAction;
use App\Actions\UpdateArticleAction;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function articles()
    {
        $articles = Article::with('category')->orderBy('sort_order')->get();
        $categories = ArticleCategory::orderBy('title')->get();
        return view('admin.articles.index', compact('articles', 'categories'));
    }

    public function createArticle(Request $request, CreateArticleAction $action)
    {
        $data = $request->validate([
            'title' => 'string',
            'slug' => 'string',
            'category_id' => 'integer',
            'image' => 'mimes:jpg,png,jpg,webp',
            'content' => 'string',
            'sort_order' => 'integer',
            'status' => '',
        ],
            [
                'image.mimes' => 'Формат изображения должен быть PNG, JPEG или WEBP',

            ]);

        if (isset($data['image'])) {

            $data['image'] = time() . '.' . $request->image->extension();
            request()->image->move(public_path('images'), $data['image']);

        }

        return $action($data);
    }

    public function showArticle(Article $article)
    {
        $categories = ArticleCategory::all();
        return view('admin.articles.show', compact('article', 'categories'));
    }

    public function editArticle(Request $request, Article $article, UpdateArticleAction $action)
    {
        $data = $request->validate([

            'title' => 'string',
            'slug' => 'string',
            'category_id' => 'integer',
            'image' => 'mimes:jpg,png,jpg,webp',
            'content' => 'string',
            'sort_order' => 'integer',
            'status' => '',

        ],
            [
                'image.mimes' => 'Формат изображения должен быть PNG, JPEG или WEBP',

            ]);

        if (isset($data['image'])) {


            $data['image'] = time() . '.' . $request->image->extension();
            request()->image->move(public_path('images'), $data['image']);


        }

        return $action($article, $data);
    }
}
