<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category_pizza;
use Illuminate\Support\Facades\DB;

class CategoryPizzaController extends Controller
{
    
    public function index()
    {
        $title = 'Toutes les pizza';
        $subtitle = 'Witch Laravel 5.7';

        $resultats = DB::table('category_pizza')->select('id', 'libelle')->get();
        return view('pizza.categorie.index', compact('resultats', 'title', 'subtitle'));
    }
  
    public function store(Request $request)
    {
       
        $libelle = request('libelle');  
        DB::table('category_pizza')->insert([
                'libelle' => $libelle
            ]
        );

        return redirect()->route('pizza.categorie.index')
            ->with('success','Catégorie ajoutée');        
    }
    
    public function destroy($id)
    {
        DB::table('category_pizza')->where('id', '=', $id)->delete();
        return redirect()->route('pizza.categorie.index')
                        ->with('success','catégorie supprimée');
    }
}
