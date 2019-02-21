@extends('layout.mainlayout')

@section('content')
  <div class="container">
          <div class="text-header">
            <div class="row">
                <div class="col-lg-8 col-md-7 col-sm-6">
                  <h2>{{$title}}</h2>
                  <p class="lead">{{$subtitle}}</p>
                </div>
            </div>
          </div>
          
        @if ($message = Session::get('success'))          
          <div class="alert alert-dismissible alert-primary">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <p class="mb-0">Success!!! {{ $message }}</p>
          </div>
        @endif 

            <div class="blc-button">
                <a class="btn btn-primary btn-sm" href="{{ route('pizza.create') }}"><i class="fas fa-plus"></i> Ajouter un produit</a>
                <a class="btn btn-primary btn-sm" href="{{ route('pizza.categorie.index') }}"><i class="fas fa-list"></i> Catégories</a>
            </div>
            
            <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Libelle</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Taille</th>
                        <th class="align-center action">Action</th>
                      </tr>
                    </thead>

                  @forelse ($resultats as $resultat)
                    <tr>
                      <td>{{$resultat->id}}</td>
                      <td>{{$resultat->libelle}}</td>
                      <td>{{$resultat->description}}</td>
                      <td>{{$resultat->prix}}</td>
                      <td>{{$resultat->taille}}</td>
                      <td class="align-center action-button">
                        <a class="btn btn-primary btn-sm" href="{{ route('pizza.show',$resultat->id) }}">Detail</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('pizza.edit',$resultat->id) }}">Modifier</a>
                        <form action="{{ route('pizza.destroy',$resultat->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary btn-sm btn-update">Supprimer</button> 
                        </form>
                      </td>
                    </tr>
                     @empty
                            <h3>No products</h3>
                   @endforelse
            </table> 

            <br />   
            <div class="center">
                {{-- {!! $resultat->links() !!} --}}
            </div>
  </div>
        
@endsection

