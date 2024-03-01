<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        
        if ($products->count() === 0) {
            return $this->sendError('No products found');
        }

        return $this->sendResponse($products, 'Productos recuperados');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        Storage::put($request->get('pdf'));

        $product = Product::create($data);

        return $this->sendResponse($product, 'Producto creado correctamente');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        if (empty($product)) {
            return $this->sendError('Producto no encontrado');
        }
        return $this->sendResponse($product, 'Información del producto');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        if (empty($product)) {
            return $this->sendError('Producto no encontrado');
        }

        $data = $request->validated();
        $product->update($data);

        return $this->sendResponse($data,'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =Product::find($id);

        if (empty($product)) {
            return $this->sendError('No found');
        }

        $product->delete();
        return $this->sendResponse(['data'=> 'ok'], 'Product deleted');
    }
}
