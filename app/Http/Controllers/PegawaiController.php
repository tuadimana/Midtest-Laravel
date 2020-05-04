<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
 
class PegawaiController extends Controller
{
    public function index()
    {
    	// mengambil data dari table pegawai
    	$pegawai = DB::table('pegawai')->get();
 
    	// mengirim data pegawai ke view index
    	return view('index',['pegawai' => $pegawai]);


    }

    public function tambah()
    {

    	// memanggil view tambah
    	return view('tambah');

    }
    	// method untuk insert data ke table pegawai
	public function store(Request $request)
	{
		// insert data ke table pegawai
		DB::table('pegawai')->insert([
			'pegawai_nama' => $request->nama,
			'pegawai_jabatan' => $request->jabatan,
			'pegawai_umur' => $request->umur,
			'pegawai_alamat' => $request->alamat,
			'pegawai_jenis_kelamin' => $request->jeniskelamin
	]);
		return redirect('/pegawai');
	}	
		// method untuk edit data pegawai
	public function edit($id)
	{
		// mengambil data pegawai berdasarkan id yang dipilih
		$pegawai = DB::table('pegawai')->where('id_pegawai',$id)->get();
		// passing data pegawai yang didapat ke view edit.blade.php
		return view('edit',['pegawai' => $pegawai]);
	}
		// update data pegawai
	public function update(Request $request)
	{
		// update data pegawai
		DB::table('pegawai')->where('id_pegawai',$request->id)->update([
			'pegawai_nama' => $request->nama,
			'pegawai_jabatan' => $request->jabatan,
			'pegawai_umur' => $request->umur,
			'pegawai_alamat' => $request->alamat,
			'pegawai_jenis_kelamin' => $request->jeniskelamin
	]);
	// alihkan halaman ke halaman pegawai
	return redirect('/pegawai');
	}
	public function hapus($id)
{
	// menghapus data pegawai berdasarkan id yang dipilih
	DB::table('pegawai')->where('id_pegawai',$id)->delete();
		
	// alihkan halaman ke halaman pegawai
	return redirect('/pegawai');
}
}