<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>@yield('header_page')</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">@yield('header_page')</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>