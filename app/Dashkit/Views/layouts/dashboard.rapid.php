<!DOCTYPE html>
<html lang="en" class="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr" dir="ltr" data-pc-theme_contrast="" data-pc-theme="light">
<!-- [Head] start -->

<head>
    {{partial('layouts.component.dashboard.head')}}
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg fixed inset-0 bg-white dark:bg-themedark-cardbg z-[1034]">
        <div class="loader-track h-[5px] w-full inline-block absolute overflow-hidden top-0">
            <div class="loader-fill w-[300px] h-[5px] bg-primary-500 absolute top-0 left-0 transition-[transform_0.2s_linear] origin-left animate-[2.1s_cubic-bezier(0.65,0.815,0.735,0.395)_0s_infinite_normal_none_running_loader-animate]"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ Sidebar Menu ] start -->
    {{partial('layouts.component.dashboard.sidebar')}}
    <!-- [ Sidebar Menu ] end -->
    <!-- [ Header Topbar ] start -->
    {{partial('layouts.component.dashboard.header')}}
    {{partial('layouts.component.dashboard.offcanvas')}}
    <!-- [ Header ] end -->
    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ Main Content ] start -->
            <div class="grid grid-cols-12 gap-x-6">
                {{content|raw}}
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->

    {{partial('layouts.component.dashboard.footer')}}
    {{partial('layouts.component.dashboard.script')}}
    <div class="floting-button fixed bottom-[50px] right-[30px] z-[1030]">
        <a href="https://1.envato.market/zNkqj6" class="btn btn-danger buynowlinks animate-[btn-floating_2s_infinite] max-sm:p-[13px] max-sm:rounded-full inline-flex items-center gap-2" data-pc-toggle="tooltip" data-pc-title="Buy Now">
            <i class="ph-duotone ph-shopping-cart text-lg leading-none"></i>
            <span class="hidden sm:inline-block">Buy Now</span>
        </a>
    </div>
</body>
<!-- [Body] end -->

</html>