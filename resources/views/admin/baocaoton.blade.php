@extends('admin.admin')

@section('title')
Dashboard | DANH SÁCH BÁO CÁO
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">DANH SÁCH SẢN PHẨM </h4>
					<button type="button" class="btn btn-info" data-toggle="#" data-target="#exampleModal" data-whatever="@getbootstrap">In báo cáo</button>
				<div class="input-group no-border">
                <input id="myInput" type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
				@if (session('status'))
                        <div class="alert alert-success" role="alert" >
                            {{ session('status') }}
                          {{-- 	<button   type="submit" rel="tooltip"  class="flex-row-reverse btn btn-danger btn-sm btn-icon navbar-right" >
											<i class="now-ui-icons ui-1_simple-remove"></i>
										</button> --}}
                        </div>
                    @endif

				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">NHẬP SẢN PHẨM</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								
							</div>
							<div class="modal-body has-success">
								<form action="addsanpham" method="POST">
									{{ csrf_field() }}
									{{ method_field('POST') }}
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Tên sản phẩm :</label>
										<input type="text" class="form-control" name="tensanpham" id="recipient-name">
									</div>
									
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Nhà cung cấp :</label>
										<input type="text" class="form-control" name="ncc" id="recipient-email">
									</div>
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Thông tin :</label>
										<input type="text" class="form-control" name="thongtin" id="recipient-pass">
									</div>
									
								
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
								<button type="submit" class="btn btn-primary">Thêm</button>
							</div>
							</form>
						</div>
					</div>
				</div>

			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead class=" text-primary ">
						
							<th class="text-center"> STT </th>
							<th> Tên sản phẩm</th>
							<th> Đã Bán </th>
                            <th> Tồn</th>
                            <th> Tổng tiền</th>
                            <th> Lãi</th>
							<th class="text-center">Tác vụ</th>
						</thead>
							<tbody >
								@php
						$count = 1;
						@endphp
						@foreach ($baocaoton as $row)
						<tr>
							<td class="text-center">{{$index++ }}</td>
							<td>{{ $row->tensp}}</td>
							<td>{{ $row->soluongxuat}}</td>
							<td id = "value" > 
                               
                            </td>
                            
							<td class="td-actions text-center">
								<a href="#">
									
									<button type="button" rel="tooltip" class="btn btn-success btn-sm btn-icon " data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Sửa sản phẩm" data-target="#acc{{$row->id}}" data-whatever="@getbootstrap"><i class="now-ui-icons business_badge"></i></button>
								</a>

								<div class="modal fade" id="acc{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Sửa thông tin sản phảm</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>

											<div class="modal-body has-success">
												<form action="update-sanpham/{{ $row->id}}" method="POST">
													{{ csrf_field() }}
													{{ method_field('PUT') }}
													
													<fieldset disabled>
														<div class="form-group">
														  <label for="disabledTextInput">Mã sản phẩm</label>
														  <input type="text" id="disabledTextInput" class="form-control"  name="xeid" value="{{ $row->id}}" >
														</div>
													</fieldset>
													<div class="form-group">
														<label for="recipient-name" class="col-form-label" style=" text-right:none!important">Tên sản phẩm :</label>
														<input type="text" class="form-control" name="tensanpham" id="recipient-name" value="{{ $row -> tensp}}">
													</div>
													<div class="form-group">
														<label for="recipient-phone" class="col-form-label">Nhà Cung cấp:</label>
														<input type="text" class="form-control" name="ncc" id="recipient-phone" value="{{ $row -> ncc}}">
													</div>

													<div class="form-group">
														<label for="recipient-email" class="col-form-label">Thông tin sp:</label>
														<input type="text" class="form-control" name="thongtin" id="recipient-email" value="{{ $row -> thongtin}}">
													</div>
													

												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
													<button type="submit" class="btn btn-primary">Cập nhật</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>


							


							<a>
								<form action="delete-sanpham/{{ $row->id }}" method="POST" class="btn btn-sm btn-icon">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button   type="submit" rel="tooltip"  class="btn btn-danger btn-sm btn-icon" >
										<i class="now-ui-icons ui-1_simple-remove"></i>
									</button>
								</form>
							</a>
							</td>
							<tr>
						@endforeach
						
							</tbody>
							
						</table>
					</div>
					<div class="row">
						<div class="col-12 d-flex justify-content-center">
							{{ $baocaoton->links() }}
						</div>
					</div>
					</table>
				</div>
			</div>
		</div>
	</div>
	
@endsection


@section('scripts')
<script>
    var x = {{ $row->soluongnhap}}
    var y = {{ $row->soluongxuat}}
    var z = x - y 
    $('#value').html(z);
</script>
@endsection