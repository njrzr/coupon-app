<nav class="relative flex w-full mx-auto p-2 gap-2 flex-col md:flex-row items-center justify-between bg-slate-300 rounded-bl-lg rounded-br-lg">
  <p class="md:place-self-start px-4 py-2 font-semibold text-2xl">Sistema de cupones</p>

  @if (auth()->user() != '')
    <div class="flex flex-wrap items-center justify-center gap-1 p-1">
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

      @if (url()->current() != url('/coupons'))
        <a class="bg-slate-400 px-4 py-2 font-semibold hover:bg-slate-500 text-white rounded-lg transition duration-150" href='/coupons'>Lista de cupones</a>
      @endif

      @if (url()->current() != url('/view-token'))
        <a class="bg-slate-400 px-4 py-2 font-semibold hover:bg-slate-500 text-white rounded-lg transition duration-150" href='/view-token'>Ver/Crear Token</a>
      @endif
      <form action="/logout" method="POST">
        @csrf
        <button class="bg-red-400 px-4 py-2 font-semibold hover:bg-red-500 text-white rounded-lg transition duration-150">Salir</button>
      </form>
    </div>
  @else
    <div class="flex flex-wrap items-center justify-center gap-1 p-1">
      <a class="bg-blue-400 px-4 py-2 font-semibold hover:bg-blue-500 text-white rounded-lg transition duration-150" href='/register'>Registrar</a>
      <a class="bg-green-400 px-4 py-2 font-semibold hover:bg-green-500 text-white rounded-lg transition duration-150" href='/login'>Login</a>
    </div>
  @endif
</nav>
