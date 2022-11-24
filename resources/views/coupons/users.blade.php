@extends('index')

@section('content')
  <div class="relative flex flex-col items-center justify-between gap-1 bg-slate-300 md:w-11/12 mx-auto my-1 p-2 rounded-lg overflow-x-auto">
    <div class="grid md:grid-cols-5 gap-1 w-full border border-slate-400 md:border-none p-2 md:p-0 rounded-lg">
      <p class="font-semibold text-white bg-slate-400 p-1">Nombre</p>
      <p class="font-semibold text-white bg-slate-400 p-1">Correo</p>
      <p class="font-semibold text-white bg-slate-400 p-1">Telefono</p>
      <p class="font-semibold text-white bg-slate-400 p-1">Tienda</p>
      <p class="font-semibold text-white bg-slate-400 p-1">Solicitado</p>
    </div>

    @foreach ($users as $user)
      <div class="grid md:grid-cols-5 gap-1 w-full border border-slate-400 md:border-none p-2 md:p-0">
        <p class="border border-slate-400 p-1">{{ $user->username }}</p>
        <p class="border border-slate-400 p-1">{{ $user->email }}</p>
        <p class="border border-slate-400 p-1">{{ $user->phone }}</p>
        <p class="border border-slate-400 p-1">{{ $user->store_name }}</p>
        <p class="border border-slate-400 p-1 text-right">{{ $user->created_at->format('d/m/Y') }}</p>
      </div>
    @endforeach
  </div>

  <div class="w-11/12 mx-auto">
    {{ $users->links() }}
  </div>
@endsection
