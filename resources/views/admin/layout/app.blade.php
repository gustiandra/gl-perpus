<!DOCTYPE html>
<html lang="en">

<head>
    @stack('addon-style')
    @include('admin.layout.partials.head')
</head>

<body>
    <div id="app">
        @include('admin.layout.partials.sidebar')
        <div id="main" class='layout-navbar'>
            @include('admin.layout.partials.header')

            <div id="main-content" class="mbc">
                @include('admin.layout.partials.breadcrumb')
                <section class="section">
                    @yield('content')
                </section>


                @include('admin.layout.partials.footer')
            </div>
        </div>
    </div>
    @stack('addon-script')
    @include('admin.layout.partials.script')
</body>

</html>