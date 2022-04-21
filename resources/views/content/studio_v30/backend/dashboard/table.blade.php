@extends('template.'.$template.'.datatable')

@section('title', $panel_name)

@section('content')      
    
    <div class="row mb-2">
        @forelse ($data as $row)     
            <div class="col-6 col-md-3 mb-2">
                <div class="card">
                    <div class="card-body">  
                        <small>
                            <a  href="{{route('Maps.Leagues', $row->name)}}" 
                                class="text-decoration-none text-white">

                                <i class="flag-icon flag-icon-{{ strtolower($row->league_country_code) }} " 
                                    title="{{ strtolower($row->league_country_code) }}" 
                                    id="{{ strtolower($row->league_country_code) }}"
                                ></i>
                                &nbsp;
                                {{ $row->name }}
                            </a> 
                        </small>
                    </div>  
                </div>
            </div>
            @empty 
                
        @endforelse  
    </div>   

@endsection