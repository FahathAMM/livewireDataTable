<div>
    <style>
        th {
            cursor: pointer;
        }

    </style>
    <x-alert />
    <div class="container my-5">
        <div class="card">
            <div class="card-header">List of users</div>
            <div class="card-body">
                <div>
                    <form action="">
                        <input wire:model="search" type="text" class="float-right w-25 my-2 form-control">
                        <select wire:model="perRow" type="text" class="float-left w-25 my-2 form-control">
                            <option value="10">10</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                </div>
                </form>
                <table class="table table-striped">
                    <caption>List of users</caption>
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">
                                name
                                <span wire:click="sortBy('name')" class="float-right">
                                    <i
                                        class="fa fa-arrow-up {{ $sortColumnName == 'name' && $sortDirection == 'asc' ? '' : 'text-muted' }}">
                                    </i>
                                    <i
                                        class="fa fa-arrow-down {{ $sortColumnName == 'name' && $sortDirection == 'desc' ? '' : 'text-muted' }}">
                                    </i>
                                </span>
                            </th>
                            <th scope="col">
                                Email
                                <span wire:click="sortBy('email')" class="float-right">
                                    <i
                                        class="fa fa-arrow-up {{ $sortColumnName == 'name' && $sortDirection == 'asc' ? '' : 'text-muted' }}">
                                    </i>
                                    <i
                                        class="fa fa-arrow-down {{ $sortColumnName == 'name' && $sortDirection == 'desc' ? '' : 'text-muted' }}">
                                    </i>
                                </span>
                            </th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    @forelse ($users as $index => $user)
                        <tbody>
                            <tr>
                                <th scope="row">{{ $index + $users->firstItem() }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="button-group">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Edit</button>
                                            <button wire:click="deleteConfirmation('{{ $user->id }}')" type="button"
                                                class="btn btn-danger">Delete</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger w-50 " role="alert">
                                <p>data not found</p>
                                <p class="mb-0"></p>
                            </div>
                        </tbody>
                    @endforelse
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
