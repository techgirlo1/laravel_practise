<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Welcome  {{ Auth::user()->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="row">
            <div class="col-md-8">
            <div class="card">
            <div class="card-header">All Users</div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Created_at</th>
    </tr>
  </thead>
  @php($count=1)
  @foreach($users as $use)
    <tr>
      <th scope="row">{{$count++}}</th>
      <td>{{$use->name}}</td>
      <td>{{$use->email}}</td>
      <td>{{$use->created_at->diffForHumans()}}</td>
    </tr>
    @endforeach
    </div>
    </div>
    </div>
    </div>
</x-app-layout>
