<?php

namespace App\Actions;


use App\Models\ArticleCategory;

class UpdateArticleCategoryAction extends Action
{

    public function __invoke(ArticleCategory $category, $data)
    {
        $category->update($data);
        return back();
    }
}
