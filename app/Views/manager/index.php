<?php
$company = $company ?? null;
$clients = $clients ?? [];
$suppliers = $suppliers ?? [];
$activeTab = $activeTab ?? 'empresa';
?>
<div class="card shadow-sm">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3 class="mb-0">Manager</h3>
      <span class="badge text-bg-secondary">Gestão de dados mestre</span>
    </div>

    <ul class="nav nav-pills mb-4">
      <li class="nav-item"><a class="nav-link <?= $activeTab === 'empresa' ? 'active':'' ?>" href="/manager/company?tab=empresa">Empresa</a></li>
      <li class="nav-item"><a class="nav-link <?= $activeTab === 'clientes' ? 'active':'' ?>" href="/manager/company?tab=clientes">Clientes</a></li>
      <li class="nav-item"><a class="nav-link <?= $activeTab === 'fornecedores' ? 'active':'' ?>" href="/manager/company?tab=fornecedores">Fornecedores</a></li>
    </ul>

    <?php if($activeTab === 'empresa'): ?>
      <form method="post" action="/manager/company/save" class="row g-3 mb-4">
        <input type="hidden" name="id" value="<?= (int)($company['id'] ?? 0) ?>">
        <div class="col-md-6"><label class="form-label">Nome</label><input name="name" class="form-control" value="<?= htmlspecialchars($company['name'] ?? '') ?>" required></div>
        <div class="col-md-6"><label class="form-label">NIF</label><input name="nif" class="form-control" value="<?= htmlspecialchars($company['nif'] ?? '') ?>"></div>
        <div class="col-md-12"><label class="form-label">Morada</label><textarea name="address" class="form-control" rows="2"><?= htmlspecialchars($company['address'] ?? '') ?></textarea></div>
        <div class="col-md-4"><label class="form-label">Email</label><input name="email" type="email" class="form-control" value="<?= htmlspecialchars($company['email'] ?? '') ?>"></div>
        <div class="col-md-4"><label class="form-label">Telefone</label><input name="phone" class="form-control" value="<?= htmlspecialchars($company['phone'] ?? '') ?>"></div>
        <div class="col-md-4"><label class="form-label">Site</label><input name="site" class="form-control" value="<?= htmlspecialchars($company['site'] ?? '') ?>"></div>
        <div class="col-md-3"><label class="form-label">Cor principal</label><input name="primary_color" type="color" class="form-control form-control-color" value="<?= htmlspecialchars($company['primary_color'] ?? '#0d6efd') ?>"></div>
        <div class="col-md-3"><label class="form-label">Valor M/O minuto (€)</label><input name="labor_rate" step="0.01" type="number" class="form-control" value="<?= htmlspecialchars($company['labor_rate'] ?? '0') ?>"></div>
        <div class="col-12 text-end"><button class="btn btn-dark">Guardar empresa</button></div>
      </form>
    <?php endif; ?>

    <?php if($activeTab === 'clientes'): ?>
      <form method="post" action="/manager/clients/save" class="row g-3 mb-4">
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
        <div class="col-12 text-end"><button class="btn btn-dark">Guardar cliente</button></div>
      </form>
      <div class="table-responsive">
        <table class="table table-sm table-hover">
          <thead><tr><th>ID</th><th>Nome</th><th>Contacto</th><th>Email</th><th>Telefone</th><th>Estado</th></tr></thead>
          <tbody>
          <?php foreach($clients as $c): ?><tr><td><?= (int)$c['id'] ?></td><td><?= htmlspecialchars($c['name']) ?></td><td><?= htmlspecialchars($c['contact_name']) ?></td><td><?= htmlspecialchars($c['email']) ?></td><td><?= htmlspecialchars($c['phone']) ?></td><td><?= htmlspecialchars($c['status']) ?></td></tr><?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>

    <?php if($activeTab === 'fornecedores'): ?>
      <form method="post" action="/manager/suppliers/save" class="row g-3 mb-4">
        <div class="col-md-4"><label class="form-label">Nome</label><input name="name" class="form-control" required></div>
        <div class="col-md-2"><label class="form-label">NIF</label><input name="nif" class="form-control"></div>
        <div class="col-md-3"><label class="form-label">Email</label><input type="email" name="email" class="form-control"></div>
        <div class="col-md-3"><label class="form-label">Telefone</label><input name="phone" class="form-control"></div>
        <div class="col-md-6"><label class="form-label">Morada</label><textarea name="address" class="form-control" rows="2"></textarea></div>
        <div class="col-md-3"><label class="form-label">Categoria</label><input name="category" class="form-control" placeholder="Matéria-prima, transporte..."></div>
        <div class="col-md-3"><label class="form-label">Pessoa de contacto</label><input name="contact" class="form-control"></div>
        <div class="col-md-3"><label class="form-label">Estado</label><select name="status" class="form-select"><option>Ativo</option><option>Inativo</option></select></div>
        <div class="col-md-9"><label class="form-label">Notas</label><input name="notes" class="form-control"></div>
        <div class="col-12 text-end"><button class="btn btn-dark">Guardar fornecedor</button></div>
      </form>
      <div class="table-responsive">
        <table class="table table-sm table-hover">
          <thead><tr><th>ID</th><th>Nome</th><th>Categoria</th><th>Contacto</th><th>Email</th><th>Telefone</th><th>Estado</th></tr></thead>
          <tbody>
          <?php foreach($suppliers as $s): ?><tr><td><?= (int)$s['id'] ?></td><td><?= htmlspecialchars($s['name']) ?></td><td><?= htmlspecialchars($s['category']) ?></td><td><?= htmlspecialchars($s['contact']) ?></td><td><?= htmlspecialchars($s['email']) ?></td><td><?= htmlspecialchars($s['phone']) ?></td><td><?= htmlspecialchars($s['status']) ?></td></tr><?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>

  </div>
</div>
