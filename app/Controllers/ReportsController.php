<?php
class ReportsController extends Controller {
    public function index(){ if(!Auth::check()) redirect('/login'); $this->view('reports/index'); }
}
