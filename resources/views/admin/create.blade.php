@extends('admin.layouts.app')

@section('content')
<h1>INI PROFESI ADMIN</h1>
<div class="card">
    <div style="font-weight: bold" class="card-header">
        Edit Lowongan
    </div>
    <div class="card-body">
        <form action="/admin/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="user_id">User</label>
                        <input type="text" disabled value="{{  auth()->user()->name }}"  name="user_id[]" id="user_id"  class=" form-control">
                        @error('user_id')  
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail</label>
                        <input type="file"  name="thumbnail" id="thumbnail" class=" form-control-file">
                        @error('thumbnail')  
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Pekerjaan</label>
                        <input type="text" name="name" autocomplete="off"  id="name" class=" form-control">
                        @error('name')  
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="company">Nama Perusahaan</label>
                        <input type="text" name="company" autocomplete="off"  id="company" class=" form-control">
                        @error('company')  
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="owner">Pemilik Perusahaan</label>
                        <input type="text" name="owner" autocomplete="off"  id="owner"  class=" form-control">
                        @error('owner')  
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="requirtmen">Persayaratan</label>
                        <textarea name="requirtmen" autocomplete="off" class="form-control"  id="requirtmen" style="height: 100px">
                        </textarea>
                        @error('requirtmen')  
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="about">Deskripsi Lowongan</label>
                        <textarea name="about" autocomplete="off" class="form-control"  id="about" style="height: 100px">
                        </textarea>
                        @error('about')  
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="contactperson">Hubungi</label>
                        {{--  <input name="contactperson" class="form-control col-md-4" type="text" placeholder="Disabled input" value="{{ Auth::user()->name }}" disabled>  --}}
                        <input type="text" name="contactperson" autocomplete="off" id="contactperson" class=" form-control">
                        @error('contactperson')  
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group" >
                        <label for="statuse">Status</label>
                        <select class="form-select" aria-label="Default select example" name="statuse">
                            <option value="1">Not yet published</option>
                            <option value="2">Published</option>
                          </select>
                        @error('statuse')  
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
          

            <button type="submit" class="btn btn-primary float-left">Simpan</button>
            
        </form>
    </div>
</div>
@endsection