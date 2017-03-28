<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\GoodsBrand;
use App\Transformers\GoodsBrandTransformer;

class GoodsBrandController extends ApiController
{
    private $goodsBrand;

    public function __construct(GoodsBrand $goodsBrand)
    {
        $this->goodsBrand = $goodsBrand;
    }

    public function index()
    {
        $posts = $this->goodsBrand->paginate();

        return $this->response->paginator($posts, new GoodsBrandTransformer());
    }

    public function update(Request $request, GoodsBrand $goodsBrand)
    {
        $validator = \Validator::make($request->all(), [
            'title' => 'required|string|max:50',
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->errorBadRequest($validator);
        }

        $goodsBrand->save($request->only('brand_name', 'telephone', 'brand_web', 'brand_logo', 'brand_desc', 'status', 'weight'));

        return $this->response->noContent();
    }
}