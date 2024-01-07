<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = Carbon::today()->toDateString();
        $yesterday = Carbon::yesterday()->toDateString();

        $firstDayThisMonth = Carbon::now()->startOfMonth()->toDateString();
        $lastDayThisMonth = Carbon::now()->endOfMonth()->toDateString();
        $firstDayLastMonth = Carbon::now()->subMonth()->startOfMonth()->toDateString();
        $lastDayLastMonth = Carbon::now()->subMonth()->endOfMonth()->toDateString();

        // Retrieve sales totals
        $productTodaySales = Product::whereDate('updated_at', $today)->where('status', '=', 'sold')->sum('price');
        $productYesterdaySales = Product::whereDate('updated_at', $yesterday)->where('status', '=', 'sold')->sum('price');
        $productThisMonthSales = Product::whereBetween('updated_at', [$firstDayThisMonth, $lastDayThisMonth])->where('status', '=', 'sold')->sum('price');
        $productLastMonthSales = Product::whereBetween('updated_at', [$firstDayLastMonth, $lastDayLastMonth])->where('status', '=', 'sold')->sum('price');

        $products = Product::all();


        return view('welcome')->with([
            'products' => $products,
            'productTodaySales' => $productTodaySales,
            'productYesterdaySales' => $productYesterdaySales,
            'productThisMonthSales' => $productThisMonthSales,
            'productLastMonthSales' => $productLastMonthSales
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $products = new Product();

        $products->name = $request['name'];
        $products->price = $request['price'];
        $products->quantity = $request['quantity'];
        $products->status = $request['status'];
        $products->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function soldProduct()
    {
        $productsSold= Product::where('status','=', 'sold')->get();
        return view('products.soldProducts')->with('productsSold',$productsSold);
    }
    public function updateStatusChange(string $id)
    {
        $product = Product::find($id);
        if($product->status == 'Buy'){
            $product->status = 'Sold';
            $product->touch();

        }
        $product->save();
        return redirect('/');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $productFind = Product::find($id);
        return view('products.edit')->with('productFind', $productFind);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, Request $request)
    {

        $products = Product::find($id);
        $products->name = $request['name'];
        $products->price = $request['price'];
        $products->quantity = $request['quantity'];
        $products->status = $request['status'];
        $products->update();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/');
    }
}
