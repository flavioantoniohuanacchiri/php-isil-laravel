<!DOCTYPE html>
<html lang="en">
<head>
    @include("includes.page.head")
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app" class="wrapper">
        @include("includes.page.nav")
        @include("includes.page.sidebar")
        <main class="py-4">
            <div class="content-wrapper">
                @include("includes.page.header")
                @yield('content')
            </div>
        </main>
    </div>
    @include("includes.loading")
    @include("includes.page.script")
</body>
</html>
