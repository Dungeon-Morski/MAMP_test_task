<?php

namespace App\Actions;


use App\Models\Article;

class UpdateArticleAction extends Action
{

    public function __invoke(Article $article, $data)
    {
        $article->update($data);
        return back();
    }
}
