<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Data;
use Auth;

class DashboardUser extends Component
{

    public $data;

    public function mount()
    {
        $this->data = Data::where('user_id', Auth::id())->get();
    }

    public function render()
    {
        return view('livewire.dashboard.dashboard-user');
    }

    public function update()
    {
        $this->validate();

        $data = Data::find($this->data_id);

        if ($data) {
            $data->update($this->only([
                'fullname',
                'socialname',
                'cpf',
                'rg',
                'email',
                'phone',
                'cep',
                'marital_status_id',
                'state_id',
                'city_id',
                'nationality',
                'education_level_id',
                'gender_id',
                'address',
                'number',
                'neighborhood',
                'complement'
            ]));

            return redirect('/form');
        }
    }

    public function delete($id)
    {
        $data = Data::find($id);

        if ($data) {
            $data->delete();
        }
    }
}