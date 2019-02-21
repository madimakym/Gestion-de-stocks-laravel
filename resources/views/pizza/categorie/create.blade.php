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

            @if ($errors->any())
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p class="alert-heading">Whoops!!</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif


            <div class="blc-button">
                <a class="btn btn-primary btn-sm" href="{{ route('salades.index') }}"><i class="fas fa-chevron-left"></i>  Retour</a>
            </div>

            <section class="content">
              <div class="row">
                  <div class="col-md-8">
                    <div class="box box-info">
                            <div class="box box-solid">
                             {!! Form::open(['route' => 'salades.store', 'method'=> 'post', 'files'=> true]) !!}
                                <div class="box-body">
                                        <div class="form-group">
                                            {{ Form::label('libelle', 'Libelle') }}
                                            {{ Form::text('libelle', null, array('class'=> 'form-control')) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('description', 'Description') }}
                                            {{ Form::text('description', null, array('class'=> 'form-control')) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('prix', 'Prix') }}
                                            {{ Form::text('prix', null, array('class'=> 'form-control')) }}
                                        </div>
                                    
                                        <div class="form-group">
                                            {{ Form::label('image', 'Visuel') }}
                                            {{ Form::file('image', array('class'=> 'form-control')) }}
                                        </div> 
                                </div>
                                <div classs="col-md-4 aside-right">
                                    {{ Form::submit('Enregister', array('class'=> 'btn btn-primary btn-sm'))}}
                                </div> 
                                {!! Form::close() !!}
                            </div>
                        </div>
                  </div>  
                  
                  {{-- <div class="col-md-4">
                          <div class="box box-success">
                          <div class="box-header">
                              <dt class="box-title">Visuel</dt>
                          </div>
                              <br> 
                              <img src="{{url('images', $product->image)}}" class="img-thumbnail img-center" width="100%"/> <br>
                          </div> 
                  </div> --}}
              
              </div>
            </section>
  
  </div>
        
@endsection

