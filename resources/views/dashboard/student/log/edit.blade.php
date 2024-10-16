<x-dashboard-layout webTitle='Asdos Registration'>
    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <!-- Card header -->
        <div class="items-center justify-between lg:flex flex-col lg:flex-row">
            <div class="w-full mb-4 lg:mb-0">
                <h3 class="w-full mb-2 text-xl font-bold text-gray-900 dark:text-white">
                    Edit Log for {{ $teachingAssistantLog->teaching_assistant->class->course->name }} - {{ $teachingAssistantLog->teaching_assistant->class->class_code }}
                </h3>
                <span class="text-base font-normal text-gray-500 dark:text-gray-400">
                    Update log
                </span>
            </div>
        </div>
        <section>
            <form method="POST" action="{{ route('student.ta-log.update', $teachingAssistantLog) }}" class="mt-6 space-y-6">
                @csrf
                @method('PUT')
                
                <input type="hidden" name="teaching_assistant_id" value="{{ $teachingAssistantLog->teaching_assistant_id }}">

                <!-- Week -->
                <div>
                    <x-input-label for="week" :value="__('Weeks')" />
                    <x-text-input id="week" class="block mt-1 w-full" type="number" name="week" step="1" 
                        min="1" max="16" value="{{ old('week', $teachingAssistantLog->week) }}" required />
                    <x-input-error :messages="$errors->get('week')" class="mt-2" />
                </div>

                <!-- Date -->
                <div>
                    <x-input-label for="date" :value="__('Date')" />
                    <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" 
                        value="{{ old('date', $teachingAssistantLog->date->format('Y-m-d')) }}" required />
                    <x-input-error :messages="$errors->get('date')" class="mt-2" />
                </div>

                <!-- Description -->
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-input-textarea id="description" class="block mt-1 w-full" name="description" 
                    value="{{ old('description', $teachingAssistantLog->description) }}" required>
                    </x-input-textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <!-- Submit Button -->
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Update') }}</x-primary-button>
                </div>
            </form>
        </section>
    </div>
</x-dashboard-layout>
