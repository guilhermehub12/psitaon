<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-uppercase">
                <h3 class="card-title font-weight-bold">
                    @if ($icon) <i class="{{ $icon }}"></i> @endif
                    {{ $title }}
                    <span class="badge badge-secondary">{{ $subtitle }}</span>
                </h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped text-nowrap">
                    @if ($headers)
                        <thead>
                            <tr class="text-center text-uppercase">
                                @forelse ($headers as $header)
                                    <th class="align-middle">{{ $header }}</th>
                                @empty
                                @endforelse
                            </tr>
                        </thead>
                    @endif
                    <tbody>
                        @if ($records && $records->count() > 0)
                            {{ $slot }}
                        @else
                            <tr class="text-center">
                                <td class="align-middle" colspan="{{ is_array($headers) ? count($headers) : 0 }}">
                                    Nenhum registro encontrado.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            @if (isset($records) && is_object($records) && method_exists($records, 'total'))
                <div class="card-footer clearfix border-top bg-transparent">
                    <div class="row align-items-center">
                        <div class="col-6 text-start font-weight-bold">
                            @if ($records->total() > 0)
                                Exibindo de {{ $records->firstItem() }} até {{ $records->lastItem() }} de {{ $records->total() }} registro(s)
                            @else
                                0 registro(s)
                            @endif
                        </div>

                        <div class="col-6 d-flex justify-content-end font-weight-bold">
                            @if ($records && method_exists($records, 'links'))
                                {!! $records->appends(request()->query())->links()!!}
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <div class="card-footer clearfix border-top bg-transparent">
                    <div class="row align-items-center">
                        <div class="col-6 text-start font-weight-bold">
                            Exibindo {{ $records->count() }} registro(s)
                        </div>
                        <div class="col-6 d-flex justify-content-end font-weight-bold">
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
