{{-- @include("welcome") --}}
@include("layouts.head")

<body class="g-sidenav-show  bg-gray-200">
{{-- @include("layouts.navbar") --}}
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
@include("layouts.navHead")



@yield('content')
</main>
</body>
