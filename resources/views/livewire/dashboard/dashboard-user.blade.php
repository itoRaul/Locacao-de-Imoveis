<div class="w-full min-h-screen bg-gray-100 pb-8">

    <x-header title="Dados Cadastrais" />

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
        @foreach ($data as $d)
            <div class="mb-6 p-4 bg-gray-50 rounded shadow flex flex-col justify-between h-full">
                <div class="grid grid-cols-1 gap-2 text-gray-700 text-sm">
                    <div><span class="font-semibold">ID:</span> {{ $d->id }}</div>
                    <div><span class="font-semibold">Nome Completo:</span> {{ $d->fullname }}</div>
                    <div><span class="font-semibold">Nome Social:</span> {{ $d->socialname }}</div>
                    <div><span class="font-semibold">CPF:</span> {{ $d->cpf }}</div>
                    <div><span class="font-semibold">RG:</span> {{ $d->rg }}</div>
                    <div><span class="font-semibold">Data de Nascimento:</span> {{ \Carbon\Carbon::parse($d->birthday_date)->format('d/m/Y') }}</div>
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
                    <button wire:click="addProperty({{ $d->id }})" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Adicionar Imóvel</button>
                </div>
            </div>
        @endforeach
    </div>
</div>