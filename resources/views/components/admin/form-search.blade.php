@props([
    'title' => '',
    'subtitle' => '',
    'action' => '#',
    'method' => 'get',
    'size' => 12
])

<form action="{{ $action }}" method="{{ $method }}" class="form-reset" enctype="multipart/form-data">
    <div class="card">
        <div class="card-header bg-transparent border-bottom">
            <h4 class="card-title text-uppercase" style="color: #191818">
                {{ $title }}
                <span class="badge btn-lila text-uppercase fw-bold">{{ $subtitle }}</span>
            </h4>
        </div>
        <div class="card-body">
            {{ $slot }}
        </div>
        <div class="card-footer bg-transparent">
            <div class="row justify-content-end">
                <div class="col-6 col-sm-6 col-md-2 d-grid">
                    <button type="button" class="btn btn-block btn-lila reset-btn text-uppercase fw-bold">
                        <i class="fas fa-eraser"></i> Limpar
                    </button>
                </div>
                <div class="col-6 col-sm-6 col-md-2 d-grid">
                    <button type="submit" class="btn btn-lila fw-bold">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
