@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All News</h4>
                    <h6 class="card-subtitle">BURSA KERJA KHUSUS.<code>SMK NEGERI 1 JENANGAN</code></h6>
                    <hr>
                    <a href="/admin/news/create"><button class="btn btn-primary mt-1">Insert News</button></a>
                    <div class="table-responsive">
                        <table class="table user-table no-wrap">
                            <thead>
                                <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">Options</th>
                                <th class="border-top-0">Thumbnail</th>
                                <th class="border-top-0">Judul Berita</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($news as $key => $nw)
                                <tr>
                                    <td>{{ $news->firstItem() +$key }}</td>
                                    <td>
                                        <a href="{{ route('admin.news.edit', $nw->id) }}"><button class="btn btn-success"><i class="fas fa-edit"></i></button></a>
                                        <a href="/admin/news/{{ $nw->slug }}"><button class="btn btn-primary"><i class="fas fa-info"></i></button></a>
                                        
                                        <button hidden>
                                        <form action="/admin/{{ $nw->slug }}/delete" method="post">
                                          @csrf
                                          @method("delete")
                                          <button class="btn btn-danger" onclick="return confirm('APAKAH YAKIN?')" class="btn btn-link dropdown-item " type="submit"><i class="fas fa-trash"></i></button>
                                        </form>
                                      </button>
                                    </td>
                                    <td><img src="{{ asset('Storage/'.$nw->thumbnail) }}" alt="" width="70"></td>
                                    <td>{{ Str::limit($nw->title, 30) }}</td>
                                </tr>
                                
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
@endsection