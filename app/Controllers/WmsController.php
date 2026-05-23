<?php
class WmsController extends Controller {
    public function index(){ if(!Auth::check()) redirect('/login'); $this->view('wms/index'); }
}
