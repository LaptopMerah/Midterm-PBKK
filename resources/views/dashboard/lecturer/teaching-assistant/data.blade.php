<x-dashboard-layout webTitle="Course Class Management">
    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <!-- Card header -->
        <div class="items-center justify-between lg:flex flex-col lg:flex-row">
            <div class="w-full lg:w-1/2 mb-4 lg:mb-0">
                <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Teaching
                    Assistant {{$course_class->course->name }} - {{$course_class->class_code}} List</h3>
                <span class="text-base font-normal text-gray-500 dark:text-gray-400">
                    Data of all Teaching Assistant that registered on your Class
                </span>
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
                                    Full Name
                                </th>
                                <th
                                    scope="col"
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white"
                                >
                                    NRP
                                </th>
                                <th
                                    scope="col"
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white"
                                >
                                    GPA
                                </th>
                                <th
                                    scope="col"
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white"
                                >
                                    Is Accepted
                                </th>
                                <th
                                    scope="col"
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white"
                                >
                                    Is Available To Come
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
                            @foreach ($course_class->teaching_assistant as $data)
                                <tr>
                                    <td
                                        class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white"
                                    >
                                        {{$data->user->name}}
                                    </td>
                                    <td
                                        class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400"
                                    >
                                        {{$data->user->identifier_number}}
                                    </td>
                                    <td
                                        class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400"
                                    >
                                        {{$data->gpa}}
                                    </td>
                                    <td
                                        class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400"
                                    >
                                        {{$data->is_accepted ? 'Diterima' : 'Pending' }}
                                    </td>
                                    <td
                                        class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white"
                                    >
                                        {{$data->is_available ? 'Available to come' : 'Not Available'}}
                                    </td>
                                    <td
                                        class=""
                                    >
                                        <div class="flex flex-row gap-2">
                                            <a href="{{route('lecture.teaching-assistant.detail',$data->id)}}">
                                                <x-button type="warning">TA Detail</x-button>
                                            </a>
                                            @if(!$data->is_accepted)
                                            <form
                                                action="{{route('teaching.assistant.accept',$data->id)}}"
                                                method="POST">
                                                @csrf
                                                <x-button type="default">Accept</x-button>
                                            </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
