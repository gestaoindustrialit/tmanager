<?php
class ManagerController extends Controller {
    private function requireAuth(): void {
        if (!Auth::check()) {
            redirect('/login');
        }
    }

    public function index(){
        $this->requireAuth();

        $db = Database::getInstance();
        $company = $db->query("SELECT * FROM company ORDER BY id DESC LIMIT 1")->fetch();
        $clients = $db->query("SELECT * FROM clients WHERE deleted_at IS NULL ORDER BY id DESC")->fetchAll();
        $suppliers = $db->query("SELECT * FROM suppliers WHERE deleted_at IS NULL ORDER BY id DESC")->fetchAll();

        $this->view('manager/index', [
            'company' => $company,
            'clients' => $clients,
            'suppliers' => $suppliers,
            'activeTab' => $_GET['tab'] ?? 'empresa',
        ]);
    }

    public function saveCompany(){
        $this->requireAuth();
        $db = Database::getInstance();
        $id = (int)($_POST['id'] ?? 0);
        $params = [
            trim($_POST['name'] ?? ''),
            trim($_POST['nif'] ?? ''),
            trim($_POST['address'] ?? ''),
            trim($_POST['email'] ?? ''),
            trim($_POST['phone'] ?? ''),
            trim($_POST['site'] ?? ''),
            trim($_POST['primary_color'] ?? ''),
            (float)($_POST['labor_rate'] ?? 0),
        ];

        if ($id > 0) {
            $params[] = $id;
            $db->prepare("UPDATE company SET name=?, nif=?, address=?, email=?, phone=?, site=?, primary_color=?, labor_rate=?, updated_at=CURRENT_TIMESTAMP WHERE id=?")->execute($params);
        } else {
            $db->prepare("INSERT INTO company (name,nif,address,email,phone,site,primary_color,labor_rate) VALUES (?,?,?,?,?,?,?,?)")->execute($params);
        }
        redirect('/manager/company?tab=empresa');
    }

    public function saveClient(){
        $this->requireAuth();
        $db = Database::getInstance();
        $id = (int)($_POST['id'] ?? 0);
        $params = [
            trim($_POST['name'] ?? ''), trim($_POST['nif'] ?? ''), trim($_POST['address'] ?? ''), trim($_POST['email'] ?? ''),
            trim($_POST['phone'] ?? ''), trim($_POST['website'] ?? ''), trim($_POST['contact_name'] ?? ''), trim($_POST['contact_email'] ?? ''),
            trim($_POST['status'] ?? 'Ativo'), trim($_POST['notes'] ?? ''),
        ];

        if ($id > 0) {
            $params[] = $id;
            $db->prepare("UPDATE clients SET name=?, nif=?, address=?, email=?, phone=?, website=?, contact_name=?, contact_email=?, status=?, notes=?, updated_at=CURRENT_TIMESTAMP WHERE id=?")->execute($params);
        } else {
            $db->prepare("INSERT INTO clients (name,nif,address,email,phone,website,contact_name,contact_email,status,notes) VALUES (?,?,?,?,?,?,?,?,?,?)")->execute($params);
        }
        redirect('/manager/company?tab=clientes');
    }

    public function saveSupplier(){
        $this->requireAuth();
        $db = Database::getInstance();
        $id = (int)($_POST['id'] ?? 0);
        $params = [
            trim($_POST['name'] ?? ''), trim($_POST['nif'] ?? ''), trim($_POST['address'] ?? ''), trim($_POST['contact'] ?? ''),
            trim($_POST['email'] ?? ''), trim($_POST['phone'] ?? ''), trim($_POST['category'] ?? ''), trim($_POST['status'] ?? 'Ativo'), trim($_POST['notes'] ?? ''),
        ];

        if ($id > 0) {
            $params[] = $id;
            $db->prepare("UPDATE suppliers SET name=?, nif=?, address=?, contact=?, email=?, phone=?, category=?, status=?, notes=?, updated_at=CURRENT_TIMESTAMP WHERE id=?")->execute($params);
        } else {
            $db->prepare("INSERT INTO suppliers (name,nif,address,contact,email,phone,category,status,notes) VALUES (?,?,?,?,?,?,?,?,?)")->execute($params);
        }
        redirect('/manager/company?tab=fornecedores');
    }
}
