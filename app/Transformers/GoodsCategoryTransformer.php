<?php

namespace App\Transformers;

use App\Models\GoodsCategory;
use League\Fractal\TransformerAbstract;

class GoodsCategoryTransformer extends TransformerAbstract
{
//    protected $availableIncludes = [
//        'tags',
//        'category',
//    ];


    public function transform(GoodsCategory $category)
    {
        return [
            'category_id' => $category->category_id,
            'category_name' => $category->category_name,
            'category_code' => $category->category_code,
            'category_logo' => $category->category_logo,
            'parent_id' => $category->parent_id,
            'level' => $category->level,
            'status' => $category->status ? true : false,
            'weight' => $category->weight,
            'created_at' => $category->created_at,
            'updated_at' => $category->updated_at,
            'label' => $category->category_name,
//            'children' => []
        ];
    }
    /**
     * Include Category
     *
     * @param Article $article
     * @return \League\Fractal\Resource\Collection
     */
//    public function includeCategory()
//    {
//        $category = $article->category;

//        return $this->item($category, new CategoryTransformer);
//    }

    /**
     * Include Tags
     *
     * @param Article $article
     * @return \League\Fractal\Resource\Collection
     */
    public function includeTags()
    {
//        $tags = $article->tags;
//
//        return $this->collection($tags, new TagTransformer);
    }
}