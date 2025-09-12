<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HewansController extends Controller
{
    private $hewan = [
        ["jenis" => "Anjing","ras" => "Golden Retriever","nama" => "Otto","karakteristik" => "Energik dan senang bermain bola","kesayangan" => true],
        ["jenis" => "Anjing","ras" => "Siberian Husky","nama" => "Max","karakteristik" => "Bulu lebat dan mata biru","kesayangan" => true],
        ["jenis" => "Anjing","ras" => "Beagle","nama" => "Bob","karakteristik" => "Ceria dan aktif","kesayangan" => false],
        ["jenis" => "Kucing","ras" => "Persia","nama" => "Luna","karakteristik" => "Anggun dan manja","kesayangan" => true],
        ["jenis" => "Kucing","ras" => "British Short Hair","nama" => "Milo","karakteristik" => "Cerdas dan aktif","kesayangan" => true],
        ["jenis" => "Ikan","ras" => "Koi","nama" => "Nana","karakteristik" => "Indah","kesayangan" => false],
        ["jenis" => "Ikan","ras" => "Mas","nama" => "Goldie","karakteristik" => "Berwarna cerah","kesayangan" => false],
    ];

    public function index()
    {
      $this->tambahHewan(false);
        $hewan = $this->hewan;

        $jumlah = $this->hitungJenis()->getData(true);
        $palindrome = $this->palindrome()->getData(true);
        $genap = $this->jumlahGenap()->getData(true);
        $anagram = $this->cekAnagram("listen", "silent")->getData(true);

        return view('hewan.index', compact('hewan', 'jumlah', 'palindrome', 'genap', 'anagram'));


    }

    public function tambahHewan($withResponse = true)
    {
        $this->hewan[] = [
            "jenis" => "Badak",
            "ras" => "Jawa",
            "nama" => "Rino",
            "karakteristik" => "Pekerja keras",
            "kesayangan" => true
        ];

        if ($withResponse) {
            return response()->json($this->hewan);
        }
    }

    public function kesayangan($order = 'asc')
    {
        $kesayangan = array_filter($this->hewan, fn($h) => $h["kesayangan"]);
        usort($kesayangan, fn($a, $b) => $order === 'asc' ? strcmp($a["nama"], $b["nama"]) : strcmp($b["nama"], $a["nama"]));
        return response()->json($kesayangan);
    }

    public function gantiPersia()
    {
        foreach ($this->hewan as &$h) {
            if ($h["ras"] == "Persia") {
                $h["ras"] = "Maine Coon";
            }
        }
        return response()->json($this->hewan);
    }

    public function hitungJenis()
    {
        $count = [];
        foreach ($this->hewan as $h) {
            $count[$h["jenis"]] = ($count[$h["jenis"]] ?? 0) + 1;
        }
        return response()->json($count);
    }

    public function palindrome()
    {
        $hasil = [];
        foreach ($this->hewan as $h) {
            $nama = strtolower($h["nama"]);
            if ($nama == strrev($nama)) {
                $hasil[] = ["nama" => $h["nama"], "panjang" => strlen($h["nama"])];
            }
        }
        return response()->json($hasil);
    }

    public function jumlahGenap()
    {
        $arr = [15, 18, 3, 9, 6, 2, 12, 14];
        $genap = array_filter($arr, fn($n) => $n % 2 == 0);
        return response()->json([
            "bilangan" => array_values($genap),
            "jumlah" => array_sum($genap)
        ]);
    }

    public function cekAnagram($str1, $str2)
    {
        $a = count_chars(strtolower($str1), 1);
        $b = count_chars(strtolower($str2), 1);
        return response()->json([
            "string1" => $str1,
            "string2" => $str2,
            "anagram" => $a == $b
        ]);
    }
}
