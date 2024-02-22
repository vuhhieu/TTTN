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

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Khách hàng</th>
                                <th class="text-center">Địa chỉ</th>
                                <th class="text-center">Số điện thoại</th>
                                <th class="text-center">Hình thức thanh toán</th>
                                <th class="text-center">Tình trạng</th>
                                <th class="text-center">Tổng hóa đơn</th>
                                <th class="text-right">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td class="text-center text-muted">#{{$order->id}}</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="widget-content-left">
                                                        <img style="height: 60px;"
                                                            data-toggle="tooltip" title="Image"
                                                            data-placement="bottom"
                                                            src="assets/images/_default-product.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">{{$order->name}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        {{$order->address}}
                                    </td>
                                    <td class="text-center">
                                        {{$order->phone}}
                                    </td>
                                    <td class="text-center">
                                        
                                        {{ $order->payment == 1 ? 'VNPay' : 'COD'}}
                                    </td>
                                    @if($order->status == 0)
                                        <td class="text-center"><span class="status cancel">Hủy</span></td>
                                        @elseif($order->status == 1)
                                        <td class="text-center"><span class="status return">Hoàn trả</span></td>
                                        @elseif($order->status == 2)
                                        <td class="text-center"><span class="status pending">Chờ</span></td>
                                        @elseif($order->status == 3)
                                        <td class="text-center"><span class="status inprogress">Đang xử lý</span></td>
                                        @else
                                        <td class="text-center"><span class="status delivered">Đã vận chuyển</span></td>
                                        @endif
                                    <td class="text-center">{{number_format($order->total_price)}}đ</td>
                                    <td class="justify-content-end d-flex">
                                        @if($order->status === 2)
                                            <form action="{{route('order.confirm', $order)}}" method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-hover-shine btn-outline-info border-0 btn-sm">
                                                    Confirm
                                                </button>
                                            </form>
                                        @endif()

                                        <a href="{{route('order.show', $order)}}"
                                            class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                            Chi tiết
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-block card-footer">
                    <nav role="navigation" aria-label="Pagination Navigation"
                        class="flex items-center justify-between">
                        <div class="flex justify-between flex-1 sm:hidden">
                            <span
                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                « Previous
                            </span>

                            <a href="#page=2"
                                class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                Next »
                            </a>
                        </div>

                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm text-gray-700 leading-5">
                                    Hiển thị từ
                                    <span class="font-medium">{{ $orders->firstItem() }}</span>
                                    đến
                                    <span class="font-medium">{{ $orders->count()}}</span>
                                    trong
                                    <span class="font-medium">{{$orders->total()}}</span>
                                    Kết quả
                                </p>
                            </div>
                            <div>
                                {{ $orders->links() }}
                            </div>
                        </div>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection