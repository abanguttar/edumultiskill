<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<?php
if ($jenis == 'prakerja') {
    $imagePath = base_path('public/master-certificate/header.jpg');
} else {
    $imagePath = base_path('public/master-certificate/header.jpg');
}
$imageData = base64_encode(file_get_contents($imagePath));
?>

<style>
    html,
    body {
        /* height: 100%; */
        margin: 0;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    #img-certificate {
        width: 100%;
        position: absolute;
        z-index: -100;
    }

    .container {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
    }

    #sertifikat_judul {
        text-align: right;
        position: relative;
        right: 75.6%;
        top: 5%;
    }

    .soft-font {
        font-stretch: inherit;
        opacity: 0.7;
    }

    .nama_pelatihan {
        font-size: 28px;
        font-weight: bold;
    }



    .nema_pelatihan_parent {
        position: fixed;
        left: 6%;
        top: 56%;
        z-index: 17;
    }

    #tenaga_wrapped {
        margin-top: -0.8rem;
    }

    .tenaga-name {
        font-size: 14px;
        margin: 0;
        padding: 0;
        margin-bottom: 5px;
    }

    .margin-tenaga-name {
        margin-left: -18px;
        margin-top: -6px;
    }

    .margin-metode-name {
        margin-left: -38px;
        margin-top: -6px;
    }

    .size-p {
        font-size: 19px;
    }

    #wrapper-logo-lp {
        position: fixed;
        display: flex;
        justify-content: center;
        text-align: center;
        top: 0;
        right: 0;
        z-index: 996;
        width: 214px;
        background-color: #e2dfce
    }

    .centered-items {
        display: flex;
        justify-content: center;
    }
</style>

{{-- @if ($jenis == 'prakerja')

    <style>
        .nama_peserta {
            position: relative;
            text-align: right;
            right: 24.5%;
            top: 24%;
            z-index: 14;
        }

        .durasi-wrapped {
            position: fixed;
            text-align: left;
            /* right: 19.5%; */
            left: 79%;
            top: 35%;
            z-index: 14;
        }




        #qr-code {
            position: absolute;
            left: 12%;
            top: 82.2%;
            z-index: 20;
            /* box-shadow: 0 0 10px white; */
            border: 10px solid white;
            /* background-color: white; */

        }



        #jabatan {
            position: fixed;
            z-index: 89;
            right: 32%;
            bottom: 5%;
        }

        .h1_sertifikat {
            position: relative;
            left: 52%;
            z-index: 13;
            top: 19%;
        }
    </style>
    @if ($dudika !== null)
        <style>
            #verifikasi_prakerja {
                position: absolute;
                left: 78.5%;
                top: 70%;
                z-index: 16;
                background-color: #ffe7e7;
                padding-top: 5px;
                padding-left: 10px;
                padding-right: 15px;
            }

            .wrapper-dudika {
                background-color: #ffe7e7;
                height: 70px;
                width: 200px;
                position: fixed;
                bottom: 15px;
                right: 36px;
            }

            .container-dudika {
                height: 70px;
                width: 200px;
                position: relative;
                margin: 0;
                padding: 0;
            }

            #dudika-img {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
        </style>
    @else
        <style>
            #verifikasi_prakerja {
                position: absolute;
                left: 79.4%;
                top: 75%;
                z-index: 16;
            }
        </style>
    @endif
@else
    <style>
        .nama_peserta {
            position: relative;
            text-align: right;
            right: 24.5%;
            top: 36%;
            z-index: 14;
        }

        .durasi-wrapped {
            position: fixed;
            text-align: right;
            /* right: 19.5%; */
            right: 3%;
            top: 23.5%;
            z-index: 14;
        }


        #verifikasi_prakerja {
            position: absolute;
            left: 55%;
            top: 68%;
            z-index: 16;
        }

        #qr-code {
            position: absolute;
            left: 5%;
            top: 82.2%;
            z-index: 20;
            /* box-shadow: 0 0 10px white; */
            border: 10px solid white;
            /* background-color: white; */

        }

        .h1_sertifikat {
            position: relative;
            left: 52%;
            z-index: 13;
            top: 20%;
        }
    </style>

@endif --}}

<style>
    .nama_peserta {
        position: relative;
        text-align: right;
        right: 24.5%;
        top: 36%;
        z-index: 14;
    }

    .durasi-wrapped {
        position: fixed;
        text-align: right;
        /* right: 19.5%; */
        right: 3%;
        top: 23.5%;
        z-index: 14;
    }


    #verifikasi_prakerja {
        position: absolute;
        left: 55%;
        top: 68%;
        z-index: 16;
    }

    #qr-code {
        position: absolute;
        left: 5%;
        top: 82.2%;
        z-index: 20;
        /* box-shadow: 0 0 10px white; */
        border: 10px solid white;
        /* background-color: white; */

    }

    .h1_sertifikat {
        position: relative;
        left: 52%;
        z-index: 13;
        top: 20%;
    }
</style>



<body>
    <img id="img-certificate" src="data:image/jpeg;base64, <?php echo $imageData; ?>" alt="img-certificate">

    {{-- Ini adalah qr code --}}
    <div id="qr-code">
        <img src="data:image/svg+xml;base64,{{ $myQrCode }}" alt="QR Code">
    </div>
    <div class="container">
        <div class="row">
            <div id="wrapper-logo-lp">

                {{-- No certificate diberikan text align center agar element text selalu di tengah --}}
                <p class="no_sertifikat centered-items"
                    style="text-align: center;margin-top: 35px;  font-family: Arial, Helvetica, sans-serif; font-size: 12.4px;  letter-spacing: 2px">
                    {{ $no_certificate }}</p>

            </div>
        </div>




        <div class="row">
            <div class="h1_sertifikat">
                {{-- <h1 style="margin-bottom: -30px; font-size: 40px"></h1> --}}
                <p id="sertifikat_judul" style="font-size: 24px; letter-spacing: 4px">{{ strtoupper($title) }} </p>

            </div>
        </div>


        <div class="row">
            <div class="nama_peserta">
                {{-- Ini adalah nama peserta --}}
                <h1 style="font-style: italic;  font-size: 34px; margin-bottom: -10px; ">{{ $nama }}</h1>
            </div>

            {{-- Agar nama pelatihan tidak melebihi file sertifikat maka dibuat width 85% --}}
            <div class="nema_pelatihan_parent" style="width: 70%; text-align: right; ">
                <h4 class="nama_pelatihan" style=" letter-spacing: 4px">
                    <i>{{ $data->judul_kelas }} </i>
                </h4>
                @if ((int) $nilai >= 80)
                    {{-- Predikat dibuat dengan str upper agar kapital semua --}}
                    <p style="color: #90241a; font-size: 20px; margin-top: -20px;"><b><i>Lulus</i> dengan predikat
                            "SANGAT BAIK"</b>
                    </p>
                @elseif ($nilai > 0)
                    {{-- Predikat dibuat dengan str upper agar kapital semua --}}
                    {{-- <p style="font-size: 20px; margin-top: -14px;">dengan mencapai nilai akhir {{ $nilai }}
                    </p> --}}
                @endif

            </div>

            <div class="durasi-wrapped" style="color: #2d2fa0;!important;font-size: 14px">

                {{-- Ini adalah hari dan tanggal verifikasi prakerja --}}
                <div>
                    <p>{{ $day }}, {{ $date }}</p>
                </div>

                {{-- <p class="size-p"><b>Durasi Pelatihan</b></p> --}}
                {{-- sprintf('%02d', $value) adalah untuk membuat angka memiliki digit nol diawal jika 1 digit 7 menjadi 07 --}}
                <p style="margin-top: 3.4rem">{{ sprintf('%02d', $jam) }} jam
                    {{ sprintf('%02d', $menit) }}
                    Menit</p>

                <div id="tenaga_wrapped" style="margin-top: 58px">
                    <ol class="margin-tenaga-name" style="width: 200px; ">
                        @if ($data->deskripsi->sertifikat_tenaga_pelatih !== null || $data->deskripsi->sertifikat_tenaga_pelatih === '')
                            @php
                                $tenaga_pelatih = explode(',', $data->deskripsi->sertifikat_tenaga_pelatih);
                                $length = count($tenaga_pelatih);
                            @endphp
                            @if ($length > 1)
                                @for ($i = 0; $i < $length; $i++)
                                    <p class="tenaga-name">{{ $tenaga_pelatih[$i] }}</p>
                                @endfor
                            @else
                                <p class="tenaga-name">{{ $data->tenaga_pelatih[0] }}</p>
                            @endif
                        @endif

                    </ol>
                </div>


            </div>


        </div>





    </div>



</body>

</html>
