@extends('template.index')

@section('title', 'Category')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Kategori</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <form action="/categories/{{ $data->id }}" method="POST" enctype="multipart/form-data">
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Input Kategori</h3>
              </div>
              <!-- /.card-header -->
                
                @if (@$data)
                    @method('PUT')
                @endif
                
                @csrf
                <div class="card-body">
              
                  <div class="form-group">
                     <label for="id">Kode</label>
                     <input type="text" class="form-control" placeholder="Kode" name="id" value="{{ @$data->id}}">
                  </div>  
                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" placeholder="Nama" name="name" value="{{ @$data->nama }}">
                  </div>   
                  <div class="form-group">
                    <label for="exampleSelectRounded0">Status</label>
                    <select name="status" class="custom-select rounded0">
                        <option value="1" {{ @$data->status == 1 ? 'selected' : ''}}>Aktif</option>
                        <option value="0" {{ @$data->status == 0 ? 'selected' : ''}}>Tidak Aktif</option>
                    </select>
                  </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button> 
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
    </form>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Kategori</h3>
              </div>
              <!-- /.card-header -->
              <form action="/categories/{{ @$data->id }}" method="POST">
                
                @if (@$data)
                    @method('PUT')
                @endif
                
                @csrf
                <div class="card-body">
              
                  <div class="form-group">
                     <label for="id">Kode</label>
                     <input type="text" class="form-control" placeholder="Kode" name="id" value="{{ @$data->id}}">
                  </div>  
                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" placeholder="Nama" name="name" value="{{ @$data->nama }}">
                  </div>   
                  <div class="form-group">
                    <label for="status">Status</label>
                    <input type="integer" class="form-control" placeholder="Status" name="status" value="{{ @$data->status }}">
                  </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button> 
                </div>   
            
              </form>
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