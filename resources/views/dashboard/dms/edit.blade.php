@extends('dashboard.dashboard')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<style>
    chatgpt-sidebar-popups {
        display:none;
    }
</style>
    <div class="row px-3">
        <div class="card">
            <div class="card-header">
                <h4>Dms update</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('dms.update', ['id' => $dms->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" value="{{ $dms->name }}" placeholder="Enter name" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="reference_link" class="form-label">Reference</label>
                        <input type="text" id="reference_link" name="reference_link" value="{{ $dms->reference_link }}" placeholder="Enter reference" class="form-control" />
                    </div>
                    <div class="col-md-12 mb-3">
                        <label  for="">Multiple File Uplode</label>
                         @php
                            $data = $dms->dropzone_multifiles;
                            $multiple = json_decode($data);
                        @endphp
                        <input type="file" multiple name="dropzone_multifiles[]" class="form-control" />
                         @if($data)
                            @foreach($multiple as $file)
                            <span class="my-3">
                                <a href="{{$file}}" class="my-5"><i class="ti ti-file" style="font-size:25px;"></i></a> 
                            </span>
                            @endforeach
                        @endif
                        <input type="hidden" name="old" value="{{$data}}">
                    </div>

                    <input type="hidden" name="file_paths" id="filePaths" value="" />
                    <div class="mt-4">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection