<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ArticleFilter extends QueryFilter
{
    /**
     * @param string $category
     */
    public function categoryId(string $category)
    {
        $this->builder->where('category_id', strtolower($category));
    }

    /**
     * @param string $slug
     */
    public function slug(string $slug)
    {
        $words = array_filter(explode(' ', $slug));

        $this->builder->where(function (Builder $query) use ($words) {
            foreach ($words as $word) {
                $query->where('slug', 'like', "%$word%");
            }
        });
    }

}
