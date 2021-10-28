<?php

namespace App\Http\Controllers;

use App\Udang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Charts\UserChart;

class UdangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = date('Y-m-d');
        $data_udang = DB::table('udangs')
            ->join('status', 'udangs.id', '=', 'status.id_kolam')
            ->select('udangs.*', 'status.*')
            ->where('status.tanggal', $today)
            ->get();

        $labels = $data_udang->flatten(1)->pluck('nama_kolam');
        $data   = $data_udang->flatten(1)->pluck('suhu');
        $colors = $labels->map(function ($item) {
            return $rand_color = '#' . substr(md5(mt_rand()), 0, 6);
        });

        $chart = new UserChart;
        $chart->labels($labels);
        $chart->dataset('Statistik Suhu', 'pie', $data)->backgroundColor($colors);
        // dd($data_udang);
        return view('udang', compact('data_udang', 'chart'))->withTitle('Data Kolam Udang');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Udang  $udang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idkolam = $id;

        $nama_kolam = DB::table('udangs')
            ->where('id', $idkolam)
            ->pluck('nama_kolam');
        $hasil = DB::table('udangs')
            ->join('status', 'udangs.id', '=', 'status.id_kolam')
            ->select('udangs.*', 'status.*')
            ->where('status.id_kolam', $idkolam)
            ->orderBy('status.tanggal', 'desc')
            ->get();
        $X = array('hasildata' => $hasil);
        $HasilPencarian = "";
        $i = 1;
        if (count($hasil) == 0) {
            $HasilPencarian = "<tr class='warning'> <td colspan=10>Data tidak ditemukan</td> </tr>";
        } else {
            foreach ($hasil as $isiD) {

                $HasilPencarian .= "<tr>";
                $HasilPencarian .= "<td>" . $i . "</td>";

                $HasilPencarian .= "<td>" . $isiD->tanggal . "</td>";
                $HasilPencarian .= "<td>" . $isiD->suhu . "</td>";
                $HasilPencarian .= "<td>" . $isiD->th . "</td>";


                $HasilPencarian .= "</tr>";
                $i++;
            }
        }
        $data['tabel'] = $HasilPencarian;
        $data['nama_kolam'] = $nama_kolam;
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Udang  $udang
     * @return \Illuminate\Http\Response
     */
    public function edit(Udang $udang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Udang  $udang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Udang $udang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Udang  $udang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Udang $udang)
    {
        //
    }
}
