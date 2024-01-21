@extends('layouts.main')

@section('title', 'Register')

@section('content')
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter  selection:bg-red-500 selection:text-white">
            <div class="card card-gray-dark">
                <div class="card-header">
                    Cadastrar usuário
                </div>
                <div class="card-body">
                    <form id="form-create-movement" action="{{ route('user.store') }}" method="POST" class="needs-validation" novalidate role="form">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="required">Nome:</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Informe seu nome" value="{{old('name')}}" required autocomplete="off" maxlength="50">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                               </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="required">E-mail:</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Informe seu endereço de e-mail" value="{{old('email')}}" required autocomplete="off" maxlength="200">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                               </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="required">Senha:</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Informe um senha para cadastro" value="{{old('password')}}" required autocomplete="off" maxlength="20">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                               </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="required">Confirmação de senha:</label>
                                    <input type="password" class="form-control @error('passwordConfirmation') is-invalid @enderror" name="passwordConfirmation" id="passwordConfirmation" placeholder="Confirme a senha" value="{{old('passwordConfirmation')}}" required autocomplete="off" maxlength="20">
                                    @error('passwordConfirmation')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                               </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr class="mb-4">

                        <button id="button-submit" type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
@endsection
