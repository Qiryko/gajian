@extends('layouts.master')

@section('content')
<section class="content-header">
      @if(session('sukses'))
      <div class="alert alert-success" role="alert">
        {{session('sukses')}}
      </div>
      @endif
      <h1>
        Data Tunjangan Lain
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
                <h4 class="modal-title">Tambah Data Tunjangan Lain</h4>
              </div>
              <div class="modal-body">
              <form class="form-horizontal" action="{{route('tunjangan/create')}}" method="POST">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="tunjangan" class="col-sm-2 control-label">Tunjangan</label>
                  <div class="col-sm-10">
                    <input name="tunjangan" type="text" class="form-control" id="tunjangan" placeholder="Tunjangan">
                  </div>
                </div>
                <div class="form-group">
                  <label for="jumlah" class="col-sm-2 control-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input name="jumlah" type="double" class="form-control" id="jumlah" placeholder="0">
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
                  <th>Tunjangan</th>
                  <th>Jumlah</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dataTunjangan as $didik)
                <tr>
                <td>{{$didik->id}}</td>
                <td>{{$didik->tunjangan}}</td>
                <td>{{$didik->jumlah}}</td>
                <td>
                <div class="btn-group">
                  <!-- <button type="button" class="btn btn-default">Action</button> -->
                  <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{route('tunjangan/edit', ['id'=>$didik->id])}}">Edit</a></li>
                    <li><a href="{{route('tunjangan/destroy', ['id'=>$didik->id])}}">Delete</a></li>
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