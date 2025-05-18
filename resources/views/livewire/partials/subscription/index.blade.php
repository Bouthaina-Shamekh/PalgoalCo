<div class="page-header">
    <div class="page-block">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">subscriptions</a></li>
            <li class="breadcrumb-item" aria-current="page">subscriptions List</li>
        </ul>
        <div class="page-header-title">
            <h2 class="mb-0">subscriptions List</h2>
        </div>
    </div>
</div>
<div class="card">
  <div class="card-header flex justify-between items-center">
    <h3 class="font-bold">Subscriptions</h3>
    <button wire:click="showAdd" class="btn btn-primary">Add New</button>
  </div>
  <div class="card-body">
    <table class="table-auto w-full">
      <thead>
        <tr>
          <th>ID</th><th>Client</th><th>Plan</th><th>Starts At</th><th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($subscriptions as $sub)
          <tr>
            <td>{{ $sub->id }}</td>
            <td>{{ $sub->client->company_name }}</td>
            <td>{{ $sub->plan->name }}</td>
            <td>{{ $sub->starts_at->format('Y-m-d') }}</td>
            <td>
              <button wire:click="showEdit({{ $sub->id }})" class="btn btn-sm btn-secondary">Edit</button>
              <button wire:click="delete({{ $sub->id }})" class="btn btn-sm btn-danger">Delete</button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="mt-3">{{ $subscriptions->links() }}</div>
  </div>
</div>
