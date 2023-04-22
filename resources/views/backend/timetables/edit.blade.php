@extends('layouts.app')

@section('content')
    <div class="roles-permissions">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Tertipnama</h2>
            </div>
        </div>

        <form action="{{ route('timetables.update', ['timetable' => $timetable->id]) }}" method="POST" class="w-full">
            @csrf
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
                <br>
                <h2>{{ $day->name }}</h2>
                <div class="mt-8 bg-white rounded border-b-4 border-gray-300">
                    <div class="flex flex-wrap items-center uppercase text-sm font-semibold bg-gray-300 text-gray-600 rounded-tl rounded-tr">
                        <div class="w-1/12 px-4 py-3">#</div>
                        <div class="w-5/12 px-4 py-3">Dersiň ady</div>
                        <div class="w-5/12 px-4 py-3">Mugallym</div>
                        <div class="w-1/12 px-4 py-3"></div>
                    </div>
                    
                    <div class="flex flex-wrap items-center text-gray-700 border-t-2 border-l-4 border-r-4 border-gray-300">
                        @include('components.timetable-edit', ['id' => $day->id, 'subjects' => $subjects, 'teachers' => $teachers, 'data' => 1])
                        @include('components.timetable-edit', ['id' => $day->id, 'subjects' => $subjects, 'teachers' => $teachers, 'data' => 2])
                        @include('components.timetable-edit', ['id' => $day->id, 'subjects' => $subjects, 'teachers' => $teachers, 'data' => 3])
                        @include('components.timetable-edit', ['id' => $day->id, 'subjects' => $subjects, 'teachers' => $teachers, 'data' => 4])
                        @include('components.timetable-edit', ['id' => $day->id, 'subjects' => $subjects, 'teachers' => $teachers, 'data' => 5])
                        @include('components.timetable-edit', ['id' => $day->id, 'subjects' => $subjects, 'teachers' => $teachers, 'data' => 6])
                    </div>
                    
                </div>

            @endforeach

            <div class="text-center">
                <br>
                <input type="submit" value="Ýatda sakla" 
                    class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded cursor-pointer">
            </div>
        </form>
    </div>
@endsection
