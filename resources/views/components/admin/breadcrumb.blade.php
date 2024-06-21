<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">
                    <i class="{{ $icon }}"></i> {{ $title }}
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @forelse ($links as $link)
                        @if (!$loop->last)
                            <li class="breadcrumb-item">
                                <a href="#">{{ $link }}</a>
                            </li>
                        @else
                            <li class="breadcrumb-item active">
                                Dashboard v1
                            </li>
                        @endif
                    @empty
                    @endforelse
                </ol>
            </div>
        </div>
    </div>
</div>
