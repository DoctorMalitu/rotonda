<?php

namespace App\Http\Controllers;
use App;

class PagesController extends Controller {
	public function inicio() {
		return view('welcome');
	}

}
