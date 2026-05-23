INSERT INTO roles(name) VALUES ('Super Admin'),('Diretor Tecnológico'),('Administração'),('Manager'),('RH'),('Produção'),('Planeamento'),('Armazém'),('Comercial'),('Auditor'),('Colaborador');
INSERT INTO users(name,email,password,role_id,active) VALUES ('Admin','admin@tmanager.local','__HASH_ON_BOOT__',1,1);
INSERT INTO company(name,nif,address,email,phone,site,primary_color,labor_rate,pdf_footer) VALUES ('Tisser','509999999','Portugal','geral@tisser.pt','+351000000000','https://tisser.pt','#f5b400',12.5,'TManager - Tisser');
INSERT INTO item_families(name,code,status) VALUES ('Sacos de ráfia','RAFIA','Ativo'),('Big Bags','BIGBAG','Ativo'),('Sacos de papel','PAPER','Ativo'),('Pallet Covers','PALCOV','Ativo'),('Embalagens flexíveis','FLEX','Ativo');
INSERT INTO calendars(name,module,color) VALUES ('Administração','Administração','#0d6efd'),('Produção','Produção','#198754'),('RH','RH','#ffc107'),('Comercial','Comercial','#6610f2');
