<?php
class TasksController extends Controller {
    public function index(){ if(!Auth::check()) redirect('/login'); $this->view('tasks/index'); }
}
