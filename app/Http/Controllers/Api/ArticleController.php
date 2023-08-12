<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Filters\ArticleFilter;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Models\Traits\Filterable;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    use Filterable;

    /**
     * Display a listing of the resource.
     */
    public function index(ArticleFilter $filter)
    {
        $articles = Article::filter($filter)->paginate();
        return ArticleResource::collection($articles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new ArticleResource(Article::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
