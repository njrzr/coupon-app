<nav class="absolute z-10 h-screen p-2 bg-slate-800" x-cloack x-data="{ menu: false }">
  <p title="Sistema de cupones" class="text-center text-white px-4 py-2 font-semibold" x-on:click=" menu = !menu "><i class="fa-solid fa-bars"></i> <span x-cloack x-show="menu" alt="Menu">Sistema de cupones</span></p>

  @if (auth()->user() != '')
    <div class="grid gap-2 p-1">
      @if (url()->current() != url('/'))
        <a title="Regresar" class="bg-slate-400 px-4 py-2 font-semibold hover:bg-slate-500 text-white rounded-lg transition duration-150" href='/'><i class="fa-solid fa-left-long"></i> <span x-cloack x-show="menu">Regresar</span></a>
      @endif

      @if (url()->current() != url('/new'))
        <a title="Crear" class="bg-slate-400 px-4 py-2 font-semibold hover:bg-slate-500 text-white rounded-lg transition duration-150" href='/new'><i class="fa-solid fa-plus"></i> <span x-cloack x-show="menu">Crear</span></a>
      @endif

      @if (url()->current() != url('/claimed'))
        <a title="Canjeados" class="bg-slate-400 px-4 py-2 font-semibold hover:bg-slate-500 text-white rounded-lg transition duration-150" href='/claimed'><i class="fa-solid fa-table-list"></i> <span x-cloack x-show="menu">Canjeados</span></a>
      @endif

      @if (url()->current() != url('/user-claimed'))
        <a title="Usuarios" class="bg-slate-400 px-4 py-2 font-semibold hover:bg-slate-500 text-white rounded-lg transition duration-150" href='/user-claimed'><i class="fa-solid fa-address-book"></i></i> <span x-cloack x-show="menu">Usuarios</span></a>
      @endif

      @if (url()->current() != url('/update'))
        <a title="Actualizar" class="bg-slate-400 px-4 py-2 font-semibold hover:bg-slate-500 text-white rounded-lg transition duration-150" href='/update'><i class="fa-solid fa-pen-to-square"></i> <span x-cloack x-show="menu">Actualizar</span></a>
      @endif

      @if (url()->current() != url('/coupons'))
        <a title="Lista de cupones" class="bg-slate-400 px-4 py-2 font-semibold hover:bg-slate-500 text-white rounded-lg transition duration-150" href='/coupons'><i class="fa-solid fa-table"></i> <span x-cloack x-show="menu">Lista de cupones</span></a>
      @endif

      @if (url()->current() != url('/view-token'))
        <a title="Crear/Recrear Token" class="bg-slate-400 px-4 py-2 font-semibold hover:bg-slate-500 text-white rounded-lg transition duration-150" href='/view-token'><i class="fa-solid fa-user-secret"></i> <span x-cloack x-show="menu">Crear/Recrear Token</span></a>
      @endif
      <form action="/logout" method="POST">
        @csrf
        <button title="Salir" class="w-full text-left bg-red-400 px-4 py-2 font-semibold hover:bg-red-500 text-white rounded-lg transition duration-150"><i class="fa-solid fa-right-from-bracket"></i> <span x-cloack x-show="menu">Salir</span></button>
      </form>
    </div>
  @else
    <div class="grid gap-2 p-1">
      <a title="Registrar" class="bg-blue-400 px-4 py-2 font-semibold hover:bg-blue-500 text-white rounded-lg transition duration-150" href='/register'><i class="fa-solid fa-user-plus"></i> <span x-cloack x-show="menu">Registrar</span></a>
      <a title="Login" class="bg-green-400 px-4 py-2 font-semibold hover:bg-green-500 text-white rounded-lg transition duration-150" href='/login'><i class="fa-solid fa-right-to-bracket"></i> <span x-cloack x-show="menu">Login</span></a>
    </div>
  @endif
</nav>
