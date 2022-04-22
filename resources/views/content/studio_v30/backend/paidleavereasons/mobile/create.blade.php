@extends('template.'.$template.'.form')

@section('title', $panel_name)

@section('content')     
    <form action="{{ route($content.'.store') }}" method="POST">
        @csrf

        <div class="card mb-3">
            <div class="card-header">
                Form {!!$panel_name!!}
            </div>
            <div class="card-body">
                  
                <x-studio_v30.div-form-group />      
                    <x-html.label-form title="Reason" />
                    <div class="col-8">
                        <input
                            type    = "text" 
                            class   = "form-control form-control-lg  @error('nama') is-invalid @enderror"   
                            name    = "nama"> 

                            @error('nama')
                                <div class="invalid-feedback" >
                                    {{ $message }}
                                </div> 
                            @enderror  
  
                    </div>            
                </div>
 
                
            </div>
        </div>
        <x-studio_v30.button-submit/>
    </form>

@endsection