<?php
class CalendarController extends Controller {
    public function index(){ if(!Auth::check()) redirect('/login'); $this->view('calendar/index'); }
}
