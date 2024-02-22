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
                    Sản phẩm
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

                    <div class="position-relative row form-group">
                        <label for="" class="col-md-3 text-md-right col-form-label">Hình ảnh</label>
                        <div class="col-md-9 col-xl-8">
                            <ul class="text-nowrap overflow-auto" id="images">
                                @foreach($product->images as $item)
                                    <li class="d-inline-block mr-1" style="position: relative;">
                                        <img style="height: 100px;" src="{{$item->image}}"
                                            alt="Image">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="brand_id"
                            class="col-md-3 text-md-right col-form-label">Nhãn hiệu</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{$product->brand->name}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="product_category_id"
                            class="col-md-3 text-md-right col-form-label">Phân loại</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{$product->category->name}}</p>
                        </div>
                    </div>
                
                    <div class="position-relative row form-group">
                        <label for="name" class="col-md-3 text-md-right col-form-label">Tên sản phẩm</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{$product->name}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="price"
                            class="col-md-3 text-md-right col-form-label">Giá</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{number_format($product->price)}}đ</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="qty"
                            class="col-md-3 text-md-right col-form-label">Số lượng</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{$product->productItems->sum('quantity')}}</p>
                        </div>
                    </div>
                    
                    <div class="position-relative row form-group">
                        <label for="Product code"
                            class="col-md-3 text-md-right col-form-label">Mã sản phẩm</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{$product->product_code}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="featured"
                            class="col-md-3 text-md-right col-form-label">Hiển thị</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{ $product->featured == 1 ? 'Có' : 'Không' }}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="description"
                            class="col-md-3 text-md-right col-form-label">Mô tả</label>
                        <div class="col-md-9 col-xl-8">
                            <p>>{!!$product->description!!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection