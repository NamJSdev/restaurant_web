@extends('layouts.app')
@section('title', 'Thực đơn theo cơ sở')

@section('content')
    <!-- Menu Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
                <h1 class="mb-5">Thực đơn tại các chi nhánh hôm nay</h1>
            </div>
            {{-- @php
            // Tính số thứ tự bắt đầu của bản ghi đầu tiên trên trang hiện tại
            $startIndex = ($datas->currentPage() - 1) * $datas->perPage() + 1;
            @endphp --}}
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                    @foreach ($groupedMenus as $branchId => $menus)
                        @php
                            $branch = $menus->first()->branch;
                        @endphp
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 {{ $loop->first ? 'ms-0 pb-3 active' : 'pb-3' }}"
                                data-bs-toggle="pill" href="#tab-{{ $branchId }}">
                                <i class="fa fa-store fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Chi nhánh</small>
                                    <h6 class="mt-n1 mb-0">{{ $branch->LOCATION ?? 'Chi nhánh ' . $branchId }}</h6>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach ($groupedMenus as $branchId => $menus)
                        <div id="tab-{{ $branchId }}" class="tab-pane fade {{ $loop->first ? 'show active' : '' }} p-0">
                            <div class="row g-4">
                                @foreach ($menus as $menu)
                                    @php
                                        $dish = $menu->dish; // Lấy đối tượng Dish
                                        $imagePath = !empty($dish->DISHIMAGE)
                                            ? $dish->DISHIMAGE
                                            : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=80&q=80';
                                    @endphp

                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid rounded" src="{{ $imagePath }}"
                                                alt="{{ $dish->DISHNAME }}"
                                                style="width: 80px; height: 80px; object-fit: cover;">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2 mb-1">
                                                    <span>{{ $dish->DISHNAME }}</span>
                                                    <span
                                                        class="text-primary">{{ number_format($dish->BASEPRICE, 0, ',', '.') . ' VNĐ'}}</span>
                                                </h5>
                                                <small class="fst-italic text-truncate" style="max-width: 100%;">
                                                    {{ $dish->DISHDESCRIPTION }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>
        </div>
    </div>
    <!-- Menu End -->
@endsection
