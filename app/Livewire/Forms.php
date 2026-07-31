<?php

namespace App\Livewire;

use App\Models\City;
use Livewire\Component;
use App\Models\Data;
use App\Models\MaritalStatus;
use App\Models\EducationLevel;
use App\Models\Gender;
use App\Models\State;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Forms extends Component
{

    use WithPagination;

    protected $rules = [
        'fullname' => 'required|string|max:255',
        'socialname' => 'nullable|string|max:255',
        'marital_status_id' => 'required|exists:marital_status,id',
        'education_level_id' => 'required|exists:education_levels,id',
        'gender_id' => 'required|exists:genders,id',
        'nationality' => 'required|in:Brasileira,Estrangeira',
        'city_id' => 'required|exists:cities,id',
        'cpf' => 'required|string|max:14',
        'rg' => 'required|string|max:20',
        'email' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'cep' => 'required|string|max:9',
        'address' => 'required|string|max:255',
        'number' => 'required|string|max:10',
        'neighborhood' => 'required|string|max:100',
        'complement' => 'nullable|string|max:255',
        'state_id' => 'required|exists:states,id',
        'birthday_date' => 'required|date',
    ];

    public string $fullname = '';
    public string $socialname = '';
    public $maritalStatus = [];
    public ?int $marital_status_id = null;
    public $educationLevels = [];
    public ?int $education_level_id = null;
    public $genders = [];
    public ?int $gender_id = null;
    public ?string $nationality = 'Brasileira';
    public $cities = [];
    public ?int $city_id = null;
    public $states = [];
    public ?int $state_id = null;
    public string $cpf = '';
    public string $rg = '';
    public string $email = '';
    public string $phone = '';
    public string $cep = '';
    public string $address = '';
    public string $number = '';
    public string $neighborhood = '';
    public string $complement = '';
    public ?string $birthday_date = null;

    public ?int $data_id = null;

    public function mount($id = null)
    {
        $user_id = Auth::id();
        if ($id) {
            $this->data_id = $id;
            $data = Data::find($this->data_id);
            if ($data) {
                $this->user_id = $user_id;
                $this->fullname = $data->fullname;
                $this->socialname = $data->socialname;
                $this->cpf = $data->cpf;
                $this->rg = $data->rg;
                $this->email = $data->email;
                $this->phone = $data->phone;
                $this->cep = $data->cep;
                $this->address = $data->address;
                $this->number = $data->number;
                $this->neighborhood = $data->neighborhood;
                $this->complement = $data->complement;
                $this->nationality = $data->nationality;
                $this->marital_status_id = $data->marital_status_id;
                $this->education_level_id = $data->education_level_id;
                $this->gender_id = $data->gender_id;
                $this->city_id = $data->city_id;
                $this->state_id = $data->state_id;
                $this->birthday_date = $data->birthday_date;
            }
        }
        $this->maritalStatus = MaritalStatus::whereIn('status', [true, 1])->get();
        $this->educationLevels = EducationLevel::whereIn('status', [true, 1])->get();
        $this->genders = Gender::whereIn('status', [true, 1])->get();
        $this->states = State::whereIn('status', [true, 1])->get();
        $this->cities = City::where('state_id', $this->state_id)->get();
    }

    public function updatedStateId($state_id)
    {
        $this->cities = City::where('state_id', $state_id)->get();
        $this->city_id = null;
    }

    public function render()
    {
        if ($this->data_id) {
            return view('livewire.edit');
        }

        $data = Data::latest()->paginate(1);
        return view('livewire.forms', compact('data'));
    }

    public function create()
    {
        $this->validate();

        $data = $this->only([
            'fullname',
            'socialname',
            'cpf',
            'rg',
            'email',
            'phone',
            'cep',
            'marital_status_id',
            'nationality',
            'state_id',
            'city_id',
            'education_level_id',
            'gender_id',
            'address',
            'number',
            'neighborhood',
            'complement',
            'birthday_date'
        ]);

        $data['user_id'] = Auth::id();

        Data::create($data);

        $this->reset();

        return redirect('/dashboard-user');
    }
}
