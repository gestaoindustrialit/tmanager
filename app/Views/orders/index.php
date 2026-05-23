<div class="card shadow-sm">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h3 class="mb-0">Encomendas</h3>
      <button class="btn btn-sm btn-primary" disabled>Nova encomenda</button>
    </div>
    <div class="row g-3 mb-3">
      <div class="col-md-3"><input class="form-control" placeholder="Cliente" disabled></div>
      <div class="col-md-3"><input class="form-control" placeholder="Nº encomenda" disabled></div>
      <div class="col-md-3"><select class="form-select" disabled><option>Estado</option></select></div>
      <div class="col-md-3"><button class="btn btn-outline-secondary w-100" disabled>Filtrar</button></div>
    </div>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead><tr><th>Encomenda</th><th>Cliente</th><th>Entrega</th><th>Estado</th><th class="text-end">Total</th></tr></thead>
        <tbody><tr><td colspan="5" class="text-center text-muted py-4">Sem encomendas registadas.</td></tr></tbody>
      </table>
    </div>
  </div>
</div>
