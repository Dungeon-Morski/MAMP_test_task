<?php

namespace App\Actions;


use App\Models\ArticleCategory;

class CreateArticleCategoryAction extends Action
{

    public function __invoke($data)
    {
        ArticleCategory::create($data);
        return back();
    }
}
