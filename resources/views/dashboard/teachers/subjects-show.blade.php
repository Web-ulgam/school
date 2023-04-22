@extends('layouts.app')

@section('content')
    <div class="roles-permissions">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Okuw derslerim</h2>
            </div>
        </div>

       <div class="flex items-center bg-gray-200 rounded-tl rounded-tr">
            <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-semibold">Gün</div>
            <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-semibold">Synp</div>
            <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-semibold">Sagady</div>
            <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-semibold">Okuw otagy</div>
            <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-semibold">Okuw dersi</div>
            <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-semibold"></div>
        </div>
        @foreach($teacher_lessons as $lesson)
            <div class="flex items-center justify-between border border-gray-200">
                <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-medium">{{ $lesson['day'] }}</div>
                <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-medium">{{ $lesson['grade_id'] }}</div>
                <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-medium">{{ $lesson['order'] }}</div>
                <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-medium">{{ $lesson['room'] }}</div>
                <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-medium"> {{ $lesson['lesson'] }}</div>
                <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-medium">
                    <a href="{{ route('journals.grade', ['grade' => $lesson['grade_id']]) }}" class="bg-gray-100 inline-block mb-4 text-xs text-gray-600 uppercase font-semibold px-4 py-2 border border-gray-400 rounded">Zurnal</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
