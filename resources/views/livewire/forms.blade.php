<div class="w-full min-h-screen bg-gray-100 py-8 px-4">
    <h1 class="text-3xl font-bold mb-8 text-gray-800 text-center">Dados Cadastrais</h1>
    <div class="flex justify-end mb-4">
        @auth
            <div class="flex items-center">
                <span class="text-gray-600 mr-2">Olá, {{ Auth::user()->name }}</span>
                <a href="{{ route('logout') }}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">Sair</a>
            </div>
        @else
            <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Login</a>
        @endauth
    </div>

    <form method="post" wire:submit.prevent="create" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-7xl mx-auto mb-12">
        <div>
            <label class="block text-gray-700 mb-1">Nome Completo</label>
            <input type="text" wire:model="fullname" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            @error('fullname') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700 mb-1">Nome Social</label>
            <input type="text" wire:model="socialname" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            @error('socialname') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700 mb-1">CPF</label>
            <input type="text" wire:model="cpf" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            @error('cpf') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700 mb-1">RG</label>
            <input type="text" wire:model="rg" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            @error('rg') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700 mb-1">Email</label>
            <input type="text" wire:model="email" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700 mb-1">Telefone</label>
            <input type="text" wire:model="phone" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700 mb-1">CEP</label>
            <input type="text" wire:model="cep" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            @error('cep') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700 mb-1">Logradouro</label>
            <input type="text" wire:model="address" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700 mb-1">Número</label>
            <input type="text" wire:model="number" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            @error('number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700 mb-1">Bairro</label>
            <input type="text" wire:model="neighborhood" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            @error('neighborhood') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700 mb-1">Complemento</label>
            <input type="text" wire:model="complement" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            @error('complement') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700 mb-1">Estado Civil</label>
            <select wire:model="marital_status_id" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
                <option value="">Selecione</option>
                @foreach ($maritalStatus as $status)
                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                @endforeach
            </select>
            @error('marital_status_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700 mb-1">Grau de Instrução</label>
            <select wire:model="education_level_id" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
                <option value="">Selecione</option>
                @foreach ($educationLevels as $level)
                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                @endforeach
            </select>
            @error('education_level_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700 mb-1">Sexo</label>
            <select wire:model="gender_id" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
                <option value="">Selecione</option>
                @foreach ($genders as $gender_item)
                    <option value="{{ $gender_item->id }}">{{ $gender_item->name }}</option>
                @endforeach
            </select>
            @error('gender_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700 mb-1">Nacionalidade</label>
            <select wire:model="nationality" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
                <option value="">Selecione</option>
                <option value="Brasileira">Brasileira</option>
                <option value="Estrangeira">Estrangeira</option>
            </select>
            @error('nationality') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700 mb-1">Naturalidade</label>
            <select wire:model="city_id" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
                <option value="">Selecione</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
            @error('city_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="col-span-1 md:col-span-2 lg:col-span-3">
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Cadastrar</button>
        </div>
    </form>

    <hr class="my-8 max-w-7xl mx-auto">

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
        @foreach ($data as $d)
            <div class="mb-6 p-4 bg-gray-50 rounded shadow flex flex-col justify-between h-full">
                <div class="grid grid-cols-1 gap-2 text-gray-700 text-sm">
                    <div><span class="font-semibold">ID:</span> {{ $d->id }}</div>
                    <div><span class="font-semibold">Nome Completo:</span> {{ $d->fullname }}</div>
                    <div><span class="font-semibold">Nome Social:</span> {{ $d->socialname }}</div>
                    <div><span class="font-semibold">CPF:</span> {{ $d->cpf }}</div>
                    <div><span class="font-semibold">RG:</span> {{ $d->rg }}</div>
                    <div><span class="font-semibold">Email:</span> {{ $d->email }}</div>
                    <div><span class="font-semibold">Telefone:</span> {{ $d->phone }}</div>
                    <div><span class="font-semibold">CEP:</span> {{ $d->cep }}</div>
                    <div><span class="font-semibold">Logradouro:</span> {{ $d->address }}</div>
                    <div><span class="font-semibold">Número:</span> {{ $d->number }}</div>
                    <div><span class="font-semibold">Bairro:</span> {{ $d->neighborhood }}</div>
                    <div><span class="font-semibold">Complemento:</span> {{ $d->complement }}</div>
                    <div><span class="font-semibold">Estado Civil:</span> {{ $d->maritalStatus->name ?? 'N/A' }}</div>
                    <div><span class="font-semibold">Grau de Instrução:</span> {{ $d->educationLevel->name ?? 'N/A' }}</div>
                    <div><span class="font-semibold">Sexo:</span> {{ $d->gender->name ?? 'N/A' }}</div>
                    <div><span class="font-semibold">Nacionalidade:</span> {{ $d->nationality }}</div>
                    <div><span class="font-semibold">Naturalidade:</span> {{ $d->city->name ?? 'N/A' }}</div>
                </div>
                <div class="mt-4 flex gap-2">
                    <a href="{{ route('form.edit', ['id' => $d->id]) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">Editar</a>
                    <button wire:click="delete({{ $d->id }})" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">Deletar</button>
                    <button wire:click="addProperty({{ $d->id }})" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Adicionar Imóvel</button>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-8 flex justify-center">
        {{ $data->links() }}
    </div>
    </div>
</div>
