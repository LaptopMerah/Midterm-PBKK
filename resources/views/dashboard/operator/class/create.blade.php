<x-dashboard-layout webTitle="Create Class">
    @if ($errors->any())
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Error</span>
            <div>
                <span class="font-medium">Error alert!</span> Please fix the following:
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <!-- Card header -->
        <div class="items-center justify-between lg:flex flex-col lg:flex-row">
            <div class="w-full lg:w-1/4 mb-4 lg:mb-0">
                <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Make new Course Class</h3>
                <span class="text-base font-normal text-gray-500 dark:text-gray-400">
                    Make new class to system
                </span>
            </div>
        </div>
        <div class="">
            <section>
                <form method="post" action="{{ route('operator.class.store') }}" class="mt-6 space-y-6">
                    @csrf
                    <div>
                        <x-input-label for="class_code" :value="__('Class Code')"/>
                        <x-text-input id="class_code" name="class_code" type="text"
                                      class="mt-1 block w-full" :value="old('class_code')" minlength="1" maxlength="5" required/>
                        <x-input-error :messages="$errors->get('class_code')" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="class_participant" :value="__('Total Class Participant')"/>
                        <x-text-input id="class_participant" class="block mt-1 w-full" type="number" pattern="[0-9]{3}"
                                      max="300" min="3" name="class_participant"
                                      :value="old('class_participant')" required/>
                        <x-input-error :messages="$errors->get('class_participant')" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="semester" :value="__('Semester')"/>
                        <x-text-input id="semester" class="block mt-1 w-full" type="tel" pattern="[0-9]{2}"
                                      maxlength="14" min="1" name="semester" :value="old('semester')"
                                      required/>
                        <x-input-error :messages="$errors->get('semester')" class="mt-2"/>
                    </div>

                    <div>
                        <x-input-label for="course_id" :value="__('Select Course Name (Mata Kuliah)')"/>
                        <x-select-input id="course_id" name="course_id">
                            <option value="" selected disabled>-Select One-</option>
                            @foreach($courses as $course)
                                @if(old('course_id') == $course)
                                    <option value="{{$course->id}}" selected>{{$course->name}}</option>
                                @endif
                                    <option value="{{$course->id}}">{{$course->name}}</option>
                            @endforeach
                        </x-select-input>
                        <x-input-error :messages="$errors->get('course_id')" class="mt-2"/>
                    </div>

                    <div>
                        <x-input-label for="academic_year_id" :value="__('Select Academic Year')"/>
                        <x-select-input id="academic_year_id" name="academic_year_id">
                            <option value="" selected disabled>-Select One-</option>
                            @foreach($academicYears as $academicYear)
                                @if(old('academic_year_id') == $academicYear)
                                    <option value="{{$academicYear->id}}" selected>{{$academicYear->name}}</option>
                                @endif
                                    <option value="{{$academicYear->id}}">{{$academicYear->name}}</option>
                            @endforeach
                        </x-select-input>
                        <x-input-error :messages="$errors->get('academic_year_id')" class="mt-2"/>
                    </div>

                    <div>
                        <x-input-label for="time_shift_id" :value="__('Select Time Shift')"/>
                        <x-select-input id="time_shift_id" name="time_shift_id">
                            <option value="" selected disabled>-Select One-</option>
                            @foreach($timeShifts as $timeShift)
                                @if(old('time_shift_id') == $timeShift)
                                    <option value="{{$timeShift->id}}" selected>{{$timeShift->start_time . '-'. $timeShift->end_time}}</option>
                                @endif
                                    <option value="{{$timeShift->id}}">{{$timeShift->start_time . '-'. $timeShift->end_time}}</option>
                            @endforeach
                        </x-select-input>
                        <x-input-error :messages="$errors->get('academic_year_id')" class="mt-2"/>
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Create New') }}</x-primary-button>
                    </div>
                </form>
            </section>

        </div>
    </div>
</x-dashboard-layout>
