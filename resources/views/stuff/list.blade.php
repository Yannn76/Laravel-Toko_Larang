@extends('template.index')

@section('title', 'Stuff')

@section('content')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Barang</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              
            @if (session('mess'))
              <div class="card card-default">
                 <div class="card-header">
                     <h3 class="card-title">{{session('mess') }}</h3>

                     <div class="card-tools">
                          <button type="button" class="btn-tool" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                          </button>
                          <button type="button" class="btn-tool" data-card-widget="remove">
                              <i class="fas fa-times"></i>
                          </button>    
                     </div>
                 </div>
              </div>
            @endif
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Barang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-black">
                  <thead>
                   <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Satuan</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th></th>
                   </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $row)
                    <tr>
                        <td>{{ $row ->id}}</td>
                        <td>
                          <img style="width: 200px; heigth:auto;" src="{{ $row->image }}">
                        </td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->price }}</td>
                        <td>{{ $row->unit }}</td>
                        <td>{{ @$row->category->name }}</td>
                        <td>{{ $row->status == 1 ? 'Aktif' : 'Tidak' }}</td>
                        <td>
                            <a href="/stuffs/{{ $row->id }}">
                               <button type="button" class="btn btn-warning btn-sm">
                                  <i class="far fa-edit"></i>
                               </button>
                            </a>
                            <form action="/stuffs/{{ $row->id }}" method="POST">
                               @csrf
                               @method('DELETE')
                               <button type="submit" class="btn btn-danger btn-sm">
                                  <i class="far fa-trash-alt"></i>
                               </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach  
                  
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection