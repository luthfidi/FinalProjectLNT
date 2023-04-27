<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use App\Models\Faktur;
use Cart;

class BookController extends Controller
{
    public function index()
    {
        $book = Book::all();
        $category = Category::all();
        return view('welcome', compact('book','category'));
    }


    public function showDashboard(){
        $book = Book::all();
        $category = Category::all();
        return view('dashboard', compact('book','category'));
    }
    
    public function showFaktur(){
        $book = Book::all();
        $category = Category::all();
        return view('chooseFaktur', compact('book','category'));
    }
    public function create()
    {
        $category = Category::all();
        return view('createBook', compact('category'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'Name' => 'required|min:5|max:80',
            'Price' => 'required|integer',
            'Quantity' => 'required|integer',
            'Image' => 'required'
        ]);

        $extension = $request->file('Image')->getClientOriginalExtension();
        $filename = $request->file('Image')->getClientOriginalName();
        $request->file('Image')->storeAs('/public/article/images', $filename);

        Book::create([
            'Name' => $request -> Name,
            'Price' => $request -> Price,
            'Quantity' => $request -> Quantity,
            'Image' => $filename,
            'category_id' => $request -> CategoryName
        ]);

        return redirect('/');
    }
    public function storeFaktur(Request $request)
    {
        $validate = $request->validate([
            'Address' => 'required|string|min:10|max:100',
            'Postcode' => 'required|integer|min:9999'
        ]);

        foreach (Cart::content() as $item ) {
            foreach (Book::all() as $b) {
                if ($item->name == $b->Name) {
                    foreach (Category::all() as $c ) {
                        if($b->category_id == $c->id){
                            Faktur::create([
                                'FakturID' => $request -> FakturID,
                                'Category' => $c -> CategoryName,
                                'Name' => $item -> name,
                                'Qty' => $item -> qty,
                                'Address' => $request -> Address,
                                'Postcode' => $request -> Postcode,
                                'Total' => $item->price*$item->qty,
                                'Subtotal' => $request -> Subtotal,
                            ]);
                            Book::findOrFail($b->id)->update([
                                'Quantity' => $b->Quantity-$item->qty
                            ]);
                        };
                    };
                };
            };
        };



        return redirect('/');
    }

    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        $category = Category::all();
        return view('editBook', compact('book', 'category'));
    }

    public function edit(string $id, Request $request)
    {
        $validate = $request->validate([
            'Name' => 'required|min:5|max:80',
            'Price' => 'required|integer',
            'Quantity' => 'required|integer',
            'Image' => 'required'
        ]);

        $extension = $request->file('Image')->getClientOriginalExtension();
        $filename = $request->file('Image')->getClientOriginalName();
        $request->file('Image')->storeAs('/public/article/images', $filename);

        Book::findOrFail($id)->update([
            'Name' => $request -> Name,
            'Name' => $request -> Name,
            'Price' => $request -> Price,
            'Quantity' => $request -> Quantity,
            'Image' => $filename,
            'category_id' => $request -> CategoryName
        ]);

        return redirect('/');
    }

    public function add_to_cart(Request $request, string $id)
    {
        $book = Book::findOrFail($id);
        Cart::add($book->id, $book->Name,1, $book->Price);
        return redirect('/createFaktur');
    }

    public function show_cart(){
        $cart1 = Cart::content();
        $book = Book::all();
        $category = Category::all();
        return view('cart', compact('cart1', 'book', 'category'));
    }

    public function add_qty($rowId){
        $cart = Cart::get($rowId);
        Cart::update($rowId, $cart->qty+1);

        return redirect('/cart');
    }

    public function min_qty($rowId){
        $cart = Cart::get($rowId);
        Cart::update($rowId, $cart->qty-1);

        return redirect('/cart');
    }

    public function destroy(string $id)
    {
        Book::destroy($id);
        return redirect('/');
    }
}
