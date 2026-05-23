<?php
class ShopfloorController extends Controller {
    public function index(){ if(!Auth::check()) redirect('/login'); $this->view('shopfloor/index'); }
}
