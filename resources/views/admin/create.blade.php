@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Tambah Pegawai
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <form class="form-horizontal" action="{{route('dashboard/input')}}" method="POST">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Nomor Induk Pegawai</label>
                  <div class="col-sm-10">
                    <input name="nik" type="text" class="form-control" id="bobot" placeholder="Nomor Induk Pegawai">
                  </div>
                </div>
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input name="nama_lengkap" type="text" class="form-control" id="bobot" placeholder="nama lengkap">
                  </div>
                </div>
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="background: white!important;" 
                          name="jenis_kelamin" required>
                          <option value="Pria">Pria</option>
                          <option value="Wanita">Wanita</option>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Agama</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="background: white!important;" 
                          name="agama" required>
                          <option value="Islam">Islam</option>
                          <option value="Katholik">Katholik</option>
                          <option value="Kristen">Kristen</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Budha">Budha</option>
                          <option value="Konghucu">Konghucu</option>
                  </select>
                  </div>
                </div>                        
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input name="tempat_lahir" type="text" class="form-control" id="bobot" placeholder="tempat lahir">
                  </div>
                </div>
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Tgl Lahir</label>
                  <div class="col-sm-10">
                    <input name="tanggal_lahir" type="date" class="form-control" id="bobot">
                  </div>
                </div>
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Status Nikah</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="background: white!important;" 
                          name="status_nikah" required>
                          <option value="Menikah">Menikah</option>
                          <option value="Belum Menikah">Belum Menikah</option>
                  </select>
                  </div>
                </div>

                <div class="form-group" hidden="true">
                  <label for="bobot" class="col-sm-2 control-label">Masa Kerja</label>
                  <div class="col-sm-10">
                    <input name="masa_kerja" value="1" type="number" class="form-control" id="bobot" placeholder="nama lengkap">
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Masa Kerja</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="background: white!important;" 
                          name="masa_kerja" required>
                      @foreach($masa as $item)
                          <option value="{{$item->id}}">{{$item->masakerja}}</option>
                      @endforeach
                  </select>
                  </div>
                </div> -->

                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Status Pegawai</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="background: white!important;" 
                          name="status_pegawai" required>
                      @foreach($pegawai as $item)
                          <option value="{{$item->id}}">{{$item->status}}</option>
                      @endforeach
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Jabatan Struktural</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="background: white!important;" 
                          name="jabatan_struktural" required>
                      @foreach($jabatan as $item)
                          <option value="{{$item->id}}">{{$item->jabatan}}</option>
                      @endforeach
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Tunjangan Lain</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="background: white!important;" 
                          name="tunjangan_lain" required>
                      @foreach($tunjangan as $item)
                          <option value="{{$item->id}}">{{$item->tunjangan}}</option>
                      @endforeach
                  </select>
                  </div>
                </div>                
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Kelompok</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="background: white!important;" 
                          name="kel_pekerjaan" required>
                      @foreach($kelompok as $item)
                          <option value="{{$item->id}}">{{$item->kelompok}}</option>
                      @endforeach
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nilai" class="col-sm-2 control-label">Tgl Masuk</label>
                  <div class="col-sm-10">
                    <input name="tanggal_masuk" type="date" class="form-control" id="nilai">
                  </div>
                </div>
                <div class="form-group">
                  <label for="nilai" class="col-sm-2 control-label">Tgl Diangkat</label>
                  <div class="col-sm-10">
                    <input name="tanggal_diangkat" type="date" class="form-control" id="nilai">
                  </div>
                </div>
                <div class="form-group">
                  <label for="nilai" class="col-sm-2 control-label">No KTP</label>
                  <div class="col-sm-10">
                    <input name="no_ktp" type="number" class="form-control" id="nilai" placeholder="no ktp">
                  </div>
                </div>
                <div class="form-group">
                  <label for="nilai" class="col-sm-2 control-label">No bpjs kesehatan</label>
                  <div class="col-sm-10">
                    <input name="no_bpjs_kes" type="number" class="form-control" id="nilai" placeholder="bpjs kesehatan">
                  </div>
                </div>
                <div class="form-group">
                  <label for="nilai" class="col-sm-2 control-label">No bpjs ketenagakerjaan</label>
                  <div class="col-sm-10">
                    <input name="no_bpjs_ketenag" type="number" class="form-control" id="nilai" placeholder="bpjs ketenagakerjaan">
                  </div>
                </div>
                <div class="form-group">
                  <label for="nilai" class="col-sm-2 control-label">No KK</label>
                  <div class="col-sm-10">
                    <input name="no_kk" type="number" class="form-control" id="nilai" placeholder="No KK">
                  </div>
                </div>
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Tingkat Pendidikan</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="background: white!important;" 
                          name="tingkat_pendidikan" required>
                      @foreach($pendidikan as $item)
                          <option value="{{$item->id}}">{{$item->pendidikan}}</option>
                      @endforeach
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Pengalaman Kerja</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="background: white!important;" 
                          name="pengalaman_kerja" required>
                      @foreach($pengalaman as $item)
                          <option value="{{$item->id}}">{{$item->pengalaman}}</option>
                      @endforeach
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">PKWT</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="background: white!important;" 
                          name="pkwt" required>
                      @foreach($pkwt as $item)
                          <option value="{{$item->id}}">{{$item->nama}}</option>
                      @endforeach
                  </select>
                  </div>
                </div>
              </div>
              <!-- /.box-footer -->
           
              </div>
              <div class="modal-footer">
                
                <a href="{{route('dashboard')}}" type="button" class="btn btn-default float-right">
                                Batal
                              </a>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
              </form>

          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
     
    </section>
    <!-- /.content -->
    @endsection