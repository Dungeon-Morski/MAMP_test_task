<?php

namespace App\Actions;


use App\Models\Article;

class CreateArticleAction extends Action
{

    public function __invoke($data)
    {
        Article::create($data);
        return back();
    }
}
