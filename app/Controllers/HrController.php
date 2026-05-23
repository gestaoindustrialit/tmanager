<?php
class HrController extends Controller {
    public function index(){ if(!Auth::check()) redirect('/login'); $this->view('hr/index'); }
}
