<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\Goods\CreateGoodRequest;
use App\Http\Requests\Goods\UpdateGoodRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Product;
use Validator;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Get(
     *     path="/products",
     *     operationId="productsGet",
     *     tags={"Goods"},
     *     summary="Display a listing of the resource",
     *     security={
     *       {"bearer": {}},
     *     },
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="The page number",
     *         required=false,
     *         @OA\Schema(
     *             type="integer",
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine"
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Good not found"
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     * )
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $products = Product::all(); - без пагинации
        $products = Product::query()->paginate(2);
        return $this->sendResponse($products->toArray(), 'Products retrieved successfully.');
    }

    /**
     * @OA\Post(
     *     path="/products",
     *     operationId="productsCreate",
     *     tags={"Goods"},
     *     summary="Create yet another example Goods",
     *     security={
     *       {"app_id": {}},
     *     },
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine"
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Good not found"
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CreateGoodRequest")
     *     )
     * )
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGoodRequest $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|min:3|max:100',
            'detail' => 'required|min:3|max:1000'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $product = Product::create($input);
        return $this->sendResponse($product->toArray(), 'Product created successfully.');
    }

    /**
     * @OA\Get(
     *      path="/products/{id}",
     *      operationId="getproductsById",
     *      tags={"Goods"},
     *      summary="Get product information",
     *      description="Returns product data",
     *     security={
     *       {"passport": {}},
     *     },
     *      @OA\Parameter(
     *          name="id",
     *          description="product id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        if (is_null($product)) {
            return $this->sendError('Product not found.');
        }

        return $this->sendResponse($product->toArray(), 'Product retrieved successfully.');
    }

    /**
     * @OA\Put(
     *      path="/products/{id}",
     *      operationId="updateGood",
     *      tags={"Goods"},
     *      summary="Update existing Goods",
     *     security={
     *       {"bearer": {}},
     *     },
     *      description="Returns updated project data Goods",
     *      @OA\Parameter(
     *          name="id",
     *          description="Goods id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateGoodRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/UpdateGoodRequest")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGoodRequest $request, Product $product)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $product->name = $input['name'];
        $product->detail = $input['detail'];
        $product->save();

        return $this->sendResponse($product->toArray(), 'Product updated successfully.');
    }

    /**
     * @OA\Delete(
     *      path="/products/{id}",
     *      operationId="productsDelete",
     *      tags={"Goods"},
     *      summary="Delete existing product",
     *      security={
     *        {"app_id": {}},
     *      },
     *      description="Deletes a record and returns Delete existing product",
     *      @OA\Parameter(
     *          name="id",
     *          description="Products id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return $this->sendResponse($product->toArray(), 'Product deleted successfully.');
    }
}
