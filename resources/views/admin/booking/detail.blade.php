<x-app-layout>
    @if (Auth::user()->role_id == '1' || Auth::user()->role_id == '2')
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Booking') }}
            </h2>
        </x-slot>
    @endif
    

    <div class="py-12 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id='recipients' class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mt-0">
                        <div class="text-lg font-semibold">
                            <h3>Informasi Booking</h3>
                        </div>
                        <div class="md:flex justify-start items-start mt-8">
                            <div class="md:w-2/5">
                                <p class="mb-2">No Booking</p>
                                <div class="p-3 rounded-md bg-gray-200 w-96">
                                    <p>{{ $booking->booking_number }}</p>
                                </div>
                                <p class="mb-2 mt-3">Nama</p>
                                <div class="p-3 rounded-md bg-gray-200 w-96">
                                    <p>{{ $booking->customer->name }}</p>
                                </div>
                                <p class="mb-2 mt-3">Kategori</p>
                                <div class="p-3 rounded-md bg-gray-200 w-96">
                                    <p>{{ $booking->category->name }}</p>
                                </div>
                                <p class="mb-2 mt-3">Merk Laptop</p>
                                <div class="p-3 rounded-md bg-gray-200 w-96">
                                    <p>{{ $booking->laptop_brand }}</p>
                                </div>                           
                            </div>
                            <div class="md:w-3/5">
                                <p class="mb-2">Tipe Laptop</p>
                                <div class="p-3 rounded-md bg-gray-200 w-[30rem]">
                                    <p>{{ $booking->laptop_type }}</p>
                                </div>
                                <p class="mb-2 mt-3">Deskripsi</p>
                                <div class="p-3 rounded-md bg-gray-200 w-[30rem]">
                                    <p>{{ $booking->problem_description }}</p>
                                </div>
                                <p class="mb-2 mt-3">Tanggal Booking</p>
                                <div class="p-3 rounded-md bg-gray-200 w-[30rem]">
                                    <p>{{ $booking->booking_date->format('d-m-Y') }}</p>
                                </div>
                                <p class="mb-2 mt-3">Catatan</p>
                                <div class="p-3 rounded-md bg-gray-200 w-[30rem]">
                                    <p>{{ $booking->notes }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <p class="mb-3 font-semibold">Status</p>
                            @if ($booking->status == 'Menunggu')
                                <td class="text-center text-sm"><span class="p-2 bg-slate-500 rounded-md text-white font-semibold">{{ $booking->status }}</span></td>
                            @elseif ($booking->status == 'Ditolak')
                                <td class="text-center text-sm"><span class="p-2 bg-red-500 rounded-md text-white font-semibold">{{ $booking->status }}</span></td>
                            @elseif ($booking->status == 'Diterima')
                                <td class="text-center text-sm"><span class="p-2 bg-lime-500 rounded-md text-white font-semibold">{{ $booking->status }}</span></td>
                            @elseif ($booking->status == 'Diproses')
                                <td class="text-center text-sm"><span class="p-2 bg-orange-500 rounded-md text-white font-semibold">{{ $booking->status }}</span></td>
                            @elseif ($booking->status == 'Selesai')
                                <td class="text-center text-sm"><span class="p-2 bg-yellow-500 rounded-md text-white font-semibold">{{ $booking->status }}</span></td>
                            @elseif ($booking->status == 'Dibayar')
                                <td class="text-center text-sm"><span class="p-2 bg-green-500 rounded-md text-white font-semibold">{{ $booking->status }}</span></td>
                            @endif
                        </div>
                    </div>                
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
            <div id='recipients' class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mt-0">
                        <div class="text-lg font-semibold">
                            <h3>Gambar</h3>
                        </div>
                        <div class="mt-8 md:grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @if($booking->images->isNotEmpty())
                                @foreach ($booking->images as $image)
                                    <img src="{{ asset('images/' . $image->image) }}" alt="Booking Image" class="rounded-md w-80 h-52 object-cover my-4 md:my-0 md:mb-4">
                                @endforeach
                            @else
                                <p>No images uploaded.</p>
                            @endif
                        </div>
                    </div>                
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
            <div id='recipients' class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mt-0 mb-4">
                        <div class="text-lg font-semibold mb-8">
                            <h3>Laporan Service</h3>
                        </div>
                        @if($booking->serviceReport)
                        <div class="md:flex justify-start items-start mt-4">
                            <div class="md:w-3/5">
                                <p class="mb-2 mt-3">Nama Teknisi</p>
                                <div class="p-3 rounded-md bg-gray-200 w-96">
                                    <p>{{ $booking->serviceReport->technician->name }}</p>
                                </div>
                                <p class="mb-2 mt-3">tanggal Proses</p>
                                <div class="p-3 rounded-md bg-gray-200 w-96">
                                    <p>{{ $booking->serviceReport->process_date->format('d-m-Y') }}</p>
                                </div>
                                <p class="mb-2 mt-3">Estimasi Waktu</p>
                                <div class="p-3 rounded-md bg-gray-200 w-96">
                                    <p>{{ $booking->serviceReport->time_estimate }}</p>
                                </div>
                                <p class="mb-2 mt-3">Diagnosis</p>
                                <div class="p-3 rounded-md bg-gray-200 w-[35rem]">
                                    <p>{{ $booking->serviceReport->diagnosis }}</p>
                                </div>
                                <p class="mb-2 mt-3">Tindakan yang Diambil</p>
                                <div class="p-3 rounded-md bg-gray-200 w-[35rem]">
                                    <p>{{ $booking->serviceReport->action_taken }}</p>
                                </div>
                            </div>
                            <div class="md:w-2/5">
                                <p class="mb-2 mt-3">tanggal Selesai</p>
                                <div class="p-3 rounded-md bg-gray-200 w-80">
                                    @if ($booking->serviceReport->completion_date == null)
                                        <p>Belum selesai</p>
                                    @else
                                        <p>{{ $booking->serviceReport->completion_date->format('d-m-Y') }}</p> 
                                    @endif
                                </div>
                                <p class="mb-2 mt-3">Biaya Service</p>
                                <div class="p-3 rounded-md bg-gray-200 w-80">
                                    <p>Rp {{ number_format($booking->serviceReport->service_cost) }}</p>
                                </div>
                                <p class="mb-2 mt-3">Biaya Spare Part</p>
                                <div class="p-3 rounded-md bg-gray-200 w-80">
                                    <p>Rp {{ number_format($booking->serviceReport->parts_cost) }}</p>
                                </div>
                                <p class="mb-2 mt-3">Biaya Total</p>
                                <div class="p-3 rounded-md bg-gray-200 w-80">
                                    <p>Rp {{ number_format($booking->serviceReport->total_cost) }}</p>
                                </div>
                            </div>
                        </div>
                        @else
                            <p>Service belum diproses.</p>
                        @endif
                        
                    </div>                
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
            <div id='recipients' class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mt-0 mb-4">
                        <div class="text-lg font-semibold mb-8">
                            <h3>Pembayaran</h3>
                        </div>
                        @if($booking->payment)
                        <div class="md:flex justify-start items-start mt-4">
                            <div class="md:w-2/5">
                                <p class="mb-2 mt-3">Tipe pembayaran</p>
                                <div class="p-3 rounded-md bg-gray-200 w-80">
                                    <p>{{ $booking->payment->paymentType->name }}</p>
                                </div>
                                <p class="mb-2 mt-3">Jumlah Pembayaran</p>
                                <div class="p-3 rounded-md bg-gray-200 w-80">
                                    <p>Rp {{ number_format($booking->payment->amount) }}</p>
                                </div>
                            </div>
                            <div class="md:w-3/5">
                                <p class="mb-2 mt-3">tanggal Bayar</p>
                                <div class="p-3 rounded-md bg-gray-200 w-80">
                                    <p>{{ $booking->payment->payment_date->format('d-m-Y') }}</p>
                                </div>
                                <p class="mb-2 mt-3">Kembalian</p>
                                <div class="p-3 rounded-md bg-gray-200 w-80">
                                    <p>Rp {{ number_format($booking->payment->change_amount) }}</p>
                                </div>
                            </div>
                        </div>
                        @else
                            <p>Service belum dibayar.</p>
                        @endif
                    </div>                
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
            <div id='recipients' class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mt-0 mb-4">
                        <div class="text-lg font-semibold mb-2">
                            <h3>Testimoni</h3>
                        </div>
                        @if($booking->testimonial)
                            @if (Auth::user()->role_id == '3' && $booking->status == 'Dibayar')
                                <a href="{{ route('testimonial.edit', ['id' => $booking->testimonial->id, 'booking_id' => $booking->id]) }}" class="btn btn-ghost bg-orange-500 text-white font-semibold text-base rounded-lg p-3 hover:bg-orange-600 w-20">Edit</a>
                            @endif
                            <div class="md:flex justify-start items-start mt-4">
                                <div class="md:w-2/5">
                                    <p class="mb-2 mt-3">Tanggal Testimoni</p>
                                    <div class="p-3 rounded-md bg-gray-200 w-80">
                                        <p>{{ $booking->testimonial->testimoni_date->format('d-m-Y') }}</p>
                                    </div>
                                </div>
                                <div class="md:w-3/5">
                                    <p class="mb-2 mt-3">Rating</p>
                                    <div class="p-3 rounded-md bg-gray-200 w-80">
                                        {{-- <p>{{ $booking->testimonial->rating }}</p> --}}
                                        <p>
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $booking->testimonial->rating)
                                                    <span>&#9733;</span> <!-- Bintang penuh -->
                                                @else
                                                    <span>&#9734;</span> <!-- Bintang kosong -->
                                                @endif
                                            @endfor
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-2 mt-3">Deskripsi</p>
                            <div class="p-3 rounded-md bg-gray-200 w-[35rem]">
                                <p>{{ $booking->testimonial->description }}</p>
                            </div>
                        @else
                            @if (Auth::user()->role_id == '3' && $booking->status == 'Dibayar')
                                <a href="{{ route('testimonial.create', $booking->id) }}" class="btn btn-ghost bg-cyan-500 text-white font-semibold text-base rounded-lg p-3 hover:bg-blue-600">Tambah</a>
                            @endif
                            <p class="mt-4">Belum ada testimoni.</p>
                        @endif
                    </div>                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>