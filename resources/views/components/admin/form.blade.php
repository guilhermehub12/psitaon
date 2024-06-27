<div class="card">
    <div class="card-header">
      <h3 class="card-title font-weight-bold text-uppercase">
        {{ $title }}
        <span class="badge badge-secondary">{{ $subtitle }}</span>
      </h3>
    </div>
    @if ($method == "GET" || $method == "POST")
        <form action="{{ $action }}" method="{{ $method }}">
    @elseif ($method == "PUT" || $method == "DELETE")
        <form action="{{ $action }}" method="POST">
        @method($method)
    @endif
        @csrf
      <div class="card-body">
        {{  $slot  }}
      </div>
      <div class="card-footer bg-transparent border-top">
        <div class="row justify-content-end">
          <div class="col-6 col-sm-6 col-md-2">
            <a href="{{ $routeBack ?? '#' }}" class="btn btn-dark btn-block text-uppercase font-weight-bold">
              <i class="fas fa-backward"></i> Voltar
            </a>
          </div>
          <div class="col-6 col-sm-6 col-md-2">
            <button type="submit" class="btn btn-lila btn-block text-uppercase font-weight-bold">
              <i class="fas fa-save"></i> {{ $buttonText }}
            </button>
          </div>
        </div>
      </div>
    </form>
</div>
