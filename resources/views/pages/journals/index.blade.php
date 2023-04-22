@extends('layouts.app')

@section('content')
    <div class="roles-permissions">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Žurnal</h2>
            </div>
        </div>

        <br>
        <h2>Toparlar</h2>
        <div class="mt-8 bg-white rounded border-b-4 border-gray-300">
            <div class="flex flex-wrap items-center uppercase text-sm font-semibold bg-gray-300 text-gray-600 rounded-tl rounded-tr">
                <div class="w-1/12 px-4 py-3">#</div>
                <div class="w-2/12 px-4 py-3">Toparyň ady</div>
                <div class="w-2/12 px-4 py-3">Klasy</div>
                <div class="w-5/12 px-4 py-3 text-center">Ýolbaşçysy</div>
                <div class="w-2/12 px-4 py-3 text-right">Amal</div>
            </div>
        @foreach($grades as $grade)
            <div class="flex flex-wrap items-center text-gray-700 border-t-2 border-l-4 border-r-4 border-gray-300">
                <div class="w-1/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $loop->iteration }}</div>
                <div class="w-2/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $grade->class_name }}</div>
                <div class="w-2/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $grade->class_numeric }}</div>
                <div class="w-5/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight text-center">
                    <span class="bg-gray-200 text-sm mr-1 mb-1 px-2 font-semibold border rounded-full">
                        {{ $grade->teacher->user->name }}
                    </span>
                </div>
                <div class="w-2/12 flex items-center justify-end px-3">
                    <a href="{{ route('journals.grade', ['grade' => $grade->id]) }}" 
                        class="ml-1 bg-gray-600 block p-1 border border-gray-600 rounded-sm">
                        <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="align-right" class="svg-inline--fa fa-align-right fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M160 84V44c0-8.837 7.163-16 16-16h256c8.837 0 16 7.163 16 16v40c0 8.837-7.163 16-16 16H176c-8.837 0-16-7.163-16-16zM16 228h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 256h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm160-128h256c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H176c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg>
                    </a>
                </div>
            </div>
            @endforeach

        </div>

    </div>
@endsection
