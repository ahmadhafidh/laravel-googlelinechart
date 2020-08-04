<?php
   
namespace App\Http\Controllers;
 
use App\User;
 
use Illuminate\Http\Request;
 
use Redirect,Response;
 
Use DB;
 
use Carbon\Carbon;
 
class GoogleLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
     $data['lineChart'] = User::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(created_at) as month_name"),\DB::raw('max(created_at) as createdAt'))
        ->whereYear('created_at', date('Y'))
        ->groupBy('month_name')
        ->orderBy('createdAt')
        ->get();
 
        return view('google-line-chart', $data);
    }
 
}