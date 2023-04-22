<br>
<h2>Duşenbe</h2>

<div class="mt-8 bg-white rounded border-b-4 border-gray-300">
    <div class="flex flex-wrap items-center uppercase text-sm font-semibold bg-gray-300 text-gray-600 rounded-tl rounded-tr">
        <div class="w-1/12 px-4 py-3">#</div>
        <div class="w-5/12 px-4 py-3">Dersiň ady</div>
        <div class="w-5/12 px-4 py-3">Mugallym</div>
        <div class="w-1/12 px-4 py-3"></div>
    </div>
    
    <div class="flex flex-wrap items-center text-gray-700 border-t-2 border-l-4 border-r-4 border-gray-300">
        <div class="w-1/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">
            1
        </div>

        <div class="w-5/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">
            <select class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" name="subject_id[]">
                @foreach($subjects as $subject)
                    <option value="{{ $subject->name }}">{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="w-5/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">
            <select class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" name="teacher_id[]">
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->user->name }}">{{ $teacher->user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="w-1/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">
            <span class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 cursor-pointer"> + </span>
        </div>
    </div>
    
</div>
