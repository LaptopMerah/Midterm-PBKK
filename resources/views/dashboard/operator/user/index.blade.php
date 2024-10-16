<x-dashboard-layout webTitle="User Management">
    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <!-- Card header -->
        <div class="items-center justify-between lg:flex flex-col lg:flex-row">
            <div class="w-full lg:w-1/4 mb-4 lg:mb-0">
                <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">User List</h3>
                <span class="text-base font-normal text-gray-500 dark:text-gray-400">
                    Data of all user registered in this application
                </span>
            </div>
            <div class="w-full lg:w-1/2 flex flex-col sm:flex-row-reverse gap-2 items-center">
                <a href="{{route('operator.user-management.create')}}">
                    <button
                        type="button"
                        class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 w-full sm:w-auto font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800"
                    >
                        Create New
                    </button>
                </a>
                <form method="get" action="" class="sm:flex items-center w-full sm:max-w-md lg:min-w-max">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">
                        Search
                    </label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <x-feathericon-search />
                        </div>
                        <input
                            type="search"
                            name="search"
                            id="default-search"
                            class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search..."
                            value="{{request('search')}}"
                        />
                        <button
                            type="submit"
                            class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        >
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Table -->
        <div class="flex flex-col mt-6">
            <div class="overflow-x-auto rounded-lg">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden shadow sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th
                                    scope="col"
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white"
                                >
                                    Name
                                </th>
                                <th
                                    scope="col"
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white"
                                >
                                    Identifier Number
                                </th>
                                <th
                                    scope="col"
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white"
                                >
                                    Email Address
                                </th>

                                <th
                                    scope="col"
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white"
                                >
                                    User Type
                                </th>
                                <th
                                    scope="col"
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white"
                                >
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800">
                            @foreach ($datum as $data )
                                <tr>
                                    <td
                                        class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white"
                                    >
                                        {{$data->name}}
                                    </td>
                                    <td
                                        class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400"
                                    >
                                        {{$data->identifier_number}}
                                    </td>
                                    <td
                                        class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white"
                                    >
                                        {{$data->email}}
                                    </td>
                                    <td class="p-4 whitespace-nowrap">
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500"
                                        >
                                            {{$data->user_type}}
                                        </span>
                                    </td>
                                    <td
                                        class=""
                                    >
                                        <a href="{{route('operator.user-management.edit',$data->id)}}">
                                            <x-button type="warning">Detail</x-button>
                                        </a>
                                        <a href="{{route('operator.user-management.destroy',$data->id)}}" data-confirm-delete="true">
                                            <x-button type="danger">Delete</x-button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="w-full mt-3">
                        {{$datum->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
