<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserLiveWire extends Component
{

    use WithPagination;

    public $name;
    public $userId = null;
    public $model;
    public $search;
    public $perRow;

    public $sortColumnName = 'created_at';
    public $sortDirection  = 'desc';

    protected $listeners       = ['deleteConfirmed' => 'delete'];
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search' => ['except' => '']];

    public function mount(User $model)
    {
        $this->model = $model;
    }

    public function deleteConfirmation($id)
    {
        $this->userId = $id;
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function delete()
    {
        $about = $this->model->findOrFail($this->userId);
        $about->delete();
        session()->flash('success', 'User Deleted Successfully.');

    }

    private function perRow()
    {
        if ($this->perRow) {
            return $this->perRow;
        } else {
            return config('pagination.page.default');
        }
    }

    public function updatedPerRow()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $users = $this->model->query();

        if ($this->search) {
            $users = $users->Search($this->search);
        }

        $users = $users->orderBy($this->sortColumnName, $this->sortDirection);

        return view('livewire.user-live-wire', [
            'users' => $users->paginate($this->perRow()),
        ]
        )->extends('layouts.app');
    }

    public function sortBy($columnName)
    {
        if ($this->sortColumnName == $columnName) {
            $this->sortDirection = $this->defaultSortDirection();
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortColumnName = $columnName;
    }

    private function defaultSortDirection()
    {
        return $this->sortDirection == 'asc' ? 'desc' : 'asc';
    }

}
