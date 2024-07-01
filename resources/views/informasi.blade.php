@extends('layouts.app')


@push('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
@endpush
@section('content')
    <div class="container">
        <img src="/images/informasi.png" class="w-100 my-3" alt="informasi">
        <div class="accordion border-0" id="accordionExample">
            <div class="accordion-item border-0">
                <h2 class="accordion-header">
                    <button class="btn btn-transparent border-0 fw-bold fs-5 px-0 w-100 bg-white text-start" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne">
                        Peraturan Challenge “Kolektor Pentolan”
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body p-0">
                        <ul>
                            <li>Akun instagram tidak boleh diprivate, hal ini akan mempermudah microsite dalam menentukan
                                pemenang
                            </li>
                            <li>
                                Link foto pada Instagram harus diinput pada microsite, setiap foto yang di submit akan
                                dihitung jumlah poin stikernya dan dinilai dari tingkat kreativitas dan keindahannya
                            </li>
                            <li>
                                Foto harus memperlihatkan stiker yang dikumpulkan secara jelas, hal ini akan mempermudah
                                dalam penghitungan jumlah poin
                            </li>
                            <li>
                                Foto yang diikutsertakan tidak boleh mengandung unsur pornografi, konten yang tidak sesuai,
                                dan tidak boleh menyinggung SARA.
                            </li>
                            <li>
                                Foto yang diikutsertakan juga merupakan izin dan hak cipta yang diteruskan ke perusahaan
                                untuk memproduksi dan menggunakan foto yang diajukan oleh partisipan, nama peserta dan/atau
                                foto mereka yang akan digunakan untuk keperluan iklan, promosi, dan perdagangan tanpa
                                kompensasi atau pemberitahuan sebelumnya.
                            </li>
                            <li>
                                Keputusan para pemenang adalah keputusan mutlak dan tidak dapat diganggu gugat.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item border-0">
                <h2 class="accordion-header">
                    <button class="btn btn-transparent border-0 fw-bold fs-5 px-0 w-100 bg-white text-start" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                        aria-controls="collapseTwo">
                        Accordion Item #2
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body p-0">
                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the
                        collapse plugin adds the appropriate classes that we use to style each element. These classes
                        control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                        modify any of this with custom CSS or overriding our default variables. It's also worth noting that
                        just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit
                        overflow.
                    </div>
                </div>
            </div>
            <div class="accordion-item border-0">
                <h2 class="accordion-header">
                    <button class="btn btn-transparent border-0 fw-bold fs-5 px-0 w-100 bg-white text-start" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                        aria-controls="collapseThree">
                        Accordion Item #3
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body p-0">
                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the
                        collapse plugin adds the appropriate classes that we use to style each element. These classes
                        control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                        modify any of this with custom CSS or overriding our default variables. It's also worth noting that
                        just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit
                        overflow.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
