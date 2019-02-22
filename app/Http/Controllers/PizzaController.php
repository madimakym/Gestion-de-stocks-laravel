<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category_pizza;

use Illuminate\Support\Facades\DB;

class PizzaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $title = 'Tous les produits';
        $subtitle = 'Witch Laravel 5.7';

        $resultats = DB::table('pizza')->select('pizza.libelle','pizza.id', 'description', 'prix', 'category_pizza.libelle AS taille')
        ->join('category_pizza', 'category_pizza.id', '=', 'pizza.category_id')->get();
        // ->paginate(3);

        return view('pizza.index', compact('resultats', 'title', 'subtitle'));
    }
  
    public function create()
    {
        $title = 'Ajouter un produit';
        $subtitle = 'Witch Laravel 5.7';

        // recupere la categorie
        $categories = DB::table('category_pizza')->select('id', 'libelle')->pluck('libelle','id');
        return view('pizza.create', compact('title', 'subtitle', 'categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'libelle' => 'required',
            'description' => 'required',
            'prix' => 'required|integer',
            'category_id' => 'required',
            'image' => 'required'
        ]);

        $libelle = request('libelle');  
        $description = request('description', null);  
        $prix = request('prix');  
        $category_id = request('category_id');  
        $image = $request['image'];
        $image=$request->image;

        if($image){
            $imageName = $image->getClientOriginalName();
            $image->move('images',$imageName);
        }

        DB::table('pizza')->insert(
            [
                'libelle' => $libelle,
                'description' => $description,
                'prix' => $prix,
                'category_id' => $category_id,
                'image' => $imageName
            ]
        );
        return redirect()->route('pizza.index')
                        ->with('success','produit ajoutée.');
    }

    public function show($id)
    {
        $title = 'Détails';
        $subtitle = 'Witch Laravel 5.7';

        $resultat = DB::table('pizza')->where('id', '=', $id)->first();
        return view('pizza.show', compact('resultat', 'title', 'subtitle'));
    }
    

    public function edit($id)
    {
        $title = 'Modifier le produit';
        $subtitle = 'Witch Laravel 5.7';
        
        $product = DB::table('pizza')->where('id', '=', $id)->first();       
        // recupere la categorie
        $categories = DB::table('category_pizza')->select('id', 'libelle')->pluck('libelle','id');
        
        return view('pizza.edit', compact('product', 'categories', 'title', 'subtitle'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required'
            ]);

        $libelle = $request['libelle'];
        $description = $request['description'];
        $prix = $request['prix'];
        $category_id = $request['category_id'];
        $image = $request['image'];
        $old_image = $request['old_image'];

        $image=$request->image;
        
        if($image == null){
            
            $new_image=$old_image;

        } else {
            $new_image = $image->getClientOriginalName();
            $image->move('images',$new_image);
        }

        DB::table('pizza')
            ->where('id', '=', $id)
            ->update(
                array(
                    'libelle' => $libelle,
                    'description' => $description,
                    'prix' => $prix,
                    'category_id' => $category_id,
                    'image' => $new_image
                )
            );
        return redirect()->route('pizza.index');
    }

   
    public function destroy($id)
    {
        DB::table('pizza')->where('id', '=', $id)->delete();
        return redirect()->route('pizza.index')
                        ->with('success','produit supprimé');
    }
}
