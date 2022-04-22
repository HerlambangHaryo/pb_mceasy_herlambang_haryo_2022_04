@extends('template.'.$template.'.form')

@section('title', $panel_name)

@section('content')     

    <x-studio_v30.alert-delete-data/>  

    <form action="{{ route($content.'.destroy', $Paidleavereason->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <div class="card mb-3">
            <div class="card-header">
                Form {!!$panel_name!!}
            </div>
            <div class="card-body">
                  
                <x-studio_v30.div-form-group />      
                    <x-html.label-form title="Paid Leave" />
                    <div class="col-5"> 
                        <input 
                            type    = "text" 
                            class   = "form-control form-control-lg  @error('nama') is-invalid @enderror" 
                            value   = "{{ old('title', $Paidleavereason->nama) }}" 
                            > 

                            @error('nama')
                                <div class="invalid-feedback" >
                                    {{ $message }}
                                </div> 
                            @enderror   

                        <input 
                            type    = "text" 
                            class   = "form-control form-control-lg  invisible" 
                            value   = "{{ old('title', $Paidleavereason->nama) }}" 
                            name    = "nama">  
                    </div>            
                </div>
 
                
            </div>
        </div>
        <x-studio_v30.button-submit/>
    </form>

@endsection