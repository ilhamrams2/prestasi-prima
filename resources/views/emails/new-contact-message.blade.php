<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Baru</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(135deg, #FF6B00 0%, #e66000 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }
        .header p {
            margin: 8px 0 0 0;
            opacity: 0.9;
            font-size: 14px;
        }
        .content {
            padding: 30px;
        }
        .sender-info {
            background: #f8fafc;
            border-left: 4px solid #FF6B00;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 24px;
        }
        .sender-info h3 {
            margin: 0 0 12px 0;
            color: #1e293b;
            font-size: 18px;
        }
        .info-row {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
            color: #64748b;
            font-size: 14px;
        }
        .info-row strong {
            color: #334155;
            min-width: 80px;
        }
        .message-box {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 24px;
        }
        .message-box h4 {
            margin: 0 0 12px 0;
            color: #64748b;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }
        .message-box p {
            margin: 0;
            color: #334155;
            line-height: 1.6;
            white-space: pre-wrap;
        }
        .action-button {
            display: inline-block;
            background: #FF6B00;
            color: white;
            text-decoration: none;
            padding: 14px 28px;
            border-radius: 8px;
            font-weight: bold;
            text-align: center;
            transition: background 0.3s;
        }
        .action-button:hover {
            background: #e66000;
        }
        .footer {
            background: #f8fafc;
            padding: 20px;
            text-align: center;
            color: #94a3b8;
            font-size: 12px;
            border-top: 1px solid #e2e8f0;
        }
        .meta-info {
            background: #fef3c7;
            border-left: 4px solid #f59e0b;
            padding: 12px 16px;
            border-radius: 8px;
            margin-top: 20px;
            font-size: 13px;
            color: #78350f;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📬 Pesan Baru Masuk!</h1>
            <p>Anda menerima pesan baru dari website SMK Prestasi Prima</p>
        </div>

        <div class="content">
            <div class="sender-info">
                <h3>Informasi Pengirim</h3>
                <div class="info-row">
                    <strong>Nama:</strong>
                    <span>{{ $message->nama }}</span>
                </div>
                <div class="info-row">
                    <strong>Email:</strong>
                    <span>{{ $message->email }}</span>
                </div>
                <div class="info-row">
                    <strong>Waktu:</strong>
                    <span>{{ $message->created_at->format('d M Y, H:i') }} WIB</span>
                </div>
            </div>

            <div class="message-box">
                <h4>Isi Pesan</h4>
                <p>{{ $message->pesan }}</p>
            </div>

            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ url('/prestasiprima/admin/contact/' . $message->id) }}" class="action-button">
                    Lihat & Balas Pesan
                </a>
            </div>

            <div class="meta-info">
                <strong>💡 Tips:</strong> Balas pesan ini sesegera mungkin untuk memberikan pelayanan terbaik kepada calon siswa atau orang tua.
            </div>
        </div>

        <div class="footer">
            <p>Email ini dikirim secara otomatis oleh sistem Admin Panel SMK Prestasi Prima</p>
            <p>&copy; {{ date('Y') }} SMK Prestasi Prima • Jangan balas email ini</p>
        </div>
    </div>
</body>
</html>
