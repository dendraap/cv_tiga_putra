@include('layouts.navbars.navs.guest')
<div class="wrapper wrapper-full-page">
  <div class="page-header login-page header-filter" filter-color="black" style="background-color: #242d42; background-size: cover; background-position: top center;align-items: center;" data-color="cvtigaputra">
  <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    @yield('content')
    @include('layouts.footers.guest')
    {{-- background-image: url('{{ asset('material') }}/img/login.jpg'); --}}
  </div>
</div>
