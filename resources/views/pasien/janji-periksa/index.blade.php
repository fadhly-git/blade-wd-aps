<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Janji Periksa</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium mb-4">Buat Janji Periksa</h3>

                <form action="{{ route('pasien.janji-periksa.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium">Nomor Rekam Medis</label>
                        <input type="text" value="{{ $no_rm }}" class="mt-1 block w-full rounded-md border-gray-300"
                            readonly>
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Pilih Dokter</label>
                        <select name="id_dokter" class="mt-1 block w-full rounded-md border-gray-300" required>
                            <option value="">-- Pilih Dokter --</option>
                            @foreach ($dokters as $dokter)
                                @foreach ($dokter->jadwalPeriksas as $jadwal)
                                    <option value="{{ $dokter->id }}">
                                        {{ $dokter->nama }} - {{ $dokter->poli->nama_poli }} |
                                        {{ $jadwal->hari }}, {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}
                                    </option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Keluhan</label>
                        <textarea name="keluhan" rows="3" class="mt-1 block w-full rounded-md border-gray-300"
                            required></textarea>
                    </div>

                    <div class="d.flex">
                        <button type="submit"
                            class="btn btn-primary btn-sm mt-3 text-black px-4 py-2 rounded hover:bg-blue-600">
                            Buat Janji
                        </button>

                        @if (session('status') === 'janji-periksa-created')
                            <div class="text-green-600 text-sm">Janji periksa berhasil dibuat!</div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>