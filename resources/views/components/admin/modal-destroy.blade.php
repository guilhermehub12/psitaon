<div
    class="modal fade"
    id="{{ $target }}"
>
    <div class="modal-dialog modal-{{ $size }} modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ $action }}" method="post">
                @csrf
                @method($method)
                <div class="modal-header text-uppercase font-weight-bold">
                    <h5 class="modal-title">
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
                <div class="modal-footer d-flex">
                    <button type="button" class="btn btn-dark text-uppercase font-weight-bold" data-dismiss="modal">
                        <i class="fas fa-times-circle"></i> Fechar
                    </button>
                    <button type="submit" class="btn btn-danger text-uppercase font-weight-bold ml-auto">
                        <i class="fas fa-trash"></i> Deletar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
