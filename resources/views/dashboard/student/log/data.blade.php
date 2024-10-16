<x-dashboard-layout webTitle="Student Dashboard">
    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <!-- Card header -->
        <div class="items-center justify-between lg:flex flex-col lg:flex-row">
            <div class="w-full lg:w-1/4 mb-4 lg:mb-0">
                <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Logs kelas </h3>
                <span class="text-base font-normal text-gray-500 dark:text-gray-400">
                    Catatan log kelas yang telah dibuat oleh asisten dosen.
                </span>
            </div>
            {{-- @dump($teaching_assistant) --}}
            <div class="w-full lg:w-1/2 flex flex-col sm:flex-row-reverse gap-2 items-center">
                <a href="{{ route('student.ta-log.create', $teaching_assistant->id ) }}">
                    <button type="button"
                        class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 w-full sm:w-auto font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                        Buat log baru
                    </button>
                </a>
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
                                    <th scope="col"
                                        class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                        Weeks
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                        Date
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                        Description
                                    </th>
                                    <th scope="col"
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                    Action
                                </th>
                
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800">
                                @foreach ($teaching_assistant->ta_logs as $item)
                                <tr>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-white">
                                        {{ $item->week }}
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-white">
                                        {{ $item->date->format('d M Y') }}
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-900 max-w-screen-sm break-words whitespace-normal dark:text-gray-400">
                                        {{ $item->description }}
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-white">
                                        <a href="{{ route('student.ta-log.edit', $item->id) }}">
                                            <x-button type="warning">Update</x-button>
                                        </a>
                                        <a href="{{ route('student.ta-log.destroy', $item->id) }}" data-confirm-delete="true">
                                            <x-button type="danger">Delete</x-button>
                                        </a>
                                    </td>                       
                                </tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</x-dashboard-layout>


