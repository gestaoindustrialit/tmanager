<?php
class SpecBookController extends Controller {
    public function index(){ if(!Auth::check()) redirect('/login'); $this->view('specbook/index'); }
}
