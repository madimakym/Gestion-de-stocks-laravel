<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Salades;

class SaladesController extends Controller
{
        
   public function __construct()
   {
        $this->middleware('auth');
   }

   
    public function index()
    {
            $title = 'Toutes les salades';
            $subtitle = 'Witch Laravel 5.7';

            $salades = Salades::orderBy('created_at', 'desc')->paginate(10);
            return view('salades.index', compact('salades', 'title', 'subtitle'));
    }
    
    public function create()
    {
            $title = 'Ajouter une salade';
            $subtitle = 'Witch Laravel 5.7';
            return view('salades.create', compact('title', 'subtitle'));
    }
   
    public function store(Request $request)
    {
        $request->validate([
                'libelle' => 'required',
                'description' => 'required',
                'prix' => 'required|integer'
        ]);
        
            $formInput=$request->except('image');
            $image=$request->image;
            
            if($image){
                $imageName = $image->getClientOriginalName();
                $image->move('images',$imageName);
                $formInput['image']=$imageName;
            }

            Salades::create($formInput);
            return redirect()->route('salades.index')
                ->with('success','Le produit a été ajouté');
    }

    public function show($id)
    {
            $title = 'Détails';
            $subtitle = 'Witch Laravel 5.7';

            $product = Salades::find($id);
            return view('salades.show', compact('product', 'title', 'subtitle'));
            
    }
   
    public function edit($id)
    {       
            $title = 'Modifier';
            $subtitle = 'Witch Laravel 5.7';

            $product = Salades::find($id);
            return view('salades.edit', compact('product', 'title', 'subtitle'));
    }
  
    public function update(Request $request, $id)
    {
            $product= Salades::findOrFail($id);
            $product->libelle = $request['libelle'];
            $product->description = $request['description'];
            $product->prix = $request['prix'];
            $product->image = $request['image'];
            $old_image = $request['old_image'];

            $image=$request->image;
            
            if($image == null){
                
                $product['image']=$old_image;

            } else {
                $new_image = $image->getClientOriginalName();
                $image->move('images',$new_image);
                $product['image']=$new_image;
            }

            $product->save();
            return redirect()->route('salades.index');
    }

    public function destroy($id)
    {
            $salade = Salades::find($id);
            $salade->delete();
            return redirect()->route('salades.index')
                    ->with('success','Adresse supprimée');
    }
}
