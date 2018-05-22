@extends('layouts.app')

@include('layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">部門一覧</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>部門名</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($departments as $department)
                                    <tr>
                                        <th>
                                            <a href="{{ route('departments.edit', ['department' => $department->id]) }}">{{ $department->id }}</a>
                                        </th>
                                        <th>{{ $department->name }}</th>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">
                                            登録されている部門はありません。
                                        </td>
                                    </tr>
                                @endforelse
                                <tr></tr>
                            </tbody>
                        </table>
                        {{ $departments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
