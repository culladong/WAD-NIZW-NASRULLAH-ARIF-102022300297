<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Inventaris Gudang')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f6fb;
            color: #263449;
        }

        header {
            background: #1e3a5f;
            color: white;
            padding: 20px 5%;
        }

        header h2 {
            margin: 0 0 12px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 18px;
        }

        main {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 24px;
            box-shadow: 0 2px 10px #0000000d;
        }

        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 14px;
            border: 0;
            border-radius: 6px;
            background: #1e3a5f;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-success {
            background: #16845b;
        }

        .btn-warning {
            background: #d99a18;
            color: #1f2937;
        }

        .btn-danger {
            background: #c0392b;
        }

        .btn-secondary {
            background: #64748b;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        th, td {
            padding: 13px;
            border-bottom: 1px solid #e5eaf0;
            text-align: left;
            vertical-align: top;
        }

        th {
            background: #eaf0f8;
        }

        .actions {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .actions form {
            margin: 0;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 7px;
        }

        input, select, textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font: inherit;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .alert {
            padding: 13px;
            border-radius: 6px;
            margin-bottom: 18px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
        }

        .error-text {
            color: #c0392b;
            font-size: 13px;
            margin-top: 5px;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination nav div:first-child {
            margin-bottom: 10px;
        }

        .pagination a, .pagination span {
            margin-right: 8px;
        }

        .detail-row {
            padding: 14px 0;
            border-bottom: 1px solid #e5eaf0;
        }

        .detail-row strong {
            display: block;
            margin-bottom: 6px;
        }

        @media (max-width: 600px) {
            main {
                padding: 0 12px;
            }

            .card {
                padding: 16px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h2>Inventaris Gudang</h2>

        <nav>
            <a href="{{ route('barang.index') }}">Katalog Barang</a>
            <a href="{{ route('barang.create') }}">Tambah Barang</a>
        </nav>
    </header>

    <main>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Periksa kembali data yang kamu masukkan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
