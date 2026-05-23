# TManager

Aplicação web MVC em PHP 7.3+ (sem frameworks), SQLite, Bootstrap 5, Chart.js e FullCalendar.

## Requisitos
- PHP 7.3+
- Extensões: `pdo_sqlite`, `openssl`, `mbstring`
- Apache com `mod_rewrite`

## Instalação
> **Importante:** em instalações em subpasta (ex: `/tmanager`), ajuste `base_path` em `config/config.php`.

1. Colocar o projeto no servidor (ex: `/var/www/tmanager`).
2. Apontar VirtualHost para `/public`.
3. Criar base de dados:
   ```bash
   sqlite3 database/database.sqlite < database/migrations.sql
   sqlite3 database/database.sqlite < database/seed.sql
   ```
4. Gerar password admin encriptada:
   ```bash
   php -r '$db=new PDO("sqlite:database/database.sqlite");$h=password_hash("admin123",PASSWORD_DEFAULT);$db->exec("UPDATE users SET password=".$db->quote($h)." WHERE email=\"admin@tmanager.local\"");'
   ```
5. Abrir `/login`.


## Instalação rápida (Installer Web)
1. Aceder a `http://seu-dominio/installer.php`.
2. O instalador valida requisitos, cria diretórios, executa migrations/seed e gera hash da password admin.
3. No final, aceder a `/login` com `admin@tmanager.local` / `admin123`.


## Deploy em subpasta (ex: `ricardo-pereira.com/tmanager`)
- O `.htaccess` raiz já vem preparado com `RewriteBase /tmanager/`.
- Se instalar noutra pasta, ajuste esta linha para o caminho correto (ex: `/erp/`, `/intranet/`).
- Garanta que `AllowOverride All` está ativo no Apache para a pasta do projeto.
- Se receber erro 403, confirme permissões (pastas 755, ficheiros 644) e que `mod_rewrite` está ativo.

## Login inicial
- Email: `admin@tmanager.local`
- Password: `admin123`

## Estrutura
- `app/Core`: MVC core (Router, Auth, DB, Permissões, Helpers).
- `app/Controllers`: controladores por módulo.
- `app/Models`: modelos base + entidades.
- `app/Views`: layout e páginas iniciais.
- `app/Services`: PDF, alertas, KPI, calendário, logotipo.
- `database`: SQLite, migrations, seed.
- `cron`: tarefas diárias, alertas e sync.

## Cron jobs
```cron
0 7 * * * /usr/bin/php /caminho/tmanager/cron/daily_tasks.php
0 8 * * * /usr/bin/php /caminho/tmanager/cron/kpi_alerts.php
*/30 * * * * /usr/bin/php /caminho/tmanager/cron/calendar_sync.php
```

## Permissões
- Roles e permissões por módulo/ação em `roles`, `permissions` e `role_permissions`.
- Super Admin ignora restrições.

## Logotipo da empresa
- O serviço `LogoService` tenta obter logo público da Tisser.
- Guarda em: `public/assets/img/logo-tisser.*`.
- Se falhar, carregar manualmente em `public/assets/img/` e atualizar configuração em Manager > Empresa.

## Backup SQLite
```bash
sqlite3 database/database.sqlite ".backup 'database/backup-$(date +%F).sqlite'"
```

## Segurança
- Compatível com Apache 2.2 e 2.4 nos ficheiros `.htaccess` (usa `Require all denied` com fallback para `Deny from all`).
- Password hash (`password_hash`/`password_verify`)
- PDO prepared statements
- CSRF token
- Escape HTML helper `e()`
- Estrutura preparada para logs e soft delete

## Roadmap por fases
- Fase 1: MVC, Auth, Dashboard, Manager, Clientes, RH, Permissões.
- Fase 2: Shopfloor, Produção, KPIs.
- Fase 3: WMS, Planner, Calendar, Auditorias, Tasks.
- Fase 4: PDFs avançados, alertas avançados, integrações OAuth.

## Diagnóstico rápido de erro 500
1. Teste `https://SEU_DOMINIO/tmanager/public/health.php` (deve mostrar `OK-TMANAGER`).
2. Se funcionar, teste `https://SEU_DOMINIO/tmanager/login`.
3. Se login falhar, verificar no alojamento: `error_log` do Apache/PHP e extensão `pdo_sqlite`.
4. Este projeto usa `.htaccess` mínimo para máxima compatibilidade em cPanel.

