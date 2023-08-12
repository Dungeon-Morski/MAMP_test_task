<?php

namespace App\Http\Controllers\Admin;

use App\Actions\CreateArticleCategoryAction;
use App\Actions\UpdateArticleCategoryAction;
use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    public function articleCategories()
    {
        $articleCategories = ArticleCategory::all();
        return view('admin.articleCategories.index', compact('articleCategories'));
    }

    public function showArticleCategory(ArticleCategory $category)
    {

        return view('admin.articleCategories.show', compact('category'));
    }

    public function editArticleCategory(Request $request, ArticleCategory $category, UpdateArticleCategoryAction $action)
    {

        $data = $request->validate([

            'title' => 'string',
            'status' => '',
            'sort_order' => 'integer',

        ]);
        return $action($category, $data);
    }

    public function createCategories(Request $request, CreateArticleCategoryAction $action)
    {
        $data = $request->validate([

            'title' => 'string',
            'status' => '',
            'sort_order' => 'integer',

        ]);

        return $action($data);

    }
}
