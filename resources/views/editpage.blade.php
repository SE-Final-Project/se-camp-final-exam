@extends('layouts.default')

@section('page_name', 'Edit Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ url('/edit') }}/{{ $user->id }}" method="post">
            @csrf
            <div class="card-body">
                {{-- เปลี่ยนtitle --}}
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Title</label>

                    <div class="col-sm-10">
                        @if ($user !== null)
                            <select class="form-control form-select" name="title">
                                @foreach ($Titles as $Tindex => $title)
                                    @if ($user->title_id == $title->id)
                                        <option selected value="{{ $title->id }}">{{ $title->tit_name }}</option>
                                    @endif
                                @endforeach
                                @foreach ($Titles as $index => $title)
                                    @if ($user->title_id != $title->id)
                                        <option value="{{ $title->id }}">{{ $title->tit_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
                {{-- แก้ไขชื่อของuser --}}
                <div class="form-group row">
                    <label for="input02" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input02" name="name" value="{{ $user->name }}">
                    </div>
                </div>
                {{-- แก่ไขemailของuser --}}
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input03" name="email" value="{{ $user->email }}">
                    </div>
                </div>
                {{-- อัพโหลดไฟล์รูปภาพของuser --}}
                <div class="form-group row mb-3">
                    <label for="input05" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="input-group mb-3 col-sm-10">
                        <div class="input-group">
                            <input type="file" class="form-control" id="input05">
                            <label class="input-group-text" for="input05">ฺBrowse</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                <a href="{{ url('/') }}" class="btn btn-default float-right">Cancel</a>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection
