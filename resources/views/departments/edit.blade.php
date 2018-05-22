@extends('layouts.app')

@include('layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">部門情報編集</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('departments.update', ['department' => $department]) }}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="id" value="{{ $department->id }}">
                            <div class="form-group">
                                <label for="name">氏名</label>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" placeholder="管理本部"
                                       value="{{ old('name', $department->name) }}" required>
                                <small class="form-text text-muted">50文字以内で入力して下さい。</small>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @if ($errors->has('id'))
                                <p class="text-danger">{{ $errors->first('id') }}</p>
                            @endif
                            <button type="submit" class="btn btn-primary">更新</button>
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#deleteModal" style="float: right;">削除</button>
                        </form>
                        <form id="delete-form" method="POST" action="{{ route('departments.destroy', ['department' => $department]) }}">
                            @csrf
                            @method('DELETE')
                            @include('departments._delete_model')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
