<x-dashboard-layout webTitle="Add Lecturer to Class">
    @if ($errors->any())
        <div
            class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
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
                <form method="post" action="{{ route('add.lecture') }}" class="mt-6 space-y-6">
                    @csrf
                    <div>
                        <x-input-label for="user_id" :value="__('Select lecturer')"/>
                        <x-select-input id="user_id" class="select2" name="user_id[]" multiple="">
                            @foreach($users as $user)
                                @if(old('user_id') == $user->id)
                                    <option value="{{$user->id}}" selected>{{$user->name}}</option>
                                @else
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endif
                            @endforeach
                        </x-select-input>
                        <x-input-error :messages="$errors->get('user_id')" class="mt-2"/>
                    </div>
                    <div>
                        <x-input-label for="class_id" :value="__('Select Class')"/>
                        <x-select-input id="class_id" name="class_id">
                            <option value="" selected disabled>-Select One-</option>
                            @foreach($classes as $class)
                                @if(old('class_id') == $class->id)
                                    <option value="{{$class->id}}" selected>{{$class->course->name }}
                                        - {{$class->class_code}}</option>
                                @else
                                    <option value="{{$class->id}}" selected>{{$class->course->name }}
                                        - {{$class->class_code}}</option>
                                @endif
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
