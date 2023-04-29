@props(['schedule'])

<div>
    <div class="flex w-1/2 flex-wrap  mb-4">
        <div class="flex justify-between w-full">
            <p>Monday</p>
            <div class="flex">
                <div class="flex">
                    <p>{{ $schedule->monday_am_start_time }}</p>
                    <p class="mx-2">-</p>
                    <p>{{ $schedule->monday_am_end_time }}</p>
                </div>
                <div class="flex ml-5">
                    <p>{{ $schedule->monday_pm_start_time }}</p>
                    <p class="mx-2">-</p>
                    <p>{{ $schedule->monday_pm_end_time }}</p>
                </div>
            </div>
        </div>
        <div class="flex justify-between w-full mt-2">
            <p>Tuesday</p>
            <div class="flex">
                <div class="flex">
                    <p>{{ $schedule->tuesday_am_start_time }}</p>
                    <p class="mx-2">-</p>
                    <p>{{ $schedule->tuesday_am_end_time }}</p>
                </div>
                <div class="flex ml-5">
                    <p>{{ $schedule->tuesday_pm_start_time }}</p>
                    <p class="mx-2">-</p>
                    <p>{{ $schedule->tuesday_pm_end_time }}</p>
                </div>
            </div>
        </div>
        <div class="flex justify-between w-full mt-2">
            <p>Wednesday</p>
            <div class="flex">
                <div class="flex">
                    <p>{{ $schedule->wednesday_am_start_time }}</p>
                    <p class="mx-2">-</p>
                    <p>{{ $schedule->wednesday_am_end_time }}</p>
                </div>
                <div class="flex ml-5">
                    <p>{{ $schedule->wednesday_pm_start_time }}</p>
                    <p class="mx-2">-</p>
                    <p>{{ $schedule->wednesday_pm_end_time }}</p>
                </div>
            </div>
        </div>
        <div class="flex justify-between w-full mt-2">
            <p>Thursday</p>
            <div class="flex">
                <div class="flex">
                    <p>{{ $schedule->thursday_am_start_time }}</p>
                    <p class="mx-2">-</p>
                    <p>{{ $schedule->thursday_am_end_time }}</p>
                </div>
                <div class="flex ml-5">
                    <p>{{ $schedule->thursday_pm_start_time }}</p>
                    <p class="mx-2">-</p>
                    <p>{{ $schedule->thursday_pm_end_time }}</p>
                </div>
            </div>
        </div>
        <div class="flex justify-between w-full mt-2">
            <p>Friday</p>
            <div class="flex">
                <div class="flex">
                    <p>{{ $schedule->friday_am_start_time }}</p>
                    <p class="mx-2">-</p>
                    <p>{{ $schedule->friday_am_end_time }}</p>
                </div>
                <div class="flex ml-5">
                    <p>{{ $schedule->friday_pm_start_time }}</p>
                    <p class="mx-2">-</p>
                    <p>{{ $schedule->friday_pm_end_time }}</p>
                </div>
            </div>
        </div>

    </div>
</div>
