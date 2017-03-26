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

    public function update($id, Request $request)
    {
        $goodsBrand = $this->goodsBrand->find($id);

        if (! $goodsBrand) {
            return $this->response->errorNotFound();
        }



        $validator = \Validator::make($request->input(), [
            'title' => 'required|string|max:50',
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->errorBadRequest($validator);
        }

        $goodsBrand->update($request->only('brand_name', 'telephone', 'brand_web', 'brand_logo', 'brand_desc', 'status', 'weight'));

        return $this->response->noContent();
    }
}