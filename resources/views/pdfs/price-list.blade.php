<!DOCTYPE html>
<html lang="{{ $language === 'TR' ? 'tr' : 'en' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $translations['university_name'] }} - {{ $translations['programs'] }}</title>
    <style>
        @page {
            margin: 12mm;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 9pt;
            color: #333;
            line-height: 1.3;
            margin: 0;
            padding: 0;
            padding-bottom: 60px;
            background: white;
            position: relative;
            min-height: 100vh;
        }

        .header {
            text-align: center;
            margin-bottom: 8px;
            padding: 12px 10px;
            border: 3px solid #dc2626;
            border-radius: 10px;
            background-color: #ffffff;
            position: relative;
            min-height: 100px;
            overflow: hidden;
            page-break-inside: avoid;
        }

        .logo-container {
            float: left;
            width: 70px;
            margin-right: 12px;
        }

        .logo {
            width: 70px;
            height: 70px;
        }

        .qr-container {
            float: right;
            width: 70px;
            text-align: center;
            margin-left: 12px;
        }

        .qr-code {
            width: 70px;
            height: 70px;
            margin-bottom: 2px;
        }

        .qr-text {
            font-size: 6.5pt;
            color: #dc2626;
            font-weight: bold;
        }

        .header-content {
            padding-top: 8px;
            overflow: hidden;
            margin-bottom: 0;
        }

        .university-name {
            font-size: 16pt;
            font-weight: bold;
            color: #dc2626;
            margin-bottom: 6px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .programs-title {
            font-size: 13pt;
            font-weight: bold;
            color: #1e40af;
            margin-bottom: 4px;
        }

        .academic-year {
            font-size: 10pt;
            font-weight: bold;
            color: #dc2626;
        }

        .clearfix::after {
            content: "";
            display: table;
            clear: both;
            height: 0;
            visibility: hidden;
        }

        .degree-section {
            margin-bottom: 6px;
            margin-top: 0;
            page-break-inside: avoid;
        }

        .degree-title {
            font-size: 12pt;
            font-weight: bold;
            color: #dc2626;
            margin-bottom: 6px;
            padding: 6px 8px;
            background-color: #fee2e2;
            border-left: 4px solid #dc2626;
        }

        .faculty-section {
            margin-bottom: 6px;
            margin-top: 0;
        }

        .faculty-name {
            font-size: 10pt;
            font-weight: bold;
            color: #b91c1c;
            margin-bottom: 3px;
            margin-top: 0;
            padding: 4px 6px;
            background-color: #fecaca;
            border-left: 3px solid #b91c1c;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 6px;
            margin-top: 0;
            page-break-inside: avoid;
            font-size: 7.5pt;
        }

        th {
            background-color: #dc2626;
            color: white;
            padding: 6px 5px;
            text-align: left;
            font-weight: bold;
            font-size: 7.5pt;
            border: 1px solid #b91c1c;
            line-height: 1.2;
        }

        th.center {
            text-align: center;
        }

        td {
            padding: 4px 5px;
            border: 1px solid #cbd5e1;
            font-size: 7.5pt;
            line-height: 1.2;
        }

        tr:nth-child(even) {
            background-color: #f1f5f9;
        }

        tr:hover {
            background-color: #e2e8f0;
        }

        .price {
            text-align: center;
            font-weight: bold;
            color: #dc2626;
        }

        .footer {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            margin: 0;
            padding: 8px;
            background-color: #dc2626;
            border-top: 2px solid #dc2626;
            font-size: 8pt;
            color: #ffffff;
            font-weight: bold;
        }

        .footer a {
            color: #1e40af;
            text-decoration: none;
        }

        .page-break {
            page-break-after: always;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
                padding-bottom: 60px;
            }

            .footer {
                position: fixed;
                bottom: 0;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header clearfix">
        <div class="logo-container">
            <img src="{{ public_path('images/BSMU-simvol.png') }}" alt="BSMU Logo" class="logo">
        </div>

        <div class="qr-container">
            <img src="data:image/svg+xml;base64,{{ $qrCode }}" alt="QR Code" class="qr-code">
            <div class="qr-text">{{ $translations['scan_me'] }}</div>
        </div>

        <div class="header-content">
            <div class="university-name">{{ $translations['university_name'] }}</div>
            <div class="programs-title">{{ $translations['programs'] }}</div>
            <div class="academic-year">{{ $translations['academic_year'] }}</div>
        </div>
    </div>

    <!-- Content -->
    @foreach ($degrees as $degreeIndex => $degree)
        @if ($degreeIndex > 0 && $degreeIndex % 2 === 0)
            <div class="page-break"></div>
        @endif

        <div class="degree-section">
            <div class="degree-title">{{ $degree['name'] }}</div>

            @foreach ($degree['faculties'] as $faculty)
                <div class="faculty-section">
                    <div class="faculty-name">{{ $faculty['name'] }}</div>

                    <table>
                        <thead>
                            <tr>
                                <th style="width: 40%;">{{ $translations['program_name'] }}</th>
                                <th class="center" style="width: 15%;">{{ $translations['standard_annual_fee'] }}</th>
                                <th class="center" style="width: 15%;">
                                    {{ $translations['fall_semester'] }}<br>{{ $translations['scholarship_10'] }}</th>
                                <th class="center" style="width: 15%;">
                                    {{ $translations['spring_semester'] }}<br>{{ $translations['scholarship_10'] }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faculty['programs'] as $program)
                                <tr>
                                    <td>{{ $program['name'] }}</td>
                                    <td class="price">€ {{ number_format($program['price_per_year'], 0, ',', '.') }}
                                    </td>
                                    <td class="price">€ {{ number_format($program['fall_semester'], 0, ',', '.') }}
                                    </td>
                                    <td class="price">€ {{ number_format($program['spring_semester'], 0, ',', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    @endforeach

    <!-- Footer -->
    <div class="footer">
        {{ $translations['for_more_info'] }}<br>
        <a href="https://bsmu.edu.rs">www.bsmu.edu.rs</a>
    </div>
</body>

</html>
