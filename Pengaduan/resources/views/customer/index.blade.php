@include('customer.layout.header')
    <!-- Main Menu area End-->
    <!-- Start Status area -->
    
    <!-- End Status area-->
    <!-- Start Sale Statistic area-->
   
    <!-- Main Menu area End-->
	<!-- Breadcomb area Start-->
	<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="notika-icon notika-windows"></i>
									</div>
									<div class="breadcomb-ctn">
										<h1>PENGADUAN FORM USER</h1>
										<!-- <p>Welcome to user table i guess <span class="bread-ntd"></span></p> -->
                                        
                                        
                                        <h2>Selamat datang, {{ session('email') }}!</h2>
                                        <a href="{{ route('pengaduan.saya') }}" class="btn btn-success notika-btn-success">Pengaduan Saya</a>
                                        
                                        
									</div>
								</div>
							</div>
                            
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
								</div>
							</div>
                            
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->
    <!-- Normal Table area Start-->
        <!-- Main Menu area End-->

    <!-- Form Element area Start-->
    <div class="form-element-area ">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-8 ">
                    <div class="form-element-list tengah">
                        <!-- <div class="basic-tb-hd">
                            <h2>Silahkan </h2>
                            <p>Text Inputs with different sizes by height and column.</p>
                        </div> -->
                        <div class="cmp-tb-hd bcs-hd">
                            <h2 class="text-success">Pengaduan</h2>
                            <h2>
                                
                            </h2>
                            <p>Mohon di-isi dengan benar.</p>
                        </div>
                        <div class="row">
                            <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-mail"></i>
                                    </div>

                                    <div class="nk-int-st">
                                        <select class="form-control" name="no_meja" required>
                                            <option value="" disabled selected>
                                                Pilih No. Meja
                                            </option>
                                            @for ($i = 1; $i <= 10; $i++)
                                                <option value="{{ $i }}">
                                                    Meja {{ $i }}
                                                </option>
                                            @endfor
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email', Auth::user()->email) }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name', Auth::user()->name) }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="number" name="no_tp" class="form-control" placeholder="No. Telepon" value="{{ old('no_tp', Auth::user()->no_tp) }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-edit"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <textarea class="form-control" name="deskripsi" rows="5" placeholder="Tuliskan keluhan anda..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-mail"></i>
                                    </div>

                                    <div class="nk-int-st">
                                        <select class="form-control" name="kategori" required>
                                            <option value="" disabled selected>
                                                Pilih kategori pengaduan
                                            </option>
                                            @foreach ($kategoris as $kategori)
                                                <option value="{{ $kategori->id_kategori }}">
                                                    {{ $kategori->nama_kategori }}
                                                </option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-mail"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="file"
                                            class="form-control"
                                            name="foto">
                                    </div>
                                </div>
                            </div>
                            <!-- <input type="hidden" class="form-control" name="user_id" value=""> -->
                            
                            
                                       
                        </div>
                        <button class="btn btn-success notika-btn-success" type="submit">Kirim</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Normal Table area End-->
    <!-- Start Footer area-->
    <!-- End Realtime sts area-->
    <!-- Start Footer area-->
@include('customer.layout.footer')    