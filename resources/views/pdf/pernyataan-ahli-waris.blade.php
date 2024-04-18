<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Pernyataan Ahli Waris</title>

    <style>
        body {
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
            position: relative;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 570px;
            background-color: #ffffff;
            border-color: #e8e5ef;
            border-radius: 2px;
            border-width: none;
            border-spacing: 0;
            margin: 0 auto;
            padding-bottom: 25px;
        }

        h3 {
            text-align: center;
            text-decoration: underline;
            text-transform: uppercase;
            margin-top: 30px;
            margin-bottom: 40px;
        }

        .content-body {
            width: 600px;
            margin: 0 auto;
        }

        .content-body p {
            text-indent: 40px;
            text-align: justify;
        }

        .content-body ol {
            padding-left: 20px;
        }

        .content-body ol li{
            padding-left: 10px;
            text-align: justify;
        }
    </style>
</head>
<body>
    <h3>Surat Pernyataan Ahli Waris</h3>

    <div class="content-body">
        <p>
            Kami yang bertanda tangan di bawah ini para ahli waris dari Almarhumah {{ $data['nama_pewaris'] }} menerangkan dengan sesungguhnya dan sanggup diangkat sumpah menurut agama yang kami anut bahwa Almarhumah {{ $data['nama_pewaris'] }} bertempat tinggal terakhir di {{ $data['alamat_pewaris'] }}
        </p>

        <p>
            Semasa hidupnya {{ $data['nama_pewaris'] }} memiliki {{ count($data['list_pewaris']) }} orang anak, yaitu:
        </p>

        <ol>
            @foreach ($data['list_pewaris'] as $anak)
                <li>{{ $anak['nama_anak'] }}, NIK {{ $anak['nik'] }}, lahir di {{ $anak['tempat_lahir'] }} pada tanggal {{ \Carbon\Carbon::parse($anak['tgl_lahir'])->translatedFormat('d F Y') }}.</li>
            @endforeach
        </ol>
    </div>
</body>
</html>