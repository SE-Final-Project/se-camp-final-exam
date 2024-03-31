@extends('layouts.default')

@section('page_name', 'Edit Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-body">
            <div class="form-group row">
                <label for="input01" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <select class="form-control" id="title" name="input01">
                        <option disabled selected>เลือก</option>
                        <option>นาย</option>
                        <option>นางสาว</option>
                        <option>นาง</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="input02" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="input02">
                </div>
            </div>
            <div class="form-group row">
                <label for="input03" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="input03">
                </div>
            </div>
            <div class="form-group row">
                <label for="input05" class="col-sm-2 col-form-label">Avatar</label>
                <div class="col-sm-10">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="avatar name="input05">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
            </div>
        </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                <a href="{{ url('/') }}" class="btn btn-default float-right">Cancel</a>
                <button type="reset" class="btn btn-default float-right mr-2">Reset</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection