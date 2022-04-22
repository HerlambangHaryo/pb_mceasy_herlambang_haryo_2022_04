@extends('template.'.$template.'.datatable')

@section('title', $panel_name)

@section('content')      
    
    @if(session()->has('Success')) 
        <x-studio_v30.alert-success/>  
    @endif
 
    <div id="datatable" class=" ">
        <div class="card">
            <div class="card-header">
                Data {!!$panel_name!!}
            </div>
            <div class="card-body"> 
                <div class="row mb-3">     
                    <div class="col-12  pull-right">        
                        <x-studio_v30.a-green-right 
                            link="{{ route($content.'.create') }}" 
                            icon="fa-solid fa-plus" 
                            title="Create"
                        />  
                    </div>
                    

                <div class="row mt-2">    
                    <div class="col-12 table-responsive">  
                        <table id="datatableDefault" class="table table-striped table-bordered  ">
                            <thead class="table-light">
                                <tr>              
                                    <x-html.th-first/>   
                                    <x-html.th-content title="No. Induk" />
                                    <x-html.th-content title="Nama" />
                                    <x-html.th-content title="Alamat" />
                                    <x-html.th-content title="Tangal Lahir" />
                                    <x-html.th-content title="Tangal Bergabung" />
                                    <x-html.th-last/>
                                </tr>
                            </thead>
                            <tbody>   

                                @forelse ($data as $row)
                                    <tr>
                                        <td>
                                            {{ $row->id }}
                                        </td>
                                        <td class="text-center">
                                            {{ $row->nomor_induk }}
                                        </td>
                                        <td class="text-center">
                                            {{ $row->nama }}
                                        </td>
                                        <td class="text-center">
                                            {{ $row->alamat }},
                                            {{ $row->kota }}
                                        </td>
                                        <td class="text-center">
                                            {{ $row->tanggal_lahir }}
                                        </td>
                                        <td class="text-center">
                                            {{ $row->tanggal_bergabung }}
                                        </td>
                                        <td>
                                            
                                            <div class="btn-group btn-group-sm">
                                                <a type="button" 
                                                    href="{{ route($content.'.edit', $row->id) }}" 

                                                    class="btn btn-default">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                                <a type="button" 
                                                    href="{{ route($content.'.show', $row->id) }}" 

                                                    class="btn btn-danger">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </a> 
                                            </div>
                                        </td>
                                    </tr>
                                    @empty 
                                        
                                @endforelse     
                            </tbody>
                        </table>   
                    </div>
                </div>
            </div>            
        </div>
    </div>

@endsection