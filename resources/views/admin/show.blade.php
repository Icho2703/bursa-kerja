@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <img style="max-width: 600px; max-height: 600px"  src="{{ asset('Storage/'.$professions->thumbnail) }}"  alt="...">
                            <table class="table table-sm mt-4">
                                <tr>
                                  <th scope="col">Nama Pekerjaan </th>
                                  <td> : {{ $professions->name }}</td>
                                </tr>
                                <tr>
                                  <th scope="col">Nama Perusahaan</th>
                                  <td> : {{ $professions->company }}</td>
                                </tr>
                                <tr>
                                  <th scope="col">Persyaratan</th>
                                  <td> : {{ $professions->requirtmen }}</td>
                                </tr>
                                <tr>
                                  <th scope="col">Deskripsi</th>
                                  <td> : {{ $professions->about }}</td>
                                </tr>
                                <tr>
                                  <th scope="col">Hubungi</th>
                                  <td> : {{ $professions->contactperson }}</td>
                                </tr>
                            </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            {{--  content  --}}
        </div>
    </div>
    
</div>
@endsection