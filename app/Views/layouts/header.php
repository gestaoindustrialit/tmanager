<!doctype html><html lang='pt'><head><meta charset='utf-8'><meta name='viewport' content='width=device-width,initial-scale=1'>
<title>TManager</title><link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap' rel='stylesheet'>
<link href='<?=e(asset_url('css/app.css'))?>' rel='stylesheet'></head><body class='bg-light'>
<nav class='navbar navbar-expand-lg navbar-dark tmanager-navbar'><div class='container-fluid'><a class='navbar-brand fw-semibold' href='<?=e(app_url('/dashboard'))?>'>TManager</a>
<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#topMenu'><span class='navbar-toggler-icon'></span></button>
<div class='collapse navbar-collapse' id='topMenu'>
<div class='navbar-nav me-auto'><a class='nav-link' href='<?=e(app_url('/manager/company'))?>'>Manager</a><a class='nav-link' href='<?=e(app_url('/hr/employees'))?>'>RH</a><a class='nav-link' href='<?=e(app_url('/orders'))?>'>Encomendas</a><a class='nav-link' href='<?=e(app_url('/shopfloor/items'))?>'>Shopfloor</a><a class='nav-link' href='<?=e(app_url('/wms/warehouses'))?>'>WMS</a><a class='nav-link' href='<?=e(app_url('/planner'))?>'>Planner</a><a class='nav-link' href='<?=e(app_url('/calendar'))?>'>Calendar</a><a class='nav-link' href='<?=e(app_url('/tasks'))?>'>Tasks</a></div>
<div class='ms-auto'><a class='btn btn-warning btn-sm' href='<?=e(app_url('/logout'))?>'>Sair</a></div></div></div></nav><main class='container py-4'>
