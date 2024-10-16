<x-dashboard-layout webTitle='Asdos Registration'>
    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <!-- Card header -->
        <div class="items-center justify-between lg:flex flex-col lg:flex-row">
            <div class="w-full mb-4 lg:mb-0">
                <h3 class="w-full mb-2 text-xl font-bold text-gray-900 dark:text-white">Create Log for
                    {{ $courseClasses->course->name }} - {{ $courseClasses->class_code }}</h3>
                <span class="text-base font-normal text-gray-500 dark:text-gray-400">
                    Make new log
                </span>
            </div>
        </div>
        <section>
            <form method="post" action="{{ route('student.ta-log.store') }}" class="mt-6 space-y-6">
                @csrf
                <input type="hidden" name="teaching_assistant_id" value="{{ $courseClasses->id }}">

                <div>
                    <x-input-label for="week" :value="__('Weeks')" />
                    <x-text-input id="week" class="block mt-1 w-full" type="number" name="week" step="1"
                        min="1" max="16" :value="old('week')" autocomplete="3.0" required />
                    <x-input-error :messages="$errors->get('week')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="date" :value="__('Weeks')" />
                    <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" step="1"
                        min="1" max="16" :value="old('date')" autocomplete="3.0" required />
                    <x-input-error :messages="$errors->get('date')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-input-textarea id="description" class="block mt-1 w-full" name="description" step="1"
                        min="1" max="16" :value="old('description')" autocomplete="3.0" required />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Create New') }}</x-primary-button>
                </div>
            </form>
        </section>
    </div>
</x-dashboard-layout>
