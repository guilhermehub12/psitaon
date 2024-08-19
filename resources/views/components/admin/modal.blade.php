<div
    class="modal fade modal-{{ $size }}"
    id="{{ $target }}"
    tabindex="-1"
    role="dialog"
    aria-labelledby="{{ $target }}"
    aria-hidden="true"
>
    <div class="modal-dialog modal-{{ $size }} modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header text-uppercase font-weight-bold">
                <h5 class="modal-title font-bold">
                    {{ $title }}
                    <span class="badge badge-secondary">{{ $subtitle }}</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    {{ $slot }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark text-uppercase font-weight-bold" data-dismiss="modal">
                    <i class="fas fa-times-circle"></i> Fechar
                </button>
            </div>
        </div>
    </div>
</div>
