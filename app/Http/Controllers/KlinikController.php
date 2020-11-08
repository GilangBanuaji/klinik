<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\SettingOption as Option;

use App\User;
use App\Pasien;
use App\Rawat;

use PDF;

class KlinikController extends Controller
{

    //User
    public function userIndex() {
        $user = User::all();

        return view('userindex', ['users' => $user]);
    }

    public function addUser() {
        return view('addUser');
    }

    public function saveUser(Request $request) {
        $cekUser = User::where('username', $request->username)->first();
        if(empty($cekUser)) {
            $user = new User;
            $user->username = $request->get('username');
            $user->full_name = $request->get('full_name');
            if(!empty($request->get('password'))) {
                $user->password = \Hash::make($request->get('password'));
            }
            $user->role = $request->get('role');

            $user->save();

            return redirect()->route('addUser')->with('status', 'User berhasil dibuat');
        }
        return redirect()->route('addUser')->with('failed', 'Username telah terdaftar.');
    }

    public function editUser($id) {
        $user = User::findOrFail($id);

        return view('editUser', ['user' => $user]);
    }

    public function updateUser(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->full_name = $request->get('full_name');
        if(!empty($request->get('password'))) {
            $user->password = \Hash::make($request->get('password'));
        }
        $user->role = $request->get('role');

        $user->save();

        $getUser = User::all();

        return redirect()->route('editUser', ['id' => $user->id, 'user' => $user])->with('status', 'User berhasil diubah');
    }

    public function deleteUser($id) {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('userIndex')->with('status', 'User berhasil dihapus');
    }


    //Pasien
    public function pasienIndex() {
        $pasien = Pasien::all();

        return view('pasienIndex', ['pasiens' => $pasien]);
    }

    public function addPasien() {
        $noRm = Option::instance()->getOptionVal('no_rm');
        $range = Option::instance()->getOptionVal('digrm');

        $numVal = intVal($noRm->setting_value) + 1;
        $numRange = intVal($range->setting_value);

        $noRm = str_pad($numVal, $numRange, '0', STR_PAD_LEFT);

        return view('addPasien', ['noRM' => $noRm]);
    }

    public function savePasien(Request $request) {
        $pasien = new Pasien;
        $pasien->no_rm = $request->get('no_rm');
        $pasien->fullname = $request->get('fullname');
        $pasien->jenis_kel = $request->get('jenis_kel');
        $pasien->no_bpjs = $request->get('no_bpjs');
        $pasien->no_hp = $request->get('no_hp');
        $pasien->alamat = $request->get('alamat');
        $pasien->riwayat_alergi_obat = $request->get('alergi_obat');
        $pasien->ttl = $request->get('tempat_lahir').', '.$request->get('tanggal_lahir');
        $pasien->pekerjaan = $request->get('pekerjaan');
        $pasien->save();

        $updateNoRM = Option::instance()->updateOptionVal('no_rm');

        return redirect()->route('pasienIndex')->with('status', 'Pasien berhasil ditambah');
    }

    public function editPasien($id) {
        $pasien = Pasien::findOrFail($id);

        $ttl = explode(",",$pasien->ttl);

        $pasien->tempat_lahir = $ttl[0];
        $pasien->tanggal_lahir  = date('Y-m-d', strtotime($ttl[1]));

        return view('editPasien', ['pasien' => $pasien]);
    }

    public function updatePasien(Request $request, $id) {
        $pasien = Pasien::findOrFail($id);
        $pasien->no_rm = $request->get('no_rm');
        $pasien->fullname = $request->get('fullname');
        $pasien->jenis_kel = $request->get('jenis_kel');
        $pasien->no_bpjs = $request->get('no_bpjs');
        $pasien->no_hp = $request->get('no_hp');
        $pasien->alamat = $request->get('alamat');
        $pasien->riwayat_alergi_obat = $request->get('alergi_obat');
        if ($request->get('tanggal_lahir')) {
            $pasien->ttl = $request->get('tempat_lahir').', '.$request->get('tanggal_lahir');
        } else {
            $pasien->ttl = $request->get('tempat_lahir').','.$request->get('tanggal_lahir_old');
        }
        $pasien->pekerjaan = $request->get('pekerjaan');
        $pasien->save();

        return redirect()->route('pasienIndex')->with('status', 'Pasien berhasil diubah');
    }

    public function deletePasien($id) {
        $pasien = Pasien::findOrFail($id);

        $pasien->delete();

        return redirect()->route('pasienIndex')->with('status', 'Pasien berhasil dihapus');
    }

    //Rawat
    public function daftarPasien(Request $request) {
        $rawat = new Rawat;
        $rawat->pasien_id = $request->get('pasien_id');
        $rawat->tekanan_darah = $request->get('tekanan_darah');
        $rawat->respirasi_rate = $request->get('respirasi_rate');
        $rawat->tinggi_badan = $request->get('tinggi_badan');
        $rawat->nadi = $request->get('nadi');
        $rawat->suhu = $request->get('suhu');
        $rawat->berat_badan = $request->get('berat_badan');
        $rawat->save();

        return redirect()->route('pasienIndex')->with('status', 'Pasien berhasil didaftar');
    }

    public function periksaPasien() {
        $rawat = Rawat::with(['pasiens', 'dokter'])->orderBy('status', 'ASC')->orderBy('created_at', 'ASC')->get();

        return view('periksaPasien', ['rawats' => $rawat]);
    }

    public function doPeriksaPasien($id) {
        $periksa = Rawat::where('id', $id)->with('pasiens')->first();

        $ttl = explode(',', $periksa->pasiens->ttl);
        $tanggal_lahir = str_replace(" ","",$ttl[1]);
        $now = date("Y-m-d");

        $datetime1 = date_create($tanggal_lahir);
        $datetime2 = date_create($now);

        $diff = abs(strtotime($now) - strtotime($tanggal_lahir));

        $periksa->umur = intval($diff/(365*60*60*24));

        return view('formPeriksa', ['periksa' => $periksa]);
    }

    public function periksaUpdate(Request $request, $id) {
        $periksa = Rawat::findOrFail($id);

        $periksa->dokter_id = \Auth::user()->id;
        $periksa->sub_and_obj = $request->get('sub_and_obj');
        $periksa->diagnosa = $request->get('diagnosa');
        $periksa->terapi = $request->get('terapi');
        $periksa->status = '1';

        $periksa->save();

        return redirect()->route('periksaPasien')->with('status', 'Pasien berhasil diperiksa');
    }

    public function riwayatPasien($id) {
        $pasien = Rawat::where([['pasien_id', $id], ['status', '1']])->with(['dokter', 'pasiens'])->get();

        return view('riwayatPasien', ['pasiens' => $pasien]);
    }

    public function getData($id) {
        $periksa = Rawat::findOrFail($id);

        return $periksa;
    }

    public function periksaEdit(Request $request) {
        $periksa = Rawat::findOrFail($request->get('periksa_id'));

        $periksa->tekanan_darah = $request->get('tekanan_darah');
        $periksa->respirasi_rate = $request->get('respirasi_rate');
        $periksa->tinggi_badan = $request->get('tinggi_badan');
        $periksa->nadi = $request->get('nadi');
        $periksa->suhu = $request->get('suhu');
        $periksa->berat_badan = $request->get('berat_badan');
        $periksa->save();

        return redirect()->back()->with('status', 'Data berhasil diubah');
    }

    public function dokterBerkas() {
        $rawat = Rawat::where('status', 1)->with(['pasiens', 'dokter'])->get();

        return view('dokterBerkas', ['rawats' => $rawat]);
    }

    public function dokterPrint(Request $request) {

        $data_pasien = Rawat::where('id', $request->rawat_id)->with(['pasiens', 'dokter'])->first();
        
        if ($request->get('tipe_surat')) {
            $tipe_surat = 'templatesurat.suratSehat';
            $buta_warna = $request->get('buta_warna');
            $keperluan = $request->get('keperluan');
            $hasil = $request->get('pernyataan_sehat');
        }

        $ttl = explode(',', $data_pasien->pasiens->ttl);
        $tanggal_lahir = str_replace(" ","",$ttl[1]);
        $now = date("Y-m-d");

        $datetime1 = date_create($tanggal_lahir);
        $datetime2 = date_create($now);

        $diff = abs(strtotime($now) - strtotime($tanggal_lahir));

        $umur = intval($diff/(365*60*60*24));

        $data = [
            'dokter_name' => $data_pasien->dokter->full_name,
            'pasien_name' => $data_pasien->pasiens->fullname,
            'no_rm' => $data_pasien->pasiens->no_rm,
            'umur' => $umur,
            'jenis_kel' => $data_pasien->pasiens->jenis_kel,
            'pekerjaan' => $data_pasien->pasiens->pekerjaan,
            'alamat' => $data_pasien->pasiens->alamat,
            'tekanan_darah' => $data_pasien->tekanan_darah,
            'berat_badan' => $data_pasien->berat_badan,
            'tinggi_badan' => $data_pasien->tinggi_badan,
            'buta_warna' => $buta_warna,
            'keperluan' => $keperluan,
            'hasil' => $hasil,
        ];

        // dd($data_pasien);

        $pdf = PDF::loadView($tipe_surat, $data);

        return $pdf->download('surat_sehat.pdf');
    }
}
