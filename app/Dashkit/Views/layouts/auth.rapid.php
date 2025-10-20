<!DOCTYPE html>
<html lang="en" class="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr" dir="ltr" data-pc-theme_contrast="" data-pc-theme="light">
<!-- [Head] start -->
<head>
    {{partial('layouts.component.auth.head')}}
</head>
<!-- [Head] end -->

<!-- [Body] Start -->
<body>
    <!-- [ Pre-loader ] start -->
    {{partial('layouts.component.auth.preloader')}}
    <!-- [ Pre-loader ] End -->
    {{content|raw}}
    <!-- [ Main Content ] end -->
    {{partial('layouts.component.auth.script')}}
</body>
<!-- [Body] end -->
</html>