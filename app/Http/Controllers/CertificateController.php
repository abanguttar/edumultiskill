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
        $date_cert = date('m.Y', $time);
        $date = strftime('%d %B %Y', $time);
        // $year = date('Y', $time);
        // dd($data_lembaga_pelatihan->master_partner_id);
        if ($data->jenis == 'umum') {
            $no_certificate = 'No. Umum/'  . $data->id . '.' . 'Jadwal/' . $date_cert;
        } else {

            $no_certificate = 'No. Prakerja/'  . $data->id . '.' . 'Jadwal/' . $date_cert;
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
}
