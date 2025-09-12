<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Hewan Esa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="max-w-4xl mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-4 text-center">🐾 Data Hewan Peliharaan Esa</h1>

        {{-- Tabel Data Hewan --}}
        <div class="bg-white shadow-md rounded-lg p-4 mb-6">
            <h2 class="text-lg font-semibold mb-3">Daftar Hewan</h2>
            <table class="w-full border-collapse border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border border-gray-300 p-2">Jenis</th>
                        <th class="border border-gray-300 p-2">Ras</th>
                        <th class="border border-gray-300 p-2">Nama</th>
                        <th class="border border-gray-300 p-2">Karakteristik</th>
                        <th class="border border-gray-300 p-2">Kesayangan?</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hewan as $h)
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 p-2">{{ $h['jenis'] }}</td>
                        <td class="border border-gray-300 p-2">{{ $h['ras'] }}</td>
                        <td class="border border-gray-300 p-2">{{ $h['nama'] }}</td>
                        <td class="border border-gray-300 p-2">{{ $h['karakteristik'] }}</td>
                        <td class="border border-gray-300 p-2">
                            @if($h['kesayangan'])
                                ✅
                            @else
                                ❌
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Hasil Statistik --}}
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-lg font-semibold mb-3">📊 Statistik Hewan</h2>
            <p><strong>Total per Jenis:</strong></p>
            <ul class="list-disc pl-6">
                @foreach($jumlah as $jenis => $total)
                    <li>{{ $jenis }}: {{ $total }}</li>
                @endforeach
            </ul>

            <p class="mt-3"><strong>Palindrome:</strong></p>
            <ul class="list-disc pl-6">
                @forelse($palindrome as $p)
                    <li>{{ $p['nama'] }} (panjang: {{ $p['panjang'] }})</li>
                @empty
                    <li>Tidak ada palindrome</li>
                @endforelse
            </ul>

            <p class="mt-3"><strong>Bilangan Genap:</strong></p>
            <p>
                {{ implode(", ", $genap['bilangan']) }}
                (Jumlah: {{ $genap['jumlah'] }})
            </p>

            <p class="mt-3"><strong>Cek Anagram:</strong></p>
            <p>
                "{{ $anagram['string1'] }}" & "{{ $anagram['string2'] }}"
                → @if($anagram['anagram']) ✅ Anagram @else ❌ Bukan Anagram @endif
            </p>
        </div>
    </div>
</body>
</html>
