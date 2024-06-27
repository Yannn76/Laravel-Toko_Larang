@extends('template.index')

@section('title', 'Stuff')

@section('content')

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

    <form action="/stuffs/{{ @$data->id }}" method="POST" enctype="multipart/form-data">
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Input Barang</h3>
                </div>
            
  
                  @if (@$data)
                     @method('PUT')
                  @endif
  
                  @csrf
                  <div class="card-body">
                    
                    <div class="form-group">
                       <label for="id">ID</label>
                       <input type="text" class="form-control" placeholder="Kode" name="id" value="{{ @$data->id}}">
                    </div>  
                    <div class="form-group">
                      <label for="name">Nama</label>
                      <input type="text" class="form-control" placeholder="Nama" name="name" value="{{ @$data->nama }}">
                    </div>   
                    <div class="form-group">
                      <label for="price">Harga</label>
                      <input type="double" class="form-control" placeholder="Harga" name="price" value="{{ @$data->price }}">
                    </div>
                    <div class="form-group">
                      <label for="unit">Unit</label>
                      <input type="text" class="form-control" placeholder="Unit" name="unit" value="{{ @$data->unit }}">
                    </div>
                    <div class="form-group">
                      <label for="id_category">Kategori</label>
                      <select class="custom-select rounded0" name="id_category">
                         @foreach ($categories as $item)
                            <option value="{{ $item->id }}" 
                              {{ @$data->id_category == $item->id ? 'selected' : '' }}>
                              {{ $item->name }}</option>
                             
                         @endforeach
                      </select>
                    </div>
                  
                    <div class="form-group">
                      <label for="form-group" class="form-label">Status</label>
                      <select name="status" class="custom-select rounded-0">
                         <option value="1"{{ @$data->status == 1 ? 'selected' : ''}}>Aktif</option>
                         <option value="0"{{ @$data->status == 0 ? 'selected' : ''}}>Tidak Aktif</option>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->







@endsection