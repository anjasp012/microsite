@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row align-items-center" style="min-height: 100vh">
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-10 col-md-9">
                        <div class="auth hadiah position-relative">
                            <div class="bg-primary position-absolute rounded-3 top-0 start-0 bottom-0 end-0"></div>
                            <div class="card rounded-3 border-0">
                                <div class="card-body">
                                    <img src="/images/hadiah.png" class="w-100 d-block d-md-none" alt="hadiah">
                                    <img src="/images/hadiah/hadiah-large.png" class="w-100 d-none d-md-block"
                                        alt="hadiah">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
