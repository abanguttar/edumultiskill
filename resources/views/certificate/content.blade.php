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
$imagePath = base_path('public/master-certificate/content.png');
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

    #container-kelas {
        position: relative;
        top: 18%;
        left: 7%;
        width: 90%;
        display: flex;
        justify-content: end;
        text-align: right;
    }

    #container-skkni {
        position: absolute;
        top: 33%;
        left: 7%;
        width: 90%;
        display: flex;
        justify-content: end;
        text-align: right;
    }

    #container-kode-unit {
        position: absolute;
        top: 59%;
        left: 5.7%;
        width: 90%;
        display: flex;
        justify-content: start;
        text-align: start;
    }

    .nama_pelatihan {
        font-size: 28px;
        font-weight: bold;
    }

    .skkni {
        font-size: 20px;
        font-weight: bold;
        letter-spacing: 4px;

    }

    .kode-unit {
        font-size: 18px;
        letter-spacing: 3px;

    }
</style>




<body>
    <img id="img-certificate" src="data:image/jpeg;base64, <?php echo $imageData; ?>" alt="img-certificate">
    <div id="container-kelas" class="container">
        <h4 class="nama_pelatihan" style=" letter-spacing: 4px">
            <i>{{ $data->judul_kelas }} </i>
        </h4>
    </div>
    <div id="container-skkni" class="container">
        <ul class="skkni" style="list-style-type: none; margin-right: 20px;">
            @foreach ($data->skknis as $skkni)
                <li style="margin: 0; padding: 0;">
                    <p style="margin: 0; padding: 0;"><b>{{ $skkni->skkni }}</b></p>
                </li>
            @endforeach
        </ul>
    </div>
    <div id="container-kode-unit" class="container">
        <ul class="kode-unit" style="list-style-type: none; margin-right: 20px;">
            @foreach ($data->kodeUnits as $kode_unit)
                <li style="margin: 0; margin-top: 6px; padding: 0;">
                    <p style="margin: 0; padding: 0;">{{ $kode_unit->kode_unit }} - {{ $kode_unit->keterangan }}</p>
                </li>
            @endforeach
        </ul>
    </div>


</body>

</html>
