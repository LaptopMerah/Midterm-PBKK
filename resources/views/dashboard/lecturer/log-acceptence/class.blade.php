<x-dashboard-layout webTitle="Lecture Dashboard">
    <div class="flex flex-row flex-wrap justify-center gap-5">
        @foreach ($classes as $item)
        <x-class-list-card
            :class="$item->course->name . ' - ' . $item->class_code"
            :lecturer="$item->lecturer_user"
            link="/lecturer/log-acceptance?id={{$item->id}}"
        /> 
        @endforeach
    </div>
</x-dashboard-layout>
