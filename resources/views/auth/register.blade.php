@extends('layouts.app')

@section('title', 'Registrarse')

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-1/2 border border-gray-200 rounded-lg shadow-lg">

    <h1 class="text-3xl text-center font-bold">Registrarse</h1>


    <form class="mt-4" method="POST" action="">

        @csrf

        <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
        placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Nombre" id="name" 
        name="name">

        <input type="email" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
        placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Email" id="email" 
        name="email">

        <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
        placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Contraseña" id="password" 
        name="password">

        <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
        placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Confirmar Contraseña" id="password_confirmation"
         name="password_confirmation">

        <button type="submit" class="rounded-mg bg-indigo-500 w-full text-lg text-white font-semibold
        p-2 my-3 hover:bg-indigo-600">Aceptar</button>
    </form>
</div>

@endsection