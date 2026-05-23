<?php
$company = $company ?? null;
$clients = $clients ?? [];
$suppliers = $suppliers ?? [];
$activeTab = $activeTab ?? 'empresa';
?>
<style>
.manager-shell{border:1px solid #d8dce2;border-radius:14px;background:#fff;box-shadow:0 6px 18px rgba(20,28,45,.06)}
.manager-head{background:linear-gradient(180deg,#f8fafc 0%,#fff 100%);border-bottom:1px solid #e9edf3}
.manager-tab{font-weight:600}
.manager-stat{border:1px solid #e8ecf2;border-radius:12px;padding:.7rem .9rem;background:#fafbfc}
.manager-form{border:1px solid #e9edf3;border-radius:12px;padding:1rem;background:#fff}
.manager-table thead th{font-size:.8rem;text-transform:uppercase;letter-spacing:.03em;color:#6c757d}
</style>

<div class="manager-shell overflow-hidden">
  <div class="manager-head p-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
      <div>
        <h3 class="mb-1">Manager</h3>
        <p class="text-muted mb-0">Gestão centralizada de dados de empresa, clientes e fornecedores.</p>
      </div>
      <div class="d-flex gap-2">
        <div class="manager-stat"><small class="text-muted d-block">Clientes</small><strong><?= count($clients) ?></strong></div>
        <div class="manager-stat"><small class="text-muted d-block">Fornecedores</small><strong><?= count($suppliers) ?></strong></div>
      </div>
    </div>
    <ul class="nav nav-pills mt-4">
      <li class="nav-item"><a class="nav-link manager-tab <?= $activeTab === 'empresa' ? 'active':'' ?>" href="<?= e(app_url('/manager/company?tab=empresa')) ?>">Empresa</a></li>
      <li class="nav-item"><a class="nav-link manager-tab <?= $activeTab === 'clientes' ? 'active':'' ?>" href="<?= e(app_url('/manager/company?tab=clientes')) ?>">Clientes</a></li>
      <li class="nav-item"><a class="nav-link manager-tab <?= $activeTab === 'fornecedores' ? 'active':'' ?>" href="<?= e(app_url('/manager/company?tab=fornecedores')) ?>">Fornecedores</a></li>
    </ul>
  </div>

  <div class="p-4">
    <?php if($activeTab === 'empresa'): ?>
      <form method="post" action="<?= e(app_url('/manager/company/save')) ?>" class="row g-3 manager-form">
        <input type="hidden" name="id" value="<?= (int)($company['id'] ?? 0) ?>">
        <div class="col-md-6"><label class="form-label">Nome</label><input name="name" class="form-control" value="<?= htmlspecialchars($company['name'] ?? '') ?>" required></div>
        <div class="col-md-3"><label class="form-label">NIF</label><input name="nif" class="form-control" value="<?= htmlspecialchars($company['nif'] ?? '') ?>"></div>
        <div class="col-md-3"><label class="form-label">Valor M/O minuto (€)</label><input name="labor_rate" step="0.01" type="number" class="form-control" value="<?= htmlspecialchars($company['labor_rate'] ?? '0') ?>"></div>
        <div class="col-md-12"><label class="form-label">Morada</label><textarea name="address" class="form-control" rows="2"><?= htmlspecialchars($company['address'] ?? '') ?></textarea></div>
        <div class="col-md-4"><label class="form-label">Email</label><input name="email" type="email" class="form-control" value="<?= htmlspecialchars($company['email'] ?? '') ?>"></div>
        <div class="col-md-4"><label class="form-label">Telefone</label><input name="phone" class="form-control" value="<?= htmlspecialchars($company['phone'] ?? '') ?>"></div>
        <div class="col-md-4"><label class="form-label">Site</label><input name="site" class="form-control" value="<?= htmlspecialchars($company['site'] ?? '') ?>"></div>
        <div class="col-md-3"><label class="form-label">Cor principal</label><input name="primary_color" type="color" class="form-control form-control-color" value="<?= htmlspecialchars($company['primary_color'] ?? '#0d6efd') ?>"></div>
        <div class="col-12 text-end"><button class="btn btn-dark px-4">Guardar empresa</button></div>
      </form>
    <?php endif; ?>

    <?php if($activeTab === 'clientes'): ?>
      <form method="post" action="<?= e(app_url('/manager/clients/save')) ?>" class="row g-3 manager-form mb-4">
        <div class="col-md-4"><label class="form-label">Nome</label><input name="name" class="form-control" required></div>
        <div class="col-md-2"><label class="form-label">NIF</label><input name="nif" class="form-control"></div>
        <div class="col-md-3"><label class="form-label">Email</label><input type="email" name="email" class="form-control"></div>
        <div class="col-md-3"><label class="form-label">Telefone</label><input name="phone" class="form-control"></div>
        <div class="col-md-6"><label class="form-label">Morada</label><textarea name="address" class="form-control" rows="2"></textarea></div>
        <div class="col-md-3"><label class="form-label">Site</label><input name="website" class="form-control" placeholder="https://"></div>
        <div class="col-md-3"><label class="form-label">Contacto direto</label><input name="contact_name" class="form-control"></div>
        <div class="col-md-3"><label class="form-label">Email do contacto</label><input name="contact_email" class="form-control"></div>
        <div class="col-md-3"><label class="form-label">Estado</label><select name="status" class="form-select"><option>Ativo</option><option>Inativo</option></select></div>
        <div class="col-md-6"><label class="form-label">Notas</label><input name="notes" class="form-control"></div>
        <div class="col-12 text-end"><button class="btn btn-dark px-4">Guardar cliente</button></div>
      </form>
      <div class="table-responsive manager-form">
        <table class="table table-hover align-middle manager-table mb-0">
          <thead><tr><th>ID</th><th>Nome</th><th>Contacto</th><th>Email</th><th>Telefone</th><th>Estado</th></tr></thead>
          <tbody><?php foreach($clients as $c): ?><tr><td><?= (int)$c['id'] ?></td><td class="fw-semibold"><?= htmlspecialchars($c['name']) ?></td><td><?= htmlspecialchars($c['contact_name']) ?></td><td><?= htmlspecialchars($c['email']) ?></td><td><?= htmlspecialchars($c['phone']) ?></td><td><span class="badge text-bg-light border"><?= htmlspecialchars($c['status']) ?></span></td></tr><?php endforeach; ?></tbody>
        </table>
      </div>
    <?php endif; ?>

    <?php if($activeTab === 'fornecedores'): ?>
      <form method="post" action="<?= e(app_url('/manager/suppliers/save')) ?>" class="row g-3 manager-form mb-4">
        <div class="col-md-4"><label class="form-label">Nome</label><input name="name" class="form-control" required></div>
        <div class="col-md-2"><label class="form-label">NIF</label><input name="nif" class="form-control"></div>
        <div class="col-md-3"><label class="form-label">Email</label><input type="email" name="email" class="form-control"></div>
        <div class="col-md-3"><label class="form-label">Telefone</label><input name="phone" class="form-control"></div>
        <div class="col-md-6"><label class="form-label">Morada</label><textarea name="address" class="form-control" rows="2"></textarea></div>
        <div class="col-md-3"><label class="form-label">Categoria</label><input name="category" class="form-control" placeholder="Matéria-prima, transporte..."></div>
        <div class="col-md-3"><label class="form-label">Pessoa de contacto</label><input name="contact" class="form-control"></div>
        <div class="col-md-3"><label class="form-label">Estado</label><select name="status" class="form-select"><option>Ativo</option><option>Inativo</option></select></div>
        <div class="col-md-9"><label class="form-label">Notas</label><input name="notes" class="form-control"></div>
        <div class="col-12 text-end"><button class="btn btn-dark px-4">Guardar fornecedor</button></div>
      </form>
      <div class="table-responsive manager-form">
        <table class="table table-hover align-middle manager-table mb-0">
          <thead><tr><th>ID</th><th>Nome</th><th>Categoria</th><th>Contacto</th><th>Email</th><th>Telefone</th><th>Estado</th></tr></thead>
          <tbody><?php foreach($suppliers as $s): ?><tr><td><?= (int)$s['id'] ?></td><td class="fw-semibold"><?= htmlspecialchars($s['name']) ?></td><td><?= htmlspecialchars($s['category']) ?></td><td><?= htmlspecialchars($s['contact']) ?></td><td><?= htmlspecialchars($s['email']) ?></td><td><?= htmlspecialchars($s['phone']) ?></td><td><span class="badge text-bg-light border"><?= htmlspecialchars($s['status']) ?></span></td></tr><?php endforeach; ?></tbody>
        </table>
      </div>
    <?php endif; ?>
  </div>
</div>
