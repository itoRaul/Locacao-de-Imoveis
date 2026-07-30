<div class="w-full min-h-screen bg-gray-100 pb-8">
    <x-header title="Dados Cadastrais" />

    <div class="px-4 sm:px-6 lg:px-8">

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
                <label class="block text-gray-700 mb-1">Estado</label>
                <select wire:model.live="state_id" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
                    <option value="">Selecione</option>
                    @foreach($states as $state)
                        <option value="{{$state->id}}">{{$state->name}}</option>
                    @endforeach
                </select>
                @error('state_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-gray-700 mb-1">Cidade</label>
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
    </div>
</div>
