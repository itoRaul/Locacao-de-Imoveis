<div class="relative min-h-screen w-full flex items-center justify-center p-4 overflow-hidden">
    {{-- Background Image --}}
    <div class="fixed inset-0 z-0">
        <img src="{{ asset('assets/img-tela-login.png') }}" class="w-full h-full object-cover" alt="Background">
        <div class="absolute inset-0 bg-black/40 backdrop-blur-[2px]"></div>
    </div>

    {{-- Login Card --}}
    <div class="relative z-10 w-full max-w-md">
        <div class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-3xl p-8 shadow-2xl overflow-hidden relative">
            {{-- Decorative accent --}}
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-blue-500/20 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-purple-500/20 rounded-full blur-3xl"></div>

            <div class="text-center mb-8 relative">
                <h1 class="text-4xl font-black text-white tracking-tight mb-2">Esqueceu sua senha?</h1>
                <p class="text-white/60 font-medium tracking-wide">Digite o seu e-mail para receber o link de redefinição de senha.</p>
            </div>

            <form wire:submit.prevent="sendResetLink" class="space-y-6 relative">
                <div>
                    <label for="email" class="block text-sm font-semibold text-white/80 mb-2 ml-1 uppercase tracking-widest text-[10px]">Email</label>
                    <div class="relative group">
                        <input wire:model="email" type="email" id="email" required
                               class="w-full bg-white/5 border border-white/10 text-white rounded-2xl px-5 py-4 outline-none focus:border-blue-400 focus:bg-white/10 transition-all duration-300 placeholder:text-white/20"
                               placeholder="seu@email.com">
                        <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-blue-500 to-purple-600 opacity-0 group-focus-within:opacity-10 pointer-events-none transition-opacity duration-300"></div>
                    </div>
                    @error('email') <span class="text-rose-400 text-xs mt-2 ml-1 font-medium">{{ $message }}</span> @enderror
                </div>

                @if(session()->has('success'))
                    <div class="bg-emerald-500/10 border border-emerald-500/20 rounded-xl p-4 mb-4">
                        <p class="text-emerald-400 text-sm font-medium">{{ session('success') }}</p>
                    </div>
                @endif

                <button type="submit" 
                        class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-bold py-4 rounded-2xl shadow-lg shadow-blue-900/20 transform transition-all duration-200 active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-slate-900 mb-4 h-[56px] flex items-center justify-center space-x-2">
                    <span wire:loading.remove wire:target="sendResetLink">Enviar</span>
                    <div wire:loading wire:target="sendResetLink">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                </button>

            </form>
        </div>
        
        {{-- Footer --}}
        <div class="mt-8 text-center text-white/30 text-[10px] uppercase tracking-[0.2em] font-medium">
            &copy; {{ date('Y') }} Formulario &bull; Todos os direitos reservados
        </div>
    </div>
</div>