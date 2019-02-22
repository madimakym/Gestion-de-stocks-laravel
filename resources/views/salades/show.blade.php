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

            <div class="blc-button">
                <a class="btn btn-primary btn-sm" href="{{ route('salades.index') }}"><i class="fas fa-chevron-left"></i>  Retour</a>
            </div>

            <section class="content">
              <div class="row">
                  <div class="col-md-8">
                      <div class="box box-info">
                          <div class="box box-solid">
                                  <div class="box-body">
                                    <dl>
                                      <dt>Libelle:</dt>
                                      <dd>{{ $product->libelle}}</dd>
                                      <dt>Description:</dt>
                                      <dd>{{ $product->description}}</dd>
                                      <dt>Prix:</dt>
                                      <dd>{{ $product->prix}}</dd>
                                      </dl>
                                  </div>
                                </div>
                      </div>
                  </div>  
                  
                  <div class="col-md-4">
                          <div class="box box-success">
                          <div class="box-header">
                              <dt class="box-title">Visuel</dt>
                          </div>
                              <br> 
                              {{-- <img src="public/{{$product->image }}" class="img-thumbnail img-center" width="100%"> --}}
                              <img src="{{url('images', $product->image)}}" class="img-thumbnail img-center" width="100%"/> 
                              <br>
                          </div> 
                  </div>
              
              </div>
            </section>
  
  </div>
        
@endsection

