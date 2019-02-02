<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManagerStatic as Image;




class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Product
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function list($page)
    {

        $rowsPerPage = request('rowsPerPage', 5);

        // get sortBy from query parameters (after ?), if not set => name
        $sortBy = request('sortBy', 'name');

        // get descending from query parameters (after ?), if not set => false
        $descendingBool = request('descending', 'false');
        // convert descending true|false -> desc|asc
        $descending = $descendingBool === 'true' ? 'desc' : 'asc';

        // pagination
        // IFF rowsPerPage == 0, load ALL rows
        if ($rowsPerPage == 0) {
            // load all products from DB
            $products = DB::table('products')
                ->orderBy($sortBy, $descending)
                ->get();
        } else {
            $offset = ($page - 1) * $rowsPerPage;

            // load products from DB
            $products = DB::table('products')
                ->orderBy($sortBy, $descending)
                ->offset($offset)
                ->limit($rowsPerPage)
                ->get();
        }

        // total number of rows -> for quasar data table pagination
        $rowsNumber = DB::table('products')->count();

        return response()->json(['rows' => $products, 'rowsNumber' => $rowsNumber]);
    }

    public function categories()
    {
        $categories = Category::all();

        return response()->json(['categories' => $categories]);
    }

    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = new Product();
        if($request->has('name'))$product->name = $request->input('name');
        if($request->has('price'))$product->price = $request->input('price');
        if($request->has('category'))$product->category = $request->input('category');
        if($request->has('desc'))$product->description = $request->input('desc');
        if($request->has('name')) {
            $imgsource = $request->input('name');
            $imgsource = strtolower($imgsource);
            $imgsource = str_replace(' ', '', $imgsource);
            $product->imgsource = $imgsource;
        }
        $product->amount = 0;
        try {
            $product->save();
        }catch (\Exception $e)
        {
            file_put_contents('failedUpProduct.txt', $e);
        }

        return response('Produkt bol pridany', 200);
    }

    public function getProduct($id)
    {
        $product = Product::find($id);

        return response()->json(['product' => $product]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('productDetail', compact('product', $product));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $product = Product::find($id);
        if($request->has('name'))$product->name = $request->input('name');
        if($request->has('price'))$product->price = $request->input('price');
        if($request->has('category'))$product->category = $request->input('category');
        if($request->has('desc'))$product->description = $request->input('desc');
        $product->amount = 2500;
        try {
            $product->save();
        }catch (\Exception $e)
        {
            Log::warning("Nepodarilo sa upravit produkt s vynimkou" . $e);
            return response("Produkt sa nepodarilo upravit", 400);
        }

        return response("Produkt bol vytvoreny", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $idsToDelete = $request->input('ids');
            DB::transaction( function() use($idsToDelete)
            {
                foreach ($idsToDelete as $id) {
                    $product = Product::find($id);
                    $url = public_path() . '/img/' . $product[0]->imgsource;
                    $product[0]->delete();
                    if(is_dir($url))
                    {
                        File::deleteDirectory($url);
                    }
                }
            });

            return response("Produkt bol uspesne vymazany", 200);

        }catch(\Exception $e)
        {
            Log::warning("Nepodarilo sa vymazat produkt s touto vynimkou: " . $e);
            return response( "Produkt sa nepodarilo vymazat", 400);
        }

    }

    public function ImageUpload(Request $request)
    {
        try{
            if($request->has('name')) {
                $imgsource = $request->input('name');
                $imgsource = strtolower($imgsource);
                $imgsource = str_replace(' ', '', $imgsource);
            }
            if($request->hasFile('obr1')){
                $myurl = public_path() .  '\\img\\' . $imgsource;
                if(!file_exists($myurl . '\\sxs_main-img.jpg')){
                    mkdir($myurl);
                    $image = $request->file('obr1');
                    $image_resize = Image::make($image->getRealPath());
                    $image_resize->resize(950, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $image_resize->save(public_path() . '\\img\\' . $imgsource . '\\xl_main-img.jpg');
                    $image_resize->resize(450, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $image_resize->save(public_path() . '\\img\\' . $imgsource . '\\m_main-img.jpg');
                    $image_resize->resize(380, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $image_resize->save(public_path() . '\\img\\' . $imgsource . '\\l_main-img.jpg');
                    $image_resize->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $image_resize->save(public_path() . '\\img\\' . $imgsource . '\\sxs_main-img.jpg');
                }
                else if(!file_exists($myurl . '\\sxs_side-img.jpg'))
                {
                    $image = $request->file('obr1');
                    $image_resize = Image::make($image->getRealPath());
                    $image_resize->resize(475, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $image_resize->save(public_path() . '\\img\\' . $imgsource . '\\xl_side-image.jpg');
                    $image_resize->resize(225, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $image_resize->save(public_path() . '\\img\\' . $imgsource . '\\m_side-image.jpg');
                    $image_resize->resize(190, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $image_resize->save(public_path() . '\\img\\' . $imgsource . '\\l_side-image.jpg');
                    $image_resize->resize(150, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $image_resize->save(public_path() . '\\img\\' . $imgsource . '\\sxs_side-img.jpg');
                }
                else
                {
                    return response("Nepodarilo sa pridat obrazok, lebo produkt ma maximalny pocet obrazkov", 409);
                }
            }

            return response( "Obrazok pridany", 200);

        }catch(\Exception $e)
        {
            Log::warning("Nepodarilo sa pridat obrazok s vynimkou " . $e);
            return response("Nepodarilo sa pridat obrazok", 400);
        }

    }


}
