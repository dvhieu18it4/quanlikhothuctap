<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\sanpham;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   

    public function admintrangchu()
    {
    	return view('admin.admin');	
    }

    public function sanphamtrangchu()
    {
        $sanpham = sanpham::all();
        $sanpham = sanpham::paginate(10);

        return view('admin.sanpham')->with('sanpham',$sanpham);
    }

    public function addsanpham(Request $request){

        sanpham::create([
            'tensp' => $request['tensanpham'],
            'ncc'=>$request['ncc'] ,
            'thongtin' =>$request['thongtin'] 
        ]);
        return redirect()->route('sanpham')->with('status','Thêm thành công');
    }

    public function deletesanpham(Request $request,$id)
    {
        $sanpham =sanpham::findOrFail($id);
        $sanpham->delete();
        return redirect()->route('sanpham')->with('status','Xóa thành công');
    }

    public function updatesanpham(Request $request ,$id)
    {
        $sanpham = sanpham::find($id);
        $sanpham ->tensp = $request->input('tensanpham');
        $sanpham ->ncc = $request->input('ncc');
        $sanpham ->thongtin = $request->input('thongtin');
        $sanpham ->update();

        return redirect()->route('sanpham')->with('status','Cập nhật thành công');
    }
}
