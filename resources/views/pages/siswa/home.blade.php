@extends('layouts.siswa')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Topik Pembelajaran</h1>
    </div>

    <div class="row mb-3">
        @foreach ($topics as $topic)
            <div class="col-lg-3 col-sm-12 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x250.webp?text=MathCamp" class="card-img-top" alt="image"
                        style="border-radius: 5px;">
                    <div class="card-body">
                        <p class="h5 text-center text-dark">{{ $topic->name }}</p>
                        <div class="row text-center my-4">
                            <div class="col-sm-6">
                                <small class="text-primary"><i class="far fa-user"></i> {{ count($topic->user_ids) }}</small>
                            </div>
                            <div class="col-sm-6">
                                <small class="text-primary"><i class="far fa-calendar-alt"></i> {{  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$topic->created_at)->format('d M Y') }}</small>
                            </div>
                        </div>
                        <div class="row mb-3 mx-3">
                            <a class="btn btn-block btn-primary" href="{{ route('student.topic.pembuka', ['id' => $topic->id]) }}" role="button">Buka</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!--Row-->
</div>
@endsection
