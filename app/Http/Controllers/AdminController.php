<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lang;
use DB;
use PDF;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Budget;
use App\Models\Action;
use App\Models\Withdraw;
use App\Models\Cart;
use App\Models\Invoice;
use Illuminate\Support\Facades\Mail;
use App\Mail\Sendmail;
use SimpleSoftwareIO\QrCode\Generator;

class AdminController extends Controller
{
    public function show(){

        $products = Product::all();

        $invoices = Invoice::all();

        $users = User::all();

        $carts = Cart::where('type', 2)->get()->reverse();

        $amount = 0;

        foreach($invoices as $invoice){
            $amount = $amount + $invoice->amount;
        }

        return view('admin.admin-home', compact('carts', 'products', 'users', 'invoices', 'amount'));
    }

    public function getUsers(){

        $users = User::all();

        $carts = Cart::where('type', 2)->get()->reverse();

        return view('admin.admin-users',compact('carts', 'users'));
    }

    public function getCreateProduct(){

        $users = User::all();

        // $furnishers = Furnisher::all();

        $carts = Cart::where('type', 2)->get()->reverse();

        // return view('admin.admin-create-product',compact('carts', 'users', 'furnishers'));
        return view('admin.admin-create-product',compact('carts', 'users'));
    }

    public function getFurnishers(){

        $furnishers = Furnisher::all();

        $carts = Cart::where('type', 2)->get()->reverse();

        return view('admin.admin-furnisher',compact('carts', 'furnishers'));
    }

    // public function createFurnisher(Request $request){

    //     $id = Auth::user()->id;
    //     $furnisher = new Furnisher;

    //     if ($request->get('name') != null){
    //         $furnisher->name = $request->get('name');
    //     }else{
    //         $error = "Veillez entrez le nom";
    //         return redirect()->back()->with("error", $error);
    //     }

    //     if ($request->get('product_type') != null){
    //         $furnisher->product_type = $request->get('product_type');
    //     }else{
    //         $error = "Veillez entrez le type de plant";
    //         return redirect()->back()->with("error", $error);
    //     }


    //     if ($request->get('phone') != null){
    //         $furnisher->phone = $request->get('phone');
    //     }else{
    //         $error = "Veillez entrez le numero de telephone";
    //         return redirect()->back()->with("error", $error);
    //     }

    //     $furnisher->save();


    //     $message = "Le fournisseur a été ajoutée";
    //     return redirect()->back()->with("message", $message);
    // }

    public function createProduct(Request $request){

        $product = New Product;

        $type = (int)$request->get('type');

        $product->type = $type;

        if ($request->get('title') != null){
            $product->title = $request->get('title');
        }

        // if ($request->get('price') != null){
        //     $product->price = $request->get('price');
        // }

        // if ($request->get('quantity') != null){
        //     $product->quantity = $request->get('quantity');
        // }

        if ($request->get('description') != null){
            $product->description = $request->get('description');
        }

        if($request->file('main_image') != null ){
            $image = $request->file('main_image');
            $input['imagename'] = time(). '.'. $image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $product->main_image = $input['imagename'];

            $image->move( $destinationPath, $input['imagename'] );
        }

        if($request->file('image1') != null ){
            $image = $request->file('image1');
            $input['imagename'] = time(). '.'. $image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $product->image1 = $input['imagename'];

            $image->move( $destinationPath, $input['imagename'] );
        }
        if($request->file('image2') != null ){
            $image = $request->file('image2');
            $input['imagename'] = time(). '.'. $image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $product->image2 = $input['imagename'];

            $image->move( $destinationPath, $input['imagename'] );
        }
        if($request->file('image3') != null ){
            $image = $request->file('image3');
            $input['imagename'] = time(). '.'. $image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $product->image3 = $input['imagename'];

            $image->move( $destinationPath, $input['imagename'] );
        }
        if($request->file('image4') != null ){
            $image = $request->file('image4');
            $input['imagename'] = time(). '.'. $image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $product->image4 = $input['imagename'];

            $image->move( $destinationPath, $input['imagename'] );
        }

        // if($request->get('furnisher') != "0"){
        //     $furnisherId = (int)$request->get('furnisher');

        //     $furnisher = Furnisher::find($furnisherId);

        //     $product->furnisher()->associate($furnisher);
        // }

        $product->save();

        $products = Product::all();

        $id = Auth::user()->id;

        $message = "Le plant a été ajoutée";
        return redirect()->back()->with("message", $message);
    }

    public function editProduct(Request $request, $id){

        $product = Product::find($id);

        $type = (int)$request->get('type');

        $product->type = $type;

        if ($request->get('title') != null){
            $product->title = $request->get('title');
        }

        // if ($request->get('price') != null){
        //     $product->price = $request->get('price');
        // }

        // if ($request->get('quantity') != null){
        //     $product->quantity = $request->get('quantity');
        // }

        if ($request->get('description') != null){
            $product->description = $request->get('description');
        }

        if($request->file('main_image') != null ){
            $image = $request->file('main_image');
            $input['imagename'] = time(). '.'. $image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $product->main_image = $input['imagename'];

            $image->move( $destinationPath, $input['imagename'] );
        }

        if($request->file('image1') != null ){
            $image = $request->file('image1');
            $input['imagename'] = time(). '.'. $image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $product->image1 = $input['imagename'];

            $image->move( $destinationPath, $input['imagename'] );
        }
        if($request->file('image2') != null ){
            $image = $request->file('image2');
            $input['imagename'] = time(). '.'. $image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $product->image2 = $input['imagename'];

            $image->move( $destinationPath, $input['imagename'] );
        }
        if($request->file('image3') != null ){
            $image = $request->file('image3');
            $input['imagename'] = time(). '.'. $image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $product->image3 = $input['imagename'];

            $image->move( $destinationPath, $input['imagename'] );
        }
        if($request->file('image4') != null ){
            $image = $request->file('image4');
            $input['imagename'] = time(). '.'. $image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $product->image4 = $input['imagename'];

            $image->move( $destinationPath, $input['imagename'] );
        }

        // if($request->get('furnisher') != "0"){
        //     $furnisherId = (int)$request->get('furnisher');

        //     $furnisher = Furnisher::find($furnisherId);

        //     $product->furnisher()->associate($furnisher);
        // }

        $product->save();

        $products = Product::all();

        $id = Auth::user()->id;

        $message = "Le plant a été modifié";
        return redirect()->back()->with("message", $message);
    }

    public function getProducts(){

        $id = Auth::user()->id;

        $products = Product::all()->reverse();

        $carts = Cart::where('type', 2)->get()->reverse();

        return view('admin.admin-product',compact('carts', 'products'));
    }

    public function getEditProduct($id){

        $product = Product::find($id);
        // $furnishers = Furnisher::all();

        $carts = Cart::where('type', 2)->get()->reverse();

        // return view('admin.admin-edit-product',compact('carts', 'product', 'furnishers'));
        return view('admin.admin-edit-product',compact('carts', 'product'));
    }

    public function deleteProduct($id){

        $product = Product::find($id);
        $product->delete();

        $message = "Vous avez supprimé un plant  avec succes";

        return redirect()->back()->with('message', $message);
    }

    public function getInventory(){

        $id = Auth::user()->id;

        $carts = Cart::where('type', 2)->get()->reverse();

        $products = Product::all()->reverse();

        return view('admin.admin-inventory',compact('carts', 'products'));
    }

    public function getCart(){

        $id = Auth::user()->id;

        $carts = Cart::where('type', 2)->get()->reverse();

        $products = Product::all()->reverse();

        return view('admin.admin-cart',compact('carts', 'products'));
    }

    public function getInvoices(){

        $id = Auth::user()->id;

        $carts = Cart::where('type', 2)->get()->reverse();

        $products = Product::all()->reverse();

        $invoices = Invoice::all()->reverse();

        return view('admin.admin-invoices',compact('carts', 'products', 'invoices'));
    }

    public function addCart(Request $request, $id){

        $product = Product::findOrFail($id);

        $cart = new Cart;

        if($request->get('quantity') <= 0){
            $error = "Svp veillez renseigner une quantité superieur à 0";

            return redirect()->back()->with('error', $error);
        }

        if($request->get('quantity') >= 1){
            $cart->quantity = $request->get('quantity');
        }

        $cart->type = 2;

        $cart->product()->associate($product);

        $cart->save();

        $message = "Vous venez d'ajouter un plant au panier";

        return redirect()->back()->with('message', $message);
    }

    public function deleteCart($id){

        $cart = Cart::find($id);
        $cart->delete();

        $message = "Vous avez supprimé un plant du panier avec succes";

        return redirect()->back()->with('message', $message);
    }

    public function createInvoice(Request $request){

        $carts = Cart::where('type', 2)->get();

        $amount = 0;

        foreach ($carts as $cart) {
            $product = Product::find($cart->product_id);
            if($cart->quantity > $product->quantity){
                $error = "La quantité du plant : " . $product->title . " en stock n'est pas suffisante pour cette commande !";
                return redirect()->back()->with("error", $error);
            }
            $amount = $amount + $cart->quantity * $cart->product->price;
            $product->quantity = $product->quantity - $cart->quantity;
            $product->save();
        }

        $invoice = new Invoice;

        if ($request->get('name') != null){
            $invoice->name = $request->get('name');
        }else{
            $error = "Veillez entrez le nom du client";
            return redirect()->back()->with("error", $error);
        }

        $invoice->type = 2;

        $unique_no = Invoice::orderBy('id', 'DESC')->pluck('id')->first();
        if($unique_no == null or $unique_no == ""){
            $unique_no = 1;
        }
        else{
            $unique_no = $unique_no + 1;
        }

        $invoice->invoice_no = 'FACTURE'.$unique_no;
        $invoice->amount = $amount;

        $invoice->save();

        foreach ($carts as $cart) {
            $product = Product::find($cart->product_id);
            $invoice->products()->attach($product, ['quantity'=> $cart->quantity ]);
        }

        $carts = Cart::where('type', 2)->delete();

        $message = "La facture a été générée avec success !";
        return redirect()->back()->with("message", $message);
    }

    public  function getInvoice($id){

        $invoice = Invoice::findOrFail($id);

        $carts = Cart::where('type', 2)->get()->reverse();

        $qrcode = new Generator;
        $url = "https://https://computerclinicshop.com/admin/invoice/" . $id;
        $dataqrcode = base64_encode($qrcode->size(200)
                    ->style('square')
                    ->color(228,77,58)
                    ->generate($url));


        return view('admin.admin-invoice-details', compact('invoice', 'dataqrcode', 'carts'));
    }

    public  function exportInvoice($id){

        $invoice = Invoice::findOrFail($id);

        $qrcode = new Generator;
        $url = "https://https://computerclinicshop.com/admin/invoice/" . $id;
        $dataqrcode = base64_encode($qrcode->size(200)
                    ->style('square')
                    ->color(228,77,58)
                    ->generate($url));

        $carts = Cart::where('type', 2)->get()->reverse();


        //return view('pdf.export-annoucement', compact('annoucement', 'dataqrcode', 'gallery'));

        $pdf = PDF::loadview('admin.admin-invoice-details', compact('invoice', 'dataqrcode', 'carts'));


        return $pdf->stream($invoice->invoice_no . '.pdf');
    }

}
