@extends('layouts.app')

@section('content')
    <div class="roles-permissions">
        {{-- <h2 class="text-gray-700 uppercase font-bold">Okuw derslerim</h2> --}}
        <form action="{{ route('child.diary', ['student' => $student->id]) }}" method="GET">
            <div class="flex items-center justify-between mb-6">
                <div class="w-1/3 px-1">
                    <label>Çärýek</label>
                    <select name="semester" class="mt-2 block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="w-1/3 px-1">
                    <label>Sene</label>
                    <input name="date" type="date" class="mt-2 block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                </div>
                <div class="w-1/3 px-1 pt-8">
                    <input type="submit" class="shadow w-full cursor-pointer bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" value="Gözle">
                </div>
            </div>
        </form>

        @foreach($days as $key => $value)
            <h2>{{ $value }}</h2>
           <div class="mt-2 flex items-center bg-gray-200 rounded-tl rounded-tr">
                <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-semibold">Okuw dersi</div>
                <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-semibold">Tema</div>
                <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-semibold">Öý işi</div>
                <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-semibold">Baha</div>
                <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-semibold">Mugallym</div>
            </div>
            @foreach($journals as $journal)
                @if(strtolower($journal->date->englishDayOfWeek) == $key)
                    @php
                        $lesson = json_decode($journal->lesson);
                        $pupils = json_decode($journal->students);
                    @endphp
                    <div class="flex items-center justify-between border border-gray-200">
                        <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-medium">{{ $lesson->lesson->name }}</div>
                        <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-medium">{{ $journal->topic }}</div>
                        <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-medium">{{ $journal->homework }}</div>
                        @foreach($pupils as $pupil)
                            @if($pupil->id == $student->id)
                                <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-medium">{{ $pupil->mark }}</div>
                            @endif
                        @endforeach
                        <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-medium">{{ $lesson->teacher->name }}</div>
                    </div>
                @endif
            @endforeach
            <br>
        @endforeach
    </div>
@endsection
