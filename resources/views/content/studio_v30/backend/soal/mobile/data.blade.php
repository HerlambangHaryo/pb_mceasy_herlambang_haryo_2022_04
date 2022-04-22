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
                                    <x-html.th-content title="Soal" />
                                    <x-html.th-content title="Status" /> 
                                </tr>
                            </thead>
                            <tbody>   
 
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td class=" ">
                                            Buatlah website untuk add, delete, insert, dan edit data karyawan dan tipe cuti (programming language bebas)
                                        </td>
                                        <td>
                                            Done
                                            <br/>
                                            
                                            <div class="btn-group btn-group-sm">
                                                <a type="button" 
                                                    href="{{ route('Paidleave.index') }}"

                                                    class="btn btn-default">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a> 
                                            </div>
                                        </td>
                                    </tr> 


                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td class=" ">
                                            Tampilkan 3 karyawan yang pertama kali bergabung
                                        </td>
                                        <td>
                                            Done
                                            <br/>
                                            
                                            <div class="btn-group btn-group-sm">
                                                <a type="button" 
                                                    href="{{ route('Employees.Jawabannodua') }}" 

                                                    class="btn btn-default">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a> 
                                            </div>
                                        </td>
                                    </tr> 

                                    <tr>
                                        <td>
                                            3
                                        </td>
                                        <td class=" ">
                                            Menampilkan daftar karyawan yang saat ini pernah mengambil cuti. 
                                            <br/>
                                            Daftar berisikan (nomor_induk, nama, tanggal_cuti dan keterangan)
                                        </td>
                                        <td>
                                            Done
                                            <br/>
                                            
                                            <div class="btn-group btn-group-sm">
                                                <a type="button" 
                                                    href="{{ route('Paidleave.index') }}" 

                                                    class="btn btn-default">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a> 
                                            </div>
                                        </td>
                                    </tr> 

                                    <tr>
                                        <td>
                                            4
                                        </td>
                                        <td class=" ">
                                            Menampilkan daftar karyawan yang saat ini pernah mengambil cuti lebih dari satu kali. 
                                            <br/>
                                            Daftar berisikan (nomor_induk, nama, tanggal_cuti dan keterangan)
                                        </td>
                                        <td>
                                            Done
                                            <br/>
                                            
                                            <div class="btn-group btn-group-sm">
                                                <a type="button"
                                                    href="{{ route('Paidleave.Jawabannoempat') }}"

                                                    class="btn btn-default">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a> 
                                            </div>
                                        </td>
                                    </tr> 

                                    <tr>
                                        <td>
                                            5
                                        </td>
                                        <td class=" ">
                                            Aturan cuti adalah setiap tahun dapat 12 hari, dan bisa di akumulasi sebanyak apapun, dan harus dihitung otomatis dari tanggal bergabung 
                                        </td>
                                        <td>
                                            Done
                                            <br/>
                                            -
                                        </td>
                                    </tr> 

                                    <tr>
                                        <td>
                                            6
                                        </td>
                                        <td class=" ">
                                            Buatlah tampilan semenarik mungkin dan se-userfriendly mungkin 
                                        </td>
                                        <td>
                                            - 
                                        </td>
                                    </tr> 

                                    <tr>
                                        <td>
                                            7
                                        </td>
                                        <td class=" ">
                                            Jika ada yang kurang jelas, bisa buat asumsi sendiri, dengan catatan bahwa semua asumsi dituliskan dalam penyerahan submission test
                                        </td>
                                        <td>
                                            - 
                                        </td>
                                    </tr> 

                                    <tr>
                                        <td>
                                            8
                                        </td>
                                        <td class=" ">
                                            Solusi harus bisa dijelaskan dan dipertanggung-jawabkan dalam User Interview
                                        </td>
                                        <td>
                                            - 
                                        </td>
                                    </tr> 
                                            
                            </tbody>
                        </table>   
                    </div>
                </div>
            </div>            
        </div>
    </div>

@endsection