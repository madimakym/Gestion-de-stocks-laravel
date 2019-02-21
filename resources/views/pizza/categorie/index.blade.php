@extends('layout.mainlayout')
 
@section('content')
  <div class="col-md-10 offset-1">
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
                <a class="btn btn-primary btn-sm" href="{{ route('pizza.index') }}"><i class="fas fa-chevron-left"></i> Retour</a>
                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i> Ajouter une catégorie</a>
            </div>

                  <div class="modal fade" id="myModal">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content container">
                          {!! Form::open(['route' => 'pizza.categorie.store', 'method'=> 'post', 'files'=> true]) !!}
                          <div class="modal-body">
                            <div class="box-body">
                              <div class="form-group row">
                                  {{ Form::label('libelle', 'LIBELLE') }}
                                  {{ Form::text('libelle', null, array('class'=> 'form-control')) }}
                              </div>
                            </div>

                            <div classs="col-md-4 aside-right">
                              
                            </div> 
                          </div>
                          <div class="modal-footer">
                            {{ Form::submit('Enregister', array('class'=> 'btn btn-primary btn-sm'))}}
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                          </div>
                          {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
           
                  <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>LIBELLE</th>
                            <th class="align-center action_categorie">Action</th>
                          </tr>
                        </thead>

                      @forelse ($resultats as $result)
                        <tr>
                          <td>{{$result->libelle}}</td>
                          <td class="align-center action-button">
                            <form action="{{ route('pizza.categorie.destroy',$result->id) }}" method="POST">
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

  </div>
        
@endsection

