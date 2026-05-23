<?php
class DashboardController extends Controller {
    public function index(){ if(!Auth::check()) redirect('/login'); $this->view('dashboard/index'); }
}
