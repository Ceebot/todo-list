@extends('layouts.web.app')

@section('title', 'Login')

@section('content')
    <div class="container mt-5 d-flex flex-column align-items-center">
        <form action="{{ $login_url }}"
              method="post"
              class="p-5 rounded border w-50 border border-dark"
              id="login-form"
        >
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Почта</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </div>
@endsection
