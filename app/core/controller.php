<?php

class Controller {

	public function model($model) {
		//require_once '../app/models/' . $model . '.php';
		return new $model();
	}

	public function view($view, $data = []) {
		include '../app/views/' . $view . '.php';
	}
}

class Root_flight {

}
