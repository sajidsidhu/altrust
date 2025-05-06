@extends('dashboard.dashboard')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<style>
    chatgpt-sidebar-popups {
        display:none;
    }
</style>
<div class="row">
    <div class="card">
        <div class="card-header">
            <h4>Dms Create</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('dms.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter name" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="reference_link" class="form-label">Reference</label>
                    <input type="text" id="reference_link" name="reference_link" placeholder="Enter reference" class="form-control" />
                </div>
                <div class="col-md-12 mb-3">
                    <label  for="">Multiple File Uplode</label>
                    <input type="file" multiple  name="dropzone_multifiles[]" id="" class="form-control"  required />
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection