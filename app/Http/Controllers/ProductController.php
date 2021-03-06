<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\PedidoProduto;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::orderBy('id','desc')->paginate(10);
        if(Auth::check()){
            if (auth()->user()->access_level == 'admin') {
                return view('product.index', $data);
            }else{
                return redirect()->route('welcome');
            }            
        }else{
            return redirect()->route('welcome');
        }
                
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'imagem' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'descricao' => 'required',
            'valor' => 'required',
        ]);
        $path = $request->file('imagem')->store('public/images');
        $product = new Product;
        $product->nome = $request->nome;
        $product->descricao = $request->descricao;
        $product->imagem = $path;
        $product->valor = $request->valor;
        $product->save();
     
        return redirect()->route('products.index')
                        ->with('success','Produto adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show',compact('product'));
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit',compact('product'));
    }

    /**
     * Show the form for see the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $product = Product::find($id);
        return view('product.detail',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        //dd($product);
        
        if($request->hasFile('imagem')){
            $request->validate([
              'imagem' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('imagem')->store('public/images');
            $product->imagem = $path;
        }
        $product->nome = $request->nome;
        $product->descricao = $request->descricao;
        $product->valor = $request->valor;
        $product->save();
    
        return redirect()->route('products.index')
                        ->with('success','Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    
        return redirect()->route('products.index')
                        ->with('success','Produto deletado com sucesso!');
    }
}
