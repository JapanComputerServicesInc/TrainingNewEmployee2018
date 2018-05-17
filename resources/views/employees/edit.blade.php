@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">新規社員登録</div>

                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="employeeNo">社員番号</label>
                                <input type="email" class="form-control" id="employeeNo" placeholder="123456789">
                            </div>
                            <div class="form-group">
                                <label for="name">氏名</label>
                                <input type="password" class="form-control" id="name" placeholder="山田花子">
                            </div>
                            <button type="submit" class="btn btn-primary">登録</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
