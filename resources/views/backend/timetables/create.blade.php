@extends('layouts.app')

@section('content')
    <div class="roles-permissions">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Tertipnama</h2>
            </div>
        </div>

        <form action="{{ route('timetables.store') }}" method="POST" class="w-full">
            <div>
                <input type="hidden" name="grade_id" value="{{ $grade->id }}">
                <label for="semester">Çärýek</label>
                <br><br>
                <select name="semester" id="semester" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>

            @foreach($days as $day)
                @csrf
                <input type="hidden" name="day_id[]" value="{{ $day->id }}">

                @include('components.timetable-day')
            @endforeach
            <div class="text-center">
                <br>
                <input type="submit" value="Ýatda sakla" 
                    class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
            </div>
        </form>
    </div>
@endsection
