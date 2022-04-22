@extends('template.'.$template.'.form')

@section('title', $panel_name)

@section('content')     
    <form action="{{ route($content.'.update', $Paidleave->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card mb-3">
            <div class="card-header">
                Form {!!$panel_name!!}
            </div>
            <div class="card-body">
                   
                
                <x-studio_v30.div-form-group />      
                    <x-html.label-form title="Nomor Induk" />
                    <div class="col-8">
                        <input
                            type    = "text" 
                            class   = "form-control form-control-lg  @error('nomor_induk') is-invalid @enderror"   
                            value   = "{{ $model_Employee->nomor_induk }}" 
                            disabled/>  

                            @error('nomor_induk')
                                <div class="invalid-feedback" >
                                    {{ $message }}
                                </div> 
                            @enderror  
  
                    </div>            
                </div>

                <x-studio_v30.div-form-group />      
                    <x-html.label-form title="Nama" />
                    <div class="col-8">
                        <input
                            type    = "text" 
                            class   = "form-control form-control-lg   "   
                            value   = "{{ $model_Employee->nama }}"
                            disabled/> 
 
  
                    </div>            
                </div>

                <x-studio_v30.div-form-group />      
                    <x-html.label-form title="Sisa Akumulasi" />
                    <div class="col-8">
                        <input
                            type    = "text" 
                            class   = "form-control form-control-lg   "   
                            value   = "{{ $model_Employee->akumulasi_cuti }} Hari"
                            disabled/> 
  
                    </div>            
                </div>


                <x-studio_v30.div-form-group />      
                    <x-html.label-form title="Tanggal Awal" />
                    <div class="col-8">
                        <input
                            type    = "date" 
                            class   = "form-control form-control-lg  @error('tanggal_awal') is-invalid @enderror" 
                            value   = "{{ old('title', $Paidleave->tanggal_awal) }}"   
                            name    = "tanggal_awal"> 

                            @error('tanggal_awal')
                                <div class="invalid-feedback" >
                                    {{ $message }}
                                </div> 
                            @enderror  
  
                    </div>            
                </div>
 
                <x-studio_v30.div-form-group />      
                    <x-html.label-form title="Tanggal Akhir" />
                    <div class="col-8">
                        <input
                            type    = "date" 
                            class   = "form-control form-control-lg  @error('tanggal_akhir') is-invalid @enderror" 
                            value   = "{{ old('title', $Paidleave->tanggal_akhir) }}"   
                            name    = "tanggal_akhir"> 

                            @error('tanggal_akhir')
                                <div class="invalid-feedback" >
                                    {{ $message }}
                                </div> 
                            @enderror  
  
                    </div>            
                </div>

                <x-studio_v30.div-form-group />      
                    <x-html.label-form title="Reason" />
                    <div class="col-8"> 

                            <select class="form-select form-control-lg" name="paidleavereason_id" disabled>
                                    <option value="">
                                        Pilih Alasan
                                    </option>
                                @foreach($model_Paidleavereason as $row )
                                    <option value="{{ $row->id }}"
                                        @if($row->id == $Paidleave->paidleavereason_id)
                                            selected
                                        @endif

                                        >
                                        {{ $row->nama }}
                                    </option> 
                                @endforeach
                            </select>

                            @error('paidleavereason_id')
                                <div class="invalid-feedback" >
                                    {{ $message }}
                                </div> 
                            @enderror  
  
                    </div>            
                </div>

                <x-studio_v30.div-form-group />      
                    <x-html.label-form title="Keterangan" />
                    <div class="col-8">
                        <input
                            type    = "text" 
                            class   = "form-control form-control-lg  @error('keterangan') is-invalid @enderror"  
                            value   = "{{ old('title', $Paidleave->keterangan) }}"  
                            name    = "keterangan"> 

                            @error('keterangan')
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