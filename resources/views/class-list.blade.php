<x-main-layout webTitle="Class List">
    <div class="flex flex-row flex-wrap justify-center gap-5">
        @foreach ($classes as $item)
        <x-class-list-card
            :class="$item->course->name . ' - ' . $item->class_code"
            :lecturer="$item->lecturer_user"
            link="student/teaching-assistant-registration/create?id={{ $item->id }}"
        /> 
        @endforeach
    </div>
</x-main-layout>
