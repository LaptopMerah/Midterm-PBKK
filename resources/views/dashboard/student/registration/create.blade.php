<x-dashboard-layout webTitle='Asdos Registration'>
    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <!-- Card header -->
        <div class="items-center justify-between lg:flex flex-col lg:flex-row">
            <div class="w-full mb-4 lg:mb-0">
                <h3 class="w-full mb-2 text-xl font-bold text-gray-900 dark:text-white">Asdos Registration {{ $courseClasses->course->name}} - {{ $courseClasses->class_code}}</h3>
                <span class="text-base font-normal text-gray-500 dark:text-gray-400">
                    Make new application
                </span>
            </div>
        </div>
        <div class="">
            <section>
                <form method="post" action="{{ route('student.ta-registration.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="class_id" value="{{ request('id') }}">
                    
                    <div>
                        <x-input-label for="gpa" :value="__('GPA')"/>
                        <x-text-input id="gpa" class="block mt-1 w-full" type="number" name="gpa" step="0.01" min="0.0" max="4.0"
                                      :value="old('gpa')"  autocomplete="3.0" required/>
                        <x-input-error :messages="$errors->get('gpa')" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="lecturer_recommendation_id" :value="__('Recomendation')"/>
                        <x-select-input id="lecturer_recommendation_id" name="lecturer_recommendation_id">
                            @foreach($courseClasses->lecturer_user as $lecturer)
                                @if(old('lecturer_recommendation_id') == $lecturer)
                                <option value="{{$lecturer->pivot->id}}" selected>{{ $lecturer->name}}</option>
                                @endif
                                <option value="{{$lecturer->pivot->id}}">{{ $lecturer->name}}</option>
                                @endforeach
                                <option value="" selected>Nothing</option>
                                <option value="" selected disabled>Select</option>
                        </x-select-input>
                        <x-input-error :messages="$errors->get('lecturer_recommendation_id')" class="mt-2"/>
                    </div>
                    <div class="mt-4">
                        <x-input-label for="recommendation_proof" :value="__('Recommendation Proof')" />
                        <input id="recommendation_proof" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                               type="file" name="recommendation_proof" 
                               accept=".jpeg,.png,.jpg,.gif,.svg"
                               autocomplete="file" />
                        <x-input-error :messages="$errors->get('recommendation_proof')" class="mt-2" />
                    </div>

                    <div class="flex items-center mt-4">
                        <input id="is_available" type="checkbox" name="is_available" value="1"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 roundedfocus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                            {{ old('is_available') ? 'checked' : '' }}>
                        <label for="is_available" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            {{ __('Available at class time?') }}
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('is_available')" class="mt-2" />


                    
                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Create New') }}</x-primary-button>
                    </div>
                </form>
            </section>

        </div>
    </div>
</x-dashboard-layout>
