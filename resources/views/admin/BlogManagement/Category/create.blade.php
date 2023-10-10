@extends('admin.templates.app')
@section('title', 'Create Category Services')
@section('content')
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Form Create Category Blog
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
							<form action="">
								<div>
									<label for="crud-form-1" class="form-label">Product Name</label>
									<input id="crud-form-1" type="text" class="form-control w-full" placeholder="Input text">
							</div>
							<div class="text-right mt-5">
									<button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
									<button type="button" class="btn btn-primary w-24">Save</button>
							</div>
							</form>
            </div>
            <!-- END: Form Layout -->
        </div>
    </div>
@endsection
