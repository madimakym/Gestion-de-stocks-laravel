<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\Pizza;

use App\Category_pizza;

use Illuminate\Support\Facades\DB;

class PizzaController extends Controller
{
   
    public function index()
    {
        $title = 'Tous les produits';
        $subtitle = 'Witch Laravel 5.7';

        $resultats = DB::table('pizzas')->select('pizzas.libelle','pizzas.id', 'description', 'prix', 'category_pizza.libelle AS taille')
        ->join('category_pizza', 'category_pizza.id', '=', 'pizzas.category_id')->get();
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

        $libelle = request('libelle');  
        $description = request('description', null);  
        $prix = request('prix');  
        $category_id = request('category_id');  

        $formInput=$request->except('image');
        $image=$request->image;
        
        if($image){
            $imageName = $image->getClientOriginalName();
            $image->move('images',$imageName);
        }

        DB::table('pizzas')->insert(
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

        $resultat = DB::table('pizzas')->where('id', '=', $id)->first();
        return view('pizza.show', compact('resultat', 'title', 'subtitle'));
    }
    

    public function edit($id)
    {
        $title = 'Modifier le produit';
        $subtitle = 'Witch Laravel 5.7';
        
        $product = DB::table('pizzas')->where('id', '=', $id)->first();       
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

        DB::table('pizzas')
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
        DB::table('pizzas')->where('id', '=', $id)->delete();
        return redirect()->route('pizza.index')
                        ->with('success','produit supprimé');
    }
}
