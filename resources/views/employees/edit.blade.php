@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">社員情報編集</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('employees.update', ['employee' => $employee]) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="employeeNo">社員番号</label>
                                <p>{{ $employee->employee_no }}</p>
                            </div>
                            <div class="form-group">
                                <label for="name">氏名</label>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" placeholder="山田花子"
                                       value="{{ old('name', $employee->name) }}" required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">更新</button>
                            <button type="button" class="btn btn-danger text-right" style="float: right;"
                                onclick="if (confirm('削除しますか？')) document.getElementById('delete-form').submit()">
                                削除
                            </button>
                        </form>
                        <form id="delete-form" method="POST" action="{{ route('employees.destroy', ['employee' => $employee]) }}">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
