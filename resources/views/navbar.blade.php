<nav class="relative flex w-full mx-auto p-2 gap-2 flex-col md:flex-row items-center justify-between bg-slate-300 rounded-bl-lg rounded-br-lg">
  <p class="md:place-self-start px-4 py-2 font-semibold text-2xl">Sistema de cupones</p>

  <div class="flex flex-wrap items-center justify-center gap-1 p-1">
    {{-- @if (url()->current() != url('/'))
      <a class="bg-slate-400 px-4 py-2 font-semibold hover:bg-slate-500 text-white rounded-lg transition duration-150" href='/'>Lista de tiendas</a>
    @endif --}}

    @if (url()->current() != url('/'))
      <a class="bg-slate-400 px-4 py-2 font-semibold hover:bg-slate-500 text-white rounded-lg transition duration-150" href='/'>Regresar</a>
    @endif

    @if (url()->current() != url('new'))
      <a class="bg-slate-400 px-4 py-2 font-semibold hover:bg-slate-500 text-white rounded-lg transition duration-150" href='/new'>Crear</a>
    @endif

    @if (url()->current() != url('claimed'))
      <a class="bg-slate-400 px-4 py-2 font-semibold hover:bg-slate-500 text-white rounded-lg transition duration-150" href='/claimed'>Canjeados</a>
    @endif

    @if (url()->current() != url('update'))
      <a class="bg-slate-400 px-4 py-2 font-semibold hover:bg-slate-500 text-white rounded-lg transition duration-150" href='/update'>Actualizar</a>
    @endif

  </div>
</nav>
