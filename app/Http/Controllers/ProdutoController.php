<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    public function add(Request $request, string $id){
        //dd($id);
        $produto = Produto::find($id);
        $produto->quantidade = $produto->quantidade + $request->quantidade;
        $produto->save();

        return redirect()->route('produto.index')->with('mensagem', 'Produto cadastrada com sucesso!');

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::orderBy('id', 'ASC')->get();
        return view('produto.produto_index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::orderBy ('nome','ASC')->get();
        return view('produto.produto_create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        // 1 - pegar o conteudo do arquivo
        $content = file_get_contents($request->file('imagem'));


        $validated = $request->validate([
            'nome' => 'required|min:5',
            'categoria_id' => 'required',
            // 2 - validar o tipo do arquivo
            'imagem' => 'mimes:jpg,bmp,png',
            'descricao' => 'required|min:5',
            'valor' => 'required',
            'quantidade' => 'required',
            'quantidade_min' => 'required'
            
        ]);
        
        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->categoria_id = $request->categoria_id;
        $produto->user_id = Auth::id();
        // 3 - converter para base64
        $produto->imagem = base64_encode($content);
        $produto->descricao = $request->descricao;
        $produto->valor = $request->valor;
        $produto->quantidade = $request->quantidade;
        $produto->quantidade_min = $request->quantidade_min;
        $produto->save();



        



        //dd($request->all());

        return redirect()->route('produto.index')->with('mensagem', 'Produto cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produto = Produto::find($id);
        return view('produto.produto_show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user_id = Auth::id();
        $categorias = Categoria::orderBy('nome', 'ASC')->get();
        $produto = Produto::find($id);
        return view('produto.produto_edit', compact('produto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user_id = Auth::id();
         // 1 - pegar o conteudo do arquivo
         if($request->file('imagem')){
            $content = file_get_contents($request->file('imagem'));
        }
        $validated = $request->validate([
            'categoria_id' => 'required',
            // 2 - validar o tipo do arquivo
            
            
        ]);

        $produto = Produto::find($id);
        $produto->categoria_id = $request->categoria_id;
        $produto->user_id = Auth::id();
        // 3 - converter para base64
        if($request->file('imagem')){
            $produto->imagem = base64_encode($content);
        }
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->valor = $request->valor;
        $produto->quantidade_min = $request->quantidade_min;
        $produto->save();

        return redirect()->route('produto.index')->with('mensagem', 'Postagem alterada com sucesso!');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto = Produto::find($id);
        $produto->delete();

        return redirect()->route('produto.index')->with('mensagem', 'Produto excluida com sucesso!');

    }

    public function saida_produtos(){
//    $produto = Produto::find($id);
    return view('Saida.saida_index');
    }

    public function pesquisar(Request $request)
    {
        $searchTerm = $request->input('q');  // Obter o termo de pesquisa

        // Se o campo de pesquisa for preenchido, procurar pelo nome do produto
        $produtos = Produto::where('nome', 'like', '%' . $searchTerm . '%')->get();
        $produtos = Produto::where('id', 'like', '%' . $searchTerm . '%')->get();

        return view('produto.produto_pesquisa', compact('produtos'));
}
    public function min()
    {
        $produtos = Produto::all();
        $totalProdutos = count(Produto::all());
        //$produtos = Produto::where('quantidade', '<=', 'quantidade_min')->get();
       
        return view('home', compact('produtos', 'totalProdutos'));


    }

    

    public function saida_vender(){
        $produtos = Produto::all();
       
       
        return view('Saida.saida_vender', compact('produtos'));
    }
    
    
        public function vender(Request $request, string $id){
            
            $produto = Produto::find($id);
            $produto->quantidade = $produto->quantidade - $request->quantidade;
            $produto->save();
    
            return redirect()->route('produto.index')->with('mensagem', 'Produto cadastrada com sucesso!');
    
        }


       

    

}

//$produtos = Produto::where('quantidade', '<=', 'quantidade_min')->get();
//return view('produto.home', compact('produtos'));        