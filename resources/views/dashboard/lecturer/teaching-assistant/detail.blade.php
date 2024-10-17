<x-dashboard-layout webTitle='Detail asdos'>
    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <!-- Card header -->
        <div class="items-center justify-between lg:flex flex-col lg:flex-row">
            <div class="w-full mb-4 lg:mb-0">
                <h3 class="w-full mb-2 text-xl font-bold text-gray-900 dark:text-white">Asdos Data</h3>
                <span class="text-base font-normal text-gray-500 dark:text-gray-400">
                    Detail data of {{$teaching_assistant->user->name}}
                </span>
            </div>
        </div>
        <div class="mt-5">
            <section>
                <div>
                    <x-input-label for="name" :value="__('Name')"/>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                  :value="old('name',$teaching_assistant->user->name . ' - '. $teaching_assistant->user->identifier_number )" disabled required/>
                </div>

                <div class="mt-4">
                    <x-input-label for="gpa" :value="__('GPA')"/>
                    <x-text-input id="gpa" class="block mt-1 w-full" type="number" name="gpa" step="0.01" min="0.0"
                                  max="4.0"
                                  :value="old('gpa',$teaching_assistant->gpa)" autocomplete="3.0" disabled required/>
                    <x-input-error :messages="$errors->get('gpa')" class="mt-2"/>
                </div>



                <div class="mt-4">
                    <x-input-label for="lecturer_recommendation_id" :value="__('Recomendation')"/>
                    <x-select-input id="lecturer_recommendation_id" name="lecturer_recommendation_id">
                        <option value="{{$teaching_assistant->lecturer_recommendation}}" selected>{{ $teaching_assistant->lecturer_recommendation->users->name ?? ''}}</option>
                    </x-select-input>
                </div>
                <div class="mt-4">
                    <x-input-label for="recommendation_proof" :value="__('Recommendation Proof')"/>
                    @if($teaching_assistant->recommendation_proof)
                    <img src="{{asset('images/recommendation_proofs/'.$teaching_assistant->recommendation_proof ?? '')}}">
                    @else
                        <p>None</p>
                    @endif
                </div>

                <div class="flex items-center mt-4">
                    <input id="is_available" type="checkbox" name="is_available" value="1"
                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 roundedfocus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        {{ old('is_available',$teaching_assistant->is_available) ? 'checked' : '' }}>
                    <label for="is_available" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        {{ __('Available at class time?') }}
                    </label>
                </div>
            </section>
        </div>
    </div>
</x-dashboard-layout>
