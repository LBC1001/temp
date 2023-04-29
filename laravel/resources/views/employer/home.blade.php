@extends('layouts.app')

@section('content')
    <section class="m-auto w-3/5">
        <div class="flex justify-between w-full items-start">
            <h1>Welcome Joe</h1>
            <a href="{{ route('employer.employees.create') }}"
                class="py-2 px-4 w-1/4 rounded-md text-white bg-blue-500 hover:bg-blue-700 cursor-pointer">Create
                employee</a>
        </div>
        <h2>Freelancers</h2>
        <div class="flex flex-wrap w-full text-lg">
            @foreach ($employees as $employee)
                <div class="flex justify-between w-full relative bg-slate-100 py-2 mb-2">
                    <p class="ml-5">{{ $employee->first_name }} {{ $employee->last_name }}</p>
                    <p class="text-green-500 absolute left-2/4 ">active</p> <a class="text-blue-500 mr-7"
                        href="{{ route('employer.employees.show', $employee->id) }}">Details</a>
                </div>
            @endforeach
        </div>
    </section>
@endsection
