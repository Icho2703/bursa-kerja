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
                    <h4 class="card-title">All Professions</h4>
                    <h6 class="card-subtitle">BURSA KERJA KHUSUS.<code>SMK NEGERI 1 JENANGAN</code></h6>
                    <hr>
                    <a href="/admin/create"><button class="btn btn-primary mt-1">Insert Professions</button></a>
                    <div class="table-responsive">
                        <table class="table user-table no-wrap">
                            <thead>
                                
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">Options</th>
                                <th class="border-top-0">Thumbnail</th>
                                <th class="border-top-0">Nama Pekerjaan</th>
                                <th class="border-top-0">Nama Perusahaan</th>
                                    <th class="border-top-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($professions as $key => $pr)
                                <tr>
                                    <td>{{ $professions->firstItem() +$key }}</td>
                                    <td>
                                        <a href="/admin/{{ $pr->slug }}/edit"><button class="btn btn-success"><i class="fas fa-edit"></i></button></a>
                                        <a href="/admin/{{ $pr->slug }}"><button class="btn btn-primary"><i class="fas fa-info"></i></button></a>
                                        
                                        <button hidden>
                                        <form action="/admin/{{ $pr->slug }}/delete" method="post">
                                          @csrf
                                          @method("delete")
                                          <button class="btn btn-danger" onclick="return confirm('APAKAH YAKIN?')" class="btn btn-link dropdown-item " type="submit"><i class="fas fa-trash"></i></button>
                                        </form>
                                      </button>
                                      </td>
                                      <td><img src="{{ asset('Storage/'.$pr->thumbnail) }}" alt="" width="70"></td>
                                      <td>{{ $pr->name }}</td>
                                      <td>{{ $pr->company }}</td>
                                      <td>
                                          @if ($pr->statuse == 1)
                                            <div class="alert alert-danger" role="alert">
                                                not yet published
                                            </div>
                                            @else
                                            <div class="alert alert-success" role="alert">
                                                published
                                            </div>
                                          @endif
                                      </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">{{ $professions->links() }}</div>
                            <div class="col-md-4"></div>
                        </div>
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