@include('petugas.layout.header')
<div class="form-element-area">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list tengah">
                        <!-- <div class="basic-tb-hd">
                            <h2>Silahkan </h2>
                            <p>Text Inputs with different sizes by height and column.</p>
                        </div> -->
                        <div class="cmp-tb-hd bcs-hd">
                            <h2>TRANSAKSI</h2>
                            <p>Mohon data kendaraan yang akan masuk dengan benar!</p>
                        </div>
                        <div class="row">
                            <form action="{{ route('transaksi.store') }}" method="POST">
                            @csrf
                            
                            <input type="hidden" value="-" name="waktu_keluar">
                            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-edit"></i>
                                    </div>
                                        <div class="nk-int-st">
                                            <select class="form-control" name="id_kendaraan">
                                                <option value="" disabled>-- Pemilik Kendaraan --</option>
                                                @forelse ($kendaraan as $kendaraans)
                                                    <option value="{{ $kendaraans->id_kendaraan }}">{{ $kendaraans->pemilik }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-edit"></i>
                                    </div>
                                        <div class="nk-int-st">
                                            <select class="form-control" name="id_tarif">
                                                <option disabled>-- Tarif Per Jam --</option>
                                                @forelse ($tarif as $tarifs)
                                                    <option value="{{ $tarifs->id_tarif }}">{{ $tarifs->jenis_kendaraan }} (Rp.{{ $tarifs->tarif_per_jam }})</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-edit"></i>
                                    </div>
                                        <div class="nk-int-st">
                                            <select class="form-control" name="status">
                                                <option disabled>-- Status Kendaraan --</option>
                                                
                                                    <option value="Keluar">Keluar</option>
                                                    <option value="Masuk">Masuk</option>
                                                    <option value="Batal">Batal</option>
                                                
                                            </select>
                                        </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-edit"></i>
                                    </div>
                                        <div class="nk-int-st">
                                            <select class="form-control" name="id_area">
                                                <option disabled>-- Area Parkir --</option>
                                                @forelse ($area as $areas)
                                                    <option value="{{ $areas->id_area }}">{{ $areas->nama_area }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                </div>
                            </div>
                                       
                        </div>
                        <button class="btn btn-success notika-btn-success" type="submit">Buat Sekarang</button>
                        </form> 
                        <a href="{{ route('transaksi.create') }}" class="kiri">Data Kendaraan tidak ada?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="normal-table-area">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list mg-t-30">
                        <!-- <div class="basic-tb-hd">
                            <h2>Hover Row</h2>
                            <p>Enable a hover state (<code>.table-hover</code>) on table rows within a tbody</p>
                        </div> -->
                        <div class="bsc-tbl-hvr table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id Parkir</th>
                                        <th>Id Kendaraan</th>
                                        <th>Waktu Masuk</th>
                                        <th>Waktu Keluar</th>
                                        <th>Id Tarif</th>
                                        <th>Durasi Jam</th>
                                        <th>Biaya Total</th>
                                        <th>Id Area</th>
                                        <th>Status</th>
                                        <th>Di catat oleh</th>
                                        <th colspan="2">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transaksi as $w)
                                    <tr>
                                        <td>{{ $w->id_parkir }}</td>
                                        <td>{{ $w->id_kendaraan }}</td>
                                        <td>{{ $w->waktu_masuk }}</td>
                                        <td>{{ $w->waktu_keluar }}</td>
                                        <td>{{ $w->id_tarif }}</td>
                                        <td>{{ $w->durasi_jam }}</td>
                                        <td>{{ $w->biaya_total }}</td>
                                        <td>{{ $w->id_area }}</td>
                                        <td><p @if($w->status == "Keluar") class="keluar" @elseif($w->status == "Masuk") class="masuk" @else class="batal" @endif>{{ $w->status }}</p></td>
                                        <td>{{ $w->id_user }}</td>
                                        <td>
                                            <a href="{{ route('transaksi.edit', $w->id_parkir) }}" class="btn btn-info">
                                                Update
                                            </a>
                                                
                                            
                                        </td>
                                        <td>
                                            <form action="" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td>Cheese</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
    <!-- Form Element area End-->
    <!-- Datepicker area Start-->
    
    <!-- Dropzone area End-->
    <!-- Start Footer area-->
@include('petugas.layout.footer')