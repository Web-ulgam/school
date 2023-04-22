<hr />
<div class="w-full block mt-8">
    <div class="flex flex-wrap sm:flex-no-wrap justify-between">
        <div class="w-full sm:w-1/2 mr-2 mb-6">
            <h3 class="text-gray-700 uppercase font-bold mb-2">Klaslar</h3>
            <div class="flex flex-wrap items-center">
                @foreach ($teacher->classes as $class)
                    <div class="w-full sm:w-1/2 text-center border border-gray-200 rounded">
                        <div class="text-gray-800 uppercase font-semibold px-4 py-4 mb-2">{{ $class->class_name }}</div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="w-full sm:w-1/2 ml-2 mb-6">
            <h3 class="text-gray-700 uppercase font-bold mb-2">Şu günki okuw dersler</h3>
            <div class="flex items-center bg-gray-200 rounded-tl rounded-tr">
                <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-semibold">Synp</div>
                <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-semibold">Sagady</div>
                <div class="w-1/3 text-right text-gray-600 py-2 px-4 font-semibold">Okuw dersi</div>
            </div>
            {{-- @foreach ($teacher->subjects as $subject)
                <div class="flex items-center justify-between border border-gray-200">
                    <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-medium">{{ $subject->subject_code }}</div>
                    <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-medium">{{ $subject->name }}</div>
                    <div class="w-1/3 text-right text-gray-600 py-2 px-4 font-medium">{{ $subject->teacher->user->name }}</div>
                </div>
            @endforeach --}}
        </div>
    </div>
</div> <!-- ./END TEACHER -->
