<?php
class AuditsController extends Controller {
    public function index(){ if(!Auth::check()) redirect('/login'); $this->view('audits/index'); }
}
