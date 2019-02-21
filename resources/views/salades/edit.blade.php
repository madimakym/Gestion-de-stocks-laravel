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
                             {!! Form::open(['route' => ['salades.update',$product->id], 'method'=> 'PATCH', 'files'=> true]) !!}
                                <div class="box-body">
                                        <div class="form-group">
                                            {{ Form::label('libelle', 'Libelle') }}
                                            {{ Form::text('libelle', $product->libelle, array('class'=> 'form-control'))}}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('description', 'Description') }}
                                            {{ Form::text('description', $product->description, array('class'=> 'form-control'))}}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('prix', 'Prix')}}
                                            {{ Form::text('prix', $product->prix, array('class'=> 'form-control'))}}
                                        </div>
                                    
                                        <div class="form-group">
                                            {{ Form::label('image', 'Visuel') }}
                                            {{ Form::file('image', array('class'=> 'form-control')) }}
                                        </div> 

                                        {{ Form::text('old_image', $product->image, array('class'=> 'hidden'))}}

                                </div>
                                <div classs="col-md-4 aside-right">
                                    {{ Form::submit('Modifier', array('class'=> 'btn btn-primary btn-sm'))}}
                                </div> 
                                {!! Form::close() !!}
                            </div>
                        </div>
                  </div>  
                  
                  <div class="col-md-4">
                          <div class="box box-success">
                          <div class="box-header">
                              <dt class="box-title">Visuel</dt>
                          </div>
                              <br> 
                              <img src="{{url('images', $product->image)}}" class="img-thumbnail img-center" width="100%"/> <br>
                          </div> 
                  </div>
              
              </div>
            </section>
  
  </div>
        
@endsection

