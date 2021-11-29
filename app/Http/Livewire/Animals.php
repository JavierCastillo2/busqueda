<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Animal;

class Animals extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $type, $description, $image;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.animals.view', [
            'animals' => Animal::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('type', 'LIKE', $keyWord)
						->orWhere('description', 'LIKE', $keyWord)
						->orWhere('image', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
		$this->name = null;
		$this->type = null;
		$this->description = null;
		$this->image = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'type' => 'required',
		'description' => 'required',
		'image' => 'required',
        'image' => 'image|max:1024',
        ]);

        // $url_imagen = $this->file('image')->store('public');
        // $url_imagen = str_replace('public/', '', $url_imagen);

        Animal::create([
			'name' => $this-> name,
			'type' => $this-> type,
			'description' => $this-> description,
			$this->photo->store('photos'),
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Animal Successfully created.');
    }

    public function edit($id)
    {
        $record = Animal::findOrFail($id);

        $this->selected_id = $id;
		$this->name = $record-> name;
		$this->type = $record-> type;
		$this->description = $record-> description;
		$this->image = $record-> image;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'type' => 'required',
		'description' => 'required',
		'image' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Animal::find($this->selected_id);
            $record->update([
			'name' => $this-> name,
			'type' => $this-> type,
			'description' => $this-> description,
			'image' => $this-> image
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Animal Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Animal::where('id', $id);
            $record->delete();
        }
    }
}
