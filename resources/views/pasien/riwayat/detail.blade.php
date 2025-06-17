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
                        {{ __('Detail riwayat periksa') }}
                    </h2>
                    <h5 class="text-lg font-medium text-gray-900">
                        {{ __('Informasi lengkap mengenai jadwal pemeriksaan Anda.') }}
                    </h5>
                </header>
                <div class="shadow p-4 sm:p-6 bg-white rounded-lg">
                    <div class="flex w-full flex-col gap-4 md:flex-row">
                        <div class="flex flex-grow flex-col gap-2">
                            <div
                                class="flex w-full flex-row items-center justify-between rounded-md border border-gray-200 bg-fuchsia-50 px-4 py-2 dark:border-gray-600">
                                <p class="font-weight-semibold">Poliklinik</p>
                                <span
                                    class="font-weight-bold">{{ $janjiPeriksa->jadwal_periksa->dokter->poli->nama_poli }}</span>
                            </div>

                            <div
                                class="flex w-full flex-row items-center justify-between rounded-md border border-gray-200 bg-fuchsia-50 px-4 py-2 dark:border-gray-600">
                                <span class="font-weight-semibold">Nama Dokter</span>
                                <span class="font-weight-bold">{{ $janjiPeriksa->jadwal_periksa->dokter->nama }}</span>
                            </div>

                            <div
                                class="flex w-full flex-row items-center justify-between rounded-md border border-gray-200 bg-fuchsia-50 px-4 py-2 dark:border-gray-600">
                                <span class="font-weight-semibold">Hari Pemeriksaan</span>
                                <span class="font-weight-bold">{{ $janjiPeriksa->jadwal_periksa->hari }}</span>
                            </div>

                            <div
                                class="flex w-full flex-row items-center justify-between rounded-md border border-gray-200 bg-fuchsia-50 px-4 py-2 dark:border-gray-600">
                                <span class="font-weight-semibold">Jam Mulai</span>
                                <span
                                    class="font-weight-bold">{{ \Carbon\Carbon::createFromFormat('H:i:s', $janjiPeriksa->jadwal_periksa->jam_mulai)->format('H:i') }}</span>
                            </div>

                            <div
                                class="flex w-full flex-row items-center justify-between rounded-md border border-gray-200 bg-fuchsia-50 px-4 py-2 dark:border-gray-600">
                                <span class="font-weight-semibold">Jam Selesai</span>
                                <span
                                    class="font-weight-bold">{{ \Carbon\Carbon::createFromFormat('H:i:s', $janjiPeriksa->jadwal_periksa->jam_selesai)->format('H:i') }}</span>
                            </div>
                        </div>

                        <div class="flex flex-col items-center justify-center md:w-1/3">
                            <div
                                class="flex h-full w-full flex-col items-center justify-center rounded-xl border border-gray-200 bg-fuchsia-50 py-8 hover:bg-fuchsia-100 dark:border-gray-600">
                                <span className="mb-2 text-sm text-gray-600">Nomor Antrian Anda</span>
                                <div class="flex items-center justify-center">
                                    <span
                                        class="inline-block rounded-lg bg-fuchsia-600 px-8 py-4 text-3xl font-extrabold text-white shadow hover:bg-fuchsia-700">{{ $janjiPeriksa->no_antrian }}
                                    </span>
                                </div>
                            </div>
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