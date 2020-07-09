@extends('layouts.master')

@section('content')
<section class="content-header">
      @if(session('sukses'))
      <div class="alert alert-success" role="alert">
        {{session('sukses')}}
      </div>
      @endif
      <h1>
        Data Bobot
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
<!-- /.box-header -->
            <div class="box-body">
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modal-default">
                Tambah Data
              </button>
              <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Bobot</h4>
              </div>
              <div class="modal-body">
              <form class="form-horizontal" action="{{route('bobot/create')}}" method="POST">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Nama Bobot</label>
                  <div class="col-sm-10">
                    <input name="bobot" type="text" class="form-control" id="bobot" placeholder="Bobot">
                  </div>
                </div>
                <div class="form-group">
                  <label for="nilai" class="col-sm-2 control-label">Nilai</label>
                  <div class="col-sm-10">
                    <input name="nilai" type="double" class="form-control" id="nilai" placeholder="0">
                  </div>
                </div>
              </div>
              <!-- /.box-footer -->
           
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default float-right" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Bobot</th>
                  <th>Nilai</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dataBobot as $didik)
                <tr>
                <td>{{$didik->id}}</td>
                <td>{{$didik->bobot}}</td>
                <td>{{$didik->nilai}}</td>
                <td>
                <div class="btn-group">
                  <!-- <button type="button" class="btn btn-default">Action</button> -->
                  <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{route('bobot/edit', ['id'=>$didik->id])}}">Edit</a></li>
                    <!-- <li><a href="#">Delete</a></li> -->
                  </ul>
                </div>
                </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
     
    </section>
    <!-- /.content -->
    @endsection