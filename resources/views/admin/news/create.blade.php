@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div style="font-weight: bold" class="card-header">
            Insert News
        </div>
            <div class="card-body">
                <form action="/admin/news/create" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail</label>
                        <input type="file"  name="thumbnail" id="thumbnail" class=" form-control-file">
                        @error('thumbnail')  
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Judul Berita</label>
                        <input type="text"  name="title" id="title" class=" form-control">
                        @error('title')  
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" autocomplete="off" class="form-control"  id="description" style="height: 100px">
                        </textarea>
                        @error('description')  
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary" style="float: right;">Save</button>
                    
                </form>
            </div>
    </div>
@endsection