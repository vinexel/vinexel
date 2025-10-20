<!DOCTYPE html>
<html lang="en">

<!-- HEAD (CSS INCLUDE) -->
{{partial('layouts.component.frontend.head')}}

<body>

    <!-- NAVBAR/HEADER -->
    {{partial('layouts.component.frontend.navbar')}}


    <!-- MAIN CONTENT START -->
    <main>
        {{content|raw}}
    </main>
    <!-- MAIN CONTENT END -->


    <!-- FOOTER -->
    {{partial('layouts.component.frontend.footer')}}


    <!-- OFF-CANVAS -->
    {{partial('layouts.component.frontend.offcanvas')}}


    <!-- COOKIE -->
    {{partial('layouts.component.frontend.cookie')}}


    <!-- JS FILE & SCRIPT -->
    {{partial('layouts.component.frontend.script')}}

</body>

</html>