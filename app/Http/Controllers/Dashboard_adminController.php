<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\view;
use Illuminate\Http\Request;
use App\Models\User;

class Dashboard_adminController extends Controller
{
    public function index(){
      
        return view('admin/index');
    }

    public function table(){
        $tables =  User::paginate(10);
        return view('admin/table',compact('tables'));
    }
    public function create(){
        return view('admin.create');
    }
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'id'             => 'required|min:1',
            'name'     => 'required|min:1',
            'email'       => 'required|min:1',
            'password'        => 'required|min:1'
        ]);

        //upload image

        //buat data
        User::create([

            'id' => $request->id,
            'name'=>$request->name,
            'email' => $request->email,
            'password'=>$request->password            
        ]);

        //kembali ke halaman index
        return redirect()->route('table')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(){
        return view('admin.edit');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'name'     => 'required|min:2',
            'email'       => 'required|min:5',
            'password'        => 'required|min:1'
        ]);

        //get data by id
    
        $tables = User::findOrFail($id);

        //check if image is uploaded
        $tables->update([
            'name'              => $request->name,
            'email'            => $request->email,
            'password'      => $request->password,
        ]);

        //kembali ke halaman index
        return redirect()->route('table')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get data by ID
        
        $tables = User::findOrFail($id);

        //delete image
       

        //delete data
        $tables->delete();

        //kembali ke halaman index
        return redirect()->route('table ')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
