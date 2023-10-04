@extends('layouts.app')

@section('title', 'All Users')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>All Users</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Users</a></div>
                    <div class="breadcrumb-item">All Users</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-left">
                                    <a href="{{ route('user.create') }}" class="btn btn-primary">New User</a>
                                </div>
                                <div class="float-right">
                                    <form action="{{ route('user.index') }}" method="GET">
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control"
                                                placeholder="Search"
                                                name="name"
                                                value="{{ request('name') }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th style="width: 3%">No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Created At</th>
                                            <th style="width: 5%" class="text-center">Action</th>
                                        </tr>
                                        @foreach ($users as $index => $user)
                                        <tr>
                                            <td>
                                                {{ $users->firstItem() + $index }}
                                            </td>
                                            <td>
                                                {{ $user->name }}
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            <td>
                                                {{ $user->phone }}
                                            </td>
                                            <td>
                                                {{ $user->created_at->format('d-F-Y') }}
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('user.edit', $user) }}" class="btn btn-sm btn-icon btn-primary m-1"><i class="fas fa-user-pen"></i></a>
                                                    <form action="{{ route('user.destroy', $user) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-sm btn-danger btn-icon m-1">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        @endforeach
                                        </tr>
                                    </table>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <span>
                                        Showing {{ $users->firstItem() }}
                                        to {{ $users->lastItem() }}
                                        of {{ $users->total() }} entries
                                    </span>
                                    <div class="paginate-sm">
                                        {{ $users->onEachSide(0)->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
