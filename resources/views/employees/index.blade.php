@extends('layouts.app')

@include('layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">新規社員登録</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>社員番号</th>
                                    <th>氏名</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($employees as $employee)
                                    <tr>
                                        <th>
                                            <a href="{{ route('employees.edit', ['employee' => $employee->id]) }}">{{ $employee->id }}</a>
                                        </th>
                                        <th>{{ $employee->employee_no }}</th>
                                        <th>{{ $employee->name }}</th>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">
                                            登録されている社員はいません。
                                        </td>
                                    </tr>
                                @endforelse
                                <tr></tr>
                            </tbody>
                        </table>
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
