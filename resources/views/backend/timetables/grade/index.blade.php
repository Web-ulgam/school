@extends('layouts.app')

@section('content')
    <div class="roles-permissions">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Klas : {{ $grade->class_name }}</h2>
            </div>
        </div>

        <br>
        <h2>Çärýek</h2>
        <br>
        <div class="border">
            <a href="{{ route('timetable.grade.show', ['grade' => $grade->id, 'semester' => 1]) }}">
                <div class="border pointer px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight"> 1 </div>
            </a>
            <a href="{{ route('timetable.grade.show', ['grade' => $grade->id, 'semester' => 2]) }}">
                <div class="border pointer px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight"> 2 </div>
            </a>
            <a href="{{ route('timetable.grade.show', ['grade' => $grade->id, 'semester' => 3]) }}">
                <div class="border pointer px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight"> 3 </div>
            </a>
            <a href="{{ route('timetable.grade.show', ['grade' => $grade->id, 'semester' => 4]) }}">
                <div class="border pointer px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight"> 4 </div>
            </a>
        </div>
    </div>
@endsection
