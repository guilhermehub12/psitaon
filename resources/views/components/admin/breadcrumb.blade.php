<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="m-0 text-uppercase">
                    <i class="{{ $icon }}"></i> {{ $title }}
                </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right text-uppercase">
                    @forelse ($links as $link)
                        @if (!$loop->last)
                            <li class="breadcrumb-item">
                                <a href="#">{{ $link }}</a>
                            </li>
                        @else
                            <li class="breadcrumb-item active">
                                {{ $link }}
                            </li>
                        @endif
                    @empty
                    @endforelse
                </ol>
            </div>
        </div>
    </div>
</div>
