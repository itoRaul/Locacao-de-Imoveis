<div class="max-w-7xl mx-auto p-8 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-8 text-gray-800 text-center">Editar Dados Cadastrais de {{ $fullname }}</h1>

    <form method="post" wire:submit.prevent="update" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach([
            ['label' => 'Nome Completo', 'model' => 'fullname'],
            ['label' => 'Nome Social', 'model' => 'socialname'],
            ['label' => 'CPF', 'model' => 'cpf'],
            ['label' => 'RG', 'model' => 'rg'],
            ['label' => 'Email', 'model' => 'email'],
            ['label' => 'Telefone', 'model' => 'phone'],
            ['label' => 'CEP', 'model' => 'cep'],
            ['label' => 'Logradouro', 'model' => 'address'],
            ['label' => 'Número', 'model' => 'number'],
            ['label' => 'Bairro', 'model' => 'neighborhood'],
            ['label' => 'Complemento', 'model' => 'complement'],
        ] as $field)
        <div>
            <label class="block text-gray-700 mb-1">{{ $field['label'] }}</label>
            <input type="text" wire:model="{{ $field['model'] }}"
                class="w-full px-4 py-2 border border-black rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-black transition duration-200" />
            @error($field['model']) <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        @endforeach

        <div>
            <label class="block text-gray-700 mb-1">Estado Civil</label>
            <select wire:model="marital_status_id"
                class="w-full px-4 py-2 border border-black rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-black transition duration-200">
                <option value="">Selecione</option>
                @foreach ($maritalStatus as $status)
                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                @endforeach
            </select>
            @error('marital_status_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Grau de Instrução</label>
            <select wire:model="education_level_id"
                class="w-full px-4 py-2 border border-black rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-black transition duration-200">
                <option value="">Selecione</option>
                @foreach ($educationLevels as $level)
                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                @endforeach
            </select>
            @error('education_level_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Sexo</label>
            <select wire:model="gender_id"
                class="w-full px-4 py-2 border border-black rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-black transition duration-200">
                <option value="">Selecione</option>
                @foreach ($genders as $gender)
                    <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                @endforeach
            </select>
            @error('gender_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Nacionalidade</label>
            <select wire:model="nationality"
                class="w-full px-4 py-2 border border-black rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-black transition duration-200">
                <option value="Brasileira">Brasileira</option>
                <option value="Estrangeira">Estrangeira</option>
            </select>
            @error('nationality') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Estado</label>
            <select wire:model.live="state_id"
                class="w-full px-4 py-2 border border-black rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-black transition duration-200">
                <option value="">Selecione</option>
                @foreach ($states as $state)
                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                @endforeach
            </select>
            @error('state_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700 mb-1">Naturalidade</label>
            <select wire:model="city_id"
                class="w-full px-4 py-2 border border-black rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-black transition duration-200">
                <option value="">Selecione</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
            @error('city_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="col-span-1 md:col-span-2 lg:col-span-3 flex flex-col items-center">
            <button type="submit"
                class="w-full md:w-1/2 lg:w-1/3 mt-4 px-4 py-2 bg-black text-white rounded-lg font-semibold hover:bg-gray-800 transition duration-200">
                Editar
            </button>
            <a href="/dashboard-user" class="inline-block mt-4 text-blue-600 hover:underline">Voltar</a>
        </div>
    </form>
</div>
