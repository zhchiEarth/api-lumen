<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Repositories\GoodsBrandRepository;
use App\Transformers\GoodsBrandTransformer;

class GoodsBrandController extends ApiController
{
    private $goodsBrand;

    public function __construct(GoodsBrandRepository $goodsBrand)
    {
        $this->goodsBrand = $goodsBrand;
    }

    public function index()
    {
        $goodsBrand = $this->goodsBrand->page();

        return $this->response->paginator($goodsBrand, new GoodsBrandTransformer());
    }

    public function store(Request $request)
    {
        $this->valid($request);
        $this->goodsBrand->store($request->only('brand_name', 'telephone', 'brand_web', 'brand_logo', 'brand_desc', 'status', 'weight'));
        return $this->response->noContent();
    }

    public function update(Request $request, $id)
    {
        $this->valid($request);
        $data = $request->only('brand_name', 'telephone', 'brand_web', 'brand_logo', 'brand_desc', 'status', 'weight');
        $this->goodsBrand->update($id, $data);
        return $this->response->noContent();
    }

    public function status(Request $request, $id)
    {
        $input = $request->all();
        $input = $request->only('status');

        dd($input);
        $this->goodsBrand->updateColumn($id, $input);

        return $this->response->noContent();
    }

    public function valid(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'brand_name' => 'required',
            'telephone' => 'required',
            'brand_web' => 'required',
            'brand_logo' => 'required',
            'brand_desc' => 'required',
            'status' => 'required|min:0|max:1',
            'weight' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->errorBadRequest($validator);
        }
    }
}