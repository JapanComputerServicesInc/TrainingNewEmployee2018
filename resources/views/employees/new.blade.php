@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">新規社員登録</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('employees.create') }}">
                            @csrf
                            <div class="form-group">
                                <label for="employeeNo">社員番号</label>
                                <input type="number" class="form-control{{ $errors->has('employee_no') ? ' is-invalid' : '' }}" id="employeeNo" name="employee_no" placeholder="123456789"
                                    value="{{ old('employee_no') }}" required>
                                <small class="form-text text-muted">8桁で入力して下さい。</small>
                                @if ($errors->has('employee_no'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('employee_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="name">氏名</label>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" placeholder="山田花子"
                                    value="{{ old('name') }}" required>
                                <small class="form-text text-muted">50文字以内で入力して下さい。</small>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">登録</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
