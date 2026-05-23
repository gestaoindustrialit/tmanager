<!doctype html><html lang='pt'><head><meta charset='utf-8'><meta name='viewport' content='width=device-width,initial-scale=1'>
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap' rel='stylesheet'>
<link href='<?=e(asset_url('css/app.css'))?>' rel='stylesheet'></head><body class='login-page'>
<div class='login-wrap container py-5'><div class='login-shell row g-0 mx-auto'>
<aside class='col-lg-6 login-left p-4 p-lg-5'><span class='login-badge'>Planeia, acompanha e comunica</span><h1 class='mt-4'>TManager</h1><p class='lead mt-3'>Centraliza planeamentos, equipas e tarefas numa única plataforma para as operações da Tisser.</p>
<ul class='login-benefits ps-3'><li>Controlo semanal de equipas e capacidade</li><li>Relatórios rápidos para líderes e equipas</li><li>Histórico e rastreio seguro de ações</li></ul></aside>
<section class='col-lg-6 login-right p-4 p-lg-5'>
<img src='https://tisser.pt/wp-content/uploads/2020/03/Logo_Website.png' alt='Tisser' class='login-logo mb-4'>
<h2>Iniciar sessão</h2><p class='text-muted mb-4'>Acede com as tuas credenciais profissionais.</p>
<?php if(!empty($error)): ?><div class='alert alert-danger'><?=e($error)?></div><?php endif; ?>
<form method='post'><input type='hidden' name='_csrf' value='<?=e(csrf_token())?>'><label class='form-label'>Email</label><input class='form-control form-control-lg mb-3' name='email' placeholder='nome@empresa.com'><label class='form-label'>Password</label><input class='form-control form-control-lg mb-4' type='password' name='password' placeholder='••••••'><button class='btn btn-warning w-100 btn-lg'>Entrar</button></form></section>
</div></div></body></html>
