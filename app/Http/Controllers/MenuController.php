<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MenuController extends Controller
{
    public function getList(Request $request)
    {
        $today = Carbon::today();

        $menus = Menu::with(['dish', 'branch'])
            ->whereDate('CREATED_AT', $today)
            ->get()
            ->groupBy('branch.BRANCHID'); // Nhóm theo BRANCHID thực tế từ quan hệ

        return view('pages.menu', [
            'groupedMenus' => $menus,
        ]);
    }
}