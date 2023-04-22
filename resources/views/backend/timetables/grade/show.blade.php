@extends('layouts.app')

@section('head_javascript')
<script>
    window.Lara.teachers = @json($teachers);
    window.Lara.subjects = @json($subjects);
    window.Lara.monday = @json($monday_timetable);
    window.Lara.tuesday = @json($tuesday_timetable);
    window.Lara.wednesday = @json($wednesday_timetable);
    window.Lara.thursday = @json($thursday_timetable);
    window.Lara.friday = @json($friday_timetable);
    window.Lara.saturday = @json($saturday_timetable);
</script>
@stop

@section('content')
    <div class="roles-permissions">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Tertipnama</h2>
            </div>
        </div>

        @csrf
        <timetable-day day="monday" semester="{{ request()->semester }}" 
            endpoint="{{ route('timetable.grade.update', ['grade' => $grade->id]) }}"></timetable-day>

        <timetable-day day="tuesday" semester="{{ request()->semester }}" 
            endpoint="{{ route('timetable.grade.update', ['grade' => $grade->id]) }}"></timetable-day>

        <timetable-day day="wednesday" semester="{{ request()->semester }}" 
            endpoint="{{ route('timetable.grade.update', ['grade' => $grade->id]) }}"></timetable-day>

        <timetable-day day="thursday" semester="{{ request()->semester }}" 
            endpoint="{{ route('timetable.grade.update', ['grade' => $grade->id]) }}"></timetable-day>

        <timetable-day day="friday" semester="{{ request()->semester }}" 
            endpoint="{{ route('timetable.grade.update', ['grade' => $grade->id]) }}"></timetable-day>

        <timetable-day day="saturday" semester="{{ request()->semester }}" 
            endpoint="{{ route('timetable.grade.update', ['grade' => $grade->id]) }}"></timetable-day>
    </div>
@endsection
