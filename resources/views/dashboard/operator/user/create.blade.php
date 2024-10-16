<x-dashboard-layout>
    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <!-- Card header -->
        <div class="items-center justify-between lg:flex flex-col lg:flex-row">
            <div class="w-full lg:w-1/4 mb-4 lg:mb-0">
                <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">User Creation</h3>
                <span class="text-base font-normal text-gray-500 dark:text-gray-400">
                    Make new user to application
                </span>
            </div>
        </div>
        <div class="">
            <section>
                <form method="post" action="{{ route('operator.user-management.store') }}" class="mt-6 space-y-6">
                    @csrf
                    <div>
                        <x-input-label for="name" :value="__('Full Name')"/>
                        <x-text-input id="name" name="name" type="text"
                                      class="mt-1 block w-full" :value="old('name')" required/>
                        <x-input-error :messages="$errors->updatePassword->get('name')" class="mt-2"/>
                    </div>
                    <!-- Identifier Number (NRP) -->
                    <div class="mt-4">
                        <x-input-label for="identifier_number" :value="__('Identifier Number')"/>
                        <x-text-input id="identifier_number" class="block mt-1 w-full" type="tel" pattern="[0-9]{10}"
                                      maxlength="10" minlength="10" name="identifier_number"
                                      :value="old('identifier_number')" required/>
                        <x-input-error :messages="$errors->get('identifier_number')" class="mt-2"/>
                    </div>

                    <!-- Phone Number -->
                    <div class="mt-4">
                        <x-input-label for="phone_number" :value="__('Phone Number')"/>
                        <x-text-input id="phone_number" class="block mt-1 w-full" type="tel" pattern="[0-9]{10-15}"
                                      maxlength="15" minlength="10" name="phone_number" :value="old('phone_number')"
                                      required/>
                        <x-input-error :messages="$errors->get('phone_number')" class="mt-2"/>
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')"/>
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                      :value="old('email')" required autocomplete="username"/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                    </div>

                    <div>
                        <x-input-label for="password" :value="__('Password')"/>
                        <x-text-input id="password" name="password" type="password"
                                      class="mt-1 block w-full"/>
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2"/>
                    </div>

                    <div>
                        <x-input-label for="user_type" :value="__('Select User Type')"/>
                        <x-select-input id="user_type" name="user_type">
                            @foreach($userType as $user_type)
                                @if(old('$user_type') == $user_type)
                                <option value="{{$user_type}}" selected>{{\Illuminate\Support\Str::ucfirst($user_type->value)}}</option>
                                @endif
                                <option value="{{$user_type}}">{{\Illuminate\Support\Str::ucfirst($user_type->value)}}</option>
                            @endforeach
                        </x-select-input>
                        <x-input-error :messages="$errors->updatePassword->get('user_type')" class="mt-2"/>
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Create New') }}</x-primary-button>
                    </div>
                </form>
            </section>

        </div>
    </div>
</x-dashboard-layout>
