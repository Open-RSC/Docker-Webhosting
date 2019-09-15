<?php

namespace App\Http\Controllers;

class StaffController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function chat_logs()
	{
		return view('chat_logs');
	}

	public function pm_logs()
	{
		return view('pm_logs');
	}

	public function trade_logs()
	{
		return view('trade_logs');
	}

	public function generic_logs()
	{
		return view('generic_logs');
	}

	public function shop_logs()
	{
		return view('shop_logs');
	}

	public function auction_logs()
	{
		return view('auction_logs');
	}

	public function live_feed_logs()
	{
		return view('live_feed_logs');
	}

	public function player_cache_logs()
	{
		return view('player_cache_logs');
	}

	public function report_logs()
	{
		return view('report_logs');
	}

	public function staff_logs()
	{
		return view('staff_logs');
	}
}
