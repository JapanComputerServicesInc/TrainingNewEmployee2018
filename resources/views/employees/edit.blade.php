@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">社員情報編集</div>

                    <div class="card-body">
                        @if (Session::has('success_message'))
                            <div class="alert alert-success">
                                {{ Session::get('success_message') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('employees.update', ['employee' => $employee]) }}">
                            @csrf
                            <div class="form-group">
                                <label for="employeeNo">社員番号</label>
                                <input type="number" class="form-control" id="employeeNo" name="employee_no" placeholder="123456789"
                                    value="{{ old('employee_no', $employee->employee_no) }}" required>
                                @if ($errors->has('employee_no'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('employee_no') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="name">氏名</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="山田花子"
                                       value="{{ old('name', $employee->name) }}" required>
                                @if ($errors->has('name'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">更新</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
