@extends('layouts.app')

@include('layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">社員情報編集</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('employees.update', ['employee' => $employee->id]) }}">
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
                                <small class="form-text text-muted">50文字以内で入力して下さい。</small>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="departmentId">所属部署</label>
                                <select class="form-control" id="departmentId" name="department_id">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}"
                                            @if ($department->id === $employee->department->id) selected @endif>
                                            {{ $department->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">更新</button>
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#deleteModal" style="float: right;">削除</button>
                        </form>
                        <form id="delete-form" method="POST" action="{{ route('employees.destroy', ['employee' => $employee]) }}">
                            @csrf
                            @method('DELETE')
                            @include('employees._delete_model')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
