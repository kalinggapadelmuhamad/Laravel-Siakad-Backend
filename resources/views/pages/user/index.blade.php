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
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            {{-- <div class="card-header">
                            </div> --}}
                            <div class="card-body">
                                <div class="float-left">
                                    <a href="" class="btn btn-primary">New User</a>
                                </div>
                                <div class="float-right">
                                    <form action="{{ route('index') }}" method="GET">
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
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Created At</th>
                                            <th>Action</th>
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
                                                {{ $user->created_at->format('d-m-Y') }}
                                            </td>
                                            <td>
                                                <div class="badge badge-primary">Published</div>
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
