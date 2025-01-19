
<!DOCTYPE html>
<html lang="en">
    <head>
        {{-- head  --}}
        @include('frontend.inc.head')
    </head>
    <body id="page-top">
        <!-- Navigation-->
        @include('frontend.inc.nav')

        <!-- Header-->
        @include('frontend.widgets.header')

        <!-- Portfolio Section-->
        @include('frontend.widgets.portfolio')

        <!-- About Section-->
        @include('frontend.widgets.about')

        <!-- Contact Section-->
        @include('frontend.widgets.contact')
        <!-- Footer-->
        @include('frontend.inc.footer')


        {{-- script  --}}
        @include('frontend.inc.script')
    </body>
</html>
