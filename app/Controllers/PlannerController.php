<?php
class PlannerController extends Controller {
    public function index(){ if(!Auth::check()) redirect('/login'); $this->view('planner/index'); }
}
