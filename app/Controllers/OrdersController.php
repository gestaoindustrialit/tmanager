<?php
class OrdersController extends Controller {
    public function index(){ if(!Auth::check()) redirect('/login'); $this->view('orders/index'); }
}
