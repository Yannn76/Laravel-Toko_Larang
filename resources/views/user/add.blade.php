@extends('template.index')

@section('title', 'User')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <form action="/users/{{ @$data->id }}" method="POST" enctype="multipart/form-data">
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Input User</h3>
                </div>
                <!-- /.card-header -->
  
                  @if (@$data)
                      @method('PUT')
                  @endif
  
                  @csrf
                  <div class="card-body">
  
                  </div>
                  <div class="form-group">
                    <label for="id" >ID</label>
                    <input type="text" class="form-control" placeholder="ID" name="id" value="{{ @$data->id }}">
                  </div>  
                  <div class="form-group">
                    <label for="name" >Nama</label>
                    <input type="text" class="form-control" placeholder="Nama" name="name" value="{{ @$data->name}}">
                  </div>   
                  <div class="form-group">
                    <label for="email" >Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ @$data->email }}">
               
                  <div class="form-group">
                    <label for="password" >Password</label>
                    <select type="password" class="form-control"  name="password" value="{{ @$data->password }}">
                  </div>

                  <div class="form-group">
                    <label for="level" >Level</label>
                    <select class="custom-select rounded0"  name="level">
                        <option value="1" {{ @$data->level == 2 ? 'selected' : ''}}>Admin</option>
                        <option value="0" {{ @$data->level == 1 ? 'selected' : ''}}>Kasir</option>
                        <option value="0" {{ @$data->level == 0 ? 'selected' : ''}}>Blokir</option>
                    </select>
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