<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class MovieController extends Controller
{
		function __construct()
		{
			
		}
		
		public function index()
		{
			return "Hello From Movie Controller";
		}
		
		public function view()
		{
			return "Hello From Movie Controller view Method";
		}
}