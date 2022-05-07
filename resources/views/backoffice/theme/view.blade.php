@extends('layouts.app')

@section('content')
    <section id="content">
        <h3>Theme</h3>
            <div class="table-responsive">
                <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Mode</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($data as $item)
                        <tr>
                            <td> {{ $item->name }} </td>
                            <td> {{ $item->mode }} </td>
                            <td> {{ $item->created_at }} </td>
                            <td class="text-center">
                                <a href="">
                                    <i class="icon-line-trash"></i>
                                </a>
                                &nbsp;
                                <a href="">
                                    <i class="icon-line-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3"> No record found </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
    </section>
@endsection
