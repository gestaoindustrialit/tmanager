<?php
class SettingsController extends Controller {
    public function index(){ if(!Auth::check()) redirect('/login'); $this->view('settings/index'); }
}
