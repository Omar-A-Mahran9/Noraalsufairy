@extends('partials.dashboard.master')
@section('content')

    <!-- begin :: Subheader -->
    <div class="toolbar">

        <div class="container-fluid d-flex flex-stack">

            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                <!-- begin :: Title -->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.services.index') }}"
                    class="text-muted text-hover-primary">{{ __("Services") }}</a></h1>
                <!-- end   :: Title -->

                <!-- begin :: Separator -->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!-- end   :: Separator -->

                <!-- begin :: Breadcrumb -->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!-- begin :: Item -->
                    <li class="breadcrumb-item text-muted">
                        {{ __("service data") }}
                    </li>
                    <!-- end   :: Item -->
                </ul>
                <!-- end   :: Breadcrumb -->

            </div>

        </div>

    </div>
    <!-- end   :: Subheader -->

    <div class="card">
        <!-- begin :: Card body -->
        <div class="card-body p-0">
            <!-- begin :: Form -->

            <!-- begin :: Card header -->
            <div class="card-header d-flex align-items-center">
                <div class="card-title">
                    <h3 class="fw-bolder text-dark">{{ __("service data") . ' : ' . $service->name }}</h3>
                </div>
                <div class="card-title">
                    <div class="form-check form-switch form-check-custom form-check-solid mb-2">
                        <label class="fs-5 fw-bold mt-1">{{ __("active") }} ?</label>
                        <input class="form-check-input mx-2" style="height: 28px;width:60px;" type="checkbox" name="" id="active-checkbox" @if ( $service['active'] ) checked @endif disabled/>
                        <label class="form-check-label" for="active-checkbox"></label>
                    </div>
                </div>
            </div>
            <!-- end   :: Card header -->

            <!-- begin :: Inputs wrapper -->
            <div class="inputs-wrapper">

                <!-- begin :: Row -->
                <div class="row mb-10">

                    <!-- begin :: Column -->
                    <div class="col-md-12 fv-row d-flex justify-content-center">

                        <div class="d-flex flex-column">
                            <!-- begin :: Upload image component -->
                            <label class="text-center fw-bold mb-4">{{ __("Image") }}</label>
                            <x-dashboard.upload-image-inp name="image" :image="$service->image" directory="Services" placeholder="default.jpg" type="show" ></x-dashboard.upload-image-inp>
                            <p class="invalid-feedback" id="image" ></p>
                            <!-- end   :: Upload image component -->
                        </div>


                    </div>
                    <!-- end   :: Column -->

                </div>
                <!-- end   :: Row -->

                <!-- begin :: Row -->
                <div class="row mb-10">

                    <!-- begin :: Column -->
                    <div class="col-md-6 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Name in arabic") }}</label>
                        <input type="text" class="form-control"  value="{{ $service['name_ar'] }}" readonly />

                    </div>
                    <!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-6 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Name in english") }}</label>
                        <input type="text" class="form-control"  value="{{ $service['name_en'] }}"  readonly />


                    </div>
                    <!-- end   :: Column -->

                </div>
                <!-- end   :: Row -->


                <!-- begin :: Row -->
                <div class="row mb-10">

                    <!-- begin :: Column -->
                    <div class="col-md-6 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Description in arabic") }}</label>
                        <textarea class="form-control" rows="5" readonly>{{ strip_tags($service->description_ar) }}</textarea>

                    </div>
                    <!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-6 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Description in english") }}</label>
                        <textarea class="form-control" rows="5" readonly>{{ strip_tags($service->description_en) }}</textarea>

                    </div>
                    <!-- end   :: Column -->

                </div>
                <!-- end   :: Row -->


            </div>
            <!-- end   :: Inputs wrapper -->


            <!-- begin :: Form footer -->
            <div class="form-footer">

                <!-- begin :: Submit btn -->
                <a href="{{ route('dashboard.services.index') }}" class="btn btn-primary" >

                    <span class="indicator-label">{{ __("Back") }}</span>

                </a>
                <!-- end   :: Submit btn -->

            </div>
            <!-- end   :: Form footer -->
            <!-- end   :: Form -->
        </div>
        <!-- end   :: Card body -->
    </div>

@endsection
