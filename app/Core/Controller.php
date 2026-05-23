<?php
class Controller {
    protected function view($view, $data = []){ extract($data); require __DIR__ . '/../Views/layouts/header.php'; require __DIR__ . '/../Views/'.$view.'.php'; require __DIR__ . '/../Views/layouts/footer.php'; }
}
