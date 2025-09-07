@extends('layouts.sbadmin')

@section('title','Approval User')

@section('content')
<div class="card shadow-sm rounded-4">
    <div class="card-header fw-bold">Daftar User Pending</div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->nip }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form method="POST" action="{{ route('user-approval.approve',$user->id) }}">
                                @csrf
                                <button class="btn btn-success btn-sm">Approve</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center">Tidak ada user pending</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
