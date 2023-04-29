@extends('layouts.app')

@section('content')
    <section class="m-auto w-3/5" x-data="{ showLogModal: false }">
        <div class="flex justify-between w-full items-start">
            <h1 class="text-4xl mb-8">Welcome {{ $employee->name }}</h1>
            <a class="py-2 px-4 rounded-md text-white bg-blue-500 hover:bg-blue-700 cursor-pointer"
                @click="showLogModal = true">Log work</a>
        </div>
        <h2>Today's schedule</h2>
        <p class="ml-5 text-xl mb-8">__:__ - __:__</p>

        <h2>Logged work</h2>
        <div class="flex flex-wrap w-full text-lg">

            <script>
                function openEditScreen(object) {
                    document.getElementById('editScreen').style.display = 'flex';
                    document.getElementById('editForm').action = '/employee/worklogs/' + object.id;

                    document.getElementById('fromEdit').value = object.from;
                    document.getElementById('untilEdit').value = object.until;
                }

                function closeEditScreen() {
                    document.getElementById('editScreen').style.display = 'none';
                }
            </script>

            @foreach ($employee->worklogs as $worklog)
                <div class="flex w-full relative bg-slate-100 py-2 px-4 mb-2 space-x-4">
                    <p>{{ $worklog->created_at->format('d/m/Y') }}</p>
                    <p>{{ $worklog->from->format('d/m/Y h:i') }} - {{ $worklog->until->format('d/m/Y h:i') }}</p>
                    <p title='pre-image: {{ $worklog->pre_image }}  hash: {{ $worklog->hash }}'>Info</p>
                    <a href='https://explorer.iota.org/mainnet/message/{{ $worklog->dlt_transaction_id }}'>DLT</a>
                </div>
            @endforeach
        </div>
        <div class="w-screen h-screen fixed overflow-hidden top-0 left-0 flex" style="background-color: rgba(0, 0, 0, 0.8);"
            x-show="showLogModal">
            <div class="m-auto w-full xl:max-w-xl inset-auto bg-white rounded-md relative py-8">
                <img src="{{ asset('/images/cancel.png') }}" class="absolute top-3 right-3 w-8 cursor-pointer"
                    @click="showLogModal = false">
                <h3 class="text-3xl text-center mb-4">Log work</h3>
                <form action="{{ route('employee.worklogs.store') }}" class="flex flex-col w-4/5 mx-auto" method="post">
                    @csrf
                    <label for="from" class='mb-2'>From</label>
                    <input id="from" name="from" type="datetime-local" class="bg-slate-100  h-10 rounded-md mb-4">

                    <label for="until" class='mb-2'>Until</label>
                    <input id="until" name="until" type="datetime-local" class="bg-slate-100  h-10 rounded-md mb-4">

                    <label for="employer_id" class='mb-2'>Client</label>
                    <select id='employer_id' name='employer_id'>
                        <option disabled selected>--</option>
                        @foreach ($employers as $employer)
                            <option value='{{ $employer->id }}'>{{ $employer->company }}</option>
                        @endforeach
                    </select>
                    <button type="submit"
                        class="py-2 w-1/3 my-auto px-4 mt-4 rounded-md text-white bg-blue-500 text-center pl-2 hover:bg-blue-700 mx-auto mb-1">
                        Log work
                    </button>
                </form>
            </div>
        </div>
        <div class="w-screen h-screen fixed overflow-hidden top-0 left-0 flex"
            style="background-color: rgba(0, 0, 0, 0.8); display:none;" id="editScreen">
            <div class="m-auto w-1/4 inset-auto bg-white rounded-md relative py-8">
                <img src="/images/cancel.png" class="absolute top-3 right-3 w-8 cursor-pointer" onclick="closeEditScreen()">
                <h2>Edit work</h2>
                <form action="/" id="editForm" class="flex flex-col" method="post">
                    @csrf
                    @method('PUT')
                    <label for="from" class="w-4/5 mx-auto">From</label>
                    <input id="fromEdit" name="from" type="text" placeholder="9:00"
                        class="bg-slate-100 w-4/5 pl-2 h-10 rounded-md mx-auto">
                    <label for="until" class="w-4/5 mx-auto ">Until</label>
                    <input id="untilEdit" name="until" type="text" placeholder="12:00"
                        class="bg-slate-100 w-4/5 mx-auto  h-10 rounded-md mb-5">
                    <button type="submit"
                        class="py-2 w-1/3 my-auto px-4 mt-4 rounded-md text-white bg-blue-500 text-center  hover:bg-blue-700 mx-auto mb-1">
                        Edit work
                    </button>
                </form>
            </div>
        </div>

    </section>
@endsection
