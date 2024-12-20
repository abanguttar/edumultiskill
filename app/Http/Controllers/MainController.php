<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\Kelas;
use App\Models\Topik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{

    protected $link;
    protected $banner;
    protected $logo_mitra;
    protected $testimoni;
    protected $kelas;
    protected $topik;

    public function __construct()
    {
        parent::__construct();
        $this->link = DB::table('links as l');
        $this->banner = DB::table('banners');
        $this->logo_mitra = DB::table('logo_mitras');
        $this->testimoni = DB::table('testimonies');
        $this->kelas = new Kelas();
        $this->topik = new Topik();
    }

    public function index()
    {
        $title = 'Beranda';
        $banners = $this->banner->orderBy('urutan')->get();
        $logo_mitra_1 = $this->logo_mitra->orderBy('urutan')->get();
        $logo_mitra_2 = array_reverse(json_decode($logo_mitra_1));
        $link = $this->link->first();
        $dol = (object)[
            'logo_1' => $logo_mitra_1,
            'logo_2' => $logo_mitra_2,
        ];
        $testimonies = $this->testimoni->orderBy('urutan')->get();
        $accordions = [
            (object)[
                'id' => 'fasilitas',
                'title' => 'Fasilitas Lengkap',
                'description' => 'Kami menyediakan fasilitas lengkap yang dirancang untuk mendukung proses pembelajaran yang efektif dan nyaman bagi para peserta.',
                'image' => 'Assets-20'
            ],
            (object)[
                'id' => 'belajaronline',
                'title' => 'Belajar secara Online dan Offline',
                'description' => 'Selesaikan pembelajaran secara online dan offline, kapan saja dimana saja, selama Anda terhubung dengan Internet.',
                'image' => 'Assets-21'
            ],
            (object)[
                'id' => 'terstruktur',
                'title' => 'Sistem Pembelajaran Terstruktur',
                'description' => 'Materi dikemas dengan terstruktur untuk mempermudah Anda memahami materi yang disampaikan.',
                'image' => 'Assets-22'
            ],
            (object)[
                'id' => 'berkualitas',
                'title' => 'Materi Berkualitas',
                'description' => 'Materi yang disampaikan berkualitas.',
                'image' => 'Assets-23'
            ],
            (object)[
                'id' => 'berpengalaman',
                'title' => 'Instruktur Berpengalaman',
                'description' => 'Anda akan dibimbing oleh instruktur yang berpengalaman dibidangnya.',
                'image' => 'Assets-24'
            ],
            (object)[
                'id' => 'terjangkau',
                'title' => 'Biaya Terjangkau',
                'description' => 'Kami percaya bahwa aksesibilitas adalah kunci untuk memberikan kesempatan yang adil bagi semua individu yang ingin meningkatkan keterampilan mereka.',
                'image' => 'Assets-25'
            ],
        ];
        return view('/member/beranda', compact('title', 'link', 'banners', 'dol', 'accordions', 'testimonies'));
    }


    public function faq($slug)
    {
        $faq = FAQ::with('content')->where('slug', $slug)->first();
        $title = $faq->title;
        $slug = $faq->slug;
        // dd($slug);
        return view("member.faq.index", compact('title', 'slug', 'faq'));
    }

    public function faqAll()
    {
        $faqs = FAQ::with('content')->get();
        $title = 'Hal hal yang sering jadi pertanyaan';
        // dd($slug);
        return view("member.faq.all", compact('title', 'faqs'));
    }

    public function program($tipe)
    {
        $title = $tipe;
        $query = $this->kelas::with('tutor');
        if ($tipe === 'prakerja') {
            $kelas = $query->where('jenis', 'prakerja')->get();
        }
        return view("member.program", compact('title', 'kelas', 'tipe'));
    }


    public function companyProfile()
    {
        $title = "Company Profile";
        $sarana_prasaranas = DB::table('sarana_prasaranas')->get();
        $gallery = DB::table('gallery')->get();
        $image_saranas = DB::table('image_saranas')->get();

        return view("member.company-profile", compact('title', 'image_saranas', 'gallery', 'sarana_prasaranas'));
    }


    public function detail($program, $slug)
    {
        $kelas = $this->kelas::with('deskripsi')
            ->with(['jadwalPelatihans' => function ($query) {
                $query->where('status', 'aktif');
            }])->with('skknis')->with('kodeUnits')
            ->where('slug', $slug)->first();
        $materi = $this->topik->where('kelas_id', $kelas->id)->orderBy('urutan')->get();
        $title = $kelas->judul_kelas;
        $recomends = $this->kelas->where('jenis', $program)->get();

        return view("member.program.detail", compact('title', 'program', 'kelas', 'materi', 'recomends'));
    }


    public function login()
    {
        $title = 'Autentikasi';
        return view('member.auth', compact('title'));
    }
}
