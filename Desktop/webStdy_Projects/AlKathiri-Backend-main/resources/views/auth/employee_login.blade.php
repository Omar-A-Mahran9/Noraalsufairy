<!DOCTYPE html>
<html lang="{{ getLocale() }}" direction="{{ isArabic() ? 'rtl' : 'ltr' }}" style="direction:{{ getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<!--begin::Head-->
<head><base href="../../../">
    <title>{{ __('Alkethiri - Dashboard') }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <link rel="shortcut icon" type="image/gif" sizes="16x16" href="{{ settings()->get('favicon') ? getImagePathFromDirectory( settings()->get('favicon') , "Settings") : asset('favicon.png') }}" />

    <!--begin::Fonts-->
    @if ( isArabic() )
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @else
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;900&display=swap" rel="stylesheet">
    @endif
    <!--end::Fonts-->

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('dashboard-assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{  asset('dashboard-assets/css/style'  . '.bundle' . ( isArabic() ? '.rtl' : '' ) . '.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <style>

    </style>
</head>
<!--end::Head-->
<!--begin::Body-->
<body class="bg-dark">
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url('{{ asset('dashboard-assets/media/illustrations/sketchy-1/14-dark.png') }}')">
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <!--begin::Wrapper-->
            <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                <!--begin::Logo-->
                <a href="/" class="mb-6 d-flex justify-content-center">
                    <img alt="Logo" src="{{ asset('dashboard-assets/media/logos/alkethiri-logo.svg') }}" class="h-40px" />
                </a>
                <!--end::Logo-->
                <!--begin::Form-->
                <form class="form w-100 ajax-form" action="{{ route('employee.login') }}" novalidate="novalidate" method="POST" id="submitted-form" data-redirection-url="{{ route('dashboard.index') }}">
                    @csrf
                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">{{ __('Sign In to Alkethiri') }}</h1>
                        <!--end::Title-->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="form-label fs-6 fw-bolder text-dark">{{ __('Email') }}</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off" />
                        <p class="invalid-feedback" id="email"></p>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="form-label fs-6 fw-bolder text-dark">{{ __('Password') }}</label>
                        <!--end::Label-->
                        <!--begin::Input wrapper-->
                        <div class="position-relative mb-3" data-kt-password-meter="true">
                            <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" id="password_inp" />
                            <!--begin::Visibility toggle-->
                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                data-kt-password-meter-control="visibility">
                                <i class="bi bi-eye-slash fs-2"></i>

                                <i class="bi bi-eye fs-2 d-none"></i>
                            </span>
                            <!--end::Visibility toggle-->
                        </div>
                        <!--end::Input wrapper-->
                        <p class="invalid-feedback" id="password"></p>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                        <label class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" name="remember_me" value="1"/>
                            <span class="form-check-label">
                                {{ __('Remeber me ?') }}
                            </span>
                        </label>
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <!--begin::Submit button-->

                        <button type="submit" id="submit-btn" class="btn btn-lg btn-primary w-100 mb-5" disabled data-kt-indicator="on">
                            <span class="indicator-label">
                                {{ __('Sign In') }}
                            </span>

                            <span class="indicator-progress">
                            {{ __('Please wait ...') }} <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>

                        </button>
                        <!--end::Submit button-->
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
        <!--begin::Footer-->
        <div class="d-flex flex-center flex-column-auto p-10">
            <!--begin::Links-->
            <div class="d-flex align-items-center fw-bold fs-6">
                <a href="https://webstdy.com/{{ getLocale() }}" target="_blank" class="text-muted text-hover-primary px-2">
                    {{ __('Developed By') }}  <img class="mx-4" src="https://webstdy.com/CDN/cr.png"  >
                </a>
            </div>
            <!--end::Links-->
        </div>
        <!--end::Footer-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>
<!--end::Root-->
<!--end::Main-->

<!--begin::Javascript-->
<script>
    let currency = " {{ __(settings()->get('currency')) }} ";
    let locale = "{{ getLocale() }}";
</script>
<script src="{{ asset('dashboard-assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('dashboard-assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('js/dashboard/translations.js') }}"></script>
<script src="{{ asset('js/dashboard/global_scripts.js') }}"></script>
<!--end::Javascript-->
<script>

    $(document).ready(function () {
        $("#submit-btn").prop('disabled', false);
        $("#submit-btn").attr('data-kt-indicator', '');

        window['onAjaxSuccess'] = (status, response) => {
            console.log(response.url, response);
            window.location = response.url;
        }
    });
</script>
</body>
<!--end::Body-->
</html>
