@extends('layouts.app')

@section('content')
    <section class="m-auto w-3/5" x-data="{ showEditInfo: false }">
        <div class="flex justify-between w-full">
            <h1 class="text-4xl mb-8">{{ $employee->first_name }} {{ $employee->last_name }} </h1>
            <div>
                <a class="py-2 px-4 w-1/4 rounded-md bg-gray-200 hover:bg-gray-300 cursor-pointer"
                    href='{{ route('employer.employees.edit', ['employee' => $employee->id]) }}'>Edit information</a>
                @if ($employee->isEnrolledAt($employer))
                    <a class="py-2 px-4 w-1/4 rounded-md text-white bg-red-300 hover:bg-red-500 cursor-pointer" href='#'
                        onclick="event.preventDefault();
                                    document.getElementById('unenroll-form').submit();">
                        Unenroll
                    </a>

                    <form id="unenroll-form" action="{{ route('employer.employee.unenroll', ['employee' => $employee]) }}"
                        method="POST">
                        @csrf
                    </form>
                @else
                    <a class="py-2 px-4 w-1/4 rounded-md text-white bg-blue-500 hover:bg-blue-700 cursor-pointer"
                        href='#'
                        onclick="event.preventDefault();
                            document.getElementById('enroll-form').submit();">
                        Enroll
                    </a>

                    <form id="enroll-form" action="{{ route('employer.employee.enroll', ['employee' => $employee]) }}"
                        method="POST">
                        @csrf
                    </form>
                @endif
            </div>
        </div>
        <h2>Working schedule</h2>
        @php
            $schedule = $employee->schedule;
        @endphp
        @if (!is_null($employee->schedule))
            <x-schedule :schedule="$employee->schedule" />
        @else
            <p>No schedule available for this employee...</p>
        @endif

        <h2 class=" mb-8">Performed hours</h3>
            <div class="flex flex-wrap w-full text-lg">
                @foreach ($employee->worklogs as $log)
                    <div class="flex w-full relative bg-slate-100 py-2 mb-2 justify-between">
                        <p>{{ $log->created_at->format('d/m/Y') }}</p>
                        <p>{{ $log->from->format('d/m/Y h:i') }} - {{ $log->until->format('d/m/Y h:i') }}</p>
                        <p title='pre-image: {{ $log->pre_image }}  hash: {{ $log->hash }}'>Info</p>
                        <a href='https://explorer.iota.org/mainnet/message/{{ $log->dlt_transaction_id }}'>DLT</a>
                    </div>
                @endforeach
            </div>
    </section>
@endsection
