@extends('admin.layout.master')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    Đơn hàng
                    <div class="page-title-subheading">
                    Xem, Thêm, Sửa, Xóa và Quản lý.
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body display_data">

                    <div class="table-responsive">
                        <h2 class="text-center">Danh sách sản phẩm</h2>
                        <hr>
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th class="text-center">Màu sắc</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Size</th>
                                    <th class="text-center">Đơn giá</th>
                                    <th class="text-center">Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->products as $item)
                                <tr>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="widget-content-left">
                                                        <img style="height: 60px;"
                                                            data-toggle="tooltip" title="Image"
                                                            data-placement="bottom"
                                                            src="{{$item->images->shift()->image}}" alt="">
                                                    </div>
                                                </div>
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">{{$item->pivot->name}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        {{$item->pivot->color}}
                                    </td>
                                    <td class="text-center">
                                        {{$item->pivot->quantity}}
                                    </td>
                                    <td class="text-center">
                                        {{$item->pivot->size}}
                                    </td>
                                    <td class="text-center">{{number_format($item->pivot->price)}}đ</td>
                                    <td class="text-center">
                                        {{number_format($item->pivot->price * $item->pivot->quantity)}}đ
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>



                    <h2 class="text-center mt-5">Thông tin đơn hàng</h2>
                        <hr>
                    <div class="position-relative row form-group">
                        <label for="name" class="col-md-3 text-md-right col-form-label">
                            Tên
                        </label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{$order->name}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="email" class="col-md-3 text-md-right col-form-label">Email</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{$order->email}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="phone" class="col-md-3 text-md-right col-form-label">Số điện thoại</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{$order->phone}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="address" class="col-md-3 text-md-right col-form-label">
                            Địa chỉ</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{$order->address}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="address" class="col-md-3 text-md-right col-form-label">
                            Tình trạng</label>
                        <div class="col-md-9 col-xl-8">
                            @if ($order->status === 0)
                                <p>Hủy</p>
                            @elseif ($order->status === 1)
                                <p>Hoàn trả</p>
                            @elseif ($order->status === 2)
                                <p>Chờ</p>
                            @elseif ($order->status === 3)
                                <p>Đang xử lý</p>
                            @else
                                <p>Đã vận chuyển</p>
                            @endif
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="address" class="col-md-3 text-md-right col-form-label">
                            Hình thức thanh toán</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{$order->payment == 1 ? 'VNPay' : 'COD'}}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection