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
                    <x-html.label-form title="Nama" />
                    <div class="col-5">
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
 
                <x-studio_v30.div-form-group />      
                    <x-html.label-form title="Tanggal Lahir" />
                    <div class="col-3">
                        <input
                            type    = "date" 
                            class   = "form-control form-control-lg  @error('tanggal_lahir') is-invalid @enderror"   
                            name    = "tanggal_lahir"> 

                            @error('tanggal_lahir')
                                <div class="invalid-feedback" >
                                    {{ $message }}
                                </div> 
                            @enderror  
  
                    </div>            
                </div>

                <x-studio_v30.div-form-group />      
                    <x-html.label-form title="Alamat" />
                    <div class="col-5">
                        <input
                            type    = "text" 
                            class   = "form-control form-control-lg  @error('alamat') is-invalid @enderror"   
                            name    = "alamat"> 

                            @error('alamat')
                                <div class="invalid-feedback" >
                                    {{ $message }}
                                </div> 
                            @enderror  
  
                    </div>            
                </div>

                <x-studio_v30.div-form-group />      
                    <x-html.label-form title="Kota" />
                    <div class="col-5">
                        <input
                            type    = "text" 
                            class   = "form-control form-control-lg  @error('kota') is-invalid @enderror"   
                            name    = "kota"> 

                            @error('kota')
                                <div class="invalid-feedback" >
                                    {{ $message }}
                                </div> 
                            @enderror  
  
                    </div>            
                </div>

                <x-studio_v30.div-form-group />      
                    <x-html.label-form title="Tanggal Bergabung" />
                    <div class="col-3">
                        <input
                            type    = "date" 
                            class   = "form-control form-control-lg  @error('tanggal_bergabung') is-invalid @enderror"   
                            name    = "tanggal_bergabung"> 

                            @error('tanggal_bergabung')
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