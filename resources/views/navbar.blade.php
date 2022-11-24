<nav class="relative flex w-full mx-auto p-2 gap-2 flex-col md:flex-row items-center justify-between bg-slate-300 rounded-bl-lg rounded-br-lg">
  <p class="md:place-self-start px-4 py-2 font-semibold text-2xl">Sistema de cupones</p>

  @if (auth()->user() != '')
    <div class="flex flex-wrap items-center justify-center gap-1 p-1">

        <a class="bg-slate-400 px-4 py-2 font-semibold hover:bg-slate-500 text-white rounded-lg transition duration-150" href='/config-update'>Configuracion</a>

        <a class="bg-slate-400 px-4 py-2 font-semibold hover:bg-slate-500 text-white rounded-lg transition duration-150" href='/'>Solicitados</a>

        <a class="bg-slate-400 px-4 py-2 font-semibold hover:bg-slate-500 text-white rounded-lg transition duration-150" href='/view-token'>Ver/Crear Token</a>

      <form action="/logout" method="POST">
        @csrf
        <button class="bg-red-400 px-4 py-2 font-semibold hover:bg-red-500 text-white rounded-lg transition duration-150">Salir</button>
      </form>
    </div>
  @else
    <div class="flex flex-wrap items-center justify-center gap-1 p-1">
      {{-- <a class="bg-blue-400 px-4 py-2 font-semibold hover:bg-blue-500 text-white rounded-lg transition duration-150" href='/register'>Registrar</a> --}}
      <a class="bg-green-400 px-4 py-2 font-semibold hover:bg-green-500 text-white rounded-lg transition duration-150" href='/login'>Login</a>
    </div>
  @endif
</nav>
