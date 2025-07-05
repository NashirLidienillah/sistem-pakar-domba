<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AturanMassalSeeder extends Seeder
{
    public function run()
    {
        // 1. Ambil semua data penyakit dan gejala untuk mapping Kode -> ID
        $penyakitData = $this->db->table('penyakit')->get()->getResultArray();
        $gejalaData = $this->db->table('gejala')->get()->getResultArray();

        $penyakitMap = [];
        foreach ($penyakitData as $p) {
            $penyakitMap[$p['kode_penyakit']] = $p['id'];
        }

        $gejalaMap = [];
        foreach ($gejalaData as $g) {
            $gejalaMap[$g['kode_gejala']] = $g['id'];
        }

        // 2. Siapkan data aturan Anda di sini
        // =================================================================
        // <<< SALIN DATA DARI SPREADSHEET ANDA KE DALAM ARRAY DI BAWAH INI >>>
        // Format: [ 'kode_penyakit', 'kode_gejala', cf_pakar ],
        // =================================================================
        $dataAturan = [
            // Contoh data, ganti atau tambahkan dengan data Anda
            ['P01','G01','0.8'],
            ['P01','G02','0.7'],
            ['P01','G03','0.4'],
            ['P01','G04','0.5'],
            ['P01','G18','0.3'],
            ['P02','G03','0.6'],
            ['P02','G04','0.8'],
            ['P02','G05','0.7'],
            ['P02','G10','0.9'],
            ['P02','G14','0.5'],
            ['P02','G15','0.4'],
            ['P03','G03','0.5'],
            ['P03','G06','1.0'],
            ['P03','G07','0.8'],
            ['P03','G18','0.6'],
            ['P04','G03','0.5'],
            ['P04','G08','0.9'],
            ['P04','G09','0.6'],
            ['P04','G17','0.4'],
            ['P05','G03','0.3'],
            ['P05','G11','0.9'],
            ['P05','G12','0.8'],
            ['P05','G13','0.6'],
            ['P06','G03','0.5'],
            ['P06','G04','0.6'],
            ['P06','G05','0.8'],
            ['P06','G14','0.7'],
            ['P06','G15','0.9'],
            ['P06','G18','0.7'],
            ['P07','G03','0.6'],
            ['P07','G04','0.5'],
            ['P07','G07','0.7'],
            ['P07','G16','0.9'],
            ['P07','G17','0.8'],
            ['P07','G18','0.6'],
            ['P02','G01','0.2'],
            ['P02','G02','0.1'],
            ['P01','G05','0.2'],
            ['P01','G10','0.3'],
            ['P01','G17','0.2'],
            ['P02','G07','0.2'],
            ['P02','G18','0.5'],
            ['P03','G04','0.3'],
            ['P03','G05','0.2'],
            ['P04','G04','0.3'],
            ['P04','G18','0.4'],
            ['P05','G04','0.2'],
            ['P05','G17','0.3'],
            ['P06','G10','0.4'],
            ['P06','G17','0.5'],
            ['P07','G05','0.2'],
            ['P07','G10','0.3'],
            ['P01','G11','0.1'],
            ['P01','G12','0.1'],
            ['P01','G16','0.1'],
            ['P04','G01','0.1'],
            ['P04','G02','0.2'],
            ['P04','G05','0.2'],
            ['P04','G10','0.2'],
            ['P02','G11','0.2'],
            ['P02','G12','0.2'],
            ['P02','G13','0.3'],
            ['P02','G16','0.3'],
            ['P02','G17','0.3'],
            ['P03','G01','0.1'],
            ['P03','G10','0.2'],
            ['P03','G14','0.1'],
            ['P03','G15','0.2'],
            ['P05','G01','0.1'],
            ['P05','G02','0.1'],
            ['P05','G04','0.3'],
            ['P05','G05','0.2'],
            ['P05','G10','0.3'],
            ['P06','G01','0.2'],
            ['P06','G02','0.1'],
            ['P06','G07','0.3'],
            ['P06','G08','0.1'],
            ['P06','G09','0.1'],
            ['P07','G01','0.2'],
            ['P07','G02','0.2'],
            ['P07','G05','0.3'],
            ['P07','G08','0.1'],
            ['P07','G09','0.1'],
            ['P07','G10','0.4'],
            ['P07','G11','0.2'],
            ['P07','G12','0.2'],
            ['P07','G13','0.2'],
            ['P07','G14','0.2'],
            ['P07','G15','0.3'],
            ['P01','G08','0.2'],
            ['P01','G09','0.2'],
            ['P01','G14','0.1'],
            ['P01','G15','0.3'],
            ['P05','G16','0.2'],
            ['P05','G18','0.2'],
            ['P06','G06','0.2'],
            ['P06','G11','0.3'],
            ['P06','G12','0.3'],
            ['P06','G13','0.3'],
            ['P06','G16','0.2'],
            
        ];
    

        // 3. Proses dan format data untuk batch insert
        $batchData = [];
        foreach ($dataAturan as $aturan) {
            $kodePenyakit = $aturan[0];
            $kodeGejala = $aturan[1];
            $cfPakar = $aturan[2];

            // Pastikan kode penyakit dan gejala ada di map
            if (isset($penyakitMap[$kodePenyakit]) && isset($gejalaMap[$kodeGejala])) {
                $batchData[] = [
                    'penyakit_id' => $penyakitMap[$kodePenyakit],
                    'gejala_id'   => $gejalaMap[$kodeGejala],
                    'cf_pakar'    => $cfPakar,
                ];
            }
        }
        
        // 4. Hapus data lama (opsional, jika ingin memulai dari awal)
        $this->db->table('aturan')->truncate();

        // 5. Masukkan data baru secara massal (batch insert)
        if (!empty($batchData)) {
            $this->db->table('aturan')->insertBatch($batchData);
            echo count($batchData) . " aturan berhasil dimasukkan.";
        } else {
            echo "Tidak ada data aturan untuk dimasukkan atau terjadi kesalahan mapping kode.";
        }
    }
}