@extends('MasterLayout.Master')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')
    <div class="bg-white p-6 rounded-xl shadow-sm border h-[83vh]">
        <p class="text-gray-600">Ini adalah halaman dashboard.</p>
    </div>
@endsection

@section('custom-script')
    <script>
        $(document).ready(function() {
            console.log("Document is ready!");
        });
    </script>
    @endsection
