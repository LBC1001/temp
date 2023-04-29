@extends('layouts.app')

@section('content')
    <section class=" w-1/3 p-5 relative m-auto">
        <h3 class="text-3xl mb-8">Enroll employee</h3>

        @if ($errors->any())
            <x-error class='mb-8'>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </x-error>
        @endif
        <p></p>
        <form action="{{ route('employer.employee.create') }}" class="flex flex-col" method="post">
            @csrf
            <label for="first_name">First name</label>
            <input id="first_name" name="first_name" type="text" class="bg-slate-100 w-full h-10 rounded-md mb-5">
            <label for="last_name">Last name</label>
            <input id="last_name" name="last_name" type="text" class="bg-slate-100 w-full h-10 rounded-md mb-5">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" class="bg-slate-100 w-full h-10 rounded-md mb-5">
            <div class="flex flex-wrap mt-5">
                @php
                    $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
                @endphp

                @for ($i = 0; $i < 5; $i++)
                    <div class="flex flex-wrap mb-6">
                        <label for="monday" class="w-1/2">{{ $daysOfWeek[$i] }}</label>
                        <input type="hidden" name="{{ $i }}" id="{{ $i }}" value="Monday">
                        <div class="flex w-1/2 mb-2 justify-between">
                            <input id="vmvan{{ $i }}" name="vmvan{{ $i }}" type="text"
                                placeholder="9:00" class="bg-slate-100 rounded-md w-2/5 text-center h-8">
                            <p class="mx-2">:</p>
                            <input id="vmtot{{ $i }}" name="vmtot{{ $i }}" type="text"
                                placeholder="12:00" class="bg-slate-100 rounded-md w-2/5 text-center h-8">
                        </div>
                        <div class="flex w-1/2 ml-auto justify-between">
                            <input id="nmvan{{ $i }}" name="nmvan{{ $i }}" type="text"
                                placeholder="13:00" class="bg-slate-100 rounded-md w-2/5 text-center h-8">
                            <p class="mx-2">:</p>
                            <input id="nmtot{{ $i }}" name="nmtot{{ $i }}" type="text"
                                placeholder="17:00" class="bg-slate-100 rounded-md w-2/5 text-center h-8">
                        </div>
                    </div>
                @endfor
            </div>
            <button type="submit" class="py-2 w-1/3 mx-auto px-4 rounded-md text-white bg-blue-500 hover:bg-blue-700">
                Create
            </button>
        </form>
    </section>
@endsection
