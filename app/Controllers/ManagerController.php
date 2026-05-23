<?php
class ManagerController extends Controller {
    public function index(){ if(!Auth::check()) redirect('/login'); $this->view('manager/index'); }
}
