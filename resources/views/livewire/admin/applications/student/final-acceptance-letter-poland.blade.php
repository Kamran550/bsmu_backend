<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Öğrenci Belgesi - {{ $student->first_name }} {{ $student->last_name }}</title>
    <style>
        @page {
            margin: 8mm 10mm 8mm 10mm;
            size: A4;
        }

        body {
            font-family: 'DejaVu Sans', 'Helvetica', Arial, sans-serif;
            font-size: 8.5pt;
            line-height: 1.25;
            color: #1a1a1a;
            margin: 0;
            padding: 0;
            padding-bottom: 130px;
            background: #fff;
            position: relative;
            min-height: 100vh;
        }

        /* Watermark */
        body::before {
            content: '';
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            height: 500px;
            background-image: url('{{ public_path('images/BSMU-simvol.png') }}');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            opacity: 0.05;
            z-index: -1;
            pointer-events: none;
        }

        /* ── Header ── */
        .header-wrapper {
            border-bottom: 2px solid #1a2744;
            padding-bottom: 6px;
            margin-bottom: 8px;
        }

        .header-top-accent {
            height: 3px;
            background: linear-gradient(90deg, #1a2744 0%, #c5a55a 50%, #1a2744 100%);
            margin-bottom: 6px;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        .header-table td {
            vertical-align: middle;
        }

        .logo-cell {
            width: 70px;
            text-align: left;
        }

        .logo {
            max-width: 22mm;
            height: auto;
        }

        .title-cell {
            text-align: center;
            padding: 0 10px;
        }

        .university-name {
            font-size: 12pt;
            font-weight: normal;
            color: #1a2744;
            letter-spacing: 0.6px;
            margin: 0;
        }

        .department-name {
            font-size: 7.5pt;
            color: #555;
            margin-top: 3px;
            letter-spacing: 0.5px;
        }

        .date-barcode-cell {
            width: 120px;
            text-align: right;
            vertical-align: middle;
        }

        .date-barcode-cell .barcode-wrap {
            margin-bottom: 4px;
            display: inline-block;
            line-height: 0;
        }

        .date-barcode-cell .barcode-wrap img {
            max-width: 110px;
            height: auto;
            max-height: 28px;
        }

        .date-barcode-cell .date-text {
            font-size: 7.5pt;
            color: #444;
        }

        .ref-number {
            font-size: 6.5pt;
            color: #555;
            text-align: right;
            margin-bottom: 4px;
        }

        /* ── Document Title (Bilingual) ── */
        .document-title {
            text-align: center;
            margin: 8px 0 6px 0;
        }

        .document-title h1 {
            font-size: 10pt;
            font-weight: bold;
            color: #1a2744;
            letter-spacing: 1px;
            margin: 0;
            padding: 6px 0;
            display: inline-block;
            border-bottom: 2px solid #c5a55a;
        }

        /* ── Student Info (Bilingual labels) ── */
        .content-wrapper {
            display: table;
            width: 100%;
            margin: 0;
            border-spacing: 15px 0;
        }

        .info-cell {
            display: table-cell;
            vertical-align: top;
            width: auto;
        }

        .photo-cell {
            display: table-cell;
            vertical-align: top;
            width: 110px;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 7pt;
            line-height: 1.2;
        }

        .info-table tr {
            border-bottom: 1px solid #e8e8e8;
        }

        .info-table tr:last-child {
            border-bottom: none;
        }

        .info-table td {
            padding: 2px 4px;
            vertical-align: top;
        }

        .info-table .label-col {
            font-weight: bold;
            color: #1a2744;
            width: 42%;
            white-space: normal;
            font-size: 6.5pt;
        }

        .info-table .value-col {
            color: #222;
        }

        /* ── Photo ── */
        .photo-frame {
            width: 110px;
            height: 130px;
            border: none;
            border-radius: 0;
            overflow: hidden;
            background-color: transparent;
        }

        .photo-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .photo-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #aaa;
            font-size: 9pt;
        }

        /* ── Body Text (Bilingual) ── */
        .body-text {
            margin-top: 5px;
            font-size: 7pt;
            line-height: 1;
            color: #222;
            text-align: justify;
            padding: 0 2px;
        }

        .body-text .pl {
            margin-bottom: 2px;
        }

        .body-text .en {
            font-style: italic;
            color: #444;
            margin-bottom: 2px;
        }

        /* ── Signature + Stamp ── */
        .signature-stamp-table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
        }

        .signature-stamp-table td {
            vertical-align: bottom;
        }

        .sig-cell {
            position: relative;
            text-align: right;
            padding: 6px 20px 8px 20px;
            min-height: 52px;
        }

        .sig-stamp-overlay {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-58%);
            width: 72px;
            height: auto;
            max-height: 76px;
            object-fit: contain;
            opacity: 0.82;
            z-index: 2;
            pointer-events: none;
        }

        .sig-cell .sig-name {
            position: relative;
            z-index: 1;
            font-weight: bold;
            font-size: 8pt;
            color: #1a2744;
        }

        .sig-cell .sig-title {
            position: relative;
            z-index: 1;
            font-size: 7.5pt;
            color: #555;
            margin-top: 2px;
        }

        /* ── Verification Footer ── */
        .verification-footer {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 0;
        }

        .verification-date {
            font-weight: bold;
            font-size: 6.5pt;
            color: #1a2744;
            margin-bottom: 2px;
        }

        .verification-card {
            width: 100%;
            border: 1px solid #1a2744;
            border-radius: 6px;
            overflow: hidden;
            margin-bottom: 4px;
        }

        .verification-card-header {
            background: #1a2744;
            color: #fff;
            font-size: 5.5pt;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 3px 12px;
            text-align: center;
        }

        .verification-card-body {
            width: 100%;
            border-collapse: collapse;
        }

        .verification-card-body td {
            vertical-align: middle;
        }

        .verification-qr-cell {
            width: 60px;
            padding: 4px;
            text-align: center;
            background: #f4f6fa;
            border-right: 1px solid #dde1e8;
        }

        .verification-info-cell {
            padding: 4px 8px;
            font-size: 6pt;
            line-height: 1.35;
            color: #333;
        }

        .verification-info-cell strong {
            color: #1a2744;
        }

        .bottom-divider {
            height: 2px;
            background: linear-gradient(90deg, #1a2744 0%, #c5a55a 50%, #1a2744 100%);
            margin: 5px 0;
        }

        .address-block {
            font-size: 5.5pt;
            line-height: 1.2;
            color: #555;
            text-align: center;
        }

        .address-block p {
            margin: 1px 0;
        }

        .address-block .institution-line {
            font-weight: bold;
            color: #1a2744;
            font-size: 6.5pt;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body>

    @php
        use Illuminate\Support\Facades\Storage;

        $program = $student->application?->program;
        $degree = $program?->degree;
        $faculty = $program?->faculty;

        $programNameEn = $program?->getName('EN') ?: $program?->name ?? 'N/A';
        $programNamePl = $program?->getName('PL') ?: $programNameEn;
        $degreeNameEn = $degree?->getName('EN') ?: $degree?->name ?? 'N/A';
        $degreeNamePl = $degree?->getName('PL') ?: $degreeNameEn;
        $facultyNameEn = $faculty?->getName('EN') ?: $faculty?->name ?? 'Institute of Graduate Education';
        $facultyNamePl = $faculty?->getName('PL') ?: $facultyNameEn;

        $studyLangCode = strtoupper($student->study_language ?? 'EN');
        $studyLangEn = match ($studyLangCode) {
            'EN' => 'English',
            'TR' => 'Turkish',
            'PL' => 'Polish',
            default => 'English',
        };
        $studyLangDisplay = language_to_polish($studyLangEn);

        $nationalityDisplay = nationality_to_polish($student->nationality);
        $placeOfBirthDisplay = nationality_to_polish($student->place_of_birth ?? $student->nationality);

        $educationTypeEn = 'Full time';
        $educationTypePl = 'Tam zamanlı öğrenim';

        $classYear = $student->current_course ?? 1;
        $classEn = "Lesson stage ({$classYear}st year)";
        $classPl = "Ders Aşaması ({$classYear}. öğrenim yılı)";

        $scholarshipStatus = $student->scholarship_status ?? '75%';
        $scholarshipEn = "{$scholarshipStatus} Scholarship";
        $scholarshipPl = '%50 Burs';

        if (str_contains($scholarshipStatus, '100')) {
            $scholarshipPl = '100% Burs';
        } elseif (str_contains($scholarshipStatus, '75')) {
            $scholarshipPl = '%75 Burs';
        } elseif (str_contains($scholarshipStatus, '50')) {
            $scholarshipPl = '%50 Burs';
        } else {
            $scholarshipPl = $scholarshipStatus . ' Burs';
        }

        $startYear = $student->graduation_year ?? now()->year;
        $endYear = $startYear + 1;
        $academicYearEn = "{$startYear}-{$endYear} academic year";
        $academicYearPl = "Akademik yıl {$startYear}-{$endYear}";
    @endphp

    <!-- Top Accent Line -->
    <div class="header-top-accent"></div>
    {{ now()->format('d/m/Y') }}
    <!-- Header -->
    <div class="header-wrapper">
        <div class="ref-number">
            Referans Numarası / Reference No:
            {{ $student->application_number ?? now()->format('d/m/Y') }}/{{ str_pad($student->id, 3, '0', STR_PAD_LEFT) }}
            {{ now()->format('d/m/Y') }}

        </div>
        <table class="header-table">
            <tr>
                <td class="logo-cell">
                    @php
                        $logoPath = public_path('images/BSMU-simvol.png');
                        $logoData = file_exists($logoPath) ? base64_encode(file_get_contents($logoPath)) : '';
                        $logoMime = 'image/jpeg';
                    @endphp
                    @if ($logoData)
                        <img src="data:{{ $logoMime }};base64,{{ $logoData }}" alt="BSMU Logo" class="logo">
                    @endif
                </td>
                <td class="title-cell">
                    <div class="university-name">
                        BALKAN SCIENCE AND MANAGEMENT UNIVERSITY
                    </div>
                    <div class="department-name">
                        Öğrenci İşleri Departmanı / Student Affairs Department
                    </div>
                </td>
                <td class="date-barcode-cell">
                    @php
                        $barcodeCode =
                            trim($student->student_number ?? ($student->application_number ?? '')) ?:
                            'BSMU-' . $student->id . '-' . now()->format('Ymd');
                        $barcodeBase64 = '';
                        try {
                            $barcodePng = new \Picqer\Barcode\BarcodeGeneratorPNG()->getBarcode(
                                $barcodeCode,
                                \Picqer\Barcode\BarcodeGenerator::TYPE_CODE_128,
                                1,
                                22,
                                [26, 39, 68],
                            );
                            $barcodeBase64 = base64_encode($barcodePng);
                        } catch (\Throwable $e) {
                            \Log::error('Barcode error: ' . $e->getMessage());
                            // fallback - barcode hidden
                        }
                    @endphp
                    @if ($barcodeBase64)
                        <div class="barcode-wrap">
                            <img src="data:image/png;base64,{{ $barcodeBase64 }}" alt="Barcode"
                                style="max-width: 110px; height: auto; max-height: 28px; display: block;" />
                        </div>
                    @endif
                    <div class="date-text">{{ now()->format('d/m/Y') }}
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Document Title (Bilingual) -->
    <div class="document-title">
        <h1>DOCUMENTATION OF STUDENT STATUS | ÖĞRENCİ BELGESİ</h1>
    </div>

    <!-- Student Information (Bilingual: PL / EN) -->
    <div class="content-wrapper">
        <div class="info-cell">
            <table class="info-table">
                <tr>
                    <td class="label-col">ID card number / Pasaport No </td>
                    <td class="value-col">{{ $student->passport_number ?? ($student->student_number ?? 'N/A') }}</td>
                </tr>
                <tr>
                    <td class="label-col">Name - surname / Ad - Soyadı</td>
                    <td class="value-col">{{ strtoupper($student->first_name) }} {{ strtoupper($student->last_name) }}
                    </td>
                </tr>
                <tr>
                    <td class="label-col">Father name / Baba Adı</td>
                    <td class="value-col">{{ strtoupper($student->father_name ?? 'N/A') }}</td>
                </tr>
                <tr>
                    <td class="label-col">Nationality / Uyruk</td>
                    <td class="value-col">{{ $nationalityDisplay }}</td>
                </tr>
                <tr>
                    <td class="label-col">Gender / Cinsiyet</td>
                    <td class="value-col">
                        {{ $student->gender ? (strtolower($student->gender) === 'male' ? 'Male / Erkek' : (strtolower($student->gender) === 'female' ? 'Female / Kadın' : ucfirst($student->gender))) : 'N/A' }}
                    </td>
                </tr>
                <tr>
                    <td class="label-col">Date of birth / Doğum tarihi</td>
                    <td class="value-col">
                        {{ $student->date_of_birth ? $student->date_of_birth->format('d.m.Y') : 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label-col">Place of birth / Doğum yeri</td>
                    <td class="value-col">{{ $placeOfBirthDisplay }}</td>
                </tr>
                <tr>
                    <td class="label-col">Academic unit / Akademik birim</td>
                    <td class="value-col">Institute of Graduate
                        Education (Multinational) / Lisansüstü Eğitim Enstitüsü (Çokuluslu)</td>
                </tr>
                <tr>
                    <td class="label-col">Program / Program</td>
                    <td class="value-col">{{ $programNamePl }} - {{ $degreeNamePl }} / {{ $programNameEn }} -
                        {{ $degreeNameEn }}</td>
                </tr>
                <tr>
                    <td class="label-col">Class / Sınıf</td>
                    <td class="value-col">{{ $classEn }} / {{ $classPl }}</td>
                </tr>
                <tr>
                    <td class="label-col">Education type / Eğitim Tipi</td>
                    <td class="value-col">{{ $educationTypeEn }} / {{ $educationTypePl }}</td>
                </tr>
                <tr>
                    <td class="label-col">Scholarship status / Bursluluk Statüsü</td>
                    <td class="value-col">{{ $scholarshipEn }} / {{ $scholarshipPl }}</td>
                </tr>
                <tr>
                    <td class="label-col">Medium of instruction / Eğitim Dili</td>
                    <td class="value-col">{{ $studyLangDisplay }}</td>
                </tr>
                <tr>
                    <td class="label-col">Registration date / Kayıt Tarihi</td>
                    <td class="value-col">{{ now()->format('d/m/Y') }}
                    </td>
                </tr>
                <tr>
                    <td class="label-col">Academic year / Akademik yıl</td>
                    <td class="value-col">{{ $academicYearPl }} / {{ $academicYearEn }}</td>
                </tr>
                <tr>
                    <td class="label-col">Current status / Mevcut durum</td>
                    <td class="value-col">Active student / Aktif öğrenci</td>
                </tr>
            </table>
        </div>
        <div class="photo-cell">
            @php
                $photoData = null;
                $photoMime = 'image/jpeg';
                if ($student->profile_photo_path && Storage::exists($student->profile_photo_path)) {
                    try {
                        $photoContent = Storage::get($student->profile_photo_path);
                        if ($photoContent) {
                            $photoData = base64_encode($photoContent);
                            $extension = strtolower(pathinfo($student->profile_photo_path, PATHINFO_EXTENSION));
                            $photoMime = match ($extension) {
                                'jpg', 'jpeg' => 'image/jpeg',
                                'png' => 'image/png',
                                'gif' => 'image/gif',
                                'webp' => 'image/webp',
                                default => 'image/jpeg',
                            };
                        }
                    } catch (\Exception $e) {
                    }
                }
            @endphp
            @if ($photoData)
                <div class="photo-frame">
                    <img src="data:{{ $photoMime }};base64,{{ $photoData }}" alt="Student Photo">
                </div>
            @else
                <div class="photo-frame">
                    <div class="photo-placeholder">No Photo / Photo yok</div>
                </div>
            @endif
        </div>
    </div>

    <!-- Body Text (Bilingual) -->
    <div class="body-text">
        <p class="en">* The person whose identity information is given above is our student.</p>
        <p class="pl">* Yukarıda kimlik bilgileri verilen kişi öğrencimizdir.</p>

        @php
            $duration = $degree?->duration ?? 4;
            $durationPl = $duration === 1 ? 'yıl' : ($duration < 5 ? 'lata' : 'lat');
        @endphp
        <p class="en">* The foreseen duration of education for the programme is {{ $degree?->duration ?? 4 }}
            years.</p>
        <p class="pl">* Programın öngörülen eğitim süresi {{ $duration }} {{ $durationPl }} yıl.</p>

         <p class="en">* In accordance with the relevant articles of the BSMU Graduate Education and Examination
            Directive, individuals enrolled in the program must fully comply with the attendance, participation, and
            examination requirements for courses in order to benefit from student rights. Otherwise, the individual's
            enrolment in the program shall be terminated.</p>
        <p class="pl">* BSMU Lisansüstü Eğitim ve Sınav Yönergesi'nin ilgili maddelerine uygun olarak,

programa kayıtlı bireylerin öğrenci haklarından yararlanabilmeleri için derslere katılım, devam ve sınav şartlarına tam olarak uymaları gerekmektedir.
Aksi takdirde, bireyin programa kaydı sona erdirilecektir.
        </p>
       
  <p class="en">* It is expected that the interested person will reach the graduation stage in the
            {{ $startYear }}-{{ $endYear }} academic year.</p>

        <p class="pl">* İlgilenen kişinin mezuniyet aşamasına ulaşması beklenmektedir.
            {{ $startYear }}-{{ $endYear }}.</p>
      

            <p class="en">* This document has been issued upon the request of the person concerned.</p>
        <p class="pl">* Bu belge, ilgili kişinin talebi üzerine düzenlenmiştir..</p>
    </div>

    <!-- Signature + Stamp -->
    @php
        $stampPath = public_path('images/must-möhür.png');
        $stampData = file_exists($stampPath) ? base64_encode(file_get_contents($stampPath)) : '';
    @endphp
    <table class="signature-stamp-table">
        <tr>
            <td class="sig-cell">
                @if ($stampData)
                    <img class="sig-stamp-overlay" src="data:image/png;base64,{{ $stampData }}" alt="BSMU Stamp">
                @endif
                <div class="sig-name">Prof. Dr. Eraytun KORALMAZ</div>
                <div class="sig-title">Rector / Rektör</div>
            </td>
        </tr>
    </table>

    <!-- Verification Footer -->
    <div class="verification-footer">
        <div class="verification-date">
            Date / Tarih: {{ now()->format('d/m/Y') }}

        </div>
        <div class="verification-card">
            <div class="verification-card-header">
               Document Verification / Belge Doğrulama
            </div>
            <table class="verification-card-body">
                <tr>
                    <td class="verification-qr-cell">
                        @php
                            $verificationCodeForUrl = $verificationCode ?? null;
                            $qrCode = \SimpleSoftwareIO\QrCode\Facades\QrCode::format('svg')
                                ->size(70)
                                ->generate($student->getVerificationUrl($verificationCodeForUrl));
                            $qrCodeBase64 = base64_encode($qrCode);
                        @endphp
                        <img src="data:image/svg+xml;base64,{{ $qrCodeBase64 }}" style="width: 56px; height: 56px;" />
                    </td>
                    <td class="verification-info-cell">
                        <span class="en">This document was e-signed for
                            <strong>{{ strtoupper($student->first_name . ' ' . $student->last_name) }}</strong> on
                            {{ now()->format('d/m/Y') }} with document number
                            <strong>{{ $verificationCode ?? strtoupper(Str::random(12)) }}</strong>. The validity of
                            the document can be confirmed by scanning the QR code or by document number at
                            <strong>{{ $student->getVerificationUrl() }}</strong></span>
                              <br><br>
                            <span class="pl">Bu belge
                            {{ now()->format('d/m/Y') }} tarihinde
                            <strong>{{ strtoupper($student->first_name . ' ' . $student->last_name) }}</strong> 
                             <strong>{{ $verificationCode ?? strtoupper(Str::random(12)) }}</strong>.
                            belge numarasıyla elektronik olarak imzalanmıştır. Belgenin geçerliliği, QR kodunu tarayarak
                        veya belge numarasını kullanarak <strong>{{ $student->getVerificationUrl() }} adresinden doğrulanabilir</strong></span>

                    </td>
                </tr>
            </table>
        </div>
        <div class="bottom-divider"></div>
        <div class="address-block">
            <p style="margin-top: 3px;"><strong>Tel:</strong>+90 505 621 26 26 | +32 483 38 31 70</p>
            <p><strong>e-mail:</strong> info@bsmu.org | rectorate@bsmu.org | <strong>Web:</strong> www.bsmu.org
            </p>
        </div>
    </div>

</body>

</html>
