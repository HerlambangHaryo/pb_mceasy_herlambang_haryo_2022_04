@extends('template.'.$template.'.form')

@section('title', $panel_name)

@section('content')     

    <x-studio_v30.alert-delete-data/>  

    <form action="{{ route($content.'.destroy', $Employee->id) }}" method="POST">
        @csrf
        @method('DELETE')

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
                            value   = "{{ old('title', $Employee->nama) }}" 
                            name    = "nama" disabled/> 

                            @error('nama')
                                <div class="invalid-feedback" >
                                    {{ $message }}
                                </div> 
                            @enderror   
                    </div>            
                </div>

                <x-studio_v30.div-form-group />      
                    <x-html.label-form title="Tanggal Lahir" />
                    <div class="col-8">
                        <input
                            type    = "date" 
                            class   = "form-control form-control-lg  @error('tanggal_lahir') is-invalid @enderror"  
                            value   = "{{ old('title', $Employee->tanggal_lahir) }}"  
                            name    = "tanggal_lahir" disabled/>  

                            @error('tanggal_lahir')
                                <div class="invalid-feedback" >
                                    {{ $message }}
                                </div> 
                            @enderror  
  
                    </div>            
                </div>

                <x-studio_v30.div-form-group />      
                    <x-html.label-form title="Alamat" />
                    <div class="col-8">
                        <input
                            type    = "text" 
                            class   = "form-control form-control-lg  @error('alamat') is-invalid @enderror" 
                            value   = "{{ old('title', $Employee->alamat) }}"    
                            name    = "alamat" disabled/>  

                            @error('alamat')
                                <div class="invalid-feedback" >
                                    {{ $message }}
                                </div> 
                            @enderror  
  
                    </div>            
                </div>

                <x-studio_v30.div-form-group />      
                    <x-html.label-form title="Kota" />
                    <div class="col-8">
                        <input
                            type    = "text" 
                            class   = "form-control form-control-lg  @error('kota') is-invalid @enderror" 
                            value   = "{{ old('title', $Employee->kota) }}"      
                            name    = "kota" disabled/>  

                            @error('kota')
                                <div class="invalid-feedback" >
                                    {{ $message }}
                                </div> 
                            @enderror  
  
                    </div>            
                </div>

                <x-studio_v30.div-form-group />      
                    <x-html.label-form title="Tanggal Bergabung" />
                    <div class="col-8">
                        <input
                            type    = "date" 
                            class   = "form-control form-control-lg  @error('tanggal_bergabung') is-invalid @enderror"
                            value   = "{{ old('title', $Employee->tanggal_bergabung) }}"      
                            name    = "tanggal_bergabung" disabled/>  

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