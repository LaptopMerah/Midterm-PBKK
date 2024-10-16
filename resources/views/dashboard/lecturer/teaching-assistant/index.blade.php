<x-dashboard-layout webTitle="Course Class Management">
    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <!-- Card header -->
        <div class="items-center justify-between lg:flex flex-col lg:flex-row">
            <div class="w-full lg:w-1/4 mb-4 lg:mb-0">
                <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Class List</h3>
                <span class="text-base font-normal text-gray-500 dark:text-gray-400">
                    Data of all Class registered in this application
                </span>
            </div>
            <div class="w-full lg:w-1/2 flex flex-col sm:flex-row-reverse gap-2 items-center">
                <a href="{{route('operator.class.create')}}">
                    <button
                        type="button"
                        class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 w-full sm:w-auto font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800"
                    >
                        Create New Class
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
                                <th
                                    scope="col"
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white"
                                >
                                    Class Code
                                </th>
                                <th
                                    scope="col"
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white"
                                >
                                    Schedule
                                </th>
                                <th
                                    scope="col"
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white"
                                >
                                    Participant Number
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
                            @foreach ($courseClasses as $class)
                                <tr>
                                    <td
                                        class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white"
                                    >
                                        {{$class->course->name.'-'.$class->class_code .' / '. $class->course->course_code }}
                                    </td>
                                    <td
                                        class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400"
                                    >
                                        {{$class->day .' '. $class->time_shift->start_time . '-' . $class->time_shift->end_time }}
                                    </td>
                                    <td
                                        class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white"
                                    >
                                        {{$class->class_participant}}
                                    </td>
                                    <td
                                        class=""
                                    >
                                        <a href="{{route('operator.class.edit',$class->id)}}">
                                            <x-button type="warning">Detail</x-button>
                                        </a>
                                        <a href="{{route('operator.class.destroy',$class->id)}}" data-confirm-delete="true">
                                            <x-button type="danger">Delete</x-button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="w-full mt-3">
                        {{$courseClasses->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
