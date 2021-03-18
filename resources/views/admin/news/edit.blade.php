@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div style="font-weight: bold" class="card-header">
            Insert News
        </div>
            <div class="card-body">
                <form action="{{ route('admin.news.edit', $news->id) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail</label>
                        <p><img src="{{ asset('Storage/'.$news->thumbnail) }}" alt="" width="100"></p>
                        <input type="file" value="{{ asset('Storage/'.$news->thumbnail) }}" name="thumbnail" id="thumbnail" class=" form-control-file">

                        @error('thumbnail')  
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Judul Berita</label>
                        <input type="text"  name="title" id="title" value="{{ $news->title }}" class=" form-control">
                        @error('title')  
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" autocomplete="off" value="" class="form-control"  id="description" style="height: 100px">
                            {{ $news->description }}
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