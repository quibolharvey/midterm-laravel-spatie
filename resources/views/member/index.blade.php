@extends('layout.layout')

@section('content')
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold text-indigo-800 mb-4">Member List</h1>

        <table class="w-full border-collapse border border-indigo-500">
            <thead>
                <tr class="bg-indigo-200">
                    <th class="border border-indigo-500 px-4 py-2">ID</th>
                    <th class="border border-indigo-500 px-4 py-2">Name</th>
                    <th class="border border-indigo-500 px-4 py-2">Email</th>
                    <th class="border border-indigo-500 px-4 py-2">Role</th>
                    <th class="border border-indigo-500 px-4 py-2">Joined At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                    <tr class="text-center">
                        <td class="border border-indigo-500 px-4 py-2">{{ $member->id }}</td>
                        <td class="border border-indigo-500 px-4 py-2">{{ $member->name }}</td>
                        <td class="border border-indigo-500 px-4 py-2">{{ $member->email }}</td>
                        <td class="border border-indigo-500 px-4 py-2">
                            {{ $member->roles->pluck('name')->implode(', ') }}
                        </td>
                        <td class="border border-indigo-500 px-4 py-2">{{ $member->created_at->format('M d, Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
