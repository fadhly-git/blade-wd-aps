<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{__('Riwayat Periksa')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                <header class="flex flex-col">
                    <h2 class="text-2xl font-bold text-gray-900">
                        {{ __('Riwayat Pemeriksaan') }}
                    </h2>
                    <h5 class="text-lg font-medium text-gray-900">
                        {{ __('Informasi lengkap mengenai jadwal pemeriksaan Anda.') }}
                    </h5>
                </header>
                <div class="mx-auto bg-white rounded-lg mt-4">

                <!-- detail -->
                    <div class="mb-4 rounded-lg border border-fuchsia-300 bg-fuchsia-100">
                        <div class="border-b border-fuchsia-200 px-4 py-2">
                            <span class="font-semibold text-fuchsia-700">Detail Pemeriksaan</span>
                        </div>
                        <div class="flex flex-col px-4 py-4 md:flex-row">
                            <div class="mb-2 flex-1 text-sm md:mb-0">
                                <div class="mb-2 flex flex-col">
                                    <span class="w-40 text-gray-600">Tanggal Periksa</span>
                                    <span class="font-medium">
                                        {{ \Carbon\Carbon::parse($janjiPeriksa['tgl_periksa'])->translatedFormat('d F Y H:i') }}
                                    </span>
                                </div>
                            </div>
                            <div class="flex-1 text-sm">
                                <div class="flex flex-col">
                                    <span class="w-24 text-gray-600">Catatan</span>
                                    <span class="font-medium">{{ $janjiPeriksa['catatan'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- {/* Daftar Obat */} -->
                    <div class="mb-4 rounded-lg border border-fuchsia-300 bg-fuchsia-100">
                        <div class="border-b border-fuchsia-200 px-4 py-2">
                            <span class="font-semibold text-fuchsia-700">Daftar Obat Diresepkan</span>
                        </div>
                        <div class="divide-y divide-fuchsia-200">
                            @foreach ($janjiPeriksa['obat'] as $obat)
                                <div class="flex flex-row justify-between px-4 py-2 text-sm">
                                    <span>{{ $obat['nama_obat'] }}</span>
                                    <span class="text-gray-500">{{ $obat['kemasan'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- {/* Biaya */} -->
                    <div class="mb-4 rounded-lg border border-fuchsia-300 bg-fuchsia-100">
                        <div class="flex flex-row items-center justify-between px-4 py-2">
                            <span class="font-semibold text-fuchsia-700">Biaya Periksa</span>
                            <span class="font-semibold text-fuchsia-700">{{ number_format($janjiPeriksa['biaya_periksa'], 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <a href="{{ route('pasien.riwayat.index') }}" class="btn btn-outline-primary px-4 rounded-pill">
                            Kembali
                        </a>
                    </div>
                </div>

            </div>
        </div>

</x-app-layout>