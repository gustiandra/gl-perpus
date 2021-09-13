<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>{{ Breadcrumbs::current()->title }}</h3>
            <p class="text-subtitle text-muted">{{ $subtitle ?? '' }}</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    {{-- <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li> --}}
                    {{ Breadcrumbs::render() }}
                </ol>
            </nav>
        </div>
    </div>
</div>