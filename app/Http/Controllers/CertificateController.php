<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Kelas;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CertificateController extends Controller
{

    protected $url = '/validate/certificate/';

    public function previewHeader($id, $nilai)
    {
        $dompdf = new Dompdf();
        $data = Kelas::with('deskripsi')->findOrFail($id);

        $view = 'header';


        if ($data->jenis !== 'umum') {
            $view = 'header';
        }

        // dd($view);

        $time = time();
        $month = date('m', $time);
        $year = date('Y', $time);
        $date = strftime('%d %B %Y', $time);

        $roman = [1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V', 6 => 'VI', 7 => 'VII', 8 => 'VIII', 9 => 'IX', 10 => 'X', 11 => 'XI', 12 => 'XII'];
        // $year = date('Y', $time);
        // dd($data_lembaga_pelatihan->master_partner_id);
        if ($data->jenis == 'umum') {
            $no_certificate = 'No. 001/'  . $data->id . "/$roman[$month]/$year";
        } else {

            $no_certificate = 'No. 001/'  . $data->id . "/$roman[$month]/$year";
        }
        $url = $this->url . 'dummy';

        $myQrCode = base64_encode(QrCode::format('svg')->size(80)->errorCorrection('H')->generate($url));

        if ($data->deskripsi->durasi_pelatihan !== null) {
            $durasi = explode(',', $data->deskripsi->durasi_pelatihan);
        }
        $jam = $durasi[0] ?? 00;
        $menit = $durasi[1] ?? 00;


        #no certificate No. P/KBK-15.1/03.2024/PERPUBLISHSERTIFIKATPERJADWAL
        $pdf = view(
            'certificate/' . $view . '',
            [
                'title' => $data->deskripsi->sertifikat_judul,
                'nama' => 'Nama Peserta Penerima Sertifikat',
                'day' => 'Senin',
                'data' => $data,
                'nilai' => $nilai,
                'date' => '01 Januari 2024',
                'jam' => $jam,
                'menit' => $menit,
                'jenis' => $data->jenis,
                'myQrCode' => $myQrCode,
                'dudika' => null,
                'no_certificate' => $no_certificate,

            ]
        )->render();


        $dompdf->loadHTML($pdf);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();
        return $dompdf->stream('Sertifikat.pdf', ['Attachment' => false]);
    }


    public function previewContent($id)
    {
        $dompdf = new Dompdf();
        $data = Kelas::with('skknis')->with('kodeUnits')->findOrFail($id);


        #no certificate No. P/KBK-15.1/03.2024/PERPUBLISHSERTIFIKATPERJADWAL
        $pdf = view(
            'certificate/content',
            [
                'title' => $data->judul_kelas,
                'data' => $data,

            ]
        )->render();


        $dompdf->loadHTML($pdf);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();
        return $dompdf->stream('Sertifikat-Content.pdf', ['Attachment' => false]);
    }
}
