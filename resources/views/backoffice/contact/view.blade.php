@extends('layouts.app')

@section('content')
    <section id="content">
        <h3>Contact us</h3>
            <div class="table-responsive">
                <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>message</th>
                        <th>subject</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($data as $item)
                        <tr>
                            <td> {{ $item->name }} </td>
                            <td> {{ $item->email }} </td>
                            <td> {{ $item->phone }} </td>
                            <td> {{ $item->message }} </td>
                            <td> {{ $item->subject }} </td>
                            <td> {{ $item->created_at }} </td>
                            <td class="text-center">
                                <a href="">
                                    <i class="icon-line-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12" class="text-center"> No record found </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
    </section>
@endsection
