@extends('layouts.app')

@section('content')
    <div class='xl:max-w-lg mx-auto'>
        <h1>Edit information</h1>
        <form action="{{ route('employer.employees.update', ['employee' => $employee]) }}" class="flex flex-col"
            method="post">
            @csrf
            @method('put')
            <label for="first_name">First name</label>
            <input id="first_name" name="first_name" type="text" value="{{ $employee->first_name }}" class="w-full h-10 mb-5">
            <label for="last_name">Last name</label>
            <input id="last_name" name="last_name" type="text" value="{{ $employee->last_name }}"
                class="w-full h-10 mb-5">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ $employee->email }}" class="w-full h-10 mb-5">

            <div class="flex flex-wrap mt-5">
                <div class="flex flex-wrap mb-6">
                    <label for="monday" class="w-1/2">Monday</label>
                    <div class="flex w-1/2 mb-2 justify-between">
                        <input id="vmvan0" type="text" name="vmvan0" placeholder="9:00"
                            value="{{ !is_null($schedule) ? $schedule->monday_am_start_time : '' }}"
                            class="w-2/5 text-center h-8">
                        <p class="mx-2">:</p>
                        <input id="vmtot0" type="text" name="vmtot0" placeholder="12:00"
                            value="{{ !is_null($schedule) ? $schedule->monday_am_end_time : '' }}"
                            class="w-2/5 text-center h-8">
                    </div>
                    <div class="flex w-1/2 ml-auto justify-between">
                        <input id="nmvan0" type="text" name="nmvan0" placeholder="13:00"
                            value="{{ !is_null($schedule) ? $schedule->monday_pm_start_time : '' }}"
                            class="w-2/5 text-center h-8">
                        <p class="mx-2">:</p>
                        <input id="nmtot0" type="text" name="nmtot0" placeholder="17:00"
                            value="{{ !is_null($schedule) ? $schedule->monday_pm_end_time : '' }}"
                            class="w-2/5 text-center h-8">
                    </div>
                </div>
                <div class="flex flex-wrap mb-6">
                    <label for="Tuesday" class="w-1/2">Tuesday</label>
                    <div class="flex w-1/2 mb-2 justify-between">
                        <input id="vmvan1" type="text" name="vmvan1" placeholder="9:00"
                            value="{{ !is_null($schedule) ? $schedule->tuesday_am_start_time : '' }}"
                            class="w-2/5 text-center h-8">
                        <p class="mx-2">:</p>
                        <input id="vmtot1" type="text" name="vmtot1" placeholder="12:00"
                            value="{{ !is_null($schedule) ? $schedule->tuesday_am_end_time : '' }}"
                            class="w-2/5 text-center h-8">
                    </div>
                    <div class="flex w-1/2 ml-auto justify-between">
                        <input id="nmvan1" type="text" name="nmvan1" placeholder="13:00"
                            value="{{ !is_null($schedule) ? $schedule->tuesday_pm_start_time : '' }}"
                            class="w-2/5 text-center h-8">
                        <p class="mx-2">:</p>
                        <input id="nmtot1" type="text" name="nmtot1" placeholder="17:00"
                            value="{{ !is_null($schedule) ? $schedule->tuesday_pm_end_time : '' }}"
                            class="w-2/5 text-center h-8">
                    </div>
                </div>
                <div class="flex flex-wrap mb-6">
                    <label for="Wednsday" class="w-1/2">Wednesday</label>
                    <div class="flex w-1/2 mb-2 justify-between">
                        <input id="vmvan2" type="text" name="vmvan2" placeholder="9:00"
                            value="{{ !is_null($schedule) ? $schedule->wednesday_am_start_time : '' }}"
                            class="w-2/5 text-center h-8">
                        <p class="mx-2">:</p>
                        <input id="vmtot2" type="text" name="vmtot2" placeholder="12:00"
                            value="{{ !is_null($schedule) ? $schedule->wednesday_am_end_time : '' }}"
                            class="w-2/5 text-center h-8">
                    </div>
                    <div class="flex w-1/2 ml-auto justify-between">
                        <input id="nmvan2" type="text" name="nmvan2" placeholder="13:00"
                            value="{{ !is_null($schedule) ? $schedule->wednesday_pm_start_time : '' }}"
                            class="w-2/5 text-center h-8">
                        <p class="mx-2">:</p>
                        <input id="nmtot2" type="text" name="nmtot2" placeholder="17:00"
                            value="{{ !is_null($schedule) ? $schedule->wednesday_pm_end_time : '' }}"
                            class="w-2/5 text-center h-8">
                    </div>
                </div>
                <div class="flex flex-wrap mb-6">
                    <label for="Thursday" class="w-1/2">Thursday</label>
                    <div class="flex w-1/2 mb-2 justify-between">
                        <input id="vmvan3" type="text" name="vmvan3" placeholder="9:00"
                            value="{{ !is_null($schedule) ? $schedule->thursday_am_start_time : '' }}"
                            class="w-2/5 text-center h-8">
                        <p class="mx-2">:</p>
                        <input id="vmtot3" type="text" name="vmtot3" placeholder="12:00"
                            value="{{ !is_null($schedule) ? $schedule->thursday_am_end_time : '' }}"
                            class="w-2/5 text-center h-8">
                    </div>
                    <div class="flex w-1/2 ml-auto justify-between">
                        <input id="nmvan3" type="text" name="nmvan3" placeholder="13:00"
                            value="{{ !is_null($schedule) ? $schedule->thursday_pm_start_time : '' }}"
                            class="w-2/5 text-center h-8">
                        <p class="mx-2">:</p>
                        <input id="nmtot3" type="text" name="nmtot3" placeholder="17:00"
                            value="{{ !is_null($schedule) ? $schedule->thursday_pm_end_time : '' }}"
                            class="w-2/5 text-center h-8">
                    </div>
                </div>
                <div class="flex flex-wrap mb-6 ">
                    <label for="Friday" class="w-1/2">Friday</label>
                    <div class="flex w-1/2 mb-2 justify-between">
                        <input id="vmvan4" type="text" name="vmvan4" placeholder="9:00"
                            value="{{ !is_null($schedule) ? $schedule->friday_am_start_time : '' }}"
                            class="w-2/5 text-center h-8">
                        <p class="mx-2">:</p>
                        <input id="vmtot4" type="text" name="vmtot4" placeholder="12:00"
                            value="{{ !is_null($schedule) ? $schedule->friday_am_end_time : '' }}"
                            class="w-2/5 text-center h-8">
                    </div>
                    <div class="flex w-1/2 ml-auto justify-between">
                        <input id="nmvan4" type="text" name="nmvan4" placeholder="13:00"
                            value="{{ !is_null($schedule) ? $schedule->friday_pm_start_time : '' }}"
                            class="w-2/5 text-center h-8">
                        <p class="mx-2">:</p>
                        <input id="nmtot4" type="text" name="nmtot4" placeholder="17:00"
                            value="{{ !is_null($schedule) ? $schedule->friday_pm_end_time : '' }}"
                            class="w-2/5 text-center h-8">
                    </div>
                </div>
            </div>

            <button type="submit"
                class="py-2 w-1/3 mb-1 ml-auto mt-5 px-4 text-white bg-blue-500 hover:bg-blue-700 rounded-md">
                Update
            </button>
        </form>
    </div>
@endsection
