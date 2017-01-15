<?php
class Main_Controller extends Controller {
	public function index() {
		$this->view('route_flight_view/index');
    $user = $this->model('root_flight');
	}
}
