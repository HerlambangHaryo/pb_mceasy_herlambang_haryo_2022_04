@extends('template.'.$template.'.datatable')

@section('title', $panel_name)

@section('content')      
    
    <div class="row mb-2">
        @forelse ($data as $row)     
            <div class="col-6 col-md-3 mb-2">
                <div class="card">
                    <div class="card-body">  
                        <small> 
                        </small>
                    </div>  
                </div>
            </div>
            @empty 
                
        @endforelse  
    </div>   

@endsection