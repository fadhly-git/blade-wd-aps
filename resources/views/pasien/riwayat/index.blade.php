<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Riwayat Periksa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <section>
                <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                    <header class="flex items-center justify-between">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Daftar riwayat periksa') }}
                        </h2>
                    </header>

                    <table class="table mt-6 overflow-hidden rounded table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Poliklinik</th>
                                <th scope="col">Dokter</th>
                                <th scope="col">Hari</th>
                                <th scope="col">Jam Mulai</th>
                                <th scope="col">Jam Selesai</th>
                                <th scope="col">Antrian</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($janjiPeriksa as $item)
                                <tr>
                                    <th scope="row" class="align-middle text-start">{{ $loop->iteration }}</th>
                                    <td>{{ $item->jadwal_periksa->dokter->poli->nama_poli }}</td>
                                    <td>{{ $item->jadwal_periksa->dokter->nama }}</td>
                                    <td>{{ $item->jadwal_periksa->hari }}</td>
                                    <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $item->jadwal_periksa->jam_mulai)->format('H:i') }}</td>
                                    <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $item->jadwal_periksa->jam_selesai)->format('H:i') }}</td>
                                    <td>{{ $item->no_antrian }}</td>
                                        @if (isset($item->periksa))
                                            <td>
                                                <span class="bg-success rounded p-1 font-semibold text-light">{{ 'sudah diperiksa' }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('pasien.riwayat.show', $item->id) }}" class="btn btn-primary btn-sm">Riwayat</a>
                                            </td>
                                        @else
                                            <td>
                                                <span class="bg-secondary rounded p-1 font-semibold text-light">{{ 'belum diperiksa' }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('pasien.riwayat.detail', $item->id) }}" class="btn btn-secondary btn-sm">Detail</a>
                                            </td>
                                        @endif
                                    
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
</x-app-layout>